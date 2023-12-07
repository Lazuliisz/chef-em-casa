<?php

include_once ('../../helpers/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $image = $_POST["image"];
    $image = 'imagem.png';
    $user_id = $_SESSION{'user_id'};

    $connection = connectdatabase();

}

    $connection = connectDatabase();

    // Usar prepared statements para proteger contra SQL injection
    $name = mysqli_real_escape_string($connection, $name);
    $email = mysqli_real_escape_string($connection, $email);
    $password= mysqli_real_escape_string($connection, $password);

    $query = "INSERT INTO posts (users, title, content, image, views) VALUES ('$user_id', '$title', '$content', '$image', 0)";