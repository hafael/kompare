<?php
include("incs/funcoes.php");
include("incs/db.php");
include("incs/session.php");
include("models/retornaInformacoesUsuario.php");
include("models/retornaAnuncioPorId.php");
include("models/carregaImagemAnuncio.php");
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
        <div class="groupSelector">
          <ul>
            <li><a href="#editar-imagem">Imagem</a></li>
            <li><a href="#editar-dados">Dados e preço</a></li>
            <li><a href="#editar-caracteristicas">Caracteristicas</a></li>
          </ul>
        </div>
        <div class="form-group" id="editar-imagem">
          <form class="form-horizontal" name="imagem-anuncio" id="imagem-anuncio" enctype="multipart/form-data" method="post">
            <div class="control-group">
              <label class="control-label" for="imagem">Imagem</label>
              <div class="controls">
                <img src="../imagens_anuncios/<?=$imagem['nome_imagem']?>" width="100px">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="imagem">Alterar imagem</label>
              <div class="controls">
                <input type="file" id="imagem" name="imagem">
                <input type="hidden" id="id_anuncio" name="id_anuncio" value="<?=$anuncio['id']?>">
                <input type="submit" id="carregar" name="carregar" class="btn btn-primary" value="Salvar imagem">
                <span class="help-block"><?$retorno['msg_retorno']?></span>
              </div>
            </div>
          </form>
        </div>
        
        <form class="form-horizontal" name="editar-anuncio" id="editar-anuncio">
          <div class="form-group" id="editar-dados">
            <div class="control-group">
              <label class="control-label" for="tituloAnuncio">Título do anúncio</label>
              <div class="controls">
                <input type="text" id="tituloAnuncio" name="tituloAnuncio" class="span6" value="<?=$anuncio['especificacao']?>">
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
            
          </div>
          <div class="form-group" id="editar-caracteristicas">
            <div class="control-group">
              <label class="control-label" for="pre_caracteristicas">Pré Caracteristicas</label>
              <div class="controls">
                <textarea id="pre_caracteristicasAnuncio" name="pre_caracteristicasAnuncio" class="span6"><?=$anuncio['pre_caracteristicas']?></textarea>
                <span class="help-block">Texto em poucas palavras descrevendo o anuncio de forma objetiva</span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="caracteristicas">Caracteristicas</label>
              <div class="controls">
                <textarea id="caracteristicasAnuncio" name="caracteristicasAnuncio" class="span6"><?=$anuncio['caracteristicas']?></textarea>
                <span class="help-block">Descrição completa do anuncio contendo caracteristicas e ficha técnica</span>
              </div>
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
    <script src="assets/js/bootstrap-formgroup.js"></script>
    <script src="assets/js/controller.js"></script>
    <script src="assets/js/jquery.fineuploader-3.1.min.js"></script>
    <script src="assets/js/jscripts/tiny_mce/tiny_mce.js" type="text/javascript" ></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/jquery.maskMoney.js"></script>
    <script type="text/javascript">
      //$("#precoAnuncio").maskMoney('mask');
      
      $("#precoAnuncio").maskMoney({
        //symbol:'R$ ', 
        //showSymbol:true, 
        thousands:'.', 
        decimal:',' 
        //symbolStay: true
      }).maskMoney('mask');
      
      /*
      tinyMCE.init({
              // General options
              mode : "textareas",
              theme : "advanced",
              plugins : "table,inlinepopups",

              // Theme options
              theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,|,table,removeformat,code",
              theme_advanced_buttons2 : "",
              theme_advanced_buttons3 : "",
              theme_advanced_buttons4 : "",
              theme_advanced_toolbar_location : "top",
              theme_advanced_toolbar_align : "left",
              theme_advanced_statusbar_location : "bottom",
              theme_advanced_resizing : true,

              // Example content CSS (should be your site CSS)
              content_css : "/js/tinymce/examples/css/content.css",

              // Style formats
              style_formats : [
                      {title : 'Texto'},
                      {title : 'Texto em negrito', inline : 'b'},
                      {title : 'Fonte 14px', block : 'p', styles : {fontSize : '14px'}},
                      {title : 'Fonte 16px', block : 'p', styles : {fontSize : '16px'}},
                      {title : 'Tabelas'},
                      {title : 'Tabela 1', selector : 'tr', classes : 'tablerow1'}
              ],

              formats : {
                      alignleft : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'left'},
                      aligncenter : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'center'},
                      alignright : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'right'},
                      alignfull : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'full'},
                      bold : {inline : 'span', 'classes' : 'bold'},
                      italic : {inline : 'span', 'classes' : 'italic'},
                      underline : {inline : 'span', 'classes' : 'underline', exact : true},
                      strikethrough : {inline : 'del'},
                      customformat : {inline : 'span', styles : {color : '#00ff00', fontSize : '20px'}, attributes : {title : 'Formato customizado'}}
              }
      });
      */
      </script>



  </body>
</html>
