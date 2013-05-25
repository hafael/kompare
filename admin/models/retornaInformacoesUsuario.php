<?php
include("../incs/config.php");
/* verifica se o parametro nao esta vazio */
$id_anunciante = $_SESSION["id"];

$query = " SELECT * FROM tb_anunciante WHERE id = $id_anunciante ";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
$anunciante = mysql_fetch_array($result);
?>
