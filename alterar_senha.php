<?php

 include_once('includes/logica/conecta.php');
 require_once("includes/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alterar Senha</title>
	<link rel="stylesheet" href="estilos/alterarSenha.css">

</head>

<body>
	<div class="grid-container">
		<div class="item1">
			<h3>Alterar Senha</h3>
<form action="controllers/controller_usuario.php" method="POST" class="form">
	Senha<br><input type="password" name="senha">
	Confirmar Senha<br><input type="password" name="confirmarsenha">
	<input type="submit" id="alterar" name="botao" value="Alterar Senha">
	<input type="reset" id="limpar" name="botao" value="Limpar">
</form>

<div id='msg'>
	<?php 
			if(isset($_SESSION['msg'])){ 
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
				$query = "update pessoa set senha where senha =$token";
			}
	?>
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

