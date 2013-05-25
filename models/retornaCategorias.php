<?php
include("../incs/config.php");
/* verifica se o parametro nao esta vazio */
$id_departamento = $_GET['id_departamento']; 

$query = " SELECT SQL_CACHE * FROM tb_categorias WHERE id_departamento = $id_departamento";
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