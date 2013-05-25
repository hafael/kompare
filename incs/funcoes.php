<?php
ob_start();

//SETA COOKIES DO ESTADO
function setEstadoCookie (){
	
	// Configura as informações dos cookies
	$name = "idEstado";
	$value = $_POST["setEstadoCookie"];
	$expire = 0;
	$path = "/";
	$domain = "";
	$secure = 0;
	$httponly = 1;

  	// Grava o Cookie
	setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);

	// Redireciona a pagina
	$urlRedirect = "http://".$_SERVER['SERVER_NAME'].$_SERVER ['REQUEST_URI'];
	header('Location: '.$urlRedirect);
}

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