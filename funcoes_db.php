<?php
//S: objeto de conexão se tudo der certo ou uma mensagem de erro
function fazconexao(){
    //charset=utf8; previne SQL INJECTION!!!!
    $stringDeConexao = 'mysql:host=localhost;charset=utf8;dbname=blog;';
    $usuario = 'root';
    $senha = '';
    //conexao via PDO
    //try = tenta fazer o que há no bloco
    try{
        $link = new PDO($stringDeConexao,$usuario,$senha,
                    array(
                        PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        PDO::ATTR_PERSISTENT => false
                    )
                );
        return($link);
        } //caso de algum erro, executa o catch
    catch(PDOException $ex){
    //encerra e apresenta mensagem de erro
    die($ex->getMessage());
    }

}

//E0: string de consulta SQL
//S: vetor de vetores associativos contendo os registros
//    ou objeto de exceção contendo mensagem de erro e código do erro
function fazConsulta($sql){
    try {
        //conecta
        $conexaoBD = fazConexao();
        //cria o objeto de consulta
        $consulta = $conexaoBD->prepare($sql);
        //executa a consulta
        $consulta->execute();
        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return($resultados);
    }
    catch (PDOException $e) {
        return($e);
    }
}

//consulta protegida contra INJECTION
//E0: string de consulta SQL
//S: vetor de vetores associativos contendo os registros
//    ou objeto de exceção contendo mensagem de erro e código do erro
function fazConsultaSegura($sql,$parametros=array(),&$id=-1){
    try {
          //conecta
        $conexaoBD = fazConexao();
        //cria o objeto de consulta
        $consulta = $conexaoBD->prepare($sql);
        //testa se foram passados parâmetros
        
        if (count($parametros) > 0) { 
            for($i=0;$i<count($parametros); $i++){
                $consulta->bindParam($i+1,$parametros[$i]);
               // echo($i+1 . $parametros[$i]);
            }
           
        }
    //   echo("<pre>");   
      //   $consulta->debugDumpParams();
        //executa a consulta
        $consulta->execute();
        
        //descobre se foi pedido o retorno do último id de autonumeração
        if ($id == 0) {
            $id = $conexaoBD->lastInsertId();
        }

        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return($resultados);
    }
    catch (PDOException $e) {
        return($e);
    }
}

?>