<?php
include("../incs/db.php");
//chama a funcao de conexao com o banco de dados
$conexao = conecta();
/* verifica se o parametro nao esta vazio */
if(isset($_GET['estado'])) {

  /* recebe os parametros nas variaveis */
  $estado = $_GET['estado']; 
  

  /* executa as consultas */
  $query = " SELECT SQL_CACHE * FROM tb_cidades WHERE estado = $estado ";
  $result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);

  /* cria um array com as cidades*/
  /*
  $cidades = array();
  if(mysql_num_rows($result)) {
    while($cidade = mysql_fetch_assoc($result)) {
      $cidades[] = array('cidade'=>$cidade);
    }
  }
  */
  

  /* verifica o formato da requisiçao e vomita */

  //header('Content-type: application/json');
  //echo json_encode(array('cidades'=>$cidades));


  $rows = array();
  while($r = mysql_fetch_assoc($result)) {
      $rows[] = $r;
  }
  header ('Content-type: application/json; charset=utf-8');
  echo json_encode($rows);


 

  /* fecha a conexao com o banco */
  @mysql_close($conexao);
}
?>