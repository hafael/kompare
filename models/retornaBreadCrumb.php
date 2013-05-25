<?php
include("incs/config.php");
/* verifica se o parametro nao esta vazio */
$id_departamento = $_GET['departamento'];
$id_categoria = $_GET['categoria'];
$id_subcategoria = $_GET['subcategoria'];

if(isset($_GET['departamento'])){
  $query = " SELECT SQL_CACHE * FROM tb_departamentos WHERE id = $id_departamento";
  $result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
  $departamento = mysql_fetch_array($result);
}
if(isset($_GET['categoria'])){
	$query = " SELECT SQL_CACHE * FROM tb_categorias WHERE id = $id_categoria AND id_departamento = $id_departamento";
	$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
	$categoria = mysql_fetch_array($result);
}
if(isset($_GET['subcategoria'])){
  $query = " SELECT SQL_CACHE * FROM tb_subcategoria WHERE id = $id_subcategoria AND id_departamento = $id_departamento AND id_categoria = $id_categoria";
  $result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
  $subcategoria = mysql_fetch_array($result);
}
if(isset($_GET['departamento'])){
?>

<ul class="breadcrumb">
  <li><a href="home.php">Home</a> <span class="divider">/</span></li>
  <?php
  	if(isset($_GET['departamento'])){
  		?>
  		<li><a href="departamento.php?departamento=<?=$id_departamento?>"><?=$departamento['nome_departamento']?></a> <span class="divider">/</span></li>
  		<?php
      if(isset($_GET['categoria'])){
        ?>
        <li><a href="categoria.php?departamento=<?=$id_departamento?>&categoria=<?=$id_categoria?>"><?=$categoria['nome_categoria']?></a> <span class="divider">/</span></li>
        <?php
        if(isset($_GET['subcategoria'])){
          ?>
          <li class="active"><?=$subcategoria['nome_subcategoria']?></li>
          <?php
        }
      }
  	}
  ?>
</ul>

<?php
}
@mysql_close($conexao);

?>
