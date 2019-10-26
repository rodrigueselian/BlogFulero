<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>Blog Fuleiro</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header>
		<div class="topo">
			<h1>Blog Fuleiro<h1>
		</div>
		<nav class="topnav">
			<img src="logo.png">
			<a href="?acao=home">Home</a>
			<a href="?acao=sobre">Sobre</a>
			<a href="?acao=contato">Contato</a>
			<div class="login-container">
				<?php include("testalogin.php");?>	
			</div>
		</nav>	
	</header>
	<div class="main">
		<?php
            include("funcoes_db.php");
            include("funcoes.php");
            if(isset($_REQUEST['acao'])) 
            {
                $acao = $_REQUEST['acao'];
                switch ($acao) 
                {
                    case "home":
                        include("home.php");
                   		break;
                    case "sobre":
                        include("sobre.php");
                    	break;
                    case "contato":
                       	include("cadastro.php");
                    	break;
                    case "cadastro":
                        include ("cadastro.php");
                  		break;
                  	case "post":
                  		include ("pagina.php");
                  		break;
                }
            }
            
			if(isset($_REQUEST['post']))
			{
				$post = $_REQUEST['post'];
				$sql = "select * from posts where cdpost = $post";
				$resultado = fazconsulta($sql);
				switch ($post) 
				{
					default:
						foreach($resultado as $registro) 
						{
							include("vermais.php");
						}
						break;
				}
			}
        ?>
	</div>
	<div class="coluninha">
		<img src="me.jpg">
		<h1>Bem vindo ao meu blog</h1>
		<p>Eu tenho pouca noção de Design e prefiro back-end, por isso saiu assim</p>
	</div>
	<footer class="footer">
		<p>pezinho</p>
		<a href="https://br.linkedin.com/" class="fa fa-linkedin"></a>
		<a href="https://twitter.com/login?lang=pt" class="fa fa-twitter"></a>
		<a href="https://www.instagram.com/?hl=pt-br" class="fa fa-instagram"></a>
		<a href="https://pt-br.facebook.com/" class="fa fa-facebook"></a>
	</footer>
</body>
</html>