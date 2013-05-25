<?php
include("../incs/config.php");
/* verifica se o parametro nao esta vazio */
$id_anuncio = $_GET["id_anuncio"];

$query = " SELECT * FROM tb_anuncios WHERE id = $id_anuncio AND id_anunciante = $id_anunciante";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
$anuncio = mysql_fetch_array($result);

$query2 = " SELECT SQL_CACHE * FROM tb_imagens_anuncio WHERE id_anuncio = $id_anuncio ORDER BY id DESC LIMIT 1 ";
$result2 = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);
$imagem = mysql_fetch_array($result2);
if(mysql_num_rows($result2)==0){
	$imagem['nome_imagem'] = "sem_imagem_cadastrada.jpg";
}


?>
