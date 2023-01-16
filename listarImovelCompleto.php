<?php
include_once('includes/logica/funcoes_imovel.php');
include_once('includes/logica/conecta.php');
require_once("includes/header.php");

?>

<?php


if ((!isset($_SESSION['email'])) && (!isset($_SESSION['logado']))) {

    header("Location:logar.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>aImob</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body style="background-color: #b3b3b3;">
    <?php
    $array = array($_POST['codimovel']);
    $imovel = listarImovelPorCod($conexao, $array);
    ?>

    <div class="card mb-5 bg-danger mt-5 mx-auto" style="max-width: 1200px;">
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
                    <p class="card-text"><?php echo $imovel['logradouro']; ?> <?php echo $imovel['numero']; ?><br>Bairro: <?php echo $imovel['bairro']; ?>, Cep: <?php echo $imovel['cep']; ?></p>
                    <p class="card-text text-light"><small class="text-light">Quarto: <?php echo $imovel['quarto']; ?> | Banheiro: <?php echo $imovel['banheiro']; ?><br>Garagem: <?php if ($imovel['garagem'] == 1) {
                                                echo "Sim";
                                            } else {
                                                echo "Não";
                                            } ?> | Patio: <?php echo($imovel['patio'] == 1 ? "Sim" : "Não"); ?><br>Disponível: <?php echo($imovel['locado'] == 1 ? "Sim" : "Não"); ?> <br>Valor: R$<?php echo $imovel['valor']; ?><br>Proprietario: <?php echo $imovel['codproprietario']; ?></small></p>

                </div>
            </div>
        </div>
    </div>



</body>
<footer>
    <?php
    require_once("includes/footer.php");
    ?>
</footer>

</html>