<?php


include_once('includes/logica/funcoes_proprietario.php');
include_once('includes/logica/conecta.php');
include_once('includes/logica/funcoes_imovel.php');
require_once("includes/header.php");
?>
<title>Cadastrar Imovel</title>

<link rel="stylesheet" href="estilos/imovelEditar.css">
<script src="./javascript/funcoes_ajax.js"></script>

</head>

<body>

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
            <h3> Edição Imóvel </h3>
                <form action="includes/logica/logica_imovel.php" method="post">
                    <p><label for="cep"><input type="text" name="cep" id="cep" value="<?php echo $imovel['cep']; ?>"></label></p>

                    <p><label for="bairro"><input type="text" name="bairro" id="bairro" value="<?php echo $imovel['bairro']; ?>"></label></p>
                    <p><label for="logradouro"><input type="text" name="logradouro" id="logradouro" value=" <?php echo $imovel['logradouro']; ?>"></label></p>
                    <p><label for="numero"><input type="text" name="numero" id="numero" value=" <?php echo $imovel['numero']; ?>"></label></p>
                    <p><label for="valor"><input type="text" name="valor" id="valor" value="<?php echo $imovel['valor']; ?>"></label></p><span class="form">
                    <label for="tipo">Tipo<br>
                        <select name="tipo" id="tipo">
                            <option value="<?php echo $imovel['tipo']; ?>"><?php echo ($imovel['tipo'] == 0 ? "Casa" : "Apartamento"); ?></option>
                            <?php if ($imovel['tipo'] == 0) {
                            ?>
                                <option value="1">Apartamento</option>
                            <?php
                            } else {
                            ?>
                                <option value="0">Casa</option>
                            <?php
                            } ?>
                        </select>
                    </label>
                    <label for="quarto">Quarto<br>
                        <select name="quarto" id="quarto">
                            <option value="<?php echo $imovel['quarto']; ?>"><?php echo $imovel['quarto']; ?></option>
                            <?php if ($imovel['quarto'] == 1) {
                            ?>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            <?php
                            } else if ($imovel['quarto'] == 2) {
                            ?>
                                <option value="1">1</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            <?php
                            } else if ($imovel['quarto'] == 3) {
                            ?>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            <?php
                            } else if ($imovel['quarto'] == 4) {
                            ?>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="5">5</option>
                            <?php
                            } else {
                            ?>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            <?php
                            } ?>
                        </select></label>
                    <label for="banheiro">Banheiro<br>
                        <select name="banheiro" id="banheiro">
                            <option value="<?php echo $imovel['banheiro']; ?>"><?php echo $imovel['banheiro']; ?></option>
                            <?php if ($imovel['banheiro'] == 1) {
                            ?>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            <?php
                            } else if ($imovel['banheiro'] == 2) {
                            ?>
                                <option value="1">1</option>
                                <option value="3">3</option>
                            <?php
                            } else {
                            ?>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            <?php
                            } ?>
                        </select></label>

                    <label for="garagem">Garagem<br>
                        <select name="garagem" id="garagem">
                            <option value="<?php echo $imovel['garagem']; ?>"><?php echo ($imovel['garagem'] == 0 ? "Não" : "Sim"); ?></option>
                            <?php if ($imovel['garagem'] == 0) {
                            ?>
                                <option value="1">Sim</option>
                            <?php
                            } else {
                            ?>
                                <option value="0">Não</option>
                            <?php
                            } ?>
                        </select></label>

                    <label for="patio">Patio<br>
                        <select name="patio" id="patio">
                            <option value="<?php echo $imovel['patio']; ?>"><?php echo ($imovel['patio'] == 0 ? "Não" : "Sim"); ?></option>
                            <?php if ($imovel['patio'] == 0) {
                            ?>
                                <option value="1">Sim</option>
                            <?php
                            } else {
                            ?>
                                <option value="0">Não</option>
                            <?php
                            } ?>
                        </select></label>

                    <label for="locado">Disponível<br>
                        <select name="locado" id="locado">
                            <option value="<?php echo $imovel['locado']; ?>"><?php echo ($imovel['locado'] == 0 ? "Não" : "Sim"); ?></option>
                            <?php if ($imovel['locado'] == 0) {
                            ?>
                                <option value="1">Sim</option>
                            <?php
                            } else {
                            ?>
                                <option value="0">Não</option>
                            <?php
                            } ?>
                        </select></label>

                    <label for="codproprietario">Proprietario<br>
                        <?php $proprietario = listarProprietario($conexao);
                        ?>
                        <select name="codproprietario" id="codproprietario">
                            <?php foreach ($proprietario as $proprietario) {  ?>
                                <option value="<?php echo $proprietario['codproprietario']; ?>"><?php
                                                                                                echo $proprietario['nome'];
                                                                                                ?> </option> <?php } ?>
                        </select></label></span>
                    <input type="hidden" id='codproprietario' name='codimovel' value="<?php echo $imovel['codimovel']; ?>">
                    <button type="submit" name="alterar" id="alterar" value="Alterar"> Alterar </button>
                    <button type="submit" name="deletar" id="deletar" value="<?php echo $imovel['codimovel']; ?>" onclick="return confirma_excluir()"> Deletar </button>

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
<footer>
    <?php
    require_once("includes/footer.php");
    ?>
</footer>
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

</html>