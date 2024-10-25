<?php
session_start();
include "include/fonctions.php";

if (isset($_SESSION['panier']) && is_array($_SESSION['panier']) && isset($_SESSION['panier'][1])) {
    $total = $_SESSION['panier'][1];
} else {
    // Vous pouvez définir une valeur par défaut ou gérer l'erreur ici
    $total = 0;
    // Ou afficher un message d'erreur
    echo " ";
}

if(!empty($_POST)){  //3mlt click 3l bouton(search)
    $produits = searchProducts($_POST['search']);
}else{
    $produits = getAllProducts();
}
$commandes=array();
if(isset($_SESSION['panier'])){
    if(count($_SESSION['panier'][3]) > 0){
        $commandes = $_SESSION['panier'][3];
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: rgb(255, 255, 255); color: rgb(15, 14, 14);">
  <!--debut nav-->
  <?php include "include/navigation.php"; ?>
  <!--fin nav-->
  <!--debut card-->
  <div>
    <div class="row col-12 mt-4 p-5" >
         <h1>panier utilisateur</h1>
         <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Quantite</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($commandes as $index => $commande) {
                        echo '
                            <tr>
                                <th scope="row">' . ($index + 1) . '</th>
                                <td>' . $commande[5] . '</td>
                                <td>' . $commande[0] . '</td>
                                <td>' . $commande[1] . '</td>
                                <td><a href="actions/enlever-produit-panier.php?id='.$index.'" class="btn btn-danger">Annuler</a></td>
                            </tr>
                        ';
                    }
                ?>
            </tbody>

                </table>
                <div class="text-end mt-3">
                 <h3>Total : <?php echo $total ; ?>DT</h3>
                 <hr>
                 <a href="actions/valider-panier.php" class="btn btn-success" style="">valider</a>

                </div>
        
    </div>
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
  <!--fin card-->
  <?php
    
    include "include/footer.php";

 ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
