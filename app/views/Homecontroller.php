<?php 

namespace App\controllers;

use App\exceptions\AccountBlock;
use App\QueryBuilder;
use League\Plates\Engine;
use App\exceptions\NotMoney;
// use Delight\Auth\Auth;
use PDO;


class Homecontroller {

    private $templates;

    public function __construct()
    {   
        $this->templates = new Engine('../app/views');
    }

    public function index($vars){

        $db = new QueryBuilder();
        $posts = $db->getAll('posts');
        
        echo $this->templates->render('homepage', ['posts' => $posts]);
    }


    public function about() {

        $db = new PDO('mysql:host=localhost;dbname=app3;', 'mysql', 'mysql');
        $auth = new \Delight\Auth\Auth($db);

        try {
            $userId = $auth->register('rahimdevmarlin@mail.ru', '123', 'rahim', function ($selector, $token) {
                echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
            });
        
            echo 'We have signed up a new user with the ID ' . $userId;
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Invalid email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Invalid password');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('User already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }


        // try {
        //     $this->withdrow($vars['amount']);
        // } catch (NotMoney $exception) {
        //     flash()->error($exception->getMessage());
        // } catch(AccountBlock $exception) {
        //     flash()->error($exception->getMessage());
        // }
        
        
        // echo $this->templates->render('about', ['title' => 'Jonathan about']);
    }


    
//     public function withdrow($amount = 1) {
//     $total = 10;
//     // throw new AccountBlock('Ваш аккаунт временно заблокирован');
//     if($amount > $total) {
//         throw new NotMoney("Недастаточно средств");
//     }
// }



}


