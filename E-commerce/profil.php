<?php

session_start();
include "include/fonctions.php";

if(!isset($_SESSION['nom'])){
    header('location:connexion.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

  <!--debut nav-->
   <?php
   
    include "include/navigation.php";

   ?>
  <!--fin nav-->

  <div class="container">
    <b><h1>Mon compte</h1></b>
    <b><h1>Détail du  compte</h1></b>
    <small> <p>Nom: <?php    echo $_SESSION['nom']." ".$_SESSION['prenom'] ; ?> </p></small>
    <small> <p>Email: <?php  echo $_SESSION['email'] ; ?> </p></small>

    

  </div>
<br><br><br><br>
<br><br>
<br><br><br><br>
<br><br><br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
  <?php
    
    include "include/footer.php";

 ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</html>