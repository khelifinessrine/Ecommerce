<?php
// Connexion à la base de données
$connexion = mysqli_connect("localhost", "root", "", "tp_1");

if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête vulnérable à l'injection SQL
    $query = "SELECT * FROM users WHERE username = '' OR '1'='1' -- ' AND password =''";
    $result = mysqli_query($connexion, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "Connexion réussie !";
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<form method="POST" action="">
    Nom d'utilisateur: <input type="text" name="username"><br>
    Mot de passe: <input type="password" name="password"><br>
    <input type="submit" name="submit" value="Connexion">
</form>
