<?php
include("incs/config.php");
/* verifica se o parametro nao esta vazio */

$query = " SELECT SQL_CACHE * FROM tb_departamentos WHERE visibilidade = true AND featured = true ORDER BY nome_departamento";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);

$rows = array();
while($departamento = mysql_fetch_assoc($result)) {
	$id_departamento = $departamento['id'];
	$query2 = " SELECT SQL_CACHE * FROM tb_categorias WHERE id_departamento = $id_departamento AND featured = true  ORDER BY nome_categoria";
	$result2 = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);
	?>
	<li class="dapartamento<?=$departamento['id']?>">
		<a href="departamento.php?departamento=<?=$departamento['id']?>">
			» <?=$departamento['nome_departamento']?>
		</a>
		<ul>
			<?php while($categoria = mysql_fetch_assoc($result2)) {
				?>
				<li><a href="categoria.php?departamento=<?=$departamento['id']?>&categoria=<?=$categoria['id']?>"><?=$categoria['nome_categoria']?></a></li>
				<?php
			}?>
			
		</ul>
	</li>
	<?php  
}

/*
while($departamento = mysql_fetch_assoc($result)) {
	?>

	<div class="span3 departamento dapartamento<?=$departamento['id']?>">
		<a href="departamento.php?departamento=<?=$departamento['id']?>">
			<span class="bg-dept-image"></span>
			<h4><?=$departamento['nome_departamento']?></h4>
		</a>
	</div>

	<?php
    
}
*/

//header ('Content-type: application/json; charset=utf-8');
//echo json_encode($rows);



  /* fecha a conexao com o banco */
  @mysql_close($conexao);

?>