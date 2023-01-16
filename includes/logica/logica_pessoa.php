<?php

require_once('conecta.php');
require_once('funcoes_pessoa.php');

#ENTRAR

if(isset($_POST['entrar'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $array = array($email, $senha);
    $pessoa = acessarPessoa($conexao,$array);
    if($pessoa){
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['codpessoa'] = $pessoa['codpessoa'];
        $_SESSION['nome'] = $pessoa['codpessoa'];
        header('location:../../menu.php');
    }
    else{
        header('location:../../login.php');
    }
}

if(isset($_POST['sair'])){
    session_start();
    session_destroy();
    header('location:../../logar.php');
}


#EDITAR ADMINISTRADOR
if(isset($_POST['editar'])){
    
    $codpessoa = $_POST['editar'];
    $array = array($codpessoa);
    $pessoa=buscarPessoa($conexao, $array);
    require_once('../../alterarPessoa.php');
}    

   
#ALTERAR PESSOA
if(isset($_POST['alterar'])){
    
    $codpessoa = $_POST['codpessoa'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
 

    $array = array($nome, $email, $codpessoa);
    alterarPessoa($conexao, $array);


    header('location:../../index.php');
    
    die;
}

        
                  
#DELETAR PESSOA
if(isset($_POST['deletar'])){
    $codpessoa = $_POST['deletar'];
    $array=array($codpessoa);
    deletarPessoa($conexao, $array);

    header('Location:../../logar.php');
}

#PESQUISAR PESSOA
if(isset($_POST['pesquisar'])){

$nome = $_POST['nome'];
$array = array('%'.$nome.'%');
var_dump($array);
$pessoa=pesquisarPessoa($conexao, $array);
require_once('../../pesquisarPessoa.php');
} 

#DELETAR CONTA
if(isset($_POST['deletar'])){
$codpessoa = $_POST['codpessoa'];
$array=array($codpessoa);
deletarPessoa($conexao, $array);

session_start();
session_destroy();
header('location:../../logar.php');

}

?>