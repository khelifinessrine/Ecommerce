
<?php
//kif nbde deja connecter tsir redirection vers page profil
session_start();
if(isset($_SESSION['nom'])){
    //header('location:profil.php');
}

include "../include/fonctions.php";//..:racine
$user=true;

  if(!empty($_POST)){//click sur le button
    $user=ConnectAdmin($_POST);
    if(is_array($user) && count($user)>0){//utilisateur connectee
      session_start();//temps du l'ouverture du compte
      $_SESSION['id']=$user['id'];
      $_SESSION['email']=$user['email'];
      $_SESSION['nom']=$user['nom'];
      $_SESSION['mp']=$user['mp'];
      header('location:profil.php');//redirection vers la page profil
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.2/sweetalert2.min.css">
</head>

<!--debut nav-->
<?php
    include "../include/navigation.php";
  ?>
 <!--fin nav-->
<body style="background-color: rgb(255, 255, 255); color: rgb(15, 14, 14);">


  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card border-0">
            <div class=" text-center">
            <h3>Espace Admin : Se Connecter</h3>
          </div>
          <div class="card-body">
            <form action="connexion.php" method="post">
              <div class="mb-3">
                <label for="loginEmail" class="form-label">Adresse e-mail</label>
                <input type="email" name="email" class="form-label w-100 border" id="loginEmail" required style=" border-bottom: 1px solid #ced4da; border-radius:2; box-shadow: none;">
              </div>
              <div class="mb-3">
                <label for="loginPassword" class="form-label">Mot de passe</label>
                <input type="password" name="mp" class="form-label w-100 border" id="loginPassword" required style="border-bottom: 1px solid #ced4da; border-radius:2; box-shadow: none;">
              </div>
              <button type="submit" class=" w-100" style="background-color: black; color: white;">Se connecter</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<br>
<br>
<br><br><br>
<br><br>
<br><br>
<br><br>
<br>
</b>
  <?php
    
    include "../include/footer.php";

 ?>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.2/sweetalert2.all.min.js"></script><!-- cdn de sweetalert2 (pour afficher un alert -->
<?php
if (!$user) {
    print "
    <script>
    Swal.fire({
        icon: 'error',
        title: 'erreur',
        text: 'coordonnes non valide',
        timer: '2000'
    });
    </script>
    ";
}
?>

</html>