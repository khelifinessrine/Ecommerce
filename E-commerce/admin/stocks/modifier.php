<?php
session_start();
include "../../include/fonctions.php";

// Retrieve data from the form
$id = $_POST['idstock'];
$quantite = $_POST['quantite'];



// Check for empty fields
if (empty($id) || empty($quantite)) {
    header('Location: ../stocks/liste.php?erreur=vide');
    exit;
}

// Database connection
$connexion = connection();

    // Update category
    $stmt = $connexion->prepare("UPDATE stocks SET quantite = ? WHERE id = ?");
    $resultat = $stmt->execute([$quantite, $id]);

    if ($resultat) {
        header('Location: ../stocks/liste.php?modif=ok');
    } else {
        header('Location: ../stocks/liste.php?erreur=fail');
    }
?>
