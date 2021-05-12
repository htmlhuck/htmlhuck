<?php

session_start();
require_once "functions.php";


$emailAut = $_POST['email_aut'];
$passwordAut = $_POST['password_aut'];


$userAut = login($emailAut, $passwordAut);

if(!empty($userAut)) {
    redirect_to("/users.php");
    exit;
} else {
    $_SESSION['message'] = "Пользователь не авторизован";
    redirect_to("/page_login.php");
    exit;
}
   
