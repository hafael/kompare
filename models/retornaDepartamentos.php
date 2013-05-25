<?php
include("incs/config.php");
/* verifica se o parametro nao esta vazio */

$query = " SELECT SQL_CACHE * FROM tb_departamentos WHERE visibilidade = true ORDER BY nome_departamento";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);

$rows = array();
while($departamento = mysql_fetch_assoc($result)) {
	?>
	<li class="dapartamento<?=$departamento['id']?>">
		<a href="departamento.php?departamento=<?=$departamento['id']?>">
			<?=$departamento['nome_departamento']?>
		</a>
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