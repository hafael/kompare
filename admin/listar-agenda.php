<?php
include("incs/funcoes.php");
include("incs/db.php");
include("incs/session.php");
 
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
    <script src="assets/js/jquery.js"></script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script>
      $(function(){
        $.ajax({
          type: "GET",
          url: "../retornaAgenda.php",
          dataType: "json",
          data: {limit: 1000},
          success: function(data){
            $.each(data, function(i, agenda){
              $("table.eventos tbody").append('<tr><td>'+agenda.id+'</td><td>'+agenda.titulo+'</td><td>'+agenda.localidade+'</td><td><a href="editar-agenda.php?evento_id='+agenda.id+'">Alterar / Excluir</a></td></tr>');
            });
          }
        });
      });
    </script>

    
  </head>

  <body>
    <?php include("incs/header.php"); ?>
    <div class="container areaInterna">
        <h1>Lista de eventos cadastrados</h1>
        <table class="table table-condensed eventos">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Título</th>
              <th>Localidade</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
    </div>
    <div class="modal hide" id="voto">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Excluir evento</h3>
      </div>
      <div class="modal-body">
        <div class="confirma-voto">
          <h2>Tem certeza que deseja excluir o evento:</h2>
          <h3></h3>
          <div class="alert alert-error fade in">
            <h4 class="alert-heading">Esta operação não pode ser desfeita</h4>
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <a href="#" class="btn fechar-voto" data-dismiss="modal">Fechar</a>
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

  </body>
</html>
