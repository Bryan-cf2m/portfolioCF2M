<?php
// protection de l'accès dans le cas ou la session n'existe pas ou n'est pas/plus valide
if (!isset($_SESSION['notresession']) || $_SESSION['notresession'] !== session_id()) {
  header("Location: disconnect.php");
  exit();
}

// requête qui recup les liens dans la bdd
$sql = "SELECT * FROM liens ORDER BY thetitle ASC;";
$recup_liens = mysqli_query($db, $sql) or die(mysqli_error($db));

// On compte le nombre de lignes obtenues
$count = mysqli_num_rows($recup_liens);

// Si jamais on a pas de résultats
// if(empty($count))
// if($count===0)
// mode paillaisse -> if(!$count)

if (!$count) {
  $message = "Pas encore de liens pour le moment";
} else {
  //Utilisation de mysqli_fetch_all qui va formater tous les résultats dans un tableau indexé, le paramètre non obligatoire MYSQLI_ASSOC fait que chaque ligne de résultat de ce tableau sera un tableau associatif
  $tous_les_liens = mysqli_fetch_all($recup_liens, MYSQLI_ASSOC);
}

//Ajout de liens - Si le formulaire est envoyé
if (isset($_POST['thetitle'], $_POST['theurl'], $_POST['thetext'])) {
  // si erreur vaudra "" => empty
  $thetitle = htmlspecialchars(strip_tags(trim($_POST['thetitle'])), ENT_QUOTES);
  // si erreur vaudra false => !$theurl => $theurl!=true => $theurl==false => $theurl===false
  $theurl = filter_var($_POST['theurl'], FILTER_VALIDATE_URL);
  // si erreur vaudra "" => empty
  $thetext = htmlspecialchars(strip_tags(trim($_POST['thetext']), '<p><a><img><br><strong><b><i><em>'), ENT_QUOTES);

  //Si on a une erreur de type
  if (empty($thetitle) || empty($thetext) || $theurl === false) {
    $erreur = "Les données sont incorrectes.";
  } else {

    //sql
    $sql = "INSERT INTO liens (thetitle, theurl, thetext) VALUES ('$thetitle','$theurl','$thetext');";
    $insert = mysqli_query($db, $sql) or die(mysqli_error($db));
    header("Location: ?admin=linksadmin");
  }
}
//Formulaire Modal Edit
if (isset($_POST['idliens'], $_POST['thetitleEDIT'], $_POST['theurlEDIT'], $_POST['thetextEDIT'])) {
  // on traîte idliens en le transformant en entier si faux 0 => empty
  $idliens = (int) $_POST['idliens'];
  // si erreur vaudra "" => empty
  $thetitle = htmlspecialchars(strip_tags(trim($_POST['thetitleEDIT'])), ENT_QUOTES);
  // si erreur vaudra false => !$theurl => $theurl!=true => $theurl==false => $theurl===false
  $theurl = filter_var($_POST['theurlEDIT'], FILTER_VALIDATE_URL);
  // si erreur vaudra "" => empty
  $thetext = htmlspecialchars(strip_tags(trim($_POST['thetextEDIT']), '<p><a><img><br><strong><b><i><em>'), ENT_QUOTES);

  // si on a une erreur de type (ajout de la vérification de $idliens)
  if (!empty($thetitle) && empty($thetext) && $theurl === false) {

    // sql - Devient un UPDATE ! NE PAS OUBLIER LE WHERE sinon on risque de modifier tous les liens
    $sql = "UPDATE liens SET thetitle='$thetitle' WHERE idliens=$idliens;";
    $insert = mysqli_query($db, $sql) or die(mysqli_error($db));
    // redirection
    header("Location: ?admin=linksadmin");
  } elseif (empty($thetitle) && !empty($thetext) && $theurl === false) {

    // sql - Devient un UPDATE ! NE PAS OUBLIER LE WHERE sinon on risque de modifier tous les liens
    $sql = "UPDATE liens SET thetext='$thetext' WHERE idliens=$idliens;";
    $insert = mysqli_query($db, $sql) or die(mysqli_error($db));
    // redirection
    header("Location: ?admin=linksadmin");
  } elseif (empty($thetitle) && empty($thetext) && !$theurl === false) {

    // sql - Devient un UPDATE ! NE PAS OUBLIER LE WHERE sinon on risque de modifier tous les liens
    $sql = "UPDATE liens SET theurl='$theurl' WHERE idliens=$idliens;";
    $insert = mysqli_query($db, $sql) or die(mysqli_error($db));
    // redirection
    header("Location: ?admin=linksadmin");
  } elseif (!empty($thetitle) && !empty($thetext) && !$theurl === false) {
    // sql - Devient un UPDATE ! NE PAS OUBLIER LE WHERE sinon on risque de modifier tous les liens
    $sql = "UPDATE liens SET thetitle='$thetitle',thetext='$thetext',theurl='$theurl' WHERE idliens=$idliens;";
    $insert = mysqli_query($db, $sql) or die(mysqli_error($db));
    // redirection
    header("Location: ?admin=linksadmin");
  }
}

if (isset($_POST['leliens'])) {
  $lelien = $_POST['leliens'];
  $sql = "DELETE FROM liens WHERE idliens=$lelien";
  // suppression
  mysqli_query($db, $sql) or die(mysqli_error($db));
  // redirection - ajout d'une variable GET['message'] pour la confirmation, ici de la suppression (&message=delete)
  header("Location: ?admin=linksadmin");
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
  <title>Liens ADMIN</title>
</head>

<body>
  <?php

  require 'admin/header-admin.php';

  ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <?php

        require 'admin/nav-verticale.php';

        ?>
      </div>
      <div class="col py-2">
        <div class="row-add-link row p-3 m-1">
            <div class="col-sm-2 d-flex align-items-center">
          <h4 class="align-selft-center">Ajouter un lien</h4>
        </div>
        <div class="col-sm-8 d-flex justify-content-center">
          <form method="post" action="" class="form-inline">
            <label class="ml-2" for="thetitle">TITRE:</label>
            <input class="ml-2" type="textadmin" name="thetitle" id="thetitle" required>
            <label class="ml-2" for="theurl">URL:</label>
            <input class="ml-2" type="textadmin" name="theurl" id="theurl" required>
            <label class="ml-2" for="thetext">DESCRIPTION:</label>
            <textarea class="ml-2 textareaadmin" type="textarea" name="thetext" id="thetext" required></textarea>
            <button class="btn btn-success ml-5 align-self-center" type="submit"><i class="fas fa-check"></i></button>
          </form>
        </div>
        <div class="col-sm-2 d-flex justify-content-center">
          <?php if (isset($erreur)) {
            echo "<p class='pt-3'>$erreur</p>";
          } ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <?php if (isset($message)) {
            echo "<p>$message</p>";
          } else {
            //Si $count est plus grand que 1, rajouter s à "liens"

          ?>

            <h3 class="link-count p-3 m-1">VOUS AVEZ <span class="colored"><?= $count ?></span> LIEN<?php if ($count > 1) echo "S" ?></h3>

            <?php

            for ($i = 0; $i < sizeof($tous_les_liens); $i++) {

            ?>

              <div class="row-link row d-flex align-items-center justify-content-center m-1 mt-2">
                <div class="col-sm-10 pt-3">
                  <h4><span class="colored"><?= $tous_les_liens[$i]['thetitle'] ?></span></h4>
                  <p><a class="a" href="<?= $tous_les_liens[$i]['theurl'] ?>" target="_blank" title="<?= $tous_les_liens[$i]['thetitle'] ?>"><?= $tous_les_liens[$i]['theurl'] ?> &nbsp;<i class="fas fa-external-link-alt"></i></a></p>
                  <p><?= $tous_les_liens[$i]['thetext'] ?></p>
                </div>
                <div class="col-sm-2">
                  <div class="row d-flex align-items-center justify-content-end my-4 mx-2">
                    <a class="btn btn-warning ml-2 float-right" data-toggle="modal" data-target="#modifModal<?= $i ?>" data-id="<?= $tous_les_liens[$i]['idliens'] ?>"><i class="fas fa-pen"></i></a>
                  </div>
                  <div class="row d-flex align-items-center justify-content-end my-4 mx-2">
                    <a class="btn btn-delete ml-2 float-right" data-toggle="modal" data-target="#deleteModal<?= $i ?>" data-id="<?= $tous_les_liens[$i]['idliens'] ?>"><i class="fas fa-trash-alt"></i></a>
                  </div>
                </div>
              </div>
              
              <!-- Modal Edit -->
              <div class="modal fade" id="modifModal<?= $i ?>" tabindex="-1" aria-labelledby="modifModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modifModalLabel">Modifications des liens</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <form method="post">
                        <div class="form-group">
                          <label for="thetitleEDIT">NOUVEAU TITRE:</label>
                          <input type="textadmin" class="form-control" name="thetitleEDIT" id="thetitleEDIT" value="<?= $tous_les_liens[$i]['thetitle'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="theurlEDIT">NOUVELLE URL:</label>
                          <input type="urladmin" class="form-control" name="theurlEDIT" id="theurlEDIT" value="<?= $tous_les_liens[$i]['theurl'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="thetextEDIT">NOUVELLE DESCRIPTION:</label>
                          <input type="textadmin" class="form-control" name="thetextEDIT" id="thetextEDIT" value="<?= $tous_les_liens[$i]['thetext'] ?>">
                        </div>
                        <input type="hidden" name="idliens" value="<?= $tous_les_liens[$i]['idliens'] ?>">
                        <button class="btn btn-success ml-2 float-right" type="submit"><i class="fas fa-check"></i></button>
                        <button type="button" class="btn btn-delete ml-2 float-right" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal Delete -->
              <div class="modal fade" id="deleteModal<?= $i ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="deleteModalLabel">Suppression des liens</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post">
                        <div class="alert alert-delete" role="alert"><i class="fas fa-exclamation-triangle"></i> Vous êtes sur le points de supprimer définitivement ce lien !</div>
                        <input type="hidden" name="leliens" id="leliens" value="<?= $tous_les_liens[$i]['idliens'] ?>">
                        <button class="btn btn-dark btn-delete ml-2 float-right" type="submit"><i class="fas fa-check"></i> OUI</button>
                        <button type="button" class="btn btn-dark ml-2 float-right" data-dismiss="modal"><i class="fas fa-times-circle"></i> NON</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            }
          }

          ?>
        </div>
      </div>
    </div>
  </div>
  </div>
<br>
<br>
<br>

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