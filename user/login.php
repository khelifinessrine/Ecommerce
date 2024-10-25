<?php
// Connexion à la base de données
$connexion = mysqli_connect("localhost", "root", "", "tp_1");

if (isset($_POST['submit'])) {
    // Préparation de la requête sécurisée
    $stmt = $connexion->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $_POST['username'], $_POST['password']);
    
    // Exécuter la requête
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Connexion réussie !";
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }

    // Fermer la requête
    $stmt->close();
}
?>

<form method="POST" action="">
    Nom d'utilisateur: <input type="text" name="username"><br>
    Mot de passe: <input type="password" name="password"><br>
    <input type="submit" name="submit" value="Connexion">
</form>
