<?php
include("../incs/config.php");
/* verifica se o parametro nao esta vazio */

$query = " SELECT * FROM tb_anuncios WHERE id_anunciante = $id_anunciante ORDER BY id DESC ";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
?>

<table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titulo do anúncio</th>
        <th>Valor</th>
        <th>Editar / remover</th>
      </tr>
    </thead>
    <tbody>
    <?php
    while($anuncio = mysql_fetch_assoc($result)) {
    ?>
		<tr>
			<td><?=$anuncio['id']?></td>
			<td><?=$anuncio['especificacao']?></td>
			<td>R$ <?=number_format($anuncio['preco'], 2, ',', '.')?></td>
			<td><a href="editar-anuncio.php?id_anuncio=<?=$anuncio['id']?>" title="Editar / remover">Editar / remover</a></td>
		</tr>
	<?php } ?>
    </tbody>
  </table>


<?php

//header ('Content-type: application/json; charset=utf-8');
//echo json_encode($rows);



  /* fecha a conexao com o banco */
  @mysql_close($conexao);

?>