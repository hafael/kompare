<?php
include("incs/canvas.php");


$retorno = array();
$retorno['erro'] = false;
$retorno['msg_retorno'] = '';

/* formatos de imagem permitidos */
$permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp", ".JPEG", ".JPG", ".PNG");





/* verifica se o parametro nao esta vazio */
//if(isset($_FILES["imagem"])) {
if($_POST["carregar"]) {

  $id_anuncio = $_POST['id_anuncio'];
  $imagem = $_FILES["imagem"];

  $ext = strtolower(strrchr($imagem["name"],"."));
  

  if(in_array($ext,$permitidos)){

    //carrega a imagem na biblioteca
    //$img = WideImage::load($imagem["name"]);

    // Gera um nome único para a imagem
    $nome_imagem = md5(uniqid(time())) . $ext;
    // Caminho de onde ficará a imagem
    $caminho_imagem = "../imagens_anuncios/" . $nome_imagem;

    $img = new canvas();

    $img->carrega($imagem["tmp_name"])
        ->hexa( '#FFFFFF')
        ->redimensiona( 800, 800, 'preenchimento' )
        ->posicaoCrop('50% - 400', '50% - 400')
        ->grava($caminho_imagem, 100);

    //$retorno['msg_retorno'] = 'Carregando...';
    

    //chama a funcao de conexao com o banco de dados
    $conexao = conecta();
    /* executa as consultas */
    $query1 = "INSERT INTO tb_imagens_anuncio (id_anuncio, nome_imagem) VALUES ('$id_anuncio', '$nome_imagem')";
    $result1 = mysql_query($query1,$conexao) or die('Erro na query:  '.$query1);
    if($result1!=true){
      $retorno['erro'] = true;
      $retorno['msg_retorno'] = 'não inseriu no banco';
      //echo $retorno['msg_retorno'];
    }else{
      $retorno['msg_retorno'] = 'Imagem salva com sucesso';
    }

    @mysql_close($conexao);

  }else{
    $retorno['erro'] = true;
    $retorno['msg_retorno'] = 'Este arquivo não é um tipo de imagem aceito';
    //echo $retorno['msg_retorno'];
  }

}else{
  $retorno['erro'] = true;
  $retorno['msg_retorno'] = 'Nenhuma imagem selecionada';
  //echo $retorno['msg_retorno'];
}


//header ('Content-type: application/json; charset=utf-8');
//echo json_encode($retorno);

/* fecha a conexao com o banco */
//@mysql_close($conexao);



?>