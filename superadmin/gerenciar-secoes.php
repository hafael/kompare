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
        <h3>Gerenciar Seções</h3>
        <div class="gerenciar-departamentos">
          <a data-toggle="modal" data-target="#criar-departamento" class="btn btn-primary pull-right">+ Criar novo Departamento</a>
          <h4>Departamentos</h4>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#ID</th>
                <th>Nome do Departamento</th>
                <th>Visibilidade</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
          <div id="criar-departamento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 id="myModalLabel">Criar Departamento</h3>
            </div>
            <div class="modal-body">
              <form>
                <label>Nome do Departamento</label>
                <input type="text" id="input-novo-departamento" name="input-novo-departamento" class="span4">
              </form>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
              <button class="btn btn-primary btn-large salvar">Criar</button>
            </div>
          </div>
          <hr>
        </div>
        <div class="gerenciar-categorias">
          <a data-toggle="modal" data-target="#criar-categoria" class="btn btn-primary pull-right">+ Criar nova Categoria</a>
          <h4>Categorias</h4>
          <label for="departamento">
            <span style="display:block">Selecione o Departamento</span>
            <select id="departamento" nome="departamento">
              <option>Selecione</option>
            </select>
          </label>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#ID</th>
                <th>Nome da Categoria</th>
                <th>Visibilidade</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
          <div id="criar-categoria" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 id="myModalLabel">Criar Categoria</h3>
            </div>
            <div class="modal-body">
              <form id="criar-categoria" name="criar-categoria">
                <label for="departamento">
                  <span style="display:block">Selecione o Departamento</span>
                  <select id="departamento" nome="departamento">
                    <option>Selecione</option>
                  </select>
                </label>
                <label>Nome da Categoria</label>
                <input type="text" id="nome_categoria" name="nome_categoria" class="span4">
              </form>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
              <button class="btn btn-primary btn-large salvar">Criar</button>
            </div>
          </div>
          <hr>
        </div>
        <div class="gerenciar-subcategorias">
          <a data-toggle="modal" data-target="#criar-subcategoria" class="btn btn-primary pull-right">+ Criar nova Subcategoria</a>
          <h4>Sub Categorias</h4>
          <label for="departamento">
            <span style="display:block">Selecione o Departamento</span>
            <select id="departamento" nome="departamento">
              <option>Selecione</option>
            </select>
          </label>
          <label for="categoria">
            <span style="display:block">Selecione a Categoria</span>
            <select id="categoria" nome="categoria">
              <option>Selecione</option>
            </select>
          </label>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#ID</th>
                <th>Nome da Sub Categoria</th>
                <th>Visibilidade</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
          <div id="criar-subcategoria" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 id="myModalLabel">Criar Subcategoria</h3>
            </div>
            <div class="modal-body">
              <form id="criar-subcategoria" name="criar-subcategoria">
                <label for="departamento">
                  <span style="display:block">Selecione o Departamento</span>
                  <select id="departamento" nome="departamento">
                    <option>Selecione</option>
                  </select>
                </label>
                <label for="categoria">
                  <span style="display:block">Selecione a Categoria</span>
                  <select id="categoria" nome="categoria">
                    <option>Selecione</option>
                  </select>
                </label>
                <label>Nome da Subcategoria</label>
                <input type="text" id="nome_subcategoria" name="nome_subcategoria" class="span4">
              </form>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
              <button class="btn btn-primary btn-large salvar">Criar</button>
            </div>
          </div>
        </div>

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
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/scripts-gerencia-secoes.js"></script>
    


  </body>
</html>
