<?php
include_once('includes/logica/funcoes_proprietario.php');
include_once('includes/logica/conecta.php');
require_once('includes/header.php');
?>
<!DOCTYPE html>
<html>


<title>Listar Proprietario</title>
<link rel="stylesheet" href="estilos/proprietarioEdicao.css">
</head>

<body>

    <div class="grid-container">
        <div class="item1">
            <h3> Edição Proprietário </h3>
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
                    <form action="includes/logica/logica_proprietario.php" method="post">
                        <p><label for="nome"><input type="text" name="nome" id="nome" placeholder="Nome" value="<?php echo $proprietario['nome']; ?>"></label></p>
                        <p><label for="email"><input type="text" name="email" id="email" placeholder="Email" value="<?php echo $proprietario['email']; ?>"></label></p>

                        <input type="hidden" id='codproprietario' name='codproprietario' value="<?php echo $proprietario['codproprietario']; ?>">
                        <button type="submit" id='alterar' name='alterar' value="Alterar">Alterar</button>
                        <button type="submit" class="deletar" name="deletar" value="<?php echo $proprietario['codproprietario']; ?>" onclick="return confirma_excluir()"> Deletar </button>
                    </form>

     
            <?php
            }
            ?>
        </div>
        <div class="item2">
            <img src="./imagens/logo2.png" class="centro" alt="Bootstrap Themes" loading="lazy">
        </div>
    </div>
</body>
<script type="text/javascript">
    function confirma_excluir() {
        resp = confirm("Confirma Exclusão?")

        if (resp == true) {

            return true;
        } else {
            return false;

        }

    }
</script>
<footer>
    <?php
    require_once('includes/footer.php');
    ?>
</footer>

</html>