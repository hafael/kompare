<?php
include("../incs/db.php");
//chama a funcao de conexao com o banco de dados
$conexao = conecta();

$retorno = array();
$retorno['erro'] = false;
$retorno['msg_retorno'] = '';

/* verifica se o parametro nao esta vazio */
if(isset($_GET['id_departamento'])) {

  /* recebe os parametros nas variaveis */
  $id_departamento = $_GET['id_departamento'];
  $nome_categoria = $_GET['nome_categoria']; 
  if($nome_categoria != ''){

    /* executa as consultas */
    $query = " SELECT * FROM tb_categorias WHERE id_departamento = $id_departamento AND nome_categoria = '$nome_categoria'";
    $result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);

    if($result){
      if(mysql_num_rows($result) == 0){
        $query2 = "INSERT INTO tb_categorias (id_departamento, nome_categoria) VALUES ('$id_departamento', '$nome_categoria')";
        $result2 = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);
      }else{
        $retorno['erro'] = true;
        $retorno['msg_retorno'] = 'Já existe uma categoria com esse nome';
      }
    }else{
      $retorno['erro'] = true;
      $retorno['msg_retorno'] = 'Erro ao procurar categoria semelhante';
    }
  }else{
    $retorno['erro'] = true;
    $retorno['msg_retorno'] = 'Nome não pode ser em branco.';
  }

}else{
  $retorno['erro'] = true;
  $retorno['msg_retorno'] = 'ID do departamento nao setado';
}

header ('Content-type: application/json; charset=utf-8');
echo json_encode($retorno);

/* fecha a conexao com o banco */
@mysql_close($conexao);
?>