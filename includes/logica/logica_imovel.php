<?php
require_once('conecta.php');
require_once('funcoes_imovel.php');
#CADASTRO IMOVEL
if (isset($_POST['cadastrar'])) {
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $quarto = $_POST['quarto'];
    $banheiro = $_POST['banheiro'];
    $garagem = $_POST['garagem'];
    $patio = $_POST['patio'];
    $tipo = $_POST['tipo'];
    $locado = $_POST['locado'];
    $valor = $_POST['valor'];
    $nome_arquivo = $_FILES['arquivo']['name'];
    $tamanho_arquivo = $_FILES['arquivo']['size'];
    $arquivo_temporario = $_FILES['arquivo']['tmp_name'];
    $codproprietario = $_POST['codproprietario'];
    
    if ($nome_arquivo) {
        if (move_uploaded_file($arquivo_temporario, "../../imagens/$nome_arquivo")) {
            echo "Upload do arquivo: " . $nome_arquivo . "foi concluído com sucesso <br>";

            $array = array($logradouro, $numero, $bairro, $cep, $quarto, $banheiro, $garagem, $patio, $tipo, $locado, $valor, $nome_arquivo, $codproprietario);
            inserirImovel($conexao, $array);
        } else {
            echo "Arquivo não pode ser copiado para o servidor.";
        }
    }

    header('location:../../index.php');
}

#EDITAR IMOVEL
if (isset($_POST['editar'])) {

    $codimovel = $_POST['editar'];
    $array = array($codimovel);
    $imovel = buscarImovel($conexao, $array);
    require_once('../../alterarImovel.php');
}
#ALTERAR IMOVEL
if (isset($_POST['alterar'])) {
    $codimovel = $_POST['editar'];
    $array = array($codimovel);
    $imovel = buscarImovel($conexao, $array);
    
    $codimovel = $_POST['codimovel'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $quarto = $_POST['quarto'];
    $banheiro = $_POST['banheiro'];
    $garagem = $_POST['garagem'];
    $patio = $_POST['patio'];
    $tipo = $_POST['tipo'];
    $locado = $_POST['locado'];
    $valor = $_POST['valor'];
    $codproprietario = $_POST['codproprietario'];
    $array = array($logradouro, $numero, $bairro, $cep, $quarto, $banheiro, $garagem, $patio, $tipo, $locado, $valor, $codproprietario, $codimovel);
    alterarImovel($conexao, $array);

    header('location:../../index.php');
}

#ADICIONAR IMAGEM

if (isset($_POST['arquivo'])) {
    $nome_arquivo = $_FILES['arquivo']['name'];
    $tamanho_arquivo = $_FILES['arquivo']['size'];
    $arquivo_temporario = $_FILES['arquivo']['tmp_name'];
    
    
    if(move_uploaded_file($arquivo_temporario,"../../imagens/$nome_arquivo")){
        echo " Upload do arquivo: ". $nome_arquivo. " foi concluído com sucesso <br>";
    }
    else{
        echo "Arquivo não pode ser copiado para o servidor.";
        $nome_arquivo='casa.jpg';

    }
    die;
    header('location:../../index.php');
}


#DELETAR IMOVEL
if (isset($_POST['deletar'])) {
    $codimovel = $_POST['deletar'];
    $array = array($codimovel);
    deletarImovel($conexao, $array);

    header('Location:../../index.php');
}
