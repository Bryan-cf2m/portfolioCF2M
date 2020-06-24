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
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <title>Contact</title>
  </head>
  <body>
  <?php 
  
  require('pages/header.php');
  
  ?>
<div class="container contact-form text-center page-section px-3">
    <h1>ME CONTACTER</h1>
    <form method="post">
        <div class="row justify-content-md-center d-flex justify-content-center">
            <div class="col-md-6 py-3">
                <div class="form-group">
                    <input type="text" name="txtNom" class="form-control" placeholder="VOTRE NOM *" value="" />
                </div>
                <div class="form-group">
                    <input type="text" name="txtPrenom" class="form-control" placeholder="VOTRE PRENOM *" value="" />
                </div>
                <div class="form-group">
                    <input type="text" name="txtMail" class="form-control" placeholder="VOTRE MAIL *" value="" />
                </div>
                <div class="form-group">
                    <input type="text" name="txtSujet" class="form-control" placeholder="SUJET *" value="" />
                </div>
            </div>
            <div class="col-md-6 py-3">
                <div class="form-group">
                    <textarea name="txtMsg" class="form-control textareaperso" placeholder="VOTRE MESSAGE ... *" rows="9" cols="33"></textarea>
                </div>
                <div class="row">
                    <div class="col-6 d-flex justify-content-start">
                        <a href="#" class="icoperso fa fa-facebook align-self-center"></a>
                        <a href="#" class="icoperso fa fa-twitter align-self-center"></a>
                        <a href="#" class="icoperso fa fa-snapchat-ghost align-self-center"></a>
                        <a href="#" class="icoperso fa fa-instagram align-self-center"></a>
                        
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <button class="btn-perso btn btn-md float-right" type="submit">ENVOYER  <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>





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