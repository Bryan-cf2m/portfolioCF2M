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
    <title>404</title>
  </head>
  <body>
  <?php 
  
  require('admin/header-admin.php');
  
  ?>
<section class="container page-section px-3">
  <div class="row mb-5">
    <div class="col-md-12">
      <img src="img/404.png" class="img-fluid mx-auto d-block" alt="">
    </div>
  </div>
  <div class="row align-self-center ">
    <div class="col">
      <h2 class="text-center">OUPS !</h2>
      <p class="text-center">La page que vous recherchez n'existe pas.</p>
      <div class="col text-center">
        <a class="btn-perso btn mx-auto" href="?admin=paneladmin" role="button">RETOUR À L'ACCUEIL</a>
      </div>
    </div>
  </div>
</section>

<?php 
  
  require('pages/footer-fixed.php');
  
  ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>