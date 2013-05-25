<?php 
if(isset($_GET["erroLogin"])){ 
  $erroLogin = "<p>Login ou senha inválidos</p>"; 
} 
?>

<!DOCTYPE html>
<html lang="en">
  <?php include("incs/head.php"); ?>

  <body>
    <div class="container">
        <div class="span5 well areaLogin">
            <form class="form-horizontal" action="processaLogin.php" method="post">
              <legend>Area do Super Admin</legend>
              <?=$erroLogin?>
              <div class="control-group">
                <label class="control-label" for="username">Usuário</label>
                <div class="controls">
                  <input type="text" id="username" name="username" >
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputPassword">Senha</label>
                <div class="controls">
                  <input type="password" id="user_pass" name="user_pass" >
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <button type="submit" class="btn btn-primary">Logar</button>
                </div>
              </div>
            </form>
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
