<?php
session_start();

include_once ('../helpers/database.php');

$post_id = $_POST['post_id'];
$comment = $_POST['comment'];
$user_id = $_SESSION['user_id'];

// Conecta no banco de dados
$connection = connectDatabase();

$post_id = mysqli_real_escape_string($connection, $post_id);
$content = mysqli_real_escape_string($connection, $content);

$query = "INSERT INTO comments ( content, post_id, user_id ) VALUES ('$content', '$post_id', '$user_id')";

if(mysqli_query($connection, $query)){
    $_SESSION['message'] = "Seu comentário foi publicada com sucesso";
    $_SESSION['message_type'] = "success";
    header("Location: ../posts.php?post_id=" . $post_id)
}else{
    $_SESSION['message'] = "Ocorreu um erro ao cadastrar seu comentário";
    $_SESSION['message_type'] = "danger";
    header("Location: ../post.php");
}

