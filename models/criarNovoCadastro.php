<?php
//chama a funcao de conexao com o banco de dados
include("../incs/config.php");
include("../addons/validadores/isCnpjValid.php");

$msg_retorno = array();
$msg_retorno['erro'] = false;
$msg_retorno['msg_erro'] = '';
$msg_retorno['link'] = '';

/* pega os dados passados via get */

  $cod_plano = $_GET['plano'];

  $razao_social = $_GET['razaoSocial'];
  $cnpj = $_GET['cnpj'];
  $nome_anunciante = $_GET['nomeFantasia'];
  $responsavel = $_GET['responsavel'];
  $cep = $_GET['cep'];
  $endereco = $_GET['endereco'];
  $numero = $_GET['numero'];
  $complemento = $_GET['complemento'];
  $bairro = $_GET['bairro'];
  $id_estado = $_GET['estado'];
  $id_cidade = $_GET['cidade'];
  $regiao = $_GET['regiao'];
  $telefone1 = $_GET['telefone1'];
  $telefone2 = $_GET['telefone2'];
  $celular = $_GET['celular'];
  $email1 = $_GET['email1'];
  $usuario = $_GET['usuario'];
  $senha = md5($_GET['senha']);
  $termos = $_GET['termos'];

/* verifica se o parametro nao esta vazio */

if(isCnpjValid($cnpj)){
  if($termos==true) {
    /* busca os dados do estado e cidade */
    $query1 = "SELECT * FROM tb_anunciante WHERE username = '$usuario' LIMIT 1";
    $result1 = mysql_query($query1,$conexao) or die('Erro na query:  '.$query1);

    if (mysql_num_rows($result1) == 0){
      if(isset($_GET['estado']) || isset($_GET['cidade'])) {

        $query = " SELECT SQL_CACHE * FROM tb_estados WHERE id = $id_estado";
        $result = mysql_query($query,$conexao) or die('Erro na query:  '.$query);
        $estado = mysql_fetch_assoc($result);

        $nome_estado = $estado['nome'];
        $sigla_estado = $estado['uf'];

        $query2 = " SELECT SQL_CACHE * FROM tb_cidades WHERE id = $id_cidade";
        $result2 = mysql_query($query2,$conexao) or die('Erro na query:  '.$query2);
        $cidade = mysql_fetch_assoc($result2);

        $nome_cidade = $cidade['nome'];

        if($query1 || $query2){
          /* Cadastra o usuario se passar nas buscas de estado e cidade */
          $query3 = "INSERT INTO tb_anunciante (razao_social, cnpj, responsavel, nome_anunciante, telefone1, telefone2, celular, cep, endereco, numero, complemento, bairro, id_estado, nome_estado, sigla_estado, id_cidade, nome_cidade, nome_regiao, email1, email2, username, userpass) VALUES ('$razao_social', '$cnpj', '$responsavel', '$nome_anunciante', '$telefone1', '$telefone2', '$celular', '$cep', '$endereco', '$numero', '$complemento', '$bairro', '$id_estado', '$nome_estado', '$sigla_estado', '$id_cidade', '$nome_cidade', '$regiao', '$email1', '', '$usuario', '$senha')";
          $result3 = mysql_query($query3,$conexao) or die('Erro na query:  '.$query3);
          if($result3){
            $id_anunciante = mysql_insert_id();

            $query4 = "SELECT * FROM tb_planos WHERE codigo = '$cod_plano' LIMIT 1";
            $result4 = mysql_query($query4,$conexao) or die('Erro na query:  '.$query4);

            $plano = mysql_fetch_assoc($result4);

            if($result4){
              $periodo_dias = $plano['periodo_dias'];
              $data_atual = date("Y/m/d");
              $vigencia_de = $data_atual;
              $dia = date("d");
              $mes = date("m");
              $ano = date("Y");
              $data_final = mktime(24*$periodo_dias, 0, 0, $mes, $dia, $ano);
              $vigencia_ate = date('Y/m/d',$data_final);
              $quantidade_anuncios = $plano['quantidade_anuncios'];

              $query5 = "INSERT INTO tb_assinaturas (id_anunciante, codigo_plano, quantidade_anuncios, vigente, vigencia_de, vigencia_ate) VALUES ('$id_anunciante', '$cod_plano', '$cod_plano', 1, '$vigencia_de', '$vigencia_ate')";
              $result5 = mysql_query($query5,$conexao) or die('Erro na query:  '.$query5);

              //envia email
              if($result5){
                $mensagem = 'Obrigado por se cadastrar em nosso sistema!'."\n";
                $mensagem .= "\n\n";
                $mensagem .= 'Seus dados: '."\n";
                $mensagem .= 'Razão Social: '.$razao_social."\n";
                $mensagem .= 'CNPJ: '.$cnpj."\n";
                $mensagem .= 'Nome do Responsável: '.$responsavel."\n";
                $mensagem .= 'Telefone: '.$telefone1."\n";
                $mensagem .= "\n";
                $mensagem .= 'Código do plano escolhido: '.$cod_plano.' - '.$plano['titulo']."\n";
                $mensagem .= 'Período de validade: '.$periodo_dias.' dias'."\n";
                $mensagem .= 'Créditos: '.$quantidade_anuncios.' créditos'."\n";
                $mensagem .= "\n";
                $mensagem .= 'Seus dados de acesso:'."\n";
                $mensagem .= 'Usuário: '.$usuario."\n";

                mail( $email1, 'Confirmacao de cadastro', $mensagem );
              }

            }else{
              $msg_retorno['erro'] = true;
              $msg_retorno['msg_erro'] = 'Plano Inválido.';
            }
          }else{
            $msg_retorno['erro'] = true;
            $msg_retorno['msg_erro'] = 'Usuário não inserido';
          }
        }
      }else{
        $msg_retorno['erro'] = true;
        $msg_retorno['msg_erro'] = 'Estado e cidade não foram preenchidos.';
      }

    }else{
      $msg_retorno['erro'] = true;
      $msg_retorno['msg_erro'] = 'Nome de usuário já existe.';
    }; 
  }else{
    $msg_retorno['erro'] = true;
    $msg_retorno['msg_erro'] = 'Você precisa aceitar os Termos de Serviço para prosseguir.';
  }
}else{
  $msg_retorno['erro'] = true;
  $msg_retorno['msg_erro'] = 'O CNPJ digitado é inválido.';
}



header ('Content-type: application/json; charset=utf-8');
echo json_encode($msg_retorno);

/* fecha a conexao com o banco */
@mysql_close($conexao);
?>