<?php include_once("incs/funcoes.php"); ?>
<?php 
if(isset($_GET["erroLogin"])){ 
  $erroLogin = "<p>Login ou senha inválidos</p>"; 
} 
?>
<!DOCTYPE html>
<html lang="en">
  <?php include("incs/head.php"); ?>

  <body>
    <?php include("incs/navbar.php"); ?>
    

    <div class="container">
      
      <div class="span10 firstElement">
        <h3>Cadastre-se</h3>

        <form class="form-horizontal firstElement span7" name="novo-cadastro" id="novo-cadastro">
          <h4>Dados da empresa</h4>
          <div class="control-group">
            <label class="control-label" for="razaoSocial">Razão social</label>
            <div class="controls">
              <input type="text" id="razaoSocial" name="razaoSocial" class="span5 required" value="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group cnpj">
            <label class="control-label" for="cnpj">CNPJ</label>
            <div class="controls">
              <input type="text" id="cnpj" name="cnpj" class="span3 required" value="">
              <span class="help-inline"></span>
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="nomeFantasia">Nome Fantasia</label>
            <div class="controls">
              <input type="text" id="nomeFantasia" name="nomeFantasia" class="span4 required" value="">
              <span class="help-block">Este é o nome que aparecerá no anúncio.</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="responsavel">Responsável</label>
            <div class="controls">
              <input type="text" id="responsavel" name="responsavel" class="span5 required" value="">
              <span class="help-block">Nome completo do responsável pelo contato na empresa.</span>
            </div>
          </div>
          <h4>Endereço</h4>
          <div class="control-group">
            <label class="control-label" for="cep">CEP</label>
            <div class="controls">
              <input type="text" id="cep" name="cep" class="span3 required" value="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="endereco">Endereço</label>
            <div class="controls">
              <input type="text" id="endereco" name="endereco" class="span5 required" value="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="numero">Número</label>
            <div class="controls">
              <input type="text" id="numero" name="numero" class="span1 required" value="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="complemento">Complemento</label>
            <div class="controls">
              <input type="text" id="complemento" name="complemento" class="span2" value="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="bairro">Bairro</label>
            <div class="controls">
              <input type="text" id="bairro" name="bairro" class="span3" value="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="estado">Estado</label>
            <div class="controls">
              <select id="estado" name="estado" class="required">
                <option value="0">Selecione</option>
              </select>
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="cidade">Cidade</label>
            <div class="controls">
              <select id="cidade" name="cidade" class="required">
                <option value="0">Selecione</option>
              </select>
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="regiao">Região</label>
            <div class="controls">
              <input type="text" id="regiao" name="regiao" class="span2 required" value="">
              <span class="help-block">Sua localidade no anúncio aparecerá como: Região / Cidade - UF</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="tipoEmpresa">Tipo de negócio</label>
            <div class="controls">
              <select id="tipoEmpresa" name="tipoEmpresa" class="required">
                <option value="0">Eletronicos</option>
                <option value="0">Telefonia</option>
                <option value="0">Departamentos</option>
              </select>
              <span class="help-block"></span>
            </div>
          </div>
          <h4>Contato</h4>
          <div class="control-group">
            <label class="control-label" for="telefone1">Telefone principal</label>
            <div class="controls">
              <input type="text" id="telefone1" name="telefone1" class="span3 required" value="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="telefone2">Telefone secundário (opcional)</label>
            <div class="controls">
              <input type="text" id="telefone2" name="telefone2" class="span3" value="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="celular">Celular</label>
            <div class="controls">
              <input type="text" id="celular" name="celular" class="span3" value="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group email1">
            <label class="control-label" for="email1">E-mail</label>
            <div class="controls">
              <input type="text" id="email1" name="email1" class="span5 required" value="">
              <span class="help-inline"></span>
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group email2">
            <label class="control-label" for="confirmaEmail">Confirmar E-mail</label>
            <div class="controls">
              <input type="text" id="confirmaEmail" name="confirmaEmail" class="span5 required" value="">
              <span class="help-inline"></span>
              <span class="help-block"></span>
            </div>
          </div>
          <h4>Dados de acesso</h4>
          <div class="control-group usuario">
            <label class="control-label" for="usuario">Usuário</label>
            <div class="controls">
              <input type="text" id="usuario" name="usuario" class="span3 required" value="">
              <span class="help-inline"></span>
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="senha">Senha</label>
            <div class="controls">
              <input type="password" id="senha" name="senha" class="span3 required" value="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="alert alert-info">
            <label class="checkbox" for="termos">
              <input type="checkbox" id="termos" name="termos">
              Lí e aceito os <strong><a href="#myModal" data-toggle="modal" role="button">Termos de contrato de serviço.</a></strong>
            </label>
          </div>
          <div class="alert alert-info" style="display:none;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Salvando o cadastro...</strong>
          </div>
          <div class="form-actions">
            <input type="hidden" id="plano" name="plano" value="<?=$_GET['plano']?>">
            <button type="submit" class="btn btn-large pull-right btn-primary">Cadastrar</button>
          </div>
        </form>
        <div class="span2 well plano-escolhido-fixed">
          <h4>Plano Escolhido</h4>
          <?php include("models/retornaPlanoEscolhido.php"); ?>
          <p><a href="planos.php">Escolher outro plano</a></p>
        </div>
        <div class="cadastroLogin" style="display:none;">
          <h4>Seu cadastro foi efetuado com Sucesso!</h4>
          <p>Para começar a criar os seus anúncios, efetue o login.</p>
          <form class="form-horizontal" action="admin/processaLogin.php" method="post">
            <?=$erroLogin?>
            <div class="control-group">
              <label class="control-label" for="username">Usuário</label>
              <div class="controls">
                <input type="text" id="username" name="username" >
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">Senha</label>
              <div class="controls">
                <input type="password" id="user_pass" name="user_pass" >
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <button type="submit" class="btn btn-primary">Logar</button>
              </div>
            </div>
          </form>

        </div>
        
      </div><!-- /span10-->
      <div class="span2">
        <div class="well" style="height:400px">
          <p>Espaço reservado para publicidade</p>
          
        </div>
        
      </div>

      
    </div>
    <?php include("incs/footer.php"); ?>

    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Termos de Contrato de Serviço</h3>
      </div>
      <div class="modal-body">
        <p>Conteudo do termo do contrato</p>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
        <button class="btn btn-primary">Aceitar</button>
      </div>
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
    <script src="assets/js/jquery.maskedinput-1.3.min.js"></script>
    <script type="text/javascript">
      carregaEstado();
      //Mascaras para os inputs
      $("#cnpj").mask("99.999.999/9999-99");
      $("#cep").mask("99999-999");
      $("#telefone1, #telefone2, #celular").mask("(99) 9999-9999");
    </script>

  </body>
</html>
