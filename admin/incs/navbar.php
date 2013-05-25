<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".subnav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="resumo.php">Kompare - Central de negócios</a>
      <div class="nav-collapse subnav-collapse">
        <ul class="nav">
          <li><a href="resumo.php">Home</a></li>
          <li><a href="criar-anuncio.php">Criar novo anúncio</a></li>
        </ul>
        <ul class="nav pull-right">
          <li id="plano-creditos-nav"><a href="#"><span class="badge badge-important">5</span> créditos</a></li>
          <li class="divider"></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$anunciante['nome_anunciante']?> <b class="caret"></b></a>
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