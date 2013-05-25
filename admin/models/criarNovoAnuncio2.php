<?php
include("../incs/db.php");
//chama a funcao de conexao com o banco de dados
$conexao = conecta();





/* verifica se o parametro nao esta vazio */
if(isset($_GET['anuncianteId'])) {

  

  /* pega os dados passados via get */
  $especificacao = $_GET['tituloAnuncio'];
  $modelo = $_GET['modeloAnuncio'];
  $id_departamento = $_GET['departamentoAnuncio'];
  $id_categoria = $_GET['categoriaAnuncio'];
  $id_subcategoria = $_GET['subcategoriaAnuncio'];
  $fabricante = $_GET['fabricanteAnuncio'];
  $preco_unformated = $_GET['precoAnuncio'];
  $preco = number_format($preco_unformated, 2, '.', '');

  
  $id_anunciante = $_GET['anuncianteId'];
  $id_estado = $_GET['anuncianteIdEstado'];
  $id_cidade = $_GET['anuncianteIdCidade'];
  
  $token = uniqid(rand(), true);

  $msg_retorno = array();
  $msg_retorno['erro'] = false;
  $msg_retorno['link'] = '';


  $query = " SELECT SQL_CACHE * FROM tb_assinaturas WHERE id_anunciante='$id_anunciante' AND vigente = true LIMIT 1";
  $result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
  $assinatura = mysql_fetch_array($result);

  $quantidade_anuncios = $assinatura['quantidade_anuncios'];

  $vigencia_ate = $assinatura['vigencia_ate'];

  $data_atual = date('Y-m-d');

  if($quantidade_anuncios > 0 || $vigencia_ate >= $data_atual){

    $anuncio_subtraido = $quantidade_anuncios - 1;

    /* executa as consultas */
    $query2 = "INSERT INTO tb_anuncios (id_departamento, id_categoria, id_subcategoria, id_anunciante, fabricante, modelo, especificacao, preco, id_estado, id_cidade, token) VALUES ('$id_departamento', '$id_categoria', '$id_subcategoria', '$id_anunciante', '$fabricante', '$modelo', '$especificacao', '$preco', '$id_estado', '$id_cidade', '$token')";
    $result2 = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);
    $lastId = mysql_insert_id();
    $msg_retorno['link'] = $lastId;
    if($result2 == true){

      $query3 = "UPDATE tb_assinaturas SET quantidade_anuncios='$anuncio_subtraido' WHERE id_anunciante='$id_anunciante' AND vigente = true ";
      $result3 = mysql_query($query3,$conexao) or die('Erro na query:  '.$query3);
      
    }else{
      $msg_retorno['erro'] = true;
    }


  }

  
  
  

  header ('Content-type: application/json; charset=utf-8');
  echo json_encode($msg_retorno);


 

  /* fecha a conexao com o banco */
  @mysql_close($conexao);
}
?>