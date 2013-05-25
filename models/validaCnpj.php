<?php
include("../incs/config.php");
include("../addons/validadores/isCnpjValid.php");

$retorno = array();
$retorno['erro'] = false;
$retorno['cnpj_valido'] = false;
$retorno['msg_retorno'] = '';

/* verifica se o parametro nao esta vazio */
if(isset($_GET['cnpj'])) {

  /* recebe os parametros nas variaveis */
  $cnpj = $_GET['cnpj'];

  if($cnpj != ''){
    if(isCnpjValid($cnpj)){

      /* Consulta se o cnpj ja esta cadastrado
      $query1 = "SELECT * FROM tb_anunciante WHERE cnpj = '$cnpj' LIMIT 1";
      $result1 = mysql_query($query1,$conexao) or die('Erro na query:  '.$query1);
      
      if (mysql_num_rows($result1) == 0){
        $retorno['cnpj_valido'] = true;
        $retorno['msg_retorno'] = 'CNPJ disponível';
      }else{
        $retorno['msg_retorno'] = 'CNPJ já cadastrado';
      }
      */
      $retorno['cnpj_valido'] = true;
      $retorno['msg_retorno'] = 'CNPJ disponível';
    }else{
      $retorno['msg_retorno'] = 'CNPJ indisponivel';
    }
  }else{
    $retorno['msg_retorno'] = 'CNPJ em branco.';
  }

}else{
  $retorno['erro'] = true;
  $retorno['msg_retorno'] = 'CNPJ não setado.';
}


header ('Content-type: application/json; charset=utf-8');
echo json_encode($retorno);

/* fecha a conexao com o banco */
@mysql_close($conexao);
?>