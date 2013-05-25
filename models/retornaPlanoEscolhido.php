<?php
include("incs/config.php");
/* verifica se o parametro nao esta vazio */
$codigo_plano = $_GET['plano'];

$query = " SELECT SQL_CACHE * FROM tb_planos WHERE codigo = $codigo_plano ";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
$plano = mysql_fetch_array($result);
$preco = number_format($plano['valor'], 2, ',', '.');

?>

<h5><?=$plano['titulo']?></h5>
<p>Valor: <strong>R$ <?=$preco?></strong></p>

<?php


/* fecha a conexao com o banco */
@mysql_close($conexao);

?>