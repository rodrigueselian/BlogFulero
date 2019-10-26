
<div class="noticia">
	<?php 
	if(isset($_SESSION['usuario']))
		{
			$usuario = $_SESSION['usuario'];
			include("addbotoes.php");
		} 
	?>
	<div>
		<h1><?=$registro['titulo'];?></h1>
		<img src=<?=$registro['imagem']?>>
		<p><?=$registro['texto'];?></p>
		<i class="data"><?=$registro['data'];?></i>
	</div>
</div>
<br>
<br>

<?php 
	if (isset($_REQUEST['editar'])) {
		include("editform.php");
	}

	if (isset($_POST['confirmaedit'])) {
		$cdpost = $registro['cdpost'];
		$diretorio_alvo = "uploads/";
		$arquivo_alvo = $diretorio_alvo . basename($_FILES["img"]["name"]);
		$uploadOk = 1;
		$tipoArquivoImagem = strtolower(pathinfo($arquivo_alvo,PATHINFO_EXTENSION));
		if(isset($_POST["inclui"])) {
		    $check = getimagesize($_FILES["img"]["tmp_name"]);
		    if($check !== false) {
		        echo "Arquivo é uma imagem válida - " . $check["mime"] . ".<br>";
		        $uploadOk = 1;
		    } else {
		        echo "Arquivo não é uma imagem.<br>";
		        $uploadOk = 0;
		    }
		}
		if (file_exists($arquivo_alvo)) {
		    echo "Arquivo já existe.<br>";
		    $uploadOk = 0;
		}
		if ($_FILES["img"]["size"] > 1000000) {
		    echo "Arquivo muito grande.<br>";
		    $uploadOk = 0;
		}
		if($tipoArquivoImagem != "jpg" && $tipoArquivoImagem != "png" && $tipoArquivoImagem != "jpeg"
		&& $tipoArquivoImagem != "gif" ) {
		    echo "Apenas JPG, JPEG, PNG e GIF são permitidos.<br>";
		    $uploadOk = 0;
		}
		if ($uploadOk == 0) {
		    echo "Problema fazendo upload<br>";
		} else {
		    if (move_uploaded_file($_FILES["img"]["tmp_name"], $arquivo_alvo)) {
		        echo "Arquivo ". basename( $_FILES["img"]["name"]). " foi enviado com sucesso.<br>";
		    } else {
		        echo "Ocorreu um erro enviando seu arquivo.<br>";
		    }
		}
		$titulo = $_POST['titulo'];
		$resumo =  $_POST['resumo'];
		$texto =  $_POST['texto'];
		$diretorio_alvo = "uploads/";
		$img = $diretorio_alvo . basename($_FILES["img"]["name"]);
		$lado = $_POST['lado'];
		$sql = "update posts set titulo = '$titulo', resumo = '$resumo', texto = '$texto', imagem = '$img', posicao = '$lado' where cdpost = $cdpost";
		$resultado = fazconsulta($sql);
		header("Location: index.php?post=$cdpost");
	}

	if (isset($_REQUEST['excluir'])) {
		echo ("<div class=\"confirma\"><h2>Tem certeza que deseja excluir este maravilhoso post?</h2>");
		echo("<form method=\"post\">
				<button class=\"excluir\" type=\"submit\" name=\"confirmaexcluir\">SIM</button>
				<button class=\"editar\" type=\"submit\" name=\"nada\">NÃO</button>
			</form></div>");
	}
	if (isset($_REQUEST['confirmaexcluir'])){
			$cdpost = $registro['cdpost'];
			$sql = "delete from posts where cdpost = $cdpost";
			$resultado = fazconsulta($sql);
			header("Location: index.php?acao=home");
		}
 ?>