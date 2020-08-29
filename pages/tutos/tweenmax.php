<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/csstuto.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/nord.min.css">  
     <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>  
     <title>GSAP - Javascript</title>
  </head>
  <body>
  <?php 
  
  require('pages/header.php');
  
  ?>

<section class="container-tuto container page-section px-3">
  <h2 class="titre-section text-center pb-5">GSAP</h2>
  <p>GSAP une bibliothèque d'animation pour HTML5. Cela permet d'animer tout type d'élément via le Javascript en utilisant: les SVG, les propriétés CSS, canevas, etc. Dans ce tutoriel, nous allons principalement voir, l'animation à l'aide des propriétés CSS.</p>
  <br>
  <h3>ETAPE 1:</h3>
  <p>Créer la liaison avec le CSS, la bibliothèque GSAP et le javascript. Pour ce faire il suffis de se rendre sur la documentation de GSAP et d'insérer le cdn de "GSAP" dans le <span class="colored">&lt;head&gt;</span> de notre index. Pour la liaison du CSS il suffis de faire une balise link avec le chemin d'accès jusqu'au fichier CSS. Et pour le javascript la balise se met à la fin du <span class="colored">&lt;body&gt;</span>.</p>
  <pre class="pre">
    <code>
    &lt;html&gt;
    &lt;head&gt;
        &lt;link rel="stylesheet" type= "text/css" href="css/css.css" /&gt;
        &lt;script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"&gt;&lt;/script&gt;
        &lt;meta charset="utf-8"&gt;
        &lt;title>Tuto GSAP&gt;&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;

        Contenu du site.

    &lt;script type="text/javascript" src="js/monJs.js"&gt;&lt;/script&gt;
    &lt;/body&gt;
    &lt;/html&gt;
  </code>
</pre>

<h3>ETAPE 2:</h3>
<p>Une fois les liaison créée, GSAP est prêt à l'utilisation.<br>Pour l'exemple, nous devrons déplacer un carré vert de 200px sur la droite ainsi que lui changer sa couleur en rouge lorsque l'on clique sur celui-ci.</p>


<div class="carrés p-3 my-4">

  <div class="c1" id="c1"></div>

</div>
  
<p>Dans l'exemple, le carré représente votre élément sur lequel vous voulez appliquer l'animation. <br> Afin que les modifications agissent au "click" nous allons créer une fonction "<span class="colored">onclick</span>".</p>
<p>Il est important de donner un id à l'élément afin de pouvoir l'appeler dans le javascript.<br>"<span class="colored">c1</span>" représente l'id et "<span class="colored">onclick</span>" représente l'action à faire pour que la fonction soir appliquée.</p>
<pre class="pre ">
  <code>
    c1.onclick = function (){ }
  </code>
</pre>
  
<h3>ETAPE 3:</h3>
<p>Une fois la fonction créée c'est là qu'interviens la bibliothèque GSAP.<br>L'écriture de GSAP se fait ainsi:</p>
<pre class="pre">
  <code>
    gsap.to(id ou ".class", {propriete: valeur/"valeur", duration: temps de l'action});
  </code>
</pre>
<p>Et donc dans notre cas:</p>
<pre class="pre">
<code>
    gsap.to(".c2", {x: "200px", backgroundColor:"#FF2250", duration: 1});
    //x = un raccourcis pour translateX().
    //backgroundColor fait appel à la propiété CSS "background-color"
    
  </code>
</pre>

<h3>TEST:</h3>

<div class="carrés p-3 my-4">
  
  <div class="c2" id="c2"></div>

  <button class="btn btn-dark m-3" id="restart">RESTART</button>

</div>

<h3>BONUS :</h3>
<p>Comme vous pouvez le constater, l'animation est linéaire et donc un peu fade. Afin que l'animation soit plus fluide, il est possible d'ajouter la propiété "<span class="colored">ease</span>". Les différentes possibilités sont disponible et testables <a class="colored a" href="https://greensock.com/docs/v3/Eases" target="_blank" rel="noopener noreferrer">ICI</a>.</p>
<p>L'écriture de la fonction reste la même mais on ajoute le ease:</p>
<pre class="pre">
  <code>
    gsap.to(".c2", {x: "200px", backgroundColor:"#FF2250", duration: 1, ease:"power4.inOut"});
    //ease = appel de la fonction ease 
    //power4 = nom de la courbe
    //inOut = fondu d'entrée et de sortie
  </code>
</pre>

<h3>TEST EASE:</h3>
<p>On test sur une plus longue distance afin pouvoir prendre conscience de l'effet.</p>
<div class="carrés p-3 my-4">
  
  <div class="c3" id="c3"></div>

  <button class="btn btn-dark m-3" id="restart2">RESTART</button>

</div>



  <div class="col text-center">
    <a class="btn-perso btn" href="?p=tuto" role="button">RETOUR</a>
  </div>
</section>



<?php 
  
  require('pages/footer-fixed.php');
  
  ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.1.2/build/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script type="text/javascript" src="js/jstuto.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>