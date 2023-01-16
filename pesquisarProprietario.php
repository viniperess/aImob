<?php
include('includes/logica/conecta.php');
include('includes/logica/funcoes_proprietario.php');
require_once('includes/header.php')

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<link rel="stylesheet" href="estilos/proprietarioPesquisa.css">
<title>aImob</title>

</head>

<body>

 <div class="grid-container">
    <div class="item1">
        <h3>
            Pesquisa Proprietário
        </h3>
            <form action="#" method="post" class="form">
                <p><label for="nome"><input type="text" name="nome" id="nome" placeholder="Nome"></label></p>
                <p><button type="submit" id="pesquisar" name="pesquisar" value="pesquisar">Pesquisar</button></p>
            </form>
        </div>
        <div class="item2">
            <img src="./imagens/logo2.png" class="centro" alt="Bootstrap Themes" loading="lazy">

        </div>
</div>
    <?php

    if (isset($_POST["pesquisar"])) {
        $array = array("%" . $_POST["nome"] . "%");
        $proprietarios = pesquisarProprietario($conexao, $array);
        if (empty($proprietarios)) {
    ?>
            <section class="lista">
                <p>Não há proprietarios cadastrados.</p>
            </section>
        <?php
        }
        foreach ($proprietarios as $proprietarios) {

        ?>
            <section class="lista">
                <p>Nome: <?php echo $proprietarios['nome']; ?></p>
                <p>Email: <?php echo $proprietarios['email']; ?>   <img src="./imagens/logo.png" class="imag" alt="Bootstrap Themes" loading="lazy"></p>
               
            </section>
    <?php
        }
    }
    ?>

</body>
<footer>
    <?php
    require_once('includes/footer.php');
    ?>
</footer>

</html>