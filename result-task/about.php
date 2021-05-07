<?php
session_start();

$imageTmp = $_FILES['image']['tmp_name'];


if(empty($imageTmp)) {
    $_SESSION['messaga'] = 'Вы не выбрали фотографию';
    
    header("Location: /index.php");
    exit;
}

$photoName = $_FILES['image']['name'];
$extension = pathinfo($photoName, PATHINFO_EXTENSION);
$photoName = uniqid() . "." . $extension;


$imageSave = "uploads/" . $photoName;
move_uploaded_file($imageTmp, $imageSave); 


$pdo = new PDO("mysql:host=localhost;dbname=my_project;", "mysql", "mysql");
$sql = "INSERT INTO img_table(image) VALUES(?)";
$statment = $pdo->prepare($sql);
$statment->execute([$photoName]);




header('Location: /index.php');
?>
