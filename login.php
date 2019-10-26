<?php
session_start();
if(isset($_REQUEST['login']))
{
	if($_REQUEST['login'] == 'ok') 
	{
		@$senha = $_REQUEST['password'];
		@$usuario = $_REQUEST['username'];
		if (($usuario == "admin") && ($senha == '1234'))
		{
			$_SESSION['usuario'] = $usuario;
			header("Location: index.php?acao=home");
		}
		else 
		{
			echo("Usuário ou senha inválido(s)");
			include("loginform.php");
		}
	}
	if($_REQUEST['login'] == 'sair')
	{
		session_destroy();
		header("Location: index.php?acao=home");
	}
}
?>