<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav d-md-down-none">
      <li class="nav-item px-3">
        <a class="nav-link" href="#">Tableau de bord</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="#">Gestion caisses</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="#">Opérations bancaires</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="#">Gestion entités</a>
      </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
      <!-- Authentication Links -->
      <li class="nav-item dropdown show">
          <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
              <span class="d-md-down-none">badry <span class="caret"></span></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right show">
              <div class="dropdown-header text-xs-center">
                  <strong>Paramètres</strong>
              </div>
              <a class="dropdown-item" href="/change-password"><i class="fa fa-user"></i> Mon compte</a>
              <a class="dropdown-item" href="/parametres"><i class="fa fa-wrench"></i> Système</a>
              <div class="divider"></div>
              <a class="dropdown-item" href="https://www.medirelay.com/logout" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  <i class="fa fa-power-off"></i>Se déconnecter
              </a>

              <form id="logout-form" action="https://www.medirelay.com/logout" method="POST" style="display: none;">
                  <input type="hidden" name="_token" value="khB6sjFyqgfFNqPuyqF9Vol40tG4apc6eUn9LK08">
              </form>
          </div>
      </li>
    </ul>
    <button class="navbar-toggler aside-menu-toggler" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>

  </header>
