<?php
include("incs/config.php");
/* verifica se o parametro nao esta vazio */
$id_departamento = $_GET['departamento'];
$id_categoria = $_GET['categoria'];
$id_subcategoria = $_GET['subcategoria'];
$querySearch = $_GET['search'];

$resultadosPorPagina = 10;

if(isset($_GET['search'])){
  if($querySearch==true){
    //$query = "SELECT * FROM tb_anuncios WHERE especificacao LIKE '%".$querySearch."%' ORDER BY preco ASC";
    $query = "SELECT a.id, a.id_departamento, a.id_categoria, a.id_subcategoria, a.id_anunciante, a.fabricante, a.modelo, a.especificacao, a.preco, a.featured, b.nome_anunciante, b.telefone1, b.nome_regiao, b.nome_cidade, b.sigla_estado FROM tb_anuncios a INNER JOIN tb_anunciante b ON a.id_anunciante = b.id WHERE a.especificacao LIKE '%".$querySearch."%' ORDER BY preco ASC";
    $result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
  }
}else{
  //$query = " SELECT * FROM tb_anuncios WHERE id_departamento = $id_departamento AND id_categoria = $id_categoria AND id_subcategoria = $id_subcategoria ";
  if($idEstadoCookie == 0){
    $query = "SELECT a.id, a.id_departamento, a.id_categoria, a.id_subcategoria, a.id_anunciante, a.fabricante, a.modelo, a.especificacao, a.preco, a.featured, b.nome_anunciante, b.telefone1, b.nome_regiao, b.nome_cidade, b.sigla_estado FROM tb_anuncios a INNER JOIN tb_anunciante b ON a.id_anunciante = b.id WHERE a.id_departamento = $id_departamento AND a.id_categoria = $id_categoria AND a.id_subcategoria = $id_subcategoria";
  }else{
    //$query = "SELECT a.id, a.id_departamento, a.id_categoria, a.id_subcategoria, a.id_anunciante, a.fabricante, a.modelo, a.especificacao, a.preco, a.featured, a.id_estado, b.nome_anunciante, b.telefone1, b.nome_regiao, b.nome_cidade, b.sigla_estado FROM tb_anuncios a INNER JOIN tb_anunciante b ON a.id_anunciante = b.id WHERE a.id_departamento = $id_departamento AND a.id_categoria = $id_categoria AND a.id_subcategoria = $id_subcategoria AND a.id_estado = $idEstadoCookie";
    $query = "SELECT a.id, a.id_departamento, a.id_categoria, a.id_subcategoria, a.id_anunciante, a.fabricante, a.modelo, a.especificacao, a.preco, a.featured, a.id_estado, b.nome_anunciante, b.telefone1, b.nome_regiao, b.nome_cidade, b.sigla_estado FROM tb_anuncios a INNER JOIN tb_anunciante b RIGHT JOIN tb_enderecos c ON a.id_anunciante = b.id WHERE a.id_departamento = $id_departamento AND a.id_categoria = $id_categoria AND a.id_subcategoria = $id_subcategoria AND c.id_estado = $idEstadoCookie";
  }
  
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


if(mysql_num_rows($result)==0){
 
echo "<h4>Nenhum resultado encontrado para a sua localidade</h4>";

}else{

  //if($num_rows != 0){
  if($result){
  ?> 
    <?php
    while($anuncio = mysql_fetch_assoc($result)) {
      $preco = number_format($anuncio['preco'], 2, ',', '.');
      $id_anuncio = $anuncio['id'];
      $query2 = " SELECT SQL_CACHE * FROM tb_imagens_anuncio WHERE id_anuncio = $id_anuncio ORDER BY id DESC LIMIT 1";
      $result2 = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);
      $imagem = mysql_fetch_array($result2);
      if(mysql_num_rows($result2)==0){
        $imagem['nome_imagem'] = "sem_imagem_cadastrada.jpg";
      }
    ?>

    <div class="span2 shelfProductDisplay">
      <a href="anuncio.php?departamento=<?=$anuncio['id_departamento']?>&categoria=<?=$anuncio['id_categoria']?>&subcategoria=<?=$anuncio['id_subcategoria']?>&anuncio=<?=$anuncio['id']?>">
        <img src="imagens_anuncios/<?=$imagem['nome_imagem']?>">
      </a>
      <h5>
        <a href="anuncio.php?departamento=<?=$anuncio['id_departamento']?>&categoria=<?=$anuncio['id_categoria']?>&subcategoria=<?=$anuncio['id_subcategoria']?>&anuncio=<?=$anuncio['id']?>">
          <?=$anuncio['especificacao']?>
        </a>
      </h5>
      <h6><?=$anuncio['modelo']?> - <?=$anuncio['fabricante']?></h6>
      <div class="product-info">
        <p class="preco"><span class="preco-de"><strong>R$<?=$preco?></strong></span></p>
        <p class="anunciante">
          <span class="nome-anunciante">
            <strong>
              <a href="anunciante.php?anunciante=<?=$anuncio['id_anunciante']?>">
                <?=$anuncio['nome_anunciante']?>
              </a>
            </strong>
          </span>
          <br />
          <span class="preco-ate">
            <strong>
              <?=$anuncio['nome_cidade']?> / <?=$anuncio['sigla_estado']?>
            </strong>
          </span>
        </p>
      </div>
    </div>	
  <?php
    } 
  ?>
    


  <?php

  }else{
    ?>
    <h4>Nenhum resultado encontrado para "<?=$querySearch?>"</h4>
    <?php
  }

}
//header ('Content-type: application/json; charset=utf-8');
//echo json_encode($rows);



  /* fecha a conexao com o banco */
  @mysql_close($conexao);

?>