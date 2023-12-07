<?php
  // inicia a sessão
  session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  $connection = connectDatabase();

  // Usar prepared statements para proteger contra SQL injection
  $name = mysqli_real_escape_string($connection, $name);
  $email = mysqli_real_escape_string($connection, $email);
  $password= mysqli_real_escape_string($connection, $password);


  $password_hashed = password_hash($password, PASSWORD_DEFAULT);

  $query = "INSERT INTO users (name, email, password, level) VALUES ('$name', '$email', '$password_hashed', 'common')";

  $result = mysqli_query($connection, $query);

  if(mysqli_rum_rows($result) > 0){

     // trasnforma o rsultado em array associativa
     $row = mysqli_fet_assoc($result);

      if(password_verify($password, $row['password'])){
      
        // Armazena o id do usuario e o nome 
        $_SESSION['user_id'] = $rwo['id'];
        $_SESSION['user_name'] = $rwo['name'];

        // redireciona para o dashboard
        header("Location: ../admin/index.php");

      }else{

        // falar q esta incorreta
        $_SESSION['login_error'] = 'Senha está incorreta';
        header("Location:../login.php");
      }

  }else{
    
    $_SESSION['login_error'] = 'Email está incorreto ou não existe';
    header("Location:../login.php");
  }
}