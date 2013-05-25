<?php
	
 
	//nome do servidor (localhost)
	$servidor = "mysql01.tanaloja.hospedagemdesites.ws";
	 
	//usuário do banco de dados
	$user = "tanaloja";
	 
	//senha do banco de dados
	$senha = "rafael655321";
	 
	//nome da base de dados
	$db = "tanaloja";
	 
	//executa a conexão com o banco, caso contrário mostra o erro ocorrido
	$conexao = mysql_connect($servidor,$user,$senha) or die (mysql_error());
	 
	//seleciona a base de dados daquela conexão, caso contrário mostra o erro ocorrido
	$banco = mysql_select_db($db, $conexao) or die(mysql_error());

	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
 
?>