<?php
include("incs/config.php");
/* verifica se o parametro nao esta vazio */
$id_departamento = $_GET['departamento'];
$id_categoria = $_GET['categoria'];
$id_subcategoria = $_GET['subcategoria'];
$id_anuncio = $_GET['anuncio'];

//$query = " SELECT SQL_CACHE * FROM tb_anuncios WHERE id_departamento = $id_departamento AND id_categoria = $id_categoria AND featured = true ORDER BY rand() ASC LIMIT 6 ";
$query = "SELECT a.id, a.id_departamento, a.id_categoria, a.id_subcategoria, a.id_anunciante, a.fabricante, a.modelo, a.pre_caracteristicas, a.caracteristicas, a.especificacao, a.preco, a.featured, b.id, b.nome_anunciante, b.telefone1, b.endereco, b.numero, b.complemento, b.nome_regiao, b.nome_cidade, b.sigla_estado FROM tb_anuncios a INNER JOIN tb_anunciante b ON a.id_anunciante = b.id WHERE a.id_departamento = $id_departamento AND a.id_categoria = $id_categoria AND a.id_subcategoria = $id_subcategoria AND a.id = $id_anuncio";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
$anuncio = mysql_fetch_array($result);

$query2 = " SELECT SQL_CACHE * FROM tb_imagens_anuncio WHERE id_anuncio = $id_anuncio ORDER BY id DESC LIMIT 1 ";
$result2 = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);
$imagem = mysql_fetch_array($result2);
if(mysql_num_rows($result2)==0){
  $imagem['nome_imagem'] = "sem_imagem_cadastrada.jpg";
}

$preco = number_format($anuncio['preco'], 2, ',', '.');

?>
	

<div class="anuncio">
    <div class="span4 firstElement imagem-anuncio">
      <img src="imagens_anuncios/<?=$imagem['nome_imagem']?>">
    </div>
    <div class="span6 info-anuncio">
      <h3><?=$anuncio['especificacao']?></h3>
      <h4 class="modelo-fabricante"><?=$anuncio['modelo']?> - <?=$anuncio['fabricante']?></h4>
      <p class="preco">R$ <strong><?=$preco?></strong></p>
      <p><?=$anuncio['pre_caracteristicas']?></p>
      <hr>
      <p>Loja: <a href="anunciante.php?anunciante=<?=$anuncio['id_anunciante']?>"><?=$anuncio['nome_anunciante']?></a></p>
      <p>Endereço: <?=$anuncio['endereco']?>, <?=$anuncio['numero']?>, <?=$anuncio['complemento']?></p>
      <p><strong><?=$anuncio['nome_regiao']?> - <?=$anuncio['nome_cidade']?> / <?=$anuncio['sigla_estado']?></strong></p>
      <p>Telefone: <?=$anuncio['telefone1']?></p>
    </div>
    <div class="span10 descricaoAnuncio firstElement">
      <h3>Descrição:</h3>
      <?=$anuncio['caracteristicas']?>
    </div>
</div>

<?php 



/* fecha a conexao com o banco */
@mysql_close($conexao);

?>