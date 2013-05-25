<?php
include("../incs/db.php");
//chama a funcao de conexao com o banco de dados
$conexao = conecta();

/* verifica se o parametro nao esta vazio */
if(isset($_GET['departamento'])) {

  /* recebe os parametros nas variaveis */
  $departamento = $_GET['departamento']; 
  

  /* executa as consultas */
  $query = " SELECT SQL_CACHE * FROM tb_categorias WHERE id_departamento = $departamento";
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