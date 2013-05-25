<?php
	
 
	//nome do servidor (localhost)
	$servidor = "localhost";
	 
	//usuário do banco de dados
	$user = "melhordica";
	 
	//senha do banco de dados
	$senha = "vzcDPPpY2f4DVNeD";
	 
	//nome da base de dados
	$db = "melhordicav1";
	 
	//executa a conexão com o banco, caso contrário mostra o erro ocorrido
	$conexao = mysql_connect($servidor,$user,$senha) or die (mysql_error());
	 
	//seleciona a base de dados daquela conexão, caso contrário mostra o erro ocorrido
	$banco = mysql_select_db($db, $conexao) or die(mysql_error());

	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
 
?>