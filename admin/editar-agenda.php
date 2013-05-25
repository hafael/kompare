<?php
include("incs/funcoes.php");
include("incs/db.php");
include("incs/session.php");
include("incs/carregaEvento.php");
 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Banda Identidade - Area administrativa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px para haver o espaço necessario para a navbar */
      }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    
  </head>

  <body>
    <?php include("incs/header.php"); ?>
    <div class="container areaInterna">
        <h1>Alterar o evento</h1>
        <form class="form-horizontal" name="alterar-evento" id="alterar-evento">
          <div class="control-group">
            <label class="control-label" for="tituloEvento">Título</label>
            <div class="controls">
              <input type="text" id="tituloEvento" name="tituloEvento" class="span5" value="<?=$titulo_evento?>">
              <span class="help-block">Título do evento, com data. Ex.: 07/07/2012 - IASD São Gonçalo</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="horaEvento" >Hora</label>
            <div class="controls">
              <input type="text" class="span1" id="horaEvento" name="horaEvento" value="<?=$hora_evento?>">
              <span class="help-block">Horário do evento. Ex.: 19:00</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="localidadeEvento">Localidade</label>
            <div class="controls">
              <input type="text" id="localidadeEvento" name="localidadeEvento" class="span3" value="<?=$localidade_evento?>">
              <span class="help-block">Local do evento. Ex.: São Gonçalo - RJ</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="descricaoEvento">Descrição</label>
            <div class="controls">
              <textarea rows="10" class="span5" id="descricaoEvento" name="descricaoEvento"><?=$descricao_evento?></textarea>
              <span class="help-block">Descrição do Evento (Opcional)</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="imagemEvento">Imagem URL</label>
            <div class="controls">
              <input type="text" id="imagemEvento" name="imagemEvento" class="span5" value="<?=$imagem_evento?>">
              <span class="help-block">Insira a URL da imagem (Opcional). Ex.: http://www.sitedeexemplo/imagens/imagem.jpg</span>
            </div>
          </div>
          
          <div class="form-actions">
           <input type="hidden" id="idEvento" name="idEvento" value="<?=$id_evento?>">
           <a class="btn" href="javascript:history.back()">Voltar</a>
           <button type="button" class="btn btn-danger">Exluir evento</button>
           <button type="submit" class="btn btn-primary">Salvar edição</button>
          </div>
        </form>
    </div>
    <div class="modal hide" id="modal_excluir">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Tem certeza que deseja exluir o evento?</h3>
      </div>
      <div class="modal-body">
        <p class="alert">Atenção, essa operação não pode ser desfeita.</p>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary btn-excluir">Excluir evento</a>
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
    <script src="assets/js/scripts.js"></script>

  </body>
</html>
