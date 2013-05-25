<?php
include("../incs/db.php");
//chama a funcao de conexao com o banco de dados
$conexao = conecta();

$retorno = array();
$retorno['erro'] = false;
$retorno['msg_retorno'] = '';
$retorno['id_visibilidade'] = false;
$retorno['debug'] = '';
/* recebe os parametros nas variaveis */
$id_subcategoria = $_GET['id_subcategoria']; 

$id_visibilidade = $_GET['id_visibilidade'];

if($id_visibilidade == 0){
	$id_visibilidade = 1;
}else{
	$id_visibilidade = 0;
}

/* verifica se o parametro nao esta vazio */
if(isset($_GET['id_subcategoria'])) {
  
  /* executa as consultas */
  $query2 = "UPDATE tb_subcategoria SET visibilidade = $id_visibilidade WHERE id=$id_subcategoria ";
  $result = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);

  if($result == false){
    $retorno['erro'] = true;
    $retorno['msg_retorno'] = 'Erro na consulta';
  }else{
  	$retorno['id_visibilidade'] = $id_visibilidade;
  	$retorno['debug'] = $result;
  }

}else{
  $retorno['erro'] = true;
  $retorno['msg_retorno'] = 'ID da categoria nao setado';
}

header ('Content-type: application/json; charset=utf-8');
echo json_encode($retorno);

/* fecha a conexao com o banco */
@mysql_close($conexao);
?>