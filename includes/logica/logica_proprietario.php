<?php
    require_once('conecta.php');
    require_once('funcoes_proprietario.php');
#CADASTRO PROPRIETARIO
    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $array = array($nome, $email);
        inserirProprietario($conexao, $array);
        header('location:../../index.php');
    }

#EDITAR PROPRIETARIO
    if(isset($_POST['editar'])){
    
            $codproprietario = $_POST['editar'];
            $array = array($codproprietario);
            $proprietario=buscarProprietario($conexao, $array);
            require_once('../../alterarProprietario.php');
    }    
#ALTERAR PROPRIETARIO
    if(isset($_POST['alterar'])){
            $codproprietario = $_POST['editar'];
            $array = array($codproprietario);
            $proprietario=buscarProprietario($conexao, $array);
            
            $codproprietario = $_POST['codproprietario'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $array = array($nome, $email, $codproprietario);
            alterarProprietario($conexao, $array);
    
            header('location:../../index.php');
    }
#DELETAR PROPRIETARIO
    if(isset($_POST['deletar'])){
        $codproprietario = $_POST['deletar'];
        $array=array($codproprietario);
        deletarProprietario($conexao, $array);

        header('Location:../../index.php');
    }


?>