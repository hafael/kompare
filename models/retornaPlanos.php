<?php
include("incs/config.php");
/* verifica se o parametro nao esta vazio */

$query = " SELECT SQL_CACHE * FROM tb_planos ";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);

$rows = array();
while($plano = mysql_fetch_assoc($result)) {
  $preco = number_format($plano['valor'], 2, ',', '.');
	?>
	<div class="span3 well plano">
      <h3><?=$plano['titulo']?></h3>
      <p><strong><?=$plano['quantidade_anuncios']?> créditos</strong> válidos por <strong><?=$plano['periodo_dias']?> dias</strong></p>
      <p class="lead"><?=$plano['descricao']?></p>
      <?=$plano['caracteristicas']?>
      <p class="preco"><strong>R$ <?=$preco?></strong></p>
      <a href="cadastro.php?plano=<?=$plano['codigo']?>" class="btn btn-success btn-large">Contratar</a>
    </div>

	<?php
    
}
//header ('Content-type: application/json; charset=utf-8');
//echo json_encode($rows);



  /* fecha a conexao com o banco */
  @mysql_close($conexao);

?>