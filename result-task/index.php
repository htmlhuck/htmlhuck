<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>
        Мои фотографии
        <span>Галерея</span>
    </h1>

    <?php
        $pdo = new PDO("mysql:host=localhost;dbname=my_project;", "mysql", "mysql");
        $statment = $pdo->prepare("SELECT * FROM img_table ORDER BY id DESC");
        $statment->execute();

        $images = $statment->fetchAll(PDO::FETCH_ASSOC);
    ?>


        <h2>
            <?= $_SESSION['messaga'];  unset($_SESSION['messaga'])?>
        </h2>
     


    <div class="main">
        <ul class="list">
            <?php foreach($images as $image):?>
            <li>
                <img src="uploads/<?= $image['image'];?>" alt="">
            </li>
            <?php endforeach;?>
        </ul>



        <form class="form" action="about.php" method="post" enctype="multipart/form-data">
            <label>
                <input type="file" name="image">
            </label>        
            <button type="submit">Отправить</button>
        </form>
    </div>
    


</body>
</html>