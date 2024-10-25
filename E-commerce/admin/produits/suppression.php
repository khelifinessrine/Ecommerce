<?php
session_start();
include "../../include/fonctions.php";

// Récupérer l'ID du produit à supprimer
$idproduit = $_GET['idproduit'];

// Connexion à la base de données
$connexion = connection();

try {
    // Préparer et exécuter la requête de suppression
    $stmt = $connexion->prepare("DELETE FROM produits WHERE id = ?");
    $resultat = $stmt->execute([$idproduit]);

    if ($resultat) {
        header('Location: ../produits/liste.php?delete=ok');
    } else {
        header('Location: ../produits/liste.php?erreur=fail');
    }
} catch (PDOException $e) {
    // Gérer les erreurs
    header('Location: ../produits/liste.php?erreur=fail');
}
?>
