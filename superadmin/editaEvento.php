<?php
include("incs/db.php");
//chama a funcao de conexao com o banco de dados
$conexao = conecta();

/* recebe os parametros nas variaveis */
$id_evento = $_GET['idEvento'];
$titulo_evento = $_GET['tituloEvento'];
$hora_evento = $_GET['horaEvento'];
$localidade_evento = $_GET['localidadeEvento'];
$descricao_evento = $_GET['descricaoEvento'];
$imagem_evento = $_GET['imagemEvento'];


$query = "UPDATE tb_agenda SET titulo='$titulo_evento', hora='$hora_evento', localidade='$localidade_evento', descricao='$descricao_evento', imagem='$imagem_evento' WHERE id='$id_evento' ";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);



header ('Content-type: application/json; charset=utf-8');
//echo json_encode($rows);

  /* fecha a conexao com o banco */
  @mysql_close($conexao);

?>