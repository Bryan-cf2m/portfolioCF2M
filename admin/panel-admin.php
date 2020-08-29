<?php 
// protection de l'accès dans le cas ou la session n'existe pas ou n'est pas/plus valide
if(!isset($_SESSION['notresession'])||$_SESSION['notresession']!==session_id()) {
    header("Location: disconnect.php");
    exit();
}

?> 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/b4c357390b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <title>Panel ADMIN</title>
  </head>
  <body>
  <?php 
  
  require 'admin/header-admin.php';
  
  ?>

<div class="container pt-4">
  <div class="row text-center">
    <div class="col-md-4 col-sm-12 pb-4">
        <div class="cat-panel-admin d-flex align-items-center justify-content-center" onclick="location.href='?admin=messadmin';" style="cursor:pointer;">
                <div class="flex-column align-self-center" href="#">
                    <i class="ico-pan-ad fas fa-envelope"></i>
                    <p class="text-pan-ad">MESSAGES</p>
                </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 pb-4">
        <div class="cat-panel-admin d-flex align-items-center justify-content-center" onclick="location.href='?admin=galerieadmin';" style="cursor:pointer;">
            <div class="flex-column align-self-center">
                <i class="ico-pan-ad fas fa-images"></i>
                <p class="text-pan-ad">GALERIE</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 pb-4">
        <div class="cat-panel-admin d-flex align-items-center justify-content-center" onclick="location.href='?admin=linksadmin';" style="cursor:pointer;">
            <div class="flex-column align-self-center">
                <i class="ico-pan-ad fas fa-link"></i>
                <p class="text-pan-ad">LIENS</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 pb-4">
        <div class="cat-panel-admin d-flex align-items-center justify-content-center" onclick="location.href='?admin=bddusers';" style="cursor:pointer;">
            <div class="flex-column align-self-center">
                <i class="ico-pan-ad fas fa-user"></i>
                <p class="text-pan-ad">UTILISATEURS</p>
            </div>
        </div>
    </div>
  </div>
</div>





<?php 
  
  require 'pages/footer-fixed.php';
  
  ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>