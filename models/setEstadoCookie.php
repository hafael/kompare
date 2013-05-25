<?php
ob_start();

if(isset($_COOKIE['idEstado'])){

	$idEstadoCookie = $_COOKIE['idEstado'];

}else{
	$idEstadoCookie = 0;
}

if(isset($_POST['setEstadoCookie'])){

  setEstadoCookie();

}

ob_end_flush();
?>