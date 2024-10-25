<?php
session_start();
include "../../include/fonctions.php";

// Récupérer les données du formulaire
$nom = $_POST['nom'] ?? '';
$description = $_POST['description'] ?? '';
$prix = $_POST['prix'] ?? '';
$createur = $_POST['createur'] ?? '';
$quantite = $_POST['quantite'] ?? '';
$date_creation = date("Y-m-d");

// Vérifier si tous les champs sont remplis
if (empty($nom) || empty($description) || empty($prix) || empty($createur)  || empty($_FILES["image"]["name"])) {
    header('Location: ../produits/liste.php?erreur=empty');
    exit;
}

// Upload de l'image
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    header('Location: ../produits/liste.php?erreur=image');
    exit;
}

$image = basename($_FILES["image"]["name"]); // Utiliser le nom du fichier pour stocker dans la base de données

// Connexion à la base de données
$connexion = connection();

try {
    // Création de la requête d'exécution
    $requete = "INSERT INTO produits (nom, description, prix, image, createur, date_creation) VALUES (?, ?, ?, ?, ?, ? )";

    // Préparation et exécution de la requête
    $stmt = $connexion->prepare($requete);
    $resultat = $stmt->execute([$nom, $description, $prix, $image, $createur, $date_creation]);

    if ($resultat) {
        $produit_id = $connexion->lastInsertId();

        // Préparation et exécution de la requête d'insertion dans le stock
        $requete2 = "INSERT INTO stocks (produit, quantite, createur, date_creation) VALUES (?, ?, ?, ?)";
        $stmt2 = $connexion->prepare($requete2);
        $resultat2 = $stmt2->execute([$produit_id, $quantite, $createur, $date_creation]);

        if ($resultat2) {
            header('Location: /E-commerce/admin/produits/liste.php?ajout=ok');
        } else {
            echo "Impossible d'ajouter le stock du produit";
        }
    } else {
        header('Location: /E-commerce/admin/produits/liste.php?erreur=fail');
    }
} catch (PDOException $e) {
    // Gestion des erreurs
    if ($e->getCode() == '23000') {
        header('Location: ../produits/liste.php?erreur=duplicate');
    } else {
        header('Location: ../produits/liste.php?erreur=fail');
    }
}
?>
