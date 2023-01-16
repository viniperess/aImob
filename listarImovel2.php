<?php
include_once('includes/logica/funcoes_imovel.php');
include_once('includes/logica/conecta.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="imovel.css">
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


<body style="background-color: #b3b3b3;">

    <div class="grid-container">
        <div class="item1">
        <?php

        $imoveis = listarImovel($conexao);

        if (empty($imoveis)) {
        ?>
            <section>
                <p>Não há imoveis cadastrados.</p>
            </section>
        <?php
        }
        foreach ($imoveis as $imovel) {

        ?>

            <div class="card mb-4 bg-danger mt-4 mx-auto" style="max-width: 800px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="imagens/<?php echo $imovel['imagem']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8 text-light">
                        <div class="card-body ">
                            <h5 class="card-title"> <?php if ($imovel['tipo'] == 0) {
                                                        echo "Casa";
                                                    } else {
                                                        echo "Apartamento";
                                                    } ?></h5>
                            <p class="card-text"><?php echo $imovel['logradouro']; ?> <?php echo $imovel['numero']; ?></p>
                            <p class="card-text text-light"><small class="text-light">Quarto: <?php echo $imovel['quarto']; ?> | Banheiro: <?php echo $imovel['banheiro']; ?><br>Valor: <?php echo $imovel['valor']; ?></small></p>
                            <form action="listarImovelCompleto.php" method="post">
                                <input type="hidden" id="codimovel" name="codimovel" value="<?php echo $imovel['codimovel']; ?>">
                                <button type="submit" name="detalhes" class="btn btn-warning btn-sm"> Detalhes </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    </div>
</body>
<footer>
    <?php
    require_once("includes/footer.php");
    ?>
</footer>

</html>