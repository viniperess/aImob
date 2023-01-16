<?php
require_once("includes/header.php");
include_once('includes/logica/funcoes_pessoa.php');
include_once('includes/logica/conecta.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="estilos/perfil.css">
   <title>Seu Perfil</title>
</head>

<body>

   <div class="grid-container">
      <div class="item1">
         <h3> Alterar Perfil </h3>

         <?php
         $codpessoa = $_SESSION['codpessoa'];
         $array = array($codpessoa);
         $pessoa = buscarPessoa($conexao, $array);
         ?>

         <section>
            <form action="includes/logica/logica_pessoa.php" method="post" class="form">
               <p><label for="nome">Nome<br><input type="text" name="nome" id="nome" value="<?php echo $pessoa['nome']; ?>"></label></p>
               <p><label for="email">Email<br><input type="text" name="email" id="email" value="<?php echo $pessoa['email']; ?>"></label></p>

               <input type="hidden" id='codpessoa' name='codpessoa' value="<?php echo $pessoa['codpessoa']; ?>">
               <p><input type="submit" id='alt' name='alterar' value="Alterar">
                  <button type="submit" id="delt" name="deletar" value="<?php echo $pessoa['codpessoa']; ?>" onclick="return confirma_excluir()"> Deletar Conta </button>
               </p>
               <a href="alterar_senha.php" id="lnk"> Trocar Senha </a> </h3>
            </form>
         </section>
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