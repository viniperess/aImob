<!DOCTYPE html>
<html>

<?php
include_once('includes/logica/funcoes_pessoa.php');
include_once('includes/logica/conecta.php');
include_once('includes/header.php');
?>
</head>

<title>Listar Usuário</title>
<link rel="stylesheet" href="estilos/usuario.css">
</head>

<body>

    <div class="grid-container">
    <div class="item1">

        <h3> Listagem de Usuários </h3>
        <?php
        $pessoas = listarPessoa($conexao);
        if (empty($pessoas)) {
        ?>
            <section class="lista">
                <p>Não há usuários cadastrados.</p>
            </section>
        <?php
        }
        foreach ($pessoas as $pessoa) {

        ?>
            <section class="lista">
                <p>Nome: <?php echo $pessoa['nome']; ?></p>
                <p>Email: <?php echo $pessoa['email']; ?>
                <img src="./imagens/logo.png" class="imag" alt="Bootstrap Themes" loading="lazy"></p>
            </section>
        <?php
        }
        ?>
    </div>
    <div class="item2">
        <img src="./imagens/logo2.png" class="centro" alt="Bootstrap Themes" loading="lazy">
    </div>
    </div>
</body>

<?php
include_once('includes/footer.php')
?>

</html>