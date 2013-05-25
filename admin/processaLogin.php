<?php
//incluindo os arquivos externos
include("incs/funcoes.php");
include("incs/db.php");
 
//verifica se o formulario foi enviado
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
 //recebe os dados digitados do usuario
 $userLogin = (isset($_POST["username"])) ? tiraLixo($_POST["username"]) : '';
 $userSenha = (isset($_POST["user_pass"])) ? tiraLixo($_POST["user_pass"]) : '';
 
 //este é o operador ternario
 //se o usuario enviar o formulario em branco, armazena na variavel erro
 $erro = ($userLogin == "") ? true : false;
 $erro = ($userSenha == "") ? true : false;
 
 //verifica se a validacao esta ok, ou seja, a variavel erro esta vazia
 if($erro == false){
 
 //chama a funcao de conexao com o banco de dados
 $conexao = conecta();
 


 //busca na tabela de login os dados enviados do usuario
 $sql = "SELECT id, username, userpass FROM tb_anunciante ";
 $sql.= "WHERE username = '".$userLogin."' AND userpass = '".md5($userSenha)."' ";
 $action = mysql_query($sql , $conexao);
 

 $campoUser = mysql_fetch_array($action);

 $usuario = $campoUser["id"];
 
 //inicia a sessao
 session_start();
 
 //autentica o usuario se os dados dele for encontrado na tabela
 if($usuario != ""){
 
 //coloca na sessao o codigo e o nome de usuario
 $_SESSION["AUTH"] = true;
 $_SESSION["id"] = $campoUser["id"];
 $_SESSION["username"] = $campoUser["username"];



// Configura as informações dos cookies
$name = "tanaloja_user_id";
$value = $campoUser["id"];
$expire = 0;
$path = "/";
$domain = "";
$secure = 0;
$httponly = 1;

// Grava o Cookie
setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);

 
 //manda pra pagina interna
 header("location: meus-anuncios.php");
 
}else{
 
 //se o usuario nao for encontrado, nao autentica
 $_SESSION["AUTH"] = false;
 $erroLogin = true;
 header("location: index.php?erroLogin=true");
 
 }
 }else{
 	$erroLogin = true;
 	header("location: index.php?erroLogin=true");
 }
}
?>