<?php
// protection de l'accès dans le cas ou la session n'existe pas ou n'est pas/plus valide
if (!isset($_SESSION['notresession']) || $_SESSION['notresession'] !== session_id()) {
    header("Location: disconnect.php");
    exit();
}

$sql = "SELECT * FROM bddcontacts ORDER BY idbddcontacts ASC;";
$recup_users = mysqli_query($db, $sql) or die(mysqli_error($db));

// On compte le nombre de lignes obtenues
$count = mysqli_num_rows($recup_users);

if (!$count) {
    $message = "Pas encore de contacts pour le moment.";
} else {
    //Utilisation de mysqli_fetch_all qui va formater tous les résultats dans un tableau indexé, le paramètre non obligatoire MYSQLI_ASSOC fait que chaque ligne de résultat de ce tableau sera un tableau associatif
    $tous_les_users = mysqli_fetch_all($recup_users, MYSQLI_ASSOC);
}

if (isset($_POST['lecontact'])) {
    $lecontact = $_POST['lecontact'];
    $sql = "DELETE FROM bddcontacts WHERE idbddcontacts=$lecontact";
    // suppression
    mysqli_query($db, $sql) or die(mysqli_error($db));
    // redirection - ajout d'une variable GET['message'] pour la confirmation, ici de la suppression (&message=delete)
    header("Location: ?admin=bddusers");
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                <?php

                require 'admin/nav-verticale.php';

                ?>
            </div>
            <div class="col py-2">
                <div class="col py-2">
                    <?php if (isset($message)) {
                        echo "<p>$message</p>";
                    } else {

                    ?>
                        <div class="row m-2">
                            <div class="col-sm-12">
                                <table class="table table-striped table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">NOM</th>
                                            <th scope="col">PRÉNOM</th>
                                            <th scope="col">MAIL</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        for ($i = 0; $i < sizeof($tous_les_users); $i++) {

                                        ?>
                                            <tr>
                                                <th scope="row"><?= $tous_les_users[$i]['idbddcontacts'] ?></th>
                                                <td><?= $tous_les_users[$i]['thename'] ?></td>
                                                <td><?= $tous_les_users[$i]['theprenom'] ?></td>
                                                <td><?= $tous_les_users[$i]['themail'] ?></td>
                                                <td><a class="btn btn-delete ml-2" data-toggle="modal" data-target="#deleteModalUsers<?= $i ?>" data-id="<?= $tous_les_users[$i]['idbddcontacts'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                            <!-- Modal Delete -->
                                            <div class="modal fade" id="deleteModalUsers<?= $i ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Suppression du message</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post">
                                                                <div class="alert alert-delete" role="alert"><i class="fas fa-exclamation-triangle"></i> Vous êtes sur le points de supprimer définitivement ce message !</div>
                                                                <input type="hidden" name="lecontact" id="lecontact" value="<?= $tous_les_users[$i]['idbddcontacts'] ?>">
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
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