<?php
include("incs/funcoes.php");
include("incs/db.php");
include("incs/session.php");
include("models/retornaInformacoesUsuario.php");
//include("models/retornaAnuncioPorId.php");
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
        <h2>Criar novo anúncio</h2>
        <h4 class="lead">Para criar um novo anúncio, você consumirá <strong>5 créditos</strong> do seu saldo atual</h4>
        <p>Após salvar o seu anuncio, não será possível alterar o departamento, categoria e subcategoria</p>
        <form class="form-horizontal" name="criar-anuncio" id="criar-anuncio">
          <div class="control-group">
            <label class="control-label" for="tituloAnuncio">Título do anúncio</label>
            <div class="controls">
              <input type="text" id="tituloAnuncio" name="tituloAnuncio" class="span5" value="<?=$anuncio['especificacao']?>">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="modeloAnuncio">Modelo</label>
            <div class="controls">
              <input type="text" id="modeloAnuncio" name="modeloAnuncio" class="span4" value="<?=$anuncio['modelo']?>">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group departamentoGroupSelect">
            <label class="control-label" for="departamentoAnuncio">Departamento</label>
            <div class="controls">
              <select id="departamentoAnuncio" name="departamentoAnuncio">
                
              </select>
              <span class="label label-info ajax-loading" style="display:none;">Carregando...</span>
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group categoriaGroupSelect" style="display:none;">
            <label class="control-label" for="categoriaAnuncio">Categoria</label>
            <div class="controls">
              <select id="categoriaAnuncio" name="categoriaAnuncio">
                
              </select>
              <span class="label label-info ajax-loading" style="display:none;">Carregando...</span>
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group subcategoriaGroupSelect" style="display:none;">
            <label class="control-label" for="subcategoriaAnuncio">Subcategoria</label>
            <div class="controls">
              <select id="subcategoriaAnuncio" name="subcategoriaAnuncio">
                
              </select>
              <span class="help-block"></span>
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label" for="fabricanteAnuncio">Fabricante</label>
            <div class="controls">
              <input type="text" id="fabricanteAnuncio" name="fabricanteAnuncio" class="span4" value="<?=$anuncio['fabricante']?>">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="precoAnuncio">Preço</label>
            <div class="controls">
              <input type="text" id="precoAnuncio" name="precoAnuncio" class="span2" value="<?=$anuncio['preco']?>">
              <span class="help-block"></span>
            </div>
          </div>
          
          <div class="alert alert-info" style="display:none;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Salvando...</strong>
          </div>
          <div class="form-actions">
            <input type="hidden" id="anuncianteId" name="anuncianteId" value="<?=$anunciante['id']?>">
            <input type="hidden" id="anuncianteIdEstado" name="anuncianteIdEstado" value="<?=$anunciante['id_estado']?>">
            <input type="hidden" id="anuncianteIdCidade" name="anuncianteIdCidade" value="<?=$anunciante['id_cidade']?>">
           <a class="btn" href="javascript:history.back()">Voltar</a>
           <button type="submit" class="btn btn-primary">Salvar anúncio</button>
          </div>
        </form>
        <div class="mensagem-sucesso well" style="display:none;">
          <h3 class="lead">Seu anúncio foi salvo com sucesso!</h3>
          <p>Foram consumidos <strong>5 créditos</strong> para esta ação.</p>
          <p>Você já pode visualiza-lo nos resultados de busca ou em <a href="meus-anuncios.php">meus anúncios</a>.</p>
        </div>

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


  </body>
</html>
