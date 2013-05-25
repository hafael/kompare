<?php
include("../incs/db.php");
//chama a funcao de conexao com o banco de dados
$conexao = conecta();


/* recebe os parametros nas variaveis */
$id_anuncio = $_GET['idAnuncio'];
$especificacao = $_GET['tituloAnuncio'];
$modelo = $_GET['modeloAnuncio'];
$fabricante = $_GET['fabricanteAnuncio'];
$preco = $_GET['precoAnuncio'];
$token = $_GET['tokenAnuncio'];

$resposta = array();
$resposta['msg_retorno'] = false;



if(isset($_GET['tituloAnuncio'])){
	$query = "UPDATE tb_anuncios SET especificacao='$especificacao', modelo='$modelo', fabricante='$fabricante', preco='$preco' WHERE id='$id_anuncio' AND token = '$token' ";
	$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
	
	$resposta['msg_retorno'] = true;
}


header ('Content-type: application/json; charset=utf-8');
echo json_encode($resposta);

  /* fecha a conexao com o banco */
  @mysql_close($conexao);

?>