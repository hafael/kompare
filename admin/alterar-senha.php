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
        <h3>Alterar senha</h3>
        <form class="form-horizontal" name="alterar-senha" id="alterar-senha">
          <div class="control-group">
            <label class="control-label" for="senha">Senha atual</label>
            <div class="controls">
              <input type="password" id="senha" name="senha" class="span3" value="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="novaSenha">Nova senha</label>
            <div class="controls">
              <input type="password" id="novaSenha" name="novaSenha" class="span3" value="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="novaSenhaConfirma">Confirmar senha</label>
            <div class="controls">
              <input type="password" id="novaSenhaConfirma" name="novaSenhaConfirma" class="span3" value="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="alert alert-info" style="display:none;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>ALterando a senha...</strong>
          </div>
          <div class="form-actions">
            <input type="hidden" id="anuncianteId" name="anuncianteId" value="<?=$anunciante['id']?>" >
            <button type="submit" class="btn btn-primary">Salvar</button>
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
