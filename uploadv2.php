<?php
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

?>