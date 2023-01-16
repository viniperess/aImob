<!DOCTYPE html>
<html>

<?php
include_once('includes/logica/funcoes_proprietario.php');
include_once('includes/logica/conecta.php');
require_once("includes/header.php");

?>
<title>Listar Proprietario</title>
<link rel="stylesheet" href="estilos/proprietariolistar.css">
</head>

<body>

    <div class="grid-container">
        <div class="item1">
            <h3> Listagem de Proprietario </h3>
            <?php
            $proprietarios = listarProprietario($conexao);
            if (empty($proprietarios)) {
            ?>
                <section class="lista">
                    <p>Não há proprietarios cadastrados.</p>
                </section>
            <?php
            }
            foreach ($proprietarios as $proprietario) {

            ?>
                <section class="lista">
                    <p>Nome: <?php echo $proprietario['nome']; ?></p>
                    <p>Email: <?php echo $proprietario['email']; ?>
                    <img src="./imagens/logo.png" class="imag" alt="Bootstrap Themes" loading="lazy"></p>
                </section>

            <?php
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
    require_once('includes/footer.php');
    ?>
</footer>

</html>