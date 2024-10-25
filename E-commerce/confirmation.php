<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .alert {
            max-width: 600px;
            text-align: center;
        }
        footer {
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
        }
        .navbar {
            display: flex;
            align-items: center;
        }
        .navbar .categories {
            margin-right: 20px; /* Ajustez cette valeur pour plus ou moins d'espace */
        }
        .navbar .search {
            flex-grow: 1;
        }
    </style>
</head>
<body>
    <!-- Inclusion du fichier de navigation -->
    <?php include 'include/navigation.php'; ?>

    <div class="container mt-5">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Un e-mail avec le lien de réinitialisation a été envoyé.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <!-- Inclusion du fichier footer -->
    <?php include 'include/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Redirige vers la page de connexion après 5 secondes
        setTimeout(function() {
            window.location.href = 'connexion.php';
        }, 5000); // 5000 millisecondes = 5 secondes
    </script>
</body>
</html>
