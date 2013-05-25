<?php
include("incs/funcoes.php");
include("incs/db.php");
include("incs/session.php");
include("models/retornaInformacoesUsuario.php");
?>
<!DOCTYPE html>
<html lang="en">
  <?php include("incs/head.php"); ?>

  <body>
    <?php include("incs/navbar.php"); ?>
    

    <div class="container">
      <div class="span3 firstElement">
        <div class="well" style="max-width: 340px; padding: 8px 0;">
          <?php include("incs/menuPrincipalSidebar.php"); ?>
        </div>
      </div>
      <div class="span9">
        <h3>Gerenciar dados</h3>
        <form class="form-horizontal" name="editar-cadastro" id="editar-cadastro">
          <h4>Dados da Empresa</h4>
          <div class="control-group">
            <label class="control-label" for="razaoSocial">Razão social</label>
            <div class="controls">
              <input type="text" id="razaoSocial" name="razaoSocial" class="span5" value="<?=$anunciante['razao_social']?>">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="cnpj">CNPJ</label>
            <div class="controls">
              <input type="text" id="cnpj" name="cnpj" class="span3" value="<?=$anunciante['cnpj']?>">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="nomeFantasia">Nome Fantasia</label>
            <div class="controls">
              <input type="text" id="nomeFantasia" name="nomeFantasia" class="span4" value="<?=$anunciante['nome_anunciante']?>">
              <span class="help-block">Este é o nome que aparecerá no anúncio.</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="responsavel">Responsável</label>
            <div class="controls">
              <input type="text" id="responsavel" name="responsavel" class="span5" value="<?=$anunciante['responsavel']?>">
              <span class="help-block">Nome completo do responsável pelo contato na empresa.</span>
            </div>
          </div>
          <h4>Endereço</h4>
          <div class="control-group">
            <label class="control-label" for="cep">CEP</label>
            <div class="controls">
              <input type="text" id="cep" name="cep" class="span3" value="<?=$anunciante['cep']?>">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="endereco">Endereço</label>
            <div class="controls">
              <input type="text" id="endereco" name="endereco" class="span5" value="<?=$anunciante['endereco']?>">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="numero">Número</label>
            <div class="controls">
              <input type="text" id="numero" name="numero" class="span1" value="<?=$anunciante['numero']?>">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="complemento">Complemento</label>
            <div class="controls">
              <input type="text" id="complemento" name="complemento" class="span2" value="<?=$anunciante['complemento']?>">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="bairro">Bairro</label>
            <div class="controls">
              <input type="text" id="bairro" name="bairro" class="span3" value="<?=$anunciante['bairro']?>">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="estado">Estado</label>
            <div class="controls">
              <select id="estado" name="estado">
                <option value="<?=$anunciante['id_estado']?>"><?=$anunciante['nome_estado']?></option>
                <option></option>
              </select>
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="cidade">Cidade</label>
            <div class="controls">
              <select id="cidade" name="cidade">
                <option value="<?=$anunciante['id_cidade']?>"><?=$anunciante['nome_cidade']?></option>
                <option></option>
              </select>
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="regiao">Região</label>
            <div class="controls">
              <input type="text" id="regiao" name="regiao" class="span3" value="<?=$anunciante['bairro']?>">
              <span class="help-block"></span>
            </div>
          </div>
          <h4>Contato</h4>
          <div class="control-group">
            <label class="control-label" for="telefone1">Telefone 1</label>
            <div class="controls">
              <input type="text" id="telefone1" name="telefone1" class="span3" value="<?=$anunciante['telefone1']?>">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="telefone2">Telefone 2</label>
            <div class="controls">
              <input type="text" id="telefone2" name="telefone2" class="span3" value="<?=$anunciante['telefone2']?>">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="celular">Celular</label>
            <div class="controls">
              <input type="text" id="celular" name="celular" class="span3" value="<?=$anunciante['celular']?>">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="email1">E-mail</label>
            <div class="controls">
              <input type="text" id="email1" name="email1" class="span5" value="<?=$anunciante['email1']?>">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="email2">E-mail secundário (opcional)</label>
            <div class="controls">
              <input type="text" id="email2" name="email2" class="span5" value="<?=$anunciante['email2']?>">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="alert alert-info" style="display:none;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Salvando alterações...</strong>
          </div>
          <div class="form-actions">
            <input type="hidden" id="anuncianteId" name="anuncianteId" value="<?=$anunciante['id']?>" >
            <button type="submit" class="btn btn-primary">Salvar  </button>
          </div>
        </form>
      </div><!-- /span10-->
      

      <?php include("incs/footer.php"); ?>
      
    </div>


    <!-- Le javascript (sempre ao final da página)
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/controller.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script type="text/javascript">
      //carrega estados
      $.ajax({
        type: "GET",
        url: "models/carregaEstado.php",
        dataType: "json",
        success: function(data){
          $.each(data, function(i, estado){
            $("select#estado").append('<option value="'+estado.id+'">'+estado.nome+'</option>');
          });
        }
      });
      //carrega cidades
      var estadoSelecionado = $("select#estado").val();
      $.ajax({
        type: "GET",
        url: "models/carregaCidadesPorEstado.php",
        data: {estado: estadoSelecionado},
        dataType: "json",
        success: function(data){
          //$("select#cidade").html('<option>Selecione a cidade</option>');
          $("select#cidade").removeClass('opacity');
          $.each(data, function(i, cidade){
            $("select#cidade").append('<option value="'+cidade.id+'">'+cidade.nome+'</option>');
          });
        }
      });
      $('select#estado').change(function(){
        var estadoSelecionado = $(this).val();
        $.ajax({
          type: "GET",
          url: "models/carregaCidadesPorEstado.php",
          data: {estado: estadoSelecionado},
          dataType: "json",
          success: function(data){
            $("select#cidade").html('<option>Selecione a cidade</option>');            $.each(data, function(i, cidade){
              $("select#cidade").append('<option value="'+cidade.id+'">'+cidade.nome+'</option>');
            });
          }
        });
      });

    </script>


  </body>
</html>
