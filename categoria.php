<?php include_once("incs/funcoes.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <?php include("incs/head.php"); ?>

  <body>
    <?php include("incs/navbar.php"); ?>

    <div class="container">
      

      <div class="span2 firstElement menuSidebar">
        <div class="well">
          <?php include("models/retornaSubcategoriasPorCategoriaSidebar.php"); ?>
        </div>
      </div>
      <div class="span8">
        <?php include("models/retornaBreadCrumb.php"); ?>
        <!--<div id="listaDepartamentos"></div>-->
        <div class="span8 firstElement destaqueSecundario">
          <h3>Destaques em <?=$categoria['nome_categoria']?></h3>
          <?php include("models/retornaDestaquesPorCategoria.php"); ?>
        </div>
        
      </div><!-- /span8-->
      <div class="span2">
        <div class="well" style="height:400px">
          <p>Espaço reservado para publicidade</p>
        </div>
      </div>
            
        
      


    </div>
    <?php include("incs/footer.php"); ?>


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

  </body>
</html>
