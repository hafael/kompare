<?php
include("incs/config.php");
//chama a funcao de conexao com o banco de dados
//$conexao = conecta();
/* verifica se o parametro nao esta vazio */

if($idEstadoCookie != 0){
	$query = " SELECT SQL_CACHE * FROM tb_estados WHERE id = $idEstadoCookie ";
	$result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
	$estadoSelecionado = mysql_fetch_assoc($result);
}


?>


<form method="post">
	<select id="setEstadoCookie" name="setEstadoCookie" onchange="this.form.submit()">
		<?php
		if($idEstadoCookie != 0){
		?>
		<option value="<?=$estadoSelecionado['id']?>"><?=$estadoSelecionado['nome']?></option>
		<option disabled></option>
		<option value="0">Todos os estados</option>
		<?php
		}else{
		?>
		<option value="0">Todos os estados</option>
		<?php
		}
		?>
		
	</select>
</form>