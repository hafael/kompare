<?php
  if(isset($_POST['estado'])){

    

  }
?>
<!DOCTYPE html>
<html lang="en">
  <?php include("incs/head.php"); ?>

  <body class="hostsite">
    
    

    <div class="container">
      <span class="pull-center">
        <h1 class="logo-index"><span>Tánaloja! .com.br - Buscar, Comparar, Comprar! Encontre os melhores preços e ofertas em lojas físicas da sua região. Cadastre-se e aguarde o lançamento.</span></h1>
      </span>
      <!-- /span3-->
      <div class="span12">

       <div class="areaSelectEstadoIndex hotsite_newsletter">
          <h3 class="lead">Cadastre-se e aguarde o lançamento</h3>
          <form class="form-horizontal" id="cadastrar">
            <select id="estado" name="estado">
              <option>Selecione o seu estado:</option>
            </select>
            <select id="userType" name="userType">
              <option value="0">Tipo de usuário:</option>
              <option value="1">Consumidor</option>
              <option value="2">Anunciante</option>
            </select>
            <input type="email" id="email" name="email" class="" placeholder="Informe o seu e-mail:">
            <button type="submit" class="btn btn-primary btn-large pull-right">Cadastrar</button>
          </form>
          <div class="alert alert-error" style="display:none">
            <strong>Erro :( </strong> <span></span> <a href="#" class="tentar">Tente novamente</a>
          </div>
          <div class="alert alert-success" style="display:none">
            <strong>Obrigado :) </strong> <span> Avisaremos por e-mail assim que lançarmos o site.</span>
          </div>
        </div>
        
      </div><!-- /span10-->
      

      
      
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
    <script type="text/javascript">
      $("select#estado").html('<option disabled>Carregando...</option>');
      $.ajax({
          type: "GET",
          url: "models/carregaEstado.php",
          dataType: "json",
          success: function(data){
            $("select#estado").html('<option value="0">Selecione o seu estado:</option><option disabled></option>');
            $.each(data, function(i, estado){
              $("select#estado").append('<option value="'+estado.nome+'">'+estado.nome+'</option>');
            });
          }
      });
      $('#cadastrar button').click(function(){
        var error = false;
        if($('#estado option:selected').val() == 0){
          error = true;
        };
        if($('#userType option:selected').val() == 0){
          error = true;
        };
        if($('#email').val() == ''){
          error = true;
        };
        if(error!=true){
          var params = $('#cadastrar').serialize();
          $.ajax({
            type: "POST",
            url: "models/cadastraUsuarioNewsletter.php",
            dataType: "json",
            data: params,
            success: function(data){
              if(data.erro){
                $('#cadastrar').slideUp();
                $('.alert.alert-error span').html(data.erro);
                $('.alert.alert-error').fadeIn();
              }else{
                $('#cadastrar').slideUp();
                $('.alert.alert-success').fadeIn();
              }
            }
          });
        }else{
          $('#cadastrar').slideUp();
          $('.alert.alert-error span').html('Preencha os campos corretamente');
          $('.alert.alert-error').fadeIn();
        }
        
        return false;
      });
      $('.tentar').click(function(){
        $('.alert').hide();
        $('#cadastrar').fadeIn();
        return false;
      });
      </script>
    

  </body>
</html>