<?php
include("incs/funcoes.php");
include("incs/db.php");
include("incs/session.php");
include("models/retornaInformacoesUsuario.php");
include("models/retornaAnuncioPorId.php");
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
        <h3>Editar Anúncio</h3>
        <form class="form-horizontal" name="editar-anuncio" id="editar-anuncio">
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
           <input type="hidden" id="idAnuncio" name="idAnuncio" value="<?=$anuncio['id']?>">
           <input type="hidden" id="tokenAnuncio" name="tokenAnuncio" value="<?=$anuncio['token']?>">
           <a class="btn" href="javascript:history.back()">Voltar</a>
           <button type="button" class="btn btn-danger">Remover anúncio</button>
           <button type="submit" class="btn btn-primary">Salvar edição</button>
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


  </body>
</html>
