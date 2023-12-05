<?php

// conectar ao Banco de Dados

function connectDatabase(){
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'kyosz';

    $connection = myqli_connect($server, $user, $password, $database);

    if(!$connection){
       die('Conexão falhou:' . mysqli_connect_error());
    }
    return $connection;
}
//connectDatabase();

if($_SERVER["RESQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password= $_POST["password"];

    $connection = connectDatabase();

    //Proteger contra SQL Infection

    $name = mysqli_real_escape_string($connection, $name);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);

    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, password) VALUES ('$name', $email, $password')";

    if(mysqli_query($connection, $query)){
        echo "usuário cadastrado com sucesso";

    }else{
        echo "Erro no cadastro: " . mysqli_error($connection);
    }
}
?>