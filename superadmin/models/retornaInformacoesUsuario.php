<?php
include("../incs/config.php");
/* verifica se o parametro nao esta vazio */
$id_user = $_SESSION["id"];

$query = " SELECT * FROM tb_sa_user WHERE id = $id_user ";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
$user = mysql_fetch_array($result);
?>
