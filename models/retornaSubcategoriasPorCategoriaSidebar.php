<?php
include("incs/config.php");
/* verifica se o parametro nao esta vazio */
$id_departamento = $_GET['departamento'];
$id_categoria = $_GET['categoria'];

$query = " SELECT SQL_CACHE * FROM tb_categorias WHERE id = $id_categoria AND id_departamento = $id_departamento AND visibilidade = true";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
$categoria = mysql_fetch_array($result);

//$lastCategId = $categoria['id'];

$query2 = " SELECT SQL_CACHE * FROM tb_subcategoria WHERE id_departamento = $id_departamento AND id_categoria = $id_categoria AND filter = false";
$result2 = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);

?>

<ul class="nav nav-list">
  <li class="nav-header"><?=$categoria['nome_categoria']?></li>
  <?php
    while($subcategoria = mysql_fetch_assoc($result2)) {
    ?>
      <li><a href="vitrine.php?departamento=<?=$id_departamento?>&categoria=<?=$categoria['id']?>&subcategoria=<?=$subcategoria['id']?>"><?=$subcategoria['nome_subcategoria']?></a></li>
    <?php
    }
    ?>
    <li><a href="departamento.php?departamento=<?=$id_departamento?>">« Voltar</a></li>
</ul>

<?php

@mysql_close($conexao);
?>
