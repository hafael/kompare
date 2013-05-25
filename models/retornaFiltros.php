<?php
include("incs/config.php");
/* verifica se o parametro nao esta vazio */
$id_departamento = $_GET['departamento'];
$id_categoria = $_GET['categoria'];
$id_subcategoria = $_GET['subcategoria'];

$query = " SELECT SQL_CACHE * FROM tb_subcategoria WHERE id_departamento = $id_departamento AND id_categoria = $id_categoria AND filter = true AND filter_type = 1";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);

?>
<ul class="nav nav-list">
  <li class="nav-header">Marcas</li>
  <?php
    while($filtro_marca = mysql_fetch_assoc($result)) {
    ?>
      <li><a href="vitrine.php?departamento=<?=$id_departamento?>&categoria=<?=$id_categoria?>&subcategoria=<?=$filtro_marca['id']?>&filtro=<?=$filtro_marca['filter_type']?>"><?=$filtro_marca['nome_subcategoria']?></a></li>
    <?php
    }
    ?>
    <li><a href="categoria.php?departamento=<?=$id_departamento?>&categoria=<?=$id_categoria?>">« Voltar</a></li>
</ul>

<?php

@mysql_close($conexao);
?>
