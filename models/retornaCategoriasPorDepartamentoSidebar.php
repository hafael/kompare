<?php
include("incs/config.php");
/* verifica se o parametro nao esta vazio */
$id_departamento = $_GET['departamento'];

$query = " SELECT SQL_CACHE * FROM tb_categorias WHERE id_departamento = $id_departamento AND visibilidade = true";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);

while($categoria = mysql_fetch_assoc($result)) {
  $lastCategId = $categoria['id'];
  $query2 = " SELECT SQL_CACHE * FROM tb_subcategoria WHERE id_categoria = $lastCategId AND filter = false AND visibilidade = true";
  $result2 = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);
?>
	<ul class="nav nav-list">
		<li class="nav-header"><a href="categoria.php?departamento=<?=$id_departamento?>&categoria=<?=$categoria['id']?>"><?=$categoria['nome_categoria']?></a></li>
		<?php
    	while($subcategoria = mysql_fetch_assoc($result2)) {
    	?>
    		<li><a href="vitrine.php?departamento=<?=$id_departamento?>&categoria=<?=$categoria['id']?>&subcategoria=<?=$subcategoria['id']?>"><?=$subcategoria['nome_subcategoria']?></a></li>
    	<?php
    	}
    	?>
      <li class="ver-todas-subcategorias"><a href="categoria.php?departamento=<?=$id_departamento?>&categoria=<?=$categoria['id']?>"><small>Ver Todas »</small></a></li>
	</ul>

<?php 
}
?>
<ul class="nav nav-list">
  <li><a href="home.php">« Voltar</a></li>
</ul>
<?php
@mysql_close($conexao);
?>

<?php
/*
$rows = array();
while($r = mysql_fetch_assoc($result)) {
    $rows[] = $r;
}
*/
//header ('Content-type: application/json; charset=utf-8');
//echo json_encode($rows);

/* fecha a conexao com o banco */
//@mysql_close($conexao);

?>