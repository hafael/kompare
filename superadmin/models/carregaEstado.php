<?php
include("../incs/db.php");
//chama a funcao de conexao com o banco de dados
$conexao = conecta();
/* verifica se o parametro nao esta vazio */

$query = " SELECT SQL_CACHE * FROM tb_estados ";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
/* cria um array com os estados*/
/*
$estados = array();
if(mysql_num_rows($result)) {
  while($estado = mysql_fetch_assoc($result)) {
    $estados[] = array('estado'=>$estado);
  }
}
*/
/* verifica o formato da requisiçao e vomita */


//echo json_encode(array('estados'=>$estados));

$rows = array();
while($r = mysql_fetch_assoc($result)) {
    $rows[] = $r;
}
header ('Content-type: application/json; charset=utf-8');
echo json_encode($rows);



  /* fecha a conexao com o banco */
  @mysql_close($conexao);

?>