<?php
include('includes/logica/conecta.php');
include('includes/logica/funcoes_imovel.php');
require_once("includes/header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>aImob</title>

<link rel="stylesheet" href="estilos/pesquisar.css">
</head>
<body>

    <div class="grid-container">

        <div class="item1">
            <h3> Pesquisa Imóvel</h3>
            <div class="lista">
            <form action="#" method="post" class="form">
                <p><label for="logradouro"><input type="text" name="logradouro" id="logradouro" placeholder="Logradouro"></label></p>
                <p><label for="bairro"><input type="text" name="bairro" id="bairro" placeholder="Bairro"></label></p>
                <p><label for="cep"><input type="text" name="cep" id="cep" placeholder="Cep"></label></p>

                <label for="tipo">Tipo<br>
                    <select name="tipo" id="tipo">
                        <option value="">Selecione</option>
                        <option value="0">Casa</option>
                        <option value="1">Apartamento</option>
                    </select></label>
                <label for="quarto">Quarto<br>
                    <select name="quarto" id="quarto">
                        <option value="">Selecione</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select></label>
                <label for="banheiro">Banheiro<br>
                    <select name="banheiro" id="banheiro">
                        <option value="">Selecione</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select></label>

                <label for="garagem">Garagem<br>
                    <select name="garagem" id="garagem">
                        <option value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select></label>

                <label for="patio">Patio<br>
                    <select name="patio" id="patio">
                        <option value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select></label>

                <label for="locado">Disponível<br>
                    <select name="locado" id="locado">
                        <option value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select></label>

                <label for="valor">Preços<br>
                    <select name="valor" id="valor">
                        <option value="">Selecione</option>
                        <option value="valor > 0 and valor <= 600">até R$ 600,00</option>
                        <option value="valor > 601 and valor <= 1000">Entre R$ 601,00 e R$ 1.000,00</option>
                        <option value="valor > 1001 and valor <= 1500">Entre R$ 1.001,00 e R$ 1.500,00</option>
                        <option value="valor > 1501 and valor < 10000000">Acima de R$ 1501,00</option>
                    </select></label>
                <p><button type="submit" id="pesquisar" name="pesquisar" value="pesquisar">Pesquisar</button></p>

            </form>
            </div>
        </div>
        <div class="item2">
            <img src="./imagens/logo2.png" class="centro" alt="Bootstrap Themes" loading="lazy">
        </div>
    </div>
    <?php

    $sql = "select * from imovel ";

    if (isset($_POST["pesquisar"])) {

        if ($_POST["logradouro"] != "") {
            $sql = $sql . "where logradouro like '%" . $_POST["logradouro"] . "%' ";
        }
        if ($_POST["bairro"] != "") {
            if ($_POST["logradouro"]) {
                $sql = $sql . " and ";
            } else {
                $sql = $sql . " where ";
            }
            $sql = $sql . "bairro like '%" . $_POST["bairro"] . "%'";
        }
        if ($_POST["quarto"] != "") {
            if ($_POST["logradouro"] || $_POST["bairro"]) {
                $sql = $sql . " and ";
            } else {
                $sql = $sql . " where ";
            }
            $sql = $sql . "quarto = " . $_POST["quarto"];
        }
        if ($_POST["banheiro"] != "") {
            if ($_POST["logradouro"] || $_POST["bairro"] || $_POST["quarto"]) {
                $sql = $sql . " and ";
            } else {
                $sql = $sql . " where ";
            }
            $sql = $sql . "banheiro = " . $_POST["banheiro"];
        }
        if ($_POST["garagem"] != "") {
            if ($_POST["logradouro"] || $_POST["bairro"] || $_POST["quarto"] || $_POST["banheiro"]) {
                $sql = $sql . " and ";
            } else {
                $sql = $sql . " where ";
            }
            $sql = $sql . "garagem = " . $_POST["garagem"];
        }
        if ($_POST["patio"] != "") {
            if ($_POST["logradouro"] || $_POST["bairro"] || $_POST["quarto"] || $_POST["banheiro"] || $_POST["garagem"]) {
                $sql = $sql . " and ";
            } else {
                $sql = $sql . " where ";
            }
            $sql = $sql . "patio = " . $_POST["patio"];
        }
        if ($_POST["tipo"] != "") {
            if ($_POST["logradouro"] || $_POST["bairro"] || $_POST["quarto"] || $_POST["banheiro"] || $_POST["garagem"] || $_POST["patio"]) {
                $sql = $sql . " and ";
            } else {
                $sql = $sql . " where ";
            }
            $sql = $sql . "tipo = " . $_POST["tipo"];
        }
        if ($_POST["locado"] != "") {
            if ($_POST["logradouro"] || $_POST["bairro"] || $_POST["quarto"] || $_POST["banheiro"] || $_POST["garagem"] || $_POST["patio"] || $_POST["tipo"]) {
                $sql = $sql . " and ";
            } else {
                $sql = $sql . " where ";
            }
            $sql = $sql . "locado = " . $_POST["locado"];
        }
        if ($_POST["valor"] != "") {
            if ($_POST["logradouro"] || $_POST["bairro"] || $_POST["quarto"] || $_POST["banheiro"] || $_POST["garagem"] || $_POST["patio"] || $_POST["tipo"] || $_POST["locado"]) {
                $sql = $sql . " and ";
            } else {
                $sql = $sql . " where ";
            }
        $sql = $sql . $_POST["valor"];
        }
        $imoveis = pesquisarImovel($conexao, $sql);

        if (empty($imoveis)) {
    ?>
            <section>
                <p>Não há imóveis cadastrados.</p>
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
    }
    ?>

</body>
<footer>
    <?php
    require_once("includes/footer.php");
    ?>
</footer>

</html>