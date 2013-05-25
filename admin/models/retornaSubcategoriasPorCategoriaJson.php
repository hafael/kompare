<?php
include("../incs/db.php");
//chama a funcao de conexao com o banco de dados
$conexao = conecta();

/* verifica se o parametro nao esta vazio */
if(isset($_GET['categoria'])) {

  /* recebe os parametros nas variaveis */
  $categoria = $_GET['categoria']; 
  

  /* executa as consultas */
  $query = " SELECT SQL_CACHE * FROM tb_subcategoria WHERE id_categoria = $categoria AND visibilidade = true AND filter = false";
  $result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);




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