<?php 
function tiraLixo($valor)
{
 $valor = str_replace("--", "", $valor);
 $valor = str_replace("\"", "", $valor);
 $valor = str_replace("'", "", $valor);
 $valor = str_replace("<", "", $valor);
 $valor = str_replace(">", "", $valor);
 $valor = str_replace(";", "", $valor);
 
 return $valor;
}
?>