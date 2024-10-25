<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMarket</title>
</head>
<body>
    
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black; color: white;">
    <div class="container-fluid">
      <a class="navbar-brand" href="/e-commerce/index.php">TechMarket</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php  
          
          if (isset($_SESSION['nom'])) {

            // Lien vers le profil
            print '
                <a class="nav-link active" aria-current="page" href="/e-commerce/profil.php">Profil</a>

            ';

            // Lien vers le panier s'il contient des articles
            if (isset($_SESSION['panier'][3]) && is_array($_SESSION['panier'][3])) {
              print '
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/e-commerce/panier.php">Panier('.count($_SESSION['panier'][3]).')</a>
              </li>
              ';
            } else {
              // Lien vers le panier vide
              print '
              <li class="nav-item ml-5" style="margin-right: 30px; margin-left: 30px;">
                <a class="nav-link active" aria-current="page" href="/e-commerce/panier.php">Panier</a>
              </li>
              ';
            }

          } else {
            // Lien vers la page de connexion si l'utilisateur n'est pas connecté
            print '
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/e-commerce/connexion.php">Connexion</a>
            </li>
            ';
          }
          ?>

      
          <div class="container-fluid">
          <a class="nav-link active" aria-current="page" href="/e-commerce/product/produits.php">Produits</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
            </ul>
          </li>
        </ul>

        <!-- Formulaire de recherche -->
        <form class="d-flex" role="search" action="/e-commerce/product/produits.php" method="POST">
          <input class="form-control border-0 rounded-0" type="search" placeholder="Search" aria-label="Search" name="search">
          <button class="btn text-white" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
          </button>
        </form>

        <!-- Déconnexion si l'utilisateur est connecté -->
        <?php
        if (isset($_SESSION['nom'])) {
          print '<a href="/e-commerce/deconnection.php" style="color:grey; text-decoration:none;"> Déconnecter</a>';
        }
        ?>
      </div>
    </div>
  </nav>
</body>
</html>
