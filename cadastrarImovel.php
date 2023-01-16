<?php


include_once('includes/logica/funcoes_proprietario.php');
include_once('includes/logica/conecta.php');
include_once('includes/logica/funcoes_imovel.php');
require_once("includes/header.php");
?>
<title>Cadastrar Imovel</title>

<link rel="stylesheet" href="estilos/imovel.css">
<script src="./javascript/funcoes_ajax.js"></script>

</head>

<body>

  <div class="grid-container">
    <div class="item1">
    <h3> Cadastro de Imóvel </h3>
      <div class="lista">
        <form action="includes/logica/logica_imovel.php" class="form" method="post" enctype="multipart/form-data">
          <p><label for="cep"><input type="text" name="cep" id="cep" placeholder="Cep"></label></p>
          <p><label for="cidade"><input type="text" name="cidade" id="cidade" placeholder="Cidade"></label></p>

          <p><label for="bairro"><input type="text" name="bairro" id="bairro" placeholder="Bairro"></label></p>
          <p><label for="logradouro"><input type="text" name="logradouro" id="logradouro" placeholder="Logradouro"></label></p>
          <p><label for="numero"><input type="text" name="numero" id="numero" placeholder="Numero"></label></p>
          <p><label for="valor"><input type="text" name="valor" id="valor" placeholder="Valor"></label></p>
          <label for="tipo">Tipo<br>
            <select name="tipo" id="tipo">
              <option value="0">Casa</option>
              <option value="1">Apartamento</option>
            </select></label>
          <label for="quarto">Quarto<br>
            <select name="quarto" id="quarto">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select></label>
          <label for="banheiro">Banheiro<br>
            <select name="banheiro" id="banheiro">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select></label>

          <label for="garagem">Garagem<br>
            <select name="garagem" id="garagem">
              <option value="0">Não</option>
              <option value="1">Sim</option>
            </select></label>

          <label for="patio">Patio<br>
            <select name="patio" id="patio">
              <option value="0">Não</option>
              <option value="1">Sim</option>
            </select></label>

          <label for="locado">Disponível<br>
            <select name="locado" id="locado">
              <option value="0">Não</option>
              <option value="1">Sim</option>
            </select></label>

          <label for="codproprietario">Proprietario<br>
              <?php $proprietario = listarProprietario($conexao);
              ?>
              <select name="codproprietario" id="codproprietario">
                <?php foreach ($proprietario as $proprietario) {  ?>
                  <option value="<?php echo $proprietario['codproprietario']; ?>"><?php
                                                                                  echo $proprietario['nome'];
                                                                                  ?> </option> <?php } ?>
              </select></label>
          <input type="file" name="arquivo" id="arquivo">
          <p><button type="submit" id='cadastrar' name='cadastrar' value="cadastrar"> Cadastrar </button> </p>
        </form>
      </div>
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