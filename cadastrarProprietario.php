<?php 
  require_once('includes/header.php') 
?>
<!DOCTYPE html>
<html lang="en">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Cadastrar Proprietario</title>
    <script src="javascript/validaCadastro.js"></script>
<link rel="stylesheet" href="estilos/proprietariocadastro.css">
</head>
<body>

<div class="grid-container">
  <div class="item1">
      <h3>Cadastrar Proprietário</h3>
    <form id="cadastro" action="includes/logica/logica_proprietario.php" method="post" class="form">
      <p><label for="nome"><input type="text" name="nome" id="nome" placeholder="Nome"></label</p>
      <p><label for="email"><input type="text" name="email" id="email" placeholder="Email"></label></p>  
      <p><button type="submit" id='cadastrar' name='cadastrar' value="Cadastrar" onclick="validaFormulario()"> Cadastrar </button>  </p>      
    </form>
    
    <h4><div style="color: red" id="campodiv"></div></h4>
    </div>
    <div class="item2">
      <img src="./imagens/logo2.png" class="centro" alt="Bootstrap Themes" loading="lazy">
    </div>
  </div>
</body>
<footer>
<?php 
  require_once('includes/footer.php') 
?>
</footer>
</html>