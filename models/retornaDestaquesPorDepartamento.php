<?php
include("incs/config.php");
/* verifica se o parametro nao esta vazio */
$id_departamento = $_GET['departamento'];

//$query = " SELECT SQL_CACHE * FROM tb_anuncios WHERE id_departamento = $id_departamento AND featured = true ORDER BY rand() ASC LIMIT 6 ";
if($idEstadoCookie == 0){
  $query = "SELECT a.id, a.id_departamento, a.id_categoria, a.id_subcategoria, a.id_anunciante, a.fabricante, a.modelo, a.especificacao, a.preco, a.featured, b.nome_anunciante, b.telefone1, b.nome_regiao, b.nome_cidade, b.sigla_estado FROM tb_anuncios a INNER JOIN tb_anunciante b ON a.id_anunciante = b.id WHERE a.id_departamento = $id_departamento AND a.featured = true ORDER BY rand() ASC LIMIT 6 ";
}else{
  $query = "SELECT a.id, a.id_departamento, a.id_categoria, a.id_subcategoria, a.id_anunciante, a.fabricante, a.modelo, a.especificacao, a.preco, a.featured, a.id_estado, b.nome_anunciante, b.telefone1, b.nome_regiao, b.nome_cidade, b.sigla_estado FROM tb_anuncios a INNER JOIN tb_anunciante b ON a.id_anunciante = b.id WHERE a.id_departamento = $id_departamento AND a.featured = true AND a.id_estado = $idEstadoCookie ORDER BY rand() ASC LIMIT 6 ";
}
//$query = "SELECT a.id, a.id_departamento, a.id_categoria, a.id_subcategoria, a.id_anunciante, a.fabricante, a.modelo, a.especificacao, a.preco, a.featured, b.nome_anunciante, b.telefone1, b.nome_regiao, b.nome_cidade, b.sigla_estado, c.nome_imagem FROM tb_anuncios a LEFT JOIN tb_anunciante b ON a.id_anunciante = b.id LEFT JOIN tb_imagens_anuncio c ON a.id = c.id_anuncio WHERE a.id_departamento = $id_departamento AND a.featured = true ORDER BY rand() ASC LIMIT 6 ";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);

if(mysql_num_rows($result)==0){
 
echo "<h4>Nenhum resultado encontrado para a sua localidade</h4>";

}else{

  while($anuncio = mysql_fetch_assoc($result)) {
    $preco = number_format($anuncio['preco'], 2, ',', '.');
    
    $id_anuncio = $anuncio['id'];
    $query2 = " SELECT SQL_CACHE * FROM tb_imagens_anuncio WHERE id_anuncio = $id_anuncio ORDER BY id DESC LIMIT 1 ";
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

}

/* fecha a conexao com o banco */
@mysql_close($conexao);

?>