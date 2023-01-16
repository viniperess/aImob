<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="estilos/redefinir.css">
    <nav class="navbar navbar-expand-md navbar-light bg-danger">
    <a class="navbar-brand text-light ml-2" href="#">aImob <img src="./imagens/logo.png" alt="" height="30px" width="30px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto topnav me-3">
        <li class="nav-item active">
          <a class="nav-link text-light" href="home.php">Início<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="logar.php">Entrar</a>
        </li>
      </ul>
    </div>

  </nav>
  </div>
</head>
<body>
    
<?php

include_once('controllers/funcoes_db.php');

session_start();

$email = $_GET['email'];
$token = $_GET['ref'];

$array = array($email);
$query = 'select * from pessoa where md5(email) = ?';

$resultado = ConsultaSelect($query,$array);

if($resultado['token'] == $token){
    ?>
<div class="grid-container">
    <div class="item1">
      <h3>Redefina sua Senha</h3>
    <form action="controllers/controller_usuario.php" method="POST" class="form">
        <label for="senha">Digite sua senha nova</label>
            <input type="text" name="senha">
            <input type="hidden" name="email" value="<?php echo $email?>"><br>
            <input type="submit" class="ren" value="Renovar" name="botao">
    </form>
<?php

}
    else{
        echo "Link invalido.";
    }
?>
</div>
<div class="item2">
         <img src="./imagens/logo2.png" class="centro" alt="Bootstrap Themes" loading="lazy">
      </div>
</div>
</body>
<footer>
    <?php
    require_once("includes/footer.php");
    ?>
</footer>

</html>