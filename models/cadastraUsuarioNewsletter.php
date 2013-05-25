<?php
//chama a funcao de conexao com o banco de dados
include("../incs/config.php");

$msg_retorno = array();
$msg_retorno['erro'] = false;
$msg_retorno['msg_erro'] = '';
$msg_retorno['link'] = '';

/* pega os dados passados via get */

  $nome_estado = $_POST['estado'];
  $tipo_usuario = $_POST['userType'];
  $email = $_POST['email'];


  

/* verifica se o parametro nao esta vazio */

if($nome_estado != '' || $email != ''){

  $query3 = "INSERT INTO tb_newsletter (nome_estado, tipo_usuario, email) VALUES ('$nome_estado', '$tipo_usuario', '$email')";
  $result3 = mysql_query($query3,$conexao) or die('Erro na query:  '.$query3);


  if($result3!=true) {
    $msg_retorno['erro'] = true;
    $msg_retorno['msg_erro'] = 'Ocorreu um erro em nosso servidor e não foi possível concluir o cadastro. :(';
  }
}else{
  $msg_retorno['erro'] = true;
  $msg_retorno['msg_erro'] = 'Digite um e-mail válido';
}



header ('Content-type: application/json; charset=utf-8');
echo json_encode($msg_retorno);

/* fecha a conexao com o banco */
@mysql_close($conexao);
?>