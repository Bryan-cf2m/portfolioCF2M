<?php 
// requête permettant de récupérer les liens dans la base de donnée
$sql="SELECT * FROM liens ORDER BY thetitle ASC;";
$recup_liens = mysqli_query($db,$sql) or die(mysqli_error($db));

// on compte le nombre de lignes de résultat
$count = mysqli_num_rows($recup_liens);

// si on a pas de résultat
// if(empty($count))
// if($count===0)
// mode court, si $count vaut 1 => true on l'inverse = false. si $count vaut 0 => false on l'inverse = true
if(!$count){
    $message = "Pas encore de liens pour le moment";
}else{
    // utilisation de mysqli_fetch_all qui va formater tous les résultats dans un tableau indexé, le paramètre non obligatoire MYSQLI_ASSOC fait que chaque ligne de ce tableau sera un tableau associatif
    $tous_les_liens = mysqli_fetch_all($recup_liens,MYSQLI_ASSOC);
    // var_dump($tous_les_liens);
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
    <title>Liens</title>
  </head>
  <body>
  <?php 
  
  require('pages/header.php');
  
  ?>



<section class="container page-section px-3">
  <h2 class="titre-section text-center pb-5 ">LIENS</h2>
    <div class="row row-cols-1 row-cols-md-3 d-flex justify-content-center">
    <?php if (isset($message)) {
            echo "<p class='text-center'>$message</p>";
    } else {
    
        foreach ($tous_les_liens as $item){
            ?>
            <div class="col mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <h5 class="card-title titre-section"><?=$item['thetitle']?></h5>
                    <p class="card-text"><?php echo html_entity_decode($item['thetext'],ENT_QUOTES);?></p>
                    <a class="btn-perso btn btn-sm float-right" href="<?=$item['theurl']?>" target="_blank" role="button">VOIR</a>
                  </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
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