<?php
session_start();
include "../../include/fonctions.php";

// Retrieve data from the form
$id = $_POST['idproduit'];
$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$image = $_POST['image'];
$createur = $_POST['createur'];
$date_modification = date("Y-m-d"); // Correct date format

// Database connection
$connexion = connection();

try {
    // Check for duplicate product name, excluding the current one
    $stmt = $connexion->prepare("SELECT COUNT(*) FROM produits WHERE LOWER(nom) = LOWER(?) AND id != ?");
    $stmt->execute([$nom, $id]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        // product name already exists
        header('Location: liste.php?erreur=duplicate');
        exit;
    }

    // Update product
    $stmt = $connexion->prepare("UPDATE produits SET nom = ?, description = ?,prix = ?,image = ?,createur = ?, date_modification = ? WHERE id = ?");
    $resultat = $stmt->execute([$nom, $description,$prix,$image,$createur, $date_modification, $id]);

    if ($resultat) {
        header('Location: /E-commerce/admin/produits/liste.php?modif=ok');
    } else {
        header('Location: /E-commerce/admin/produits/liste.php?erreur=fail');
    }

} catch (PDOException $e) {
    // Handle errors
    header('Location: /E-commerce/admin/produits/liste.php?erreur=fail');
}
?>
