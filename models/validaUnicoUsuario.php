<?php
include("../incs/config.php");

$retorno = array();
$retorno['erro'] = false;
$retorno['usuario_disponivel'] = false;
$retorno['msg_retorno'] = '';

/* verifica se o parametro nao esta vazio */
if(isset($_GET['usuario'])) {

  /* recebe os parametros nas variaveis */
  $usuario = $_GET['usuario'];

  if($usuario != ''){
    /* executa as consultas */
    $query = " SELECT SQL_CACHE * FROM tb_anunciante WHERE username = '$usuario' LIMIT 1";
    $result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);

    if($result){
      if(mysql_num_rows($result) == 0){
        $retorno['usuario_disponivel'] = true;
        $retorno['msg_retorno'] = 'Usuário disponível';
      }else{
        $retorno['msg_retorno'] = 'Usuário indisponivel';
      }
    }else{
      $retorno['erro'] = true;
      $retorno['msg_retorno'] = 'Erro ao procurar usuário.';
    }
  }else{
    $retorno['msg_retorno'] = 'Usuário em branco.';
  }

  
  
}else{
  $retorno['erro'] = true;
  $retorno['msg_retorno'] = 'Usuário não setado.';
}


header ('Content-type: application/json; charset=utf-8');
echo json_encode($retorno);

/* fecha a conexao com o banco */
@mysql_close($conexao);
?>