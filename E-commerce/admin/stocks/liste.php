<?php
session_start();
include "../../include/fonctions.php";

$stocks = getStocks();
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
    <?php
    include "../template/nav.php";
    ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 ">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">stocks</h1>
                <div>
                    
                </div>
            </div>
            <!--debut de liste-->
            <div>
           
                <?php
                if (isset($_GET['modif']) && $_GET['modif'] == "ok") {
                    print '
                        <div class="alert alert-success">
                          stock  modifiée avec succès
                        </div>
                    ';
                }
                ?>
            
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom de produit</th>
                            <th scope="col">quantite</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($stocks as $stock) {
                            $i++;
                            print '
                                <tr>
                                    <th scope="row">' . $i . '</th>
                                    <td>' . $stock['nom'] . '</td>
                                    <td>' . $stock['quantite'] . '</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#editModal' . $stock['id'] . '" class="btn btn-success">Modifier</a>
                                        
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

    <?php
    foreach ($stocks as $stock) {
    ?>
        <!-- Modal Modifier-->
        <div class="modal fade" id="editModal<?php echo $stock['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier stock de <span class="text-primary"> <?php echo $stock['nom']; ?></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="modifier.php" method="post">
                          <input type="hidden" value="<?php echo $stock['id']; ?>" name="idstock">
                            <input type="hidden" name="id" value="<?php echo $stock['id']; ?>">
                            <div class="form-group">
                                <input type="number" step="1" name="quantite" class="form-control" value="<?php echo $stock['quantite']; ?>" placeholder="stock du produit...">
                            </div>
                          
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
   
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
            return valid;
        });

        function confirmDeletion() {
            return confirm("Êtes-vous sûr de vouloir supprimer cette catégorie ?");
        }
    </script>
</body>
</html>
