<!-- <!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Esqueci Senha</title>
</head>
<body>
        <form action="controllers/controller_usuario.php" method="POST">
        Informe aqui seu email: <input type="text" name="email">
        <input type="submit" name="botao" value="Enviar">
</form>
</body>
</html> -->
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







  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

</head>




<body style="background-color: #B3B3B3">

  <nav class="navbar navbar-expand-md navbar-light bg-danger">
    <a class="navbar-brand text-light ml-4" href="#">aImob <img src="./imagens/logo.png" alt="" height="30px" width="30px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto topnav me-3">
        <li class="nav-item active">
          <a class="nav-link text-light" href="logar.php">Entrar<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="form_cad_usuario.php">Cadastrar</a>
        </li>
      </ul>
    </div>

  </nav>
  </div>
  <!-- CSS BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <div class="container col-xl-10 col-xxl-8 px-4 py-5  ">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <div class="col-10 col-sm-8 col-lg-6">
          <img src="./imagens/logo2.png" class="d-flex" alt="Bootstrap Themes" loading="lazy">
        </div>
      </div>
      <div class="col-md-10 mx-auto col-lg-5 mt-0">
        <form action="controllers/controller_usuario.php" method="post" class="p-4 p-md-5 border rounded-3 ">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
            <label for="email">Email </label>
          </div>
          <button class="w-100 btn btn-md btn-primary" type="submit" name="botao" id="botao" value="Enviar">Enviar</button>
          <hr>
          <?php
          if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
          ?>

        </form>

      </div>
    </div>
  </div>




</body>
<footer>
  <?php
      require_once("includes/footer.php");
  ?>
</footer>
</html>