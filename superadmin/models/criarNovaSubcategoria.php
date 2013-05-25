<?php
include("../incs/db.php");
//chama a funcao de conexao com o banco de dados
$conexao = conecta();

$retorno = array();
$retorno['erro'] = false;
$retorno['msg_retorno'] = '';

/* verifica se o parametro nao esta vazio */
if(isset($_GET['id_categoria']) || isset($_GET['id_categoria'])) {

  /* recebe os parametros nas variaveis */
  $id_departamento = $_GET['id_departamento'];
  $id_categoria = $_GET['id_categoria'];
  $nome_subcategoria = $_GET['nome_subcategoria']; 
  if($nome_subcategoria != ''){
    /* executa as consultas */
    $query = " SELECT * FROM tb_subcategoria WHERE id_departamento = $id_departamento AND id_categoria = $id_categoria AND nome_subcategoria = '$nome_subcategoria'";
    $result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);

    if($result){
      if(mysql_num_rows($result) == 0){
        $query2 = "INSERT INTO tb_subcategoria (id_departamento, id_categoria, nome_subcategoria) VALUES ('$id_departamento', '$id_categoria', '$nome_subcategoria')";
        $result2 = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);
      }else{
        $retorno['erro'] = true;
        $retorno['msg_retorno'] = 'Já existe uma subcategoria com esse nome';
      }
    }else{
      $retorno['erro'] = true;
      $retorno['msg_retorno'] = 'Erro ao procurar subcategoria semelhante';
    }
  }else{
    $retorno['erro'] = true;
    $retorno['msg_retorno'] = 'Nome não pode ser em branco.';
  }

  

}else{
  $retorno['erro'] = true;
  $retorno['msg_retorno'] = 'ID do departamento ou categoria nao setado';
}

header ('Content-type: application/json; charset=utf-8');
echo json_encode($retorno);

/* fecha a conexao com o banco */
@mysql_close($conexao);
?>