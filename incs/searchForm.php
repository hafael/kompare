<form method="GET" action="resultado-busca.php" class=" searchBox">
	<input type="text" class="input-large" name="search" placeholder="O que voce procura?">
	<button type="submit" class="btn btn-primary">Procurar</button>
</form>
<div class="selecionaCidade">
	<h3>Você está em:</h3>
	<?php include("incs/retornaEstadoSelecionado.php"); ?>
	
</div>
