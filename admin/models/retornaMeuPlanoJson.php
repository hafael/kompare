<?php
include("../incs/db.php");
//chama a funcao de conexao com o banco de dados
$conexao = conecta();
/* verifica se o parametro nao esta vazio */

$results = array();



if(isset($_GET['id_anunciante'])) {

	

	/* recebe os parametros nas variaveis */
	$id_anunciante = $_GET['id_anunciante']; 

	/* executa as consultas */
	$query = " SELECT SQL_CACHE * FROM tb_assinaturas WHERE id_anunciante = $id_anunciante ";
	$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);

	if(mysql_num_rows($result) > 0){
		$results['status'] = 200;
		$rows = array();
		while($r = mysql_fetch_assoc($result)) {
		  //$rows[] = $r;
		  $rows = array('plano' =>  $r);
		}
		$results['results'] = $rows;
	}else{
		$results['status'] = 500;
		$results['message'] = 'Nenhum plano encontrado para este ID';
	}

	


	/* fecha a conexao com o banco */
	@mysql_close($conexao);
}
	header ('Content-type: application/json; charset=utf-8');
  	echo json_encode($results);
?>