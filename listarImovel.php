<?php
include_once('includes/logica/funcoes_imovel.php');
include_once('includes/logica/conecta.php');
require_once("includes/header.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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