<?php
include("incs/db.php");
//chama a funcao de conexao com o banco de dados
$conexao = conecta();

/* recebe os parametros nas variaveis */
$limit = $_GET['limit'];

$query = " SELECT * FROM tb_agenda ORDER BY id DESC LIMIT $limit ";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);


$rows = array();
while($r = mysql_fetch_assoc($result)) {
    $rows[] = $r;
}
header ('Content-type: application/json; charset=utf-8');
echo json_encode($rows);

  /* fecha a conexao com o banco */
  @mysql_close($conexao);

?>