<?php
session_start();

if ((!isset($_SESSION['email'])) && (!isset($_SESSION['logado']))) {

    header("Location:logar.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Menu principal</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <link href="estilos/estilo.css" rel="stylesheet"> -->
</head>

<body>
    
<nav class=" navbar navbar-expand-md navbar-light bg-danger ">
    <a class="navbar-brand text-light" href="#">aImob <img src="./imagens/logo.png" alt="" height="30px" width="30px"></a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto topnav me-5">
            <li class="nav-item active">
                <a class="nav-link text-light" href="index.php">Início<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="listagem_usuario.php">Usuário</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Imóvel
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="listarImovel.php">Listagem Imóvel</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="cadastrarImovel.php">Cadastro Imóvel</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="edicao_imovel.php">Edicao Imóvel</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pesquisarImovel.php">Pesquisar Imovel</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Proprietário
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="listarProprietario.php">Listagem Proprietário</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="cadastrarProprietario.php">Cadastro Proprietario</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="edicao_proprietario.php">Edicao Proprietario</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pesquisarProprietario.php">Pesquisar Proprietario</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Perfil
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="alterarPerfil.php">Seu Perfil</a>
                  <div class="dropdown-divider text-light"></div>
                    <a class="dropdown-item" href="sair.php">Sair</a>
                </div>
            <li class="nav-item">
                <a class="nav-link text-light" href="#"></a>
            </li>
            </li>
            <a class="navbar-brand text-light" href="#">Bem Vindo <?php echo $_SESSION['nome'] ?></a>
        </ul>
    </div>

</nav>
</div>

</body>
