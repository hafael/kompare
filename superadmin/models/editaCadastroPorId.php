<?php
include("../incs/db.php");
//chama a funcao de conexao com o banco de dados
$conexao = conecta();

$msg_retorno = array();
$msg_retorno['erro'] = false;
$msg_retorno['msg_erro'] = '';
$msg_retorno['link'] = '';

/* recebe os parametros nas variaveis */
$razao_social = $_GET['razaoSocial'];
$cnpj = $_GET['cnpj'];
$nome_anunciante = $_GET['nomeFantasia'];
$responsavel = $_GET['responsavel'];
$cep = $_GET['cep'];
$endereco = $_GET['endereco'];
$numero = $_GET['numero'];
$complemento = $_GET['complemento'];
$bairro = $_GET['bairro'];
$id_estado = $_GET['estado'];
$id_cidade = $_GET['cidade'];
$regiao = $_GET['regiao'];
$telefone1 = $_GET['telefone1'];
$telefone2 = $_GET['telefone2'];
$celular = $_GET['celular'];
$email1 = $_GET['email1'];
$email2 = $_GET['email2'];
$usuario = $_GET['usuario'];

/*
$id_anunciante_session = $_SESSION["id"];

$query1 = " SELECT * FROM tb_anunciante WHERE id = $id_anunciante_session ";
$result1 = mysql_query($query1,$conexao) or die('Erro na query:  '.$query1);
$anunciante = mysql_fetch_array($result1);

$id_anunciante = $anunciante['id'];
*/
$id_anunciante = $_GET['anuncianteId'];


if($id_anunciante){

	if(isset($_GET['estado']) || isset($_GET['cidade'])) {

	  $query = " SELECT SQL_CACHE * FROM tb_estados WHERE id = $id_estado";
	  $result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
	  $estado = mysql_fetch_assoc($result);

	  $nome_estado = $estado['nome'];
	  $sigla_estado = $estado['uf'];

	  $query2 = " SELECT SQL_CACHE * FROM tb_cidades WHERE id = $id_cidade";
	  $result2 = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);
	  $cidade = mysql_fetch_assoc($result2);

	  $nome_cidade = $cidade['nome'];

	  if($query1 || $query2){
	    /* Cadastra o usuario se passar nas buscas de estado e cidade */
	    $query3 = "UPDATE tb_anunciante SET razao_social='$razao_social', cnpj='$cnpj', responsavel='$responsavel', nome_anunciante='$nome_anunciante', telefone1='$telefone1', telefone2='$telefone2', celular='$celular', cep='$cep', endereco='$endereco', numero='$numero', complemento='$complemento', bairro='$bairro', id_estado='$id_estado', nome_estado='$nome_estado', sigla_estado='$sigla_estado', id_cidade='$id_cidade', nome_cidade='$nome_cidade', nome_regiao='$regiao', email1='$email1', email2='$email2'  WHERE id='$id_anunciante' ";
		$result3 = mysql_query($query3,$conexao) or die('Erro na query:  '.$query3);
		if($result3!=true){
			$msg_retorno['erro'] = true;
	  		$msg_retorno['msg_erro'] = 'Não foi possivel atualizar as informações.';
		}
	  }
	}else{
	  $msg_retorno['erro'] = true;
	  $msg_retorno['msg_erro'] = 'Estado e cidade não foram preenchidos.';
	}

	/* edita a senha */
	/*
	if(isset($_GET['novaSenha'])){
		$query2 = "UPDATE tb_anunciante SET userpass='$novaSenha' WHERE id='$id_anunciante' ";
		$result = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);
		
		$msg_retorno['msg_retorno'] = true;
	}
	*/

}else{
	$msg_retorno['erro'] = true;
	$msg_retorno['msg_erro'] = 'Não foi possivel acessar suas informações para a alteração.';
}




header ('Content-type: application/json; charset=utf-8');
echo json_encode($msg_retorno);

  /* fecha a conexao com o banco */
  @mysql_close($conexao);

?>