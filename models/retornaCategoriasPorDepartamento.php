<?php
include("incs/config.php");
/* verifica se o parametro nao esta vazio */
$id_departamento = $_GET['departamento'];

$query = " SELECT * FROM tb_categorias WHERE id_departamento = $id_departamento ";
//$query = "SELECT a.id, a.id_departamento, a.nome_categoria, b.id, b.nome_subcategoria FROM tb_categorias a INNER JOIN tb_subcategoria b ON b.id = b.id_categoria WHERE a.id_departamento = $id_departamento ";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);

while($categoria = mysql_fetch_assoc($result)) {
  $lastCategId = $categoria['id'];
  $query2 = " SELECT * FROM tb_subcategoria WHERE id_categoria = $lastCategId AND child_direct_categ = false";
  $result2 = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);
?>
  <div class="span3">
    <h4><?=$categoria['nome_categoria']?></h4>
    <ul>
    <?php
    while($subcategoria = mysql_fetch_assoc($result2)) {
    ?>
      <li><a href="resultado-busca.php?departamento=<?=$id_departamento?>&categoria=<?=$categoria['id']?>&subcategoria=<?=$subcategoria['id']?>"><?=$subcategoria['nome_subcategoria']?></a></li>
    <?php
    };
    ?>
    </ul>
  </div>
<?php 
}
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