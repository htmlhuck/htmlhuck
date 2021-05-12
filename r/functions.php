<?php

function get_user_by_email($email) {
    $pdo = new PDO("mysql:host=localhost;dbname=my_project;", "mysql", "mysql");
    $sql = "SELECT * FROM users WHERE email=:email";
    $statment = $pdo->prepare($sql);
    $statment->execute(["email" => $email]);
    $user = $statment->fetch(PDO::FETCH_ASSOC);

    return $user;
}

function set_flash_message($name, $messaga) {
    $_SESSION[$name] = $messaga;
}

function redirect_to($path) {
    header("Location: {$path}");
    exit;
}

function add_user($email, $password) {
    $pdo = new PDO("mysql:host=localhost;dbname=my_project;", "mysql", "mysql");
    $sql = "INSERT INTO users(email, password) VALUES(:email, :password)";
    $statment = $pdo->prepare($sql);

    $statment->execute([
        "email" => $email,
        "password" => $password
    ]);

    return $pdo->lastInsertId();
}

function display_flash_message($name) {
    if(isset($_SESSION[$name])) {
        echo "<div class=\"alert alert-{$name} text-dark\" role=\"alert\">{$_SESSION[$name]}</div>";
        unset($_SESSION[$name]);
    }   
}





/////////////////////////////////////////

function login($emailAut, $passwordAut) {
    $pdo = new PDO("mysql:host=localhost;dbname=my_project;", "mysql", "mysql");
    $sql = "SELECT * FROM users WHERE email=:emailAut AND password=:passwordAut";
    $statment = $pdo->prepare($sql);
    $statment->execute(["emailAut" => $emailAut, "passwordAut" => $passwordAut]);
    $userAut = $statment->fetchAll(PDO::FETCH_ASSOC);

    return $userAut;
}

///////////////////////////////////////

























// function get_user_by_auto($email_login, $password_login) {
//     $pdo = new PDO("mysql:host=localhost;dbname=my_project;", "mysql", "mysql");
//     $sql = "SELECT * FROM users WHERE email=:email, password=:password";
//     $statment = $pdo->prepare($sql);
//     $statment->execute(["email" => $email_login, "password" => $password_login]);
//     $userAuto = $statment->fetchAll(PDO::FETCH_ASSOC);

//     return $userAuto;
// }



