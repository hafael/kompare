<?php
include("../incs/config.php");
/* verifica se o parametro nao esta vazio */
$id_anuncio = $_GET["id_anuncio"];

$query = " SELECT * FROM tb_anuncios WHERE id = $id_anuncio AND id_anunciante = $id_anunciante";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
$anuncio = mysql_fetch_array($result);


?>
