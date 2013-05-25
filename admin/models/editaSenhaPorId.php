<?php
include("../incs/db.php");
//chama a funcao de conexao com o banco de dados
$conexao = conecta();

$msg_retorno = array();
$msg_retorno['erro'] = false;
$msg_retorno['msg_erro'] = '';
$msg_retorno['link'] = '';

/* recebe os parametros nas variaveis */

$usuario = $_GET['usuario'];
$novaSenha = md5($_GET['novaSenha']);

/*
$id_anunciante_session = $_SESSION["id"];

$query1 = " SELECT * FROM tb_anunciante WHERE id = $id_anunciante_session ";
$result1 = mysql_query($query1,$conexao) or die('Erro na query:  '.$query1);
$anunciante = mysql_fetch_array($result1);

$id_anunciante = $anunciante['id'];
*/
$id_anunciante = $_GET['anuncianteId'];


if($id_anunciante){
	
	/* edita a senha */
	if(isset($_GET['novaSenha'])){
		$query2 = "UPDATE tb_anunciante SET userpass='$novaSenha' WHERE id='$id_anunciante' ";
		$result = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);
		
		
	}else{
		$msg_retorno['erro'] = true;
		$msg_retorno['msg_erro'] = 'Não foi possivel alterar sua senha.';
	}

}else{
	$msg_retorno['erro'] = true;
	$msg_retorno['msg_erro'] = 'Não foi possivel acessar suas informações para a alteração.';
}




header ('Content-type: application/json; charset=utf-8');
echo json_encode($msg_retorno);

  /* fecha a conexao com o banco */
  @mysql_close($conexao);

?>