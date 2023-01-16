<?php
include("funcoes_db.php");
include("../email/envia_email.php");
session_start();
if($_POST['botao']=='Cadastrar'){
	$nome=$_POST['nome'];
	$email=$_POST['email'];
	$senha=password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $_SESSION["msg"]=''; //inicializa msg
	$array = array($email);

	$query ="select * from pessoa where email = ?";

	$linha=ConsultaSelect($query,$array);

	if(!$linha)
	{	

	$array = array($nome, $email, $senha);

	$query ="insert into pessoa (nome, email, senha) values (?, ?, ?)";

	$retorno=fazConsulta($query,$array);
		
	if($retorno)
	{
             $hash=md5($email);
               $link="<a href='localhost/imobiliaria/valida_email.php?h=".$hash."'> Clique aqui para confirmar seu cadastro </a>";
               $mensagem="<tr><td style='padding: 10px 0 10px 0;' align='center' bgcolor='#669999'>";

               $mensagem.="Email de Confirmação <br>".$link."</td></tr>";
               $assunto="Confirme seu cadastro";

               $retorno= enviaEmail($email,$nome,$mensagem,$assunto);
        
               $_SESSION["msg"]= "Valide o Cadastro no email";

	}
	else
	{
		   $_SESSION["msg"].= 'Erro ao inserir <br>';
	}		

}

else
{

	$_SESSION["msg"].= 'Email já cadastrado <br>';
}

	header("Location:../logar.php");
}

if($_POST['botao']=='Editar'){

    $codpessoa= $_POST['codpessoa'];
    $nome= $_POST['nome'];
    $email=$_POST['email'];
  
    $query= "update pessoa set nome= ?, email = ? where codpessoa = ?";
    
    $array = array($nome, $email, $codpessoa);

	$resultado=fazConsulta($query,$array);
	
	if($resultado)
	{
	   $_SESSION["msg"]="Alteração Efetuada com sucesso";
	}
	else
	{
	   $_SESSION["msg"]="Erro ao alterar";
	}


header("Location:../index.php");

}

 if($_POST['botao']=='Excluir'){

    $codpessoa= $_POST['codpessoa'];

    $query="delete from pessoa where codpessoa = ?";


    $array = array($codpessoa);

	$resultado=fazConsulta($query,$array);
	
	if($resultado)
	{
	   $_SESSION["msg"]= "Exclusão Efetuada com sucesso";
	}
	else
	{
	   $_SESSION["msg"]= 'Erro ao excluir <br>';
	}

header("Location:../index.php");

}

if($_POST['botao']=='Logar')
{


	$email=$_POST["email"];
	$senha=$_POST["senha"];;

	if (!(empty($email) OR empty($senha))) // testa se os campos do formulário não estão vazios
	{
		 
	    $array = array($email);

		$query= "select * from pessoa where email=? and status=true";

		$resultado=ConsultaSelect($query,$array);
		if ($resultado) // testa se retornou uma linha de resultado da tabela pessoa com email e senha válidos
		{
		if (password_verify($senha,$resultado['senha']))
		{
		$_SESSION["logado"]=true; // armazena TRUE na variável de sessão logado
		$_SESSION["email"]=$email; // armazena na variável de sessão email o conteúdo do campo email do formulário
		$_SESSION["codpessoa"]=$resultado['codpessoa'];	

		$_SESSION["nome"]=$resultado['nome'];

		$data=date("d/m/Y h:i:s");

		  $mensagem="<tr><td style='padding: 10px 0 10px 0;' align='center' bgcolor='#669999	'>";
          $mensagem.="<img src='cid:logo_ref' style='display: inline; padding: 0 10px 0 10px;' width='10%' />";

		   $mensagem.="Bem Vindo ".$_SESSION["nome"]." Seu login foi realizado em ".$data."</td></tr>";

		$assunto="checkin Sistema";

		$retorno= enviaEmail($email,$nome,$mensagem,$assunto);	
		header("Location:../index.php"); // direciona para o index
	     }
	     else
	     {
	     	$_SESSION["msg"]="Usuário ou senha inválidos"; // caso não exista uma linha na tabela pessoa com o email e a senha válidos uma mensagem é armazenada na variável de sessão msg
			header("Location:../logar.php"); // o fluxo da aplicação é direcionado novamente parvo formulário de login - onde a variável de sessão contendo a mensagem será exibida
	     }
		}
		else
		{
			$_SESSION["msg"]="Usuário ou senha inválidos"; // caso não exista uma linha na tabela pessoa com o email e a senha válidos uma mensagem é armazenada na variável de sessão msg
			header("Location:../logar.php"); // o fluxo da aplicação é direcionado novamente parvo formulário de login - onde a variável de sessão contendo a mensagem será exibida
		}
	}
	else // else correspondente ao resultado da função !empty 
	{
		$_SESSION["msg"]="Preencha campos email e senha"; // caso contrário, ou seja, os campos do formulário email e senha estejam vazios, a mensagem é armazenada na variável msg
		header("Location:../logar.php"); // o fluxo da aplicação é direcionado novamente para o formulário de login - onde a variável de sessão contendo a mensagem será exibida
	}
}




if($_POST['botao']=='Alterar Senha')
{
	$senha=password_hash($_POST['senha'], PASSWORD_DEFAULT);
	$sql = "update pessoa set senha = '". $senha."' where email = '". $_SESSION['email']."'";
	fazConsulta($sql);
	header("Location:../sair.php");
}

if($_POST['botao']=='Enviar')
{
	$email = $_POST['email'];
	$array = array($email);
	$query = "select * from pessoa where email = ?";
	
	$linha = ConsultaSelect($query,$array);
	
	$hash = md5($email);
	$random = $linha['token'];

	$link = "<a href='localhost/imobiliaria/redefinir_senha.php?email=".$hash.'&ref='.$random."'>Clique aqui para redefinir a senha</a>";
	$mensagem = "<tr><td style='padding: 10px 0 10px 0;' align='center' bgcolor='#ff4043'>";

	$mensagem="Email para redefirnir senha <br>".$link."</td></tr>";
	$assunto = "Redefinir Senha";

	$retorno = enviaEmail($email,$linha['nome'],$mensagem,$assunto);

	$_SESSION["msg"] = "Verifique o email";
	


	header("location:../logar.php");
}

if($_POST['botao']=='Renovar'){
	$email = $_POST['email'];
	$senha_nova = password_hash($_POST['senha'], PASSWORD_DEFAULT);

	$token = rand(1,1000);

	$query = "update pessoa set senha = ?, token = ? where md5(email) = ? ";
	$array = array($senha_nova, $token, $email);
	$retorno = fazConsulta($query,$array);
	if($retorno){
		$_SESSION['msg'] = 'Senha Atualizada';

	}else{
		$_SESSION['msg'] = 'Não Funcionou';
	}

	header("location:../logar.php");
}


if($_POST['botao']=='alterarSenha'){
	$senha=password_hash($_POST['senha'], PASSWORD_DEFAULT);
	$sql = "update pessoa set senha = ? where email - ?";
	fazConsulta($sql,$senha);
	header("Location:../sair.php");
}