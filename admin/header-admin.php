<nav class="nav-panel-admin navbar sticky-top navbar-right navbar-expand-lg navbar-dark mb-3">

      <a class="navbar-brand text-header-admin" href="?admin=paneladmin">PANEL ADMIN</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="text-header-admin"><?=$_SESSION['therealname']?></a>
          </li>
          <li class="pl-3 text-header-admin">
            <a class="icologout fas fa-sign-out-alt" href="?admin=logout"></a>
          </li>
        </ul>
      </div>
    </nav>