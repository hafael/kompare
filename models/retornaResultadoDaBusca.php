<?php
include("incs/config.php");
/* verifica se o parametro nao esta vazio */
$id_departamento = $_GET['departamento'];
$id_categoria = $_GET['categoria'];
$id_subcategoria = $_GET['subcategoria'];
$querySearch = $_GET['search'];

$resultadosPorPagina = 10;

if(isset($_GET['search'])){
  if($idEstadoCookie == 0){
    $query = "SELECT a.id, a.id_departamento, a.id_categoria, a.id_subcategoria, a.fabricante, a.modelo, a.especificacao, a.preco, a.featured, b.nome_anunciante, b.telefone1, b.nome_regiao, b.nome_cidade, b.sigla_estado FROM tb_anuncios a INNER JOIN tb_anunciante b ON a.id_anunciante = b.id WHERE a.especificacao LIKE '%".$querySearch."%' ORDER BY preco ASC";
  }else{
    $query = "SELECT a.id, a.id_departamento, a.id_categoria, a.id_subcategoria, a.fabricante, a.modelo, a.especificacao, a.preco, a.featured, a.id_estado, b.nome_anunciante, b.telefone1, b.nome_regiao, b.nome_cidade, b.sigla_estado FROM tb_anuncios a INNER JOIN tb_anunciante b ON a.id_anunciante = b.id WHERE a.especificacao LIKE '%".$querySearch."%' AND a.id_estado = $idEstadoCookie ORDER BY preco ASC";
  }
  //$query = "SELECT * FROM tb_anuncios WHERE especificacao LIKE '%".$querySearch."%' ORDER BY preco ASC";
  $result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
}
//$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
//$num_rows = mysql_num_rows($result);


//PAGINAÇÃO
/*

$total = mysql_result($query, 0, 'total');

// Calcula o máximo de paginas
$paginas =  (($total % $resultadosPorPagina) > 0) ? (int)($total / $resultadosPorPagina) + 1 : ($total / $resultadosPorPagina);

// Sistema simples de paginação, verifica se há algum argumento 'pagina' na URL
if (isset($_GET['pagina'])) {
  $pagina = (int)$_GET['pagina'];
} else {
  $pagina = 1;
}
$pagina = max(min($paginas, $pagina), 1);
$inicio = ($pagina - 1) * $resultadosPorPagina;

$sql = "SELECT * FROM `noticias` WHERE (`ativa` = 1) AND ((`titulo` LIKE '%".$busca."%') OR ('%".$busca."%')) ORDER BY `cadastro` DESC LIMIT ".$inicio.", ".$_BS['PorPagina'];

echo "<p>Resultados ".min($total, ($inicio + 1))." - ".min($total, ($inicio + $_BS['PorPagina']))." de ".$total." resultados encontrados para '".$_GET['consulta']."'</p>";

// Começa a exibição dos paginadores
if ($total > 0) {
  for($n = 1; $n <= $paginas; $n++) {
    echo '<a href="?consulta='.$_GET['consulta'].'&pagina='.$n.'">'.$n.'</a>&nbsp;&nbsp;';
  }
}
*/


//if($num_rows != 0){
if($result){
?>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Fabricante</th>
        <th>Modelo</th>
        <th>Especificaçao</th>
        <th>Preço</th>
        <th>Vendedor</th>
        <th>Local</th>
      </tr>
    </thead>
    <tbody>
    <?php
    while($anuncio = mysql_fetch_assoc($result)) {

    	//$id_anunciante = $anuncio['id_anunciante'];
    	//$query2 = " SELECT * FROM tb_anunciante WHERE id = $id_anunciante ";
		  //$result2 = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);
		  //$anunciante = mysql_fetch_array($result2);
      $preco = number_format($anuncio['preco'], 2, ',', '.');
    ?>
    
		<tr>
      
  			<td><?=$anuncio['fabricante']?></td>
  			<td><?=$anuncio['modelo']?></td>
  			<td><a href="anuncio.php?departamento=<?=$anuncio['id_departamento']?>&categoria=<?=$anuncio['id_categoria']?>&subcategoria=<?=$anuncio['id_subcategoria']?>&anuncio=<?=$anuncio['id']?>"><?=$anuncio['especificacao']?></a></td>
  			<td>R$ <?=$preco?></td>
  			<td><?=$anuncio['nome_anunciante']?> <br /><?=$anuncio['telefone1']?></td>
  			<td><?=$anuncio['nome_regiao']?><br /><?=$anuncio['nome_cidade']?> / <?=$anuncio['sigla_estado']?></td>
      
		</tr>

	<?php } ?>
    </tbody>
  </table>


<?php

}else{
  ?>
  <h4>Nenhum resultado encontrado para "<?=$querySearch?>"</h4>
  <?php
}

//header ('Content-type: application/json; charset=utf-8');
//echo json_encode($rows);



  /* fecha a conexao com o banco */
  @mysql_close($conexao);

?>