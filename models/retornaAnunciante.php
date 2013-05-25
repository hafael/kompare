<?php
include("incs/config.php");
/* verifica se o parametro nao esta vazio */
$id_anunciante = $_GET['anunciante'];

$query = " SELECT SQL_CACHE * FROM tb_anunciante WHERE id = $id_anunciante";
$query1 = " SELECT SQL_CACHE * FROM tb_enderecos WHERE id_anunciante = $id_anunciante";
/*$query = "SELECT 
          a.id,
          a.nome_anunciante, 
          a.telefone1, 
          a.telefone2, 
          a.endereco, 
          a.numero, 
          a.complemento, 
          a.nome_regiao, 
          a.nome_cidade, 
          a.sigla_estado, 
          b.id, 
          b.id_anunciante, 
          b.nome_endereco
          FROM tb_anunciante a 
          RIGHT JOIN tb_enderecos b 
          ON a.id = b.id_anunciante
          WHERE a.id = $id_anunciante";
*/
//$query = "SELECT a.id, a.id_departamento, a.id_categoria, a.id_subcategoria, a.id_anunciante, a.fabricante, a.modelo, a.especificacao, a.preco, a.featured, b.id, b.nome_anunciante, b.telefone1, b.endereco, b.numero, b.complemento, b.nome_regiao, b.nome_cidade, b.sigla_estado FROM tb_anuncios a INNER JOIN tb_anunciante b ON a.id_anunciante = b.id WHERE a.id_departamento = $id_departamento AND a.id_categoria = $id_categoria AND a.id_subcategoria = $id_subcategoria AND a.id = $id_anuncio";
$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
$result1 = mysql_query($query1,$conexao) or die('Erro na query:  '.$query);
$anunciante = mysql_fetch_array($result);

?>
	

<div class="anuncio">
    <div class="span4 info-anunciante">
      <h3><?=$anunciante['nome_anunciante']?></h3>
      
      <p>Meios de pagamento aceitos:</p>
      <ul>
      	<li>Cartão de crédito</li>
      	<ul>
      		<li>Visa</li>
      		<li>Mastercard</li>
      		<li>Amex</li>
      	</ul>
      	<li>Cartão de débito</li>
      	<li>Cheque pré</li>
      	<li>A vista</li>
      </ul>
      <h3>Onde encontrar</h3>
      <?php

      $rows = array();
      while($endereco = mysql_fetch_assoc($result1)) {
        ?>

        <ul>
          <li><h4><?=$endereco['nome_endereco']?></h4></li>
          <li><p><?=$endereco['logradouro']?>, <?=$endereco['numero']?>, <?=$endereco['complemento']?></p></li>
          <li><p><?=$endereco['bairro']?> - <?=$endereco['cidade']?> / <?=$endereco['estado']?></p></li>
          <li>
            <p>Telefones</p>
            <ul>
              <li><?=$endereco['telefone1']?></li>
              <li><?=$endereco['telefone2']?></li>
              <li><?=$endereco['telefone3']?></li>
            </ul>
          </li>
          <li><p><a href="#">Ver no mapa</a></p></li>
        </ul>

        <?php
          
      }

      ?>
      
    </div>
    <div class="span5 mapa-google hide">
      <iframe width="380" height="380" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=<?=$anunciante['endereco']?>,+<?=$anunciante['numero']?>+,+<?=$anunciante['nome_cidade']?>+-+<?=$anunciante['nome_estado']?>&amp;ie=UTF8&amp;hq=&amp;hnear=<?=$anunciante['endereco']?>,+<?=$anunciante['numero']?>+-+<?=$anunciante['nome_regiao']?>,+<?=$anunciante['nome_cidade']?>+-+<?=$anunciante['nome_estado']?>,+<?=$anunciante['cep']?>&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com.br/maps?f=q&amp;source=embed&amp;hl=pt-BR&amp;geocode=&amp;q=Rua+Fl%C3%A1vio+Velasco+Vieira,+68+,+S%C3%A3o+Gon%C3%A7alo+-+Rio+de+Janeiro&amp;aq=&amp;sll=-22.827406,-42.979554&amp;sspn=0.011906,0.019226&amp;ie=UTF8&amp;hq=&amp;hnear=R.+Fl%C3%A1vio+Velasco+Vieira,+68+-+Lagoinha,+S%C3%A3o+Gon%C3%A7alo+-+Rio+de+Janeiro,+24732-055&amp;t=m&amp;ll=-22.823063,-42.977314&amp;spn=0.015031,0.016265&amp;z=15&amp;iwloc=A" style="color:#0000FF;text-align:left">Exibir mapa ampliado</a></small>
    </div>
</div>

<?php 



/* fecha a conexao com o banco */
@mysql_close($conexao);

?>