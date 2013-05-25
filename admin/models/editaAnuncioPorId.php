<?php
include("../incs/db.php");
//chama a funcao de conexao com o banco de dados
$conexao = conecta();


/* recebe os parametros nas variaveis */
$id_anuncio = $_POST['idAnuncio'];
$especificacao = $_POST['tituloAnuncio'];
$modelo = $_POST['modeloAnuncio'];
$fabricante = $_POST['fabricanteAnuncio'];
//$preco = $_POST['precoAnuncio'];
//$preco = number_format($_POST['precoAnuncio'], 2, '.', '');
$pre_caracteristicas = $_POST['pre_caracteristicasAnuncio'];
$caracteristicas = $_POST['caracteristicasAnuncio'];
$token = $_POST['tokenAnuncio'];

$resposta = array();
$resposta['msg_retorno'] = false;

$preco = str_replace('.', '', $_POST['precoAnuncio']);
$preco = str_replace(',', '.', $preco);

if(isset($_POST['tituloAnuncio'])){
	$query = "UPDATE tb_anuncios SET especificacao='$especificacao', modelo='$modelo', fabricante='$fabricante', preco='$preco', pre_caracteristicas='$pre_caracteristicas', caracteristicas='$caracteristicas' WHERE id='$id_anuncio' AND token = '$token' ";
	$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
	
	$resposta['msg_retorno'] = true;
}


header ('Content-type: application/json; charset=utf-8');
echo json_encode($resposta);

  /* fecha a conexao com o banco */
  @mysql_close($conexao);

?>