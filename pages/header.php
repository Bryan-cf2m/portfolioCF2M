<nav class="nav-public navbar navbar-right navbar-expand-lg navbar-dark">

      <a class="navbar-brand logo" href="#">BRYAN.</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php if(isset($_GET['p'])&&$_GET['p']=="accueil") echo "active" ?>">
            <a class="nav-link" href="?p=accueil">ACCUEIL <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?php if(isset($_GET['p'])&&$_GET['p']=="rea") echo "active" ?>">
            <a class="nav-link" href="?p=rea">GALERIE</a>
          </li>
          <li class="nav-item <?php if(isset($_GET['p'])&&$_GET['p']=="tuto") echo "active" ?>">
            <a class="nav-link" href="?p=tuto">TUTOS</a>
          </li>
          <li class="nav-item <?php if(isset($_GET['p'])&&$_GET['p']=="link") echo "active" ?>">
            <a class="nav-link" href="?p=link">LIENS</a>
          </li>
          <li class="nav-item <?php if(isset($_GET['p'])&&$_GET['p']=="contact") echo "active" ?>">
            <a class="nav-link" href="?p=contact">CONTACT</a>
          </li>
          <li class="nav-item <?php if(isset($_GET['p'])&&$_GET['p']=="login") echo "active" ?>">
            <a class="nav-link" href="?p=login"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
          </li>
        </ul>
      </div>
    </nav>
