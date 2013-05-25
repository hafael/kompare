<?php
/* verifica se o parametro nao esta vazio */
if(isset($_GET['evento_id'])) {

  /* recebe os parametros nas variaveis */
  $evento_id = $_GET['evento_id']; 
  
  //chama a funcao de conexao com o banco de dados
  $conexao = conecta();

  
  $query = "SELECT * FROM tb_agenda WHERE id = $evento_id";
  $result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
  $evento = mysql_fetch_array($result);

  $id_evento = $evento['id'];
  $titulo_evento = $evento['titulo'];
  $hora_evento = $evento['hora'];
  $localidade_evento = $evento['localidade'];
  $descricao_evento = $evento['descricao'];
  $imagem_evento = $evento['imagem'];

  /* fecha a conexao com o banco */
  @mysql_close($conexao);
}