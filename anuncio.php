<?php include_once("incs/funcoes.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <?php include("incs/head.php"); ?>

  <body>
    <?php include("incs/navbar.php"); ?>

    <div class="container">
      

      <div class="span10 firstElement">
        <?php include("models/retornaBreadCrumb.php"); ?>
        <div class="span10 firstElement">
          <!--
          <a href="javascript:history.back()" class="btn btn-large">« Voltar</a>
          -->
          <?php include("models/retornaAnuncio.php"); ?>
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
