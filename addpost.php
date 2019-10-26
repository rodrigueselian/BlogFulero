<div class="mais">
	<form method="post">
		<button type="submit" name="add" value="ok"><p>+</p></button>
	</form>
</div>

<?php 
if (isset($_REQUEST['add'])) {
	include("addpostforms.php");
}

if(isset($_POST['inclui']))
{
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
	$sql = "INSERT INTO `posts` (`titulo`,`resumo`, `texto`, `imagem`, `posicao`) VALUES ('$titulo', '$resumo', '$texto', '$img', '$lado');";
	$retorno = fazConsulta($sql);
}
?>
