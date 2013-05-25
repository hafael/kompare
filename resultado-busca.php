<?php include_once("incs/funcoes.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <?php include("incs/head.php"); ?>

  <body>
    <?php include("incs/navbar.php"); ?>

    <div class="container">
      
      
      <div class="span12 firstElement">
        <?php include("models/retornaBreadCrumb.php"); ?>
          <!--
          <ul class="breadcrumb">
              <li><a href="home.php">Home</a> <span class="divider">/</span></li>
              <li><a href="categoria.php?departamento=<?=$_GET['departamento']?>">Departamento</a> <span class="divider">/</span></li>
              <li><a href="categoria.php?departamento=<?=$_GET['departamento']?>&categoria=<?=$_GET['categoria']?>">Categoria</a> <span class="divider">/</span></li>
              <li class="active">Subcategoria</li>
          </ul>

          
          <div class="span12 firstElement">
            <h4>Filtrar por</h4>
            <form>
              <div class="controls span5">
                <label>Modelo</label>
                <select class="span5">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="controls span3">
                <label>Região</label>
                <select class="span3">
                  <option>RJ - Centro</option>
                  <option>RJ - Zona Sul</option>
                  <option>RJ - Zona Oeste</option>
                  <option>RJ - Zona Norte</option>
                  <option>Niterói</option>
                  <option>São Gonçalo e Itaboraí</option>
                </select>
              </div>
              <div class="controls span3">
                <label>Loja</label>
                <select class="span3">
                  <option>Selecione a Loja</option>
                  <option>RJ - Zona Sul</option>
                  <option>RJ - Zona Oeste</option>
                  <option>RJ - Zona Norte</option>
                  <option>Niterói</option>
                  <option>São Gonçalo e Itaboraí</option>
                </select>
              </div>
            </form>
          </div>
          -->
          <!--
          <div class="pagination pagination-centered span12">
              <ul>
                  <li class="disabled"><a href="#">« Primeira</a></li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">Última »</a></li>
              </ul>
          </div>
          -->
          <?php include("models/retornaResultadoDaBusca.php"); ?>
          <!--
          <div class="pagination pagination-centered">
              <ul>
                  <li class="disabled"><a href="#">« Primeira</a></li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">Última »</a></li>
              </ul>
          </div>
          -->
      </div><!-- /span10-->
      

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
    <script src="assets/js/funcoes.js"></script>

  </body>
</html>
