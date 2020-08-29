<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>Accueil</title>
  </head>
  <body>
  <?php 
  
  require 'pages/header.php';
  
  ?>

  <section class="container">
      <div class="row pb-5">
          <div class="col align-self-center">
            <a class="bs" href="?p=about">BRYAN SCHUTTERS</a>
            <p>Développeur web</p>
          </div>

          <div class="col align-self-center">
            <img class="imgheader" src="img/Fichier 3.png" alt="">
          </div>
        </div>
        <div class="text-center py-5">
          <i class="fa fa-long-arrow-down" style="font-size:36px;"></i>
        </div>
      </div>
</section>

<section class="container page-section">
  <h2 class="titre-section text-center pb-5">PROJETS RÉCENTS</h2>
  <div class="container projetsR">
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6 mb-5">
        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100 mx-auto">
          <img src="img/rea1.jpg" alt="">
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 mb-5">
        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100 mx-auto">
          <img src="img/rea2.jpg" alt="">
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 mb-5">
        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100 mx-auto">
          <img src="img/rea3.jpg" alt="">
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 mb-5">
        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100 mx-auto">
          <img src="img/rea4.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
  <h2 class="titre-voirplus text-center"><a class="btn btn-perso" href="?p=rea"> VOIR PLUS DE PROJETS </a><i class="fa fa-arrow-circle-right"></i></h2>


</section>











<?php 
  
  require 'pages/footer.php';
  
  ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>