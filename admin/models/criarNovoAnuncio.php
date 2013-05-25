<?php
  include("../incs/db.php");
  //chama a funcao de conexao com o banco de dados
  $conexao = conecta();
  
  /* pega os dados passados via get */
  $especificacao = $_GET['tituloAnuncio'];
  $modelo = $_GET['modeloAnuncio'];
  $id_departamento = $_GET['departamentoAnuncio'];
  $id_categoria = $_GET['categoriaAnuncio'];
  $id_subcategoria = $_GET['subcategoriaAnuncio'];
  $fabricante = $_GET['fabricanteAnuncio'];
  $preco = $_GET['precoAnuncio'];

  $id_anunciante = $_GET['anucianteId'];
  
  $token = uniqid(rand(), true);

  $msg_retorno = array();
  $msg_retorno['erro'] = false;
  $msg_retorno['link'] = '';

  
  $query1 = "SELECT * FROM tb_anunciante WHERE id = $id_anunciante";
  $result1 = mysql_query($query1,$conexao) or die('Erro na query:  '.$query1);
  $anunciante = mysql_fetch_array($result1);
  
  $msg_retorno['debug'] = $anunciante['id_estado'];
  
  /*
  if ($query1){
    $id_estado = $anunciante['id_estado'];
    $id_cidade = $anunciante['id_cidade'];

    $query2 = "INSERT INTO tb_anuncios (id_departamento, id_categoria, id_subcategoria, id_anunciante, fabricante, modelo, especificacao, preco, id_estado, id_cidade, token) 
    VALUES ('$id_departamento', '$id_categoria', '$id_subcategoria', '$id_anunciante', '$fabricante', '$modelo', '$especificacao', '$preco', '$id_estado', '$id_cidade', '$token')";
    $result2 = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);
    $lastId = mysql_insert_id();
    $msg_retorno['link'] = $lastId;
  }else{
    $msg_retorno['erro'] = true;
  }
  */
  

  header ('Content-type: application/json; charset=utf-8');
  echo json_encode($msg_retorno);


 

  /* fecha a conexao com o banco */
  @mysql_close($conexao);

?>