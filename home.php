<div class="busca">
	<form method="post">
		<p>Buscar por um post</p>
		<input type="text" name="busca">
		<input type="submit" value="ok">
	</form>
</div>
<hr>

<?php
if(isset($_SESSION['usuario']))
{
	$usuario = $_SESSION['usuario'];
	include("addpost.php");

}

$sql = "select * from posts order by cdpost desc";
$resultado = fazConsulta($sql);
$post = "post.php";

if (isset($_REQUEST['busca'])) {
	$busca = trim($_REQUEST['busca']);
}
else {
	$busca = '';
}

if (strlen($busca) > 0) 
{
	$sql = "select * from posts where titulo LIKE ?";
	$vetorPars = array('%'. $busca .'%');
	$resultado = fazConsultaSegura($sql,$vetorPars);
}

if (is_array($resultado)) 
{
	if(count($resultado) > 0) 
	{
		if (is_array($resultado)) 
		{
			if(count($resultado) >0) 
			{
				foreach($resultado as $registro) 
				{
					include($post);
				}
			}
		}	
	}
	else 
	{
		echo("Nenhum registro encontrado");
	}
}

if(isset($_REQUEST['excluir'])) 
{
	
}
?>