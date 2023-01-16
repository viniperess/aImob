<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aImob</title>
  




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    
<nav class="navbar navbar-expand-md navbar-light bg-danger">
    <a class="navbar-brand text-light ml-2" href="#">aImob <img src="./imagens/logo.png" alt="" height="30px" width="30px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav ml-auto topnav me-3">
            <li class="nav-item active">
                <a class="nav-link text-light" href="logar.php">Entrar<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="listarImovel2.php">Listar Imóvel</a>
            </li>
        </ul>
    </div>

</nav>
</div>

</head>

<body style="background-color: #B3B3B3">

<img src="./imagens/logo2.png" class="d-flex" alt="Bootstrap Themes" loading="lazy" id="imag" style="align-items: center; margin:30px auto;">

</body>
<footer>
<?php 

require_once("includes/footer.php");
?>
</footer>
</html>