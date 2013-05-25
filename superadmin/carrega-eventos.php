<?php
include("config.php");
/* verifica se o parametro nao esta vazio */

$query = " SELECT * FROM tb_agenda ORDER BY id ";
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