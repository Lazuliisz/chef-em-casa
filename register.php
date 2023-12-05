<?php
    $currentPage ='contact';
   include_once(__DIR__ . '/components/header.php');

?>
<main class="container pt-5">
    <div class="jumbotron">
        <h1 class="display-4"> Cire sua conta</h1>
        <div class="jumbotron">
            <p class="lead">Junte-se a mais nova comunidade de culunária do mundo!</p>
        </div>
        <form action="register_post.php" method="post">
                <div class="form-group">
                    <label for="name">Digite seu nome completo</label>
                    <input type="text" class="form-control" name="name" id="name">
</div>
<div class="form-group">
<label for="exampleInputEmail">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="email">
        <small id="emailHelp" class="form-text text-muted">
              Nós nunca iremos compartilhar o seu email com mais ninquém. </small>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <label type="password" name="password" class="form-controll" id="exampleInputPassword1"></label>
    <button type="submit" class="btn btn-success">
        Cadastrado.
    </button>
        </form>
</main>

<?php
  
   include_once(__DIR__ . '/components/footer.php');

?>