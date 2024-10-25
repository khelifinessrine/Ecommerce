
<?php

//kif nbde deja connecter tsir redirection vers page profil
session_start();
if(isset($_SESSION['nom'])){
    header('location:profil.php');
}

include "include/fonctions.php";
  $showregistreAlert=0;
  if(!empty($_POST)){//click sur le button
    if(Adduser($_POST)){
      $showregistreAlert=1;
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TechMarket</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.2/sweetalert2.min.css"><!-- cdn de sweetalert2 (pour afficher un alert -->
</head>


<body style="background-color: rgb(255, 255, 255); color: rgb(15, 14, 14);">
  <!--debut nav-->
  <?php
    include "include/navigation.php";
  ?>
  <!--fin nav-->


  <div class="container mt-5 ">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card border-0">
          <div class=" text-center">
            <h3>Créer un Compte</h3>
          </div>
          <div class="card-body">
            <form action="registre.php" method="post" >
              <div class="mb-3">
                <label for="registerName" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-label w-100 border" id="registerName" required>
              </div>
              <div class="mb-3">
                <label for="registerPrenom" class="form-label">Prenom</label>
                <input type="text" name="prenom" class="form-label w-100 border" id="registerName" required>
              </div>
              <div class="mb-3">
                <label for="registerEmail" class="form-label">Adresse e-mail</label>
                <input type="email" name="email" class="form-label w-100 border" id="registerEmail" required>
              </div>
              <div class="mb-3">
                <label for="registerPassword"  class="form-label">Mot de passe</label>
                <input type="password" name="mp" class="form-label w-100 border" id="registerPassword" required>
              </div>
              <button type="submit" class=" w-100" style="background-color: black; color: white;">Créer</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br><br><br><br>
<br><br>
<br><br><br><br>
<br><br><br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>

  <!--footer -->
  <div>
  <?php
    
    include "include/footer.php";

 ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.2/sweetalert2.all.min.js"></script><!-- cdn de sweetalert2 (pour afficher un alert -->
<?php
if ($showregistreAlert == 1) {
    print "
    <script>
    Swal.fire({
        icon: 'success',
        title: 'ok',
        text: 'creation de compte avec succes',
        timer: '2000'
    });
    </script>
    ";
}
?>


</html>