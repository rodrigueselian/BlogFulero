<?php
$vetEstados = array("","RS","SC","PR");
//validacao do form
//E0: $_REQUEST
//E1: vetor de validaçao no formato campo:tipo:mensagem de erro
//S: string vazia se tudo ok ou mensagens e erro casa algum campo não seja válido
function validaForm($vetorDados, $vetorValidacao) {
    $erros = '';
    for ($i=0; $i<count($vetorValidacao); $i++){
        $vetItemValid = explode(":",$vetorValidacao[$i]);
        $campo = $vetItemValid[0];
        $tipo = $vetItemValid[1];
        $mensagem = $vetItemValid[2];
        //testa se campo deve ser validado
        if(array_key_exists($campo,$vetorDados) === true){
            $valor = trim($vetorDados[$campo]);
            switch($tipo) {
                case 'texto' :
                if (strlen($valor) == 0) {
                    $erros .=  $mensagem . "<BR>";
                }
                break;
                case 'email' :
                if (!filter_var($valor, FILTER_VALIDATE_EMAIL)) {
                    $erros .=  $mensagem . "<BR>";
                }
                break;
            }

        }
        
    }
return($erros);
}

///////
function geraSelect($vetor,$nome,$valor){
    $texto = "<select name='$nome'>\n";
    foreach($vetor as $v) {
        if ($v == $valor)
            $texto .= "<option selected>$v</option>\n";
        else
            $texto .= "<option>$v</option>\n";
    }
    $texto .= "</select>";
    return($texto);
}


///////
function geraRadios($vetor,$nome,$valor){
    $texto = '';
    foreach($vetor as $d => $v) {
        if ($v == $valor)
            $texto .= "$d<input type='radio' value='$v' name='$nome' checked> \n";
        else
            $texto .= "$d<input type='radio' value='$v' name='$nome'>\n";
    }
   
    return($texto);
}
?>