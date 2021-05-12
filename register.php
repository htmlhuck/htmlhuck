<?php
session_start();

require "functions.php";

$email = $_POST['email'];
$password = $_POST['password'];

$user = get_user_by_email($email);


if(!empty($user)) {
    set_flash_message("danger", "Этот эл. адрес уже занят другим пользователем.");
    redirect_to("/page_register.php");
}

add_user($email, $password);




set_flash_message("success", "Регистрация успешна");
redirect_to("/page_login.php");



////////////////////////////////////////////

$emailAut = $_POST['email_aut'];
$passwordAut = $_POST['password_aut'];


$userAut = login($emailAut, $passwordAut);


  if(!empty($userAut)) {
        redirect_to("/users.php");
        exit;
    } else {
        $_SESSION['message'] = "Пользователь не авторизован";
        redirect_to("/page_login.php");
    }
   








// $pdo = new PDO("mysql:host=localhost;dbname=my_project;", "mysql", "mysql");

// $sql = "SELECT * FROM users WHERE email=:email";
// $statment = $pdo->prepare($sql);
// $statment->execute(["email" => $email]);
// $user = $statment->fetch(PDO::FETCH_ASSOC);

// if(!empty($user)) {
//     $_SESSION['danger'] = "Этот эл. адрес уже занят другим пользователем.";
//     header("Location: /page_register.php");
//     exit;
// }



// $sql = "INSERT INTO users(email, password) VALUES(:email, :password)";
// $statment = $pdo->prepare($sql);

// $statment->execute([
//     "email" => $email,
//     "password" => password_hash($password, PASSWORD_DEFAULT)
// ]);

// $_SESSION['success'] = 'Регистрация успешна';
// header("Location: /page_login.php");
// exit;