<?php
session_start();
include "../include/fonctions.php";
$produit = null; 
if(!empty($_POST)){  //3mlt click 3l bouton(search)
  $produits = searchProducts($_POST['search']);
}else{
  $produits = getAllProducts();
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
</head>
<body style="background-color: rgb(255, 255, 255); color: rgb(15, 14, 14);">
  <!-- début nav -->
  <?php include "../include/navigation.php"; ?>
  <!-- fin nav -->

  <!-- début card -->
  <div class="container mt-4"> 
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <!-- Carte produit -->
      <?php if ($produit && !empty($produit['image'])) { ?>
        <div class="col-md-6">
          <div class="card" style="width: 100%; height: 500px; border: 1px solid lightgrey;">
            <div class="row g-0 h-100">
              <div class="col-md-12 d-flex justify-content-center align-items-center" style="height: 100%;">
                <img src="../images/<?php echo htmlspecialchars($produit['image']); ?>" class="img-fluid" alt="Image du produit" style="max-height: 100%; max-width: 100%;">
              </div>
            </div>
          </div>
        </div>
        <!-- Formulaire produit -->
        <div class="col-md-6">
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($produit['nom']); ?></h5>
            <p class="card-text fw-light"><?php echo htmlspecialchars($produit['description']); ?></p>
            <h3 class="fw-light">Prix</h3>
            <p class="card-text"><b class="text-body-secondary"><?php echo htmlspecialchars($produit['prix']); ?> DT</b></p>
            <form action="/e-commerce/actions/commander.php" method="POST">
              <input type="hidden" value="<?php echo htmlspecialchars($produit['id']); ?>" name="produit">
              <input type="number" class="form-control rounded-0 mb-2" name="quantite" step="1" placeholder="Quantité de produit" required>
              <button type="submit" <?php if(isset($_SESSION['etat']) && $_SESSION['etat'] == 0 || !isset($_SESSION['etat'])) { echo "disabled"; } ?> class="btn btn-dark w-100">Commander</button>
            </form>
          </div>
        </div>
      <?php } else { ?>
       
      <?php } ?>
    </div>
  </div>
  
  <!-- Liste des produits -->
  <div id="produits">
    <div class="row col-12 mt-4">
      <?php
        foreach($produits as $produit){
          $id = isset($produit['id']) ? $produit['id'] : 0;
          echo '
          <div class="col-3 mt-3">
            <div class="card" style="width: 18rem;">
              <img style="width: 286px; height: 400px;" src="../images/'.$produit['image'].'" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">'.$produit['nom'].'</h5>
                <p class="card-text">'.$produit['description'].'</p>
                <b><p class="card-text">'.$produit['prix'].' DT</p></b>
                <a href="/e-commerce/product/produits.php?id='.$id.'"  class="w-100 text-decoration-none btn btn-dark text-white">Afficher</a>
              </div>
            </div>
          </div>';
        }
      ?>
    </div>
  </div>

  <!-- fin card -->
  <?php include('../include/footer.php'); ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
