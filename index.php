<?php
	ob_start();

	if(isset($_COOKIE['idEstado'])){

	  // Redireciona a Página
	  header('Location: home.php');

	}
	if(isset($_POST['setEstadoCookie'])){

		// Configura as informações dos cookies
		$name = "idEstado";
		$value = $_POST["setEstadoCookie"];
		$expire = 0;
		$path = "/";
		$domain = "";
		$secure = 0;
		$httponly = 1;

	  	// Grava o Cookie
		setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);

		// Redireciona a pagina
		header('Location: home.php');

	}
	ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
  <?php include("incs/head.php"); ?>

  <body class="hotsite">
    
    

    <div class="container">
      <span class="pull-center">
        <h1 class="logo-index"><span>Tánaloja!</span></h1>
      </span>
      <!-- /span3-->
      <div class="span12">

       <div class="areaSelectEstadoIndex">
          <h3 class="lead">Selecione o seu estado:</h3>
          <form class="form-horizontal" method="post">
            <select id="setEstadoCookie" name="setEstadoCookie">
                  
            </select>
            <button type="submit" class="btn btn-primary btn-large pull-right">Acessar</button>
          </form>
        </div>
        
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
    <script type="text/javascript">
      $("select#setEstadoCookie").html('<option disabled>Carregando...</option>');
      $.ajax({
          type: "GET",
          url: "admin/models/carregaEstado.php",
          dataType: "json",
          success: function(data){
            $("select#setEstadoCookie").html('<option value="0">Todos os estados</option><option disabled></option>');
            $.each(data, function(i, estado){
              $("select#setEstadoCookie").append('<option value="'+estado.id+'">'+estado.nome+'</option>');
            });
          }
      });
      </script>
    

  </body>
</html>