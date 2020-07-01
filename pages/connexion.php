<?php 
if(isset($_POST['thelogin'],$_POST['thepwd'])){
  $thelogin = htmlspecialchars(strip_tags(trim($_POST['thelogin'])), ENT_QUOTES);
  $thepwd = htmlspecialchars(strip_tags(trim($_POST['thepwd'])), ENT_QUOTES);
}

if(!empty($thelogin)&&!empty($thepwd)){
  // requête sql
  $sql = "SELECT * FROM user WHERE thelogin='$thelogin' AND thepwd='$thepwd';";
 
  // suppression (mode parano) du risque d'injection sql, ne marche qu'avec mysqli et bug si on a déjà protégé nos variables, devient inutile lors de requête préparée
  //$sql = mysqli_real_escape_string($db, $sql);
 
  //execution de la requête
  $recup_user = mysqli_query($db, $sql) or die(mysqli_error($db)); 
 
  // 1 ligne si on arrive à se connecter, 0 sinon.
  if(mysqli_num_rows($recup_user)==1){
      //création de la connexion à notre session
      //on remplit la session avec le tableau associatif de notre requête
      $_SESSION = mysqli_fetch_assoc($recup_user);
      //On garde notre identifiant de session (PHPSESSID)
      $_SESSION['notresession'] = session_id();
      //On supprime le mot de passe par soucis de sécurité avec unset
      unset($_SESSION['thepwd']);
      //redirection vers notre controleur frontal
      header("Location: ./");
  }else{
      $message = "Login ou mot de passe incorrect(s)";
  }
} else {

  $message = "Login ou mot de passe au format(s) invalide(s)";
};
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
    <title>Login</title>
  </head>
  <body>
  <?php 
  
  require('pages/header.php');
  
  ?>

<div class="container page-section text-center">
    <h1 class="titre-login">login</h1>
    <div class="row justify-content-md-center d-flex justify-content-center">
        <div class="col-md-4 col-10 py-3">
          <form method="post" action="">
            <?php 
                if(isset($message)) echo "<p>$message</p>";
            ?>
            <div class="form-group form-row">
                <input name="thelogin" type="text" class="form-control" id="votreLogin" aria-describedby="loginHelp" placeholder="NOM D'UTILISATEUR" required>
            </div>
            <div class="form-group form-row">
              <input name="thepwd" type="password" class="form-control" id="votrePWD" placeholder="MOT DE PASSE" required>
            </div>
            <button class="btn-perso btn btn-md float-right" type="submit">SE CONNECTER  <i class="fa fa-arrow-circle-right"></i></button>

        </form>
        </div>
    </div>
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