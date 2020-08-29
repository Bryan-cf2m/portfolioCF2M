<nav class="navbar navbar-light navbar-expand-sm px-0 flex-row flex-nowrap">
                 <div class="navbar-collapse collapsed" id="navbarWEX">
                    <div class="nav flex-sm-column flex-row">
                        <a href="?admin=paneladmin" class="nav-v nav-item nav-link my-1"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;RETOUR</a>
                        <a href="?admin=messadmin" class="nav-v nav-item nav-link my-1 <?php if(isset($_GET['admin'])&&$_GET['admin']=="messadmin") echo "active-v" ?>"><i class="fas fa-envelope"></i>&nbsp;&nbsp;MESSAGES</a>
                        <a href="?admin=galerieadmin" class="nav-v nav-item nav-link my-1 <?php if(isset($_GET['admin'])&&$_GET['admin']=="galerieadmin") echo "active-v" ?>"><i class="fas fa-images"></i>&nbsp;&nbsp;GALERIE</a>
                        <a href="?admin=linksadmin" class="nav-v nav-item nav-link my-1 <?php if(isset($_GET['admin'])&&$_GET['admin']=="linksadmin") echo "active-v" ?>"><i class="fas fa-link"></i>&nbsp;&nbsp;LIENS</a>
                        <a href="?admin=bddusers" class="nav-v nav-item nav-link my-1 <?php if(isset($_GET['admin'])&&$_GET['admin']=="bddusers") echo "active-v" ?>"><i class="fas fa-users"></i>&nbsp;&nbsp;CONTACTS</a>
                    </div>
                </div>
            </nav>
