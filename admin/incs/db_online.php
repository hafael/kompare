<?php
function conecta(){
 
	$conexao = mysql_connect("localhost","tanaloja","rafael655321");
	mysql_select_db("tanaloja", $conexao);
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	return $conexao;
	
 
}

if(isset($_COOKIE['tanaloja_user_id'])){

	$id_anunciante = $_COOKIE['tanaloja_user_id'];

}
?>