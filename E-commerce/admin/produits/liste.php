<?php
session_start();
include "../../include/fonctions.php";
$produits = getALLproducts();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>ADMIN : Profil</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="../../index.php">TechMarket</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="../../deconnection.php">Déconnecter</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <?php include "../template/nav.php"; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Liste des produits</h1>
                <div>
                    <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
                </div>
            </div>
            <!-- début de liste -->
            <div>
            <?php
                if (isset($_GET['ajout']) && $_GET['ajout'] == "ok") {
                    print '
                        <div class="alert alert-success">
                          produit ajouté avec succès
                        </div>
                    ';
                }
                if (isset($_GET['delete']) && $_GET['delete'] == "ok") {
                    print '
                        <div class="alert alert-success">
                          produit supprimé avec succès
                        </div>
                    ';
                }
                if (isset($_GET['modif']) && $_GET['modif'] == "ok") {
                    print '
                        <div class="alert alert-success">
                          produit modifié avec succès
                        </div>
                    ';
                }
                if (isset($_GET['erreur']) && $_GET['erreur'] == "duplicate") {
                    print '
                        <div class="alert alert-danger">
                            ce nom de produit existe déjà
                        </div>
                    ';
                }
                
            ?>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th scope="col">prix</th>
                            <th scope="col">image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($produits as $index => $produit) {
                            echo '
                                <tr>
                                    <th scope="row">' . ($index + 1) . '</th>
                                    <td>' . $produit['nom'] . '</td>
                                    <td>' . $produit['description'] . '</td>
                                    <td>' . $produit['prix'] . '</td>
                                    <td>' . $produit['image'] . '</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#editModal' . $produit['id'] . '" class="btn btn-success">Modifier</a>
                                        <a href="#" onclick="confirmDelete(\'' . $produit['id'] . '\'); return false;" class="btn btn-danger">Supprimer</a>
                                    </td>
                                </tr>
                            ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Modal Ajout -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajout produit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../produits/ajouter.php" method="post" id="addform" enctype="multipart/form-data">
                        <div class="form-group" id="blocknom">
                            <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom de produit ...">
                        </div>
                        <div class="form-group" id="blockdescription">
                            <textarea name="description" id="description" class="form-control" placeholder="Description de produit ..."></textarea>
                        </div>
                        <div class="form-group" id="blockprix">
                            <input type="number" id="prix" step="0.01" name="prix" class="form-control" placeholder="Prix de produit ...">
                        </div>
                        <div class="form-group" id="blockimage">
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                          <div class="form-group" id="blockquantite">
                            <input type="number" id="quantite" step="1" name="quantite" class="form-control" placeholder="quantite de produit ...">
                          </div>
                        </div>
                        <input type="hidden" name="createur" value="<?php echo $_SESSION['id']; ?>" >
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($produits as $produit) { ?>
        <!-- Modal Modifier -->
        <div class="modal fade" id="editModal<?php echo $produit['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $produit['id']; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel<?php echo $produit['id']; ?>">Modifier Produit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../produits/modification.php" method="post">
                            <input type="hidden" value="<?php echo $produit['id']; ?>" name="idproduit">
                            <div class="form-group">
                                <input type="text" name="nom" class="form-control" value="<?php echo $produit['nom']; ?>" placeholder="Nom de produit ...">
                            </div>
                            <div class="form-group">
                                <textarea name="description" class="form-control" placeholder="Description de produit ..."><?php echo $produit['description']; ?></textarea>
                            </div>
                            <div class="form-group">
                            <input type="number"  step="0.01" name="prix" class="form-control" placeholder="Prix de produit ...">
                        </div>
                        <div class="form-group" >
                            <input type="file" name="image" class="form-control">
                        </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../js/jquery.slim.min.js"><\/script>')</script>
    <script src="../../js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="../../js/dashboard.js"></script>

    
    <script>
            $('#addform').submit(function(){
            var valid = true;
            if($('#nom').val() == ""){
                $('#blocknom').append('<p class="text-danger">Il faut remplir le champ nom...</p>');
                valid = false;
            }
            if($('#description').val() == ""){
                $('#blockdescription').append('<p class="text-danger">Il faut remplir le champ description...</p>');
                valid = false;
            }
            if($('#prix').val() == ""){
                $('#blockprix').append('<p class="text-danger">Il faut remplir le champ prix...</p>');
                valid = false;
            }
            if($('#image').val() == ""){
                $('#blockimage').append('<p class="text-danger">Il faut selectioner une image...</p>');
                valid = false;
            }
            if($('#quantite').val() == ""){
                $('#blockquantite').append('<p class="text-danger">Il faut remplir le champ quantite...</p>');
                valid = false;
            }

            return valid;
        });

        function confirmDelete(id) {
            var confirmAction = confirm("Êtes-vous sûr de vouloir supprimer ce produit ?");
            if (confirmAction) {
                window.location.href = "../produits/suppression.php?idproduit=" + id;
            }
        }
    </script>

</body>
</html>
