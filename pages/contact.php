<?php 

//Ajout de liens - Si le formulaire est envoyé
if(isset($_POST['thename'],$_POST['theprenom'],$_POST['themail'],$_POST['themessage'])){
    // si erreur vaudra "" => empty
    $thename = htmlspecialchars(strip_tags(trim($_POST['thename'])),ENT_QUOTES);
    $theprenom = htmlspecialchars(strip_tags(trim($_POST['theprenom'])),ENT_QUOTES);
    // si erreur vaudra false => !$theurl => $theurl!=true => $theurl==false => $theurl===false
    $themail = filter_var($_POST['themail'],FILTER_VALIDATE_EMAIL);
    // si erreur vaudra "" => empty
    $themessage = htmlspecialchars(strip_tags(trim($_POST['themessage'])),ENT_QUOTES);

    //Si on a une erreur de type
    if(empty($thename)||empty($theprenom)||empty($themessage)||$themail===false){
      $erreur = "Les données sont incomplètes ou incorrectes.";

    }else{

      //sql
      $sql = "INSERT INTO contacts (thename, theprenom, themail, themessage) VALUES ('$thename','$theprenom','$themail','$themessage');";
      $sql2 = "INSERT INTO bddcontacts (thename, theprenom, themail) VALUES ('$thename','$theprenom','$themail');";
      $insert = mysqli_query($db, $sql) or die(mysqli_error($db));
      $insert2 = mysqli_query($db, $sql2) or die(mysqli_error($db));
      header("Location: ?p=mess-envoye");
  }
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
    <?php if(isset($erreur)){ echo "<p>$erreur</p>";} ?>
    <form method="post">
        <div class="row justify-content-md-center d-flex justify-content-center">
            <div class="col-md-6 py-3">
                <div class="form-group">
                    <input type="text" name="thename" id="thename" class="form-control" placeholder="VOTRE NOM *" required/>
                </div>
                <div class="form-group">
                    <input type="text" name="theprenom" id="theprenom" class="form-control" placeholder="VOTRE PRENOM *" required/>
                </div>
                <div class="form-group">
                    <input type="text" name="themail" id="themail" class="form-control" placeholder="VOTRE MAIL *" required/>
                </div>
            </div>
            <div class="col-md-6 py-3">
                <div class="form-group">
                    <textarea name="themessage" id="themessage" class="form-control textareaperso" placeholder="VOTRE MESSAGE ... *" rows="8" cols="33" required></textarea>
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