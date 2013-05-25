<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".subnav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="listar-agenda.php">Banda Identidade</a>
      <div class="nav-collapse subnav-collapse">
        <ul class="nav">
          <li><a href="home.php">Inserir evento</a></li>
          <li><a href="listar-agenda.php">Listar eventos</a></li>
        </ul>
        <ul class="nav pull-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$_SESSION["username"]?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:void(0)">Alterar senha</a></li>
              <li class="divider"></li>
              <li><a href="logoff.php">Sair</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.nav-collapse -->
    </div>
  </div><!-- /navbar-inner -->
</div>