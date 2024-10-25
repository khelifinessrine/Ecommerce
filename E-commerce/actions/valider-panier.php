<?php

session_start();

include "../include/fonctions.php";

// //selectionner le produit avec l'id

$connexion = connection();

$user = $_SESSION['id'];

$total = $_SESSION['panier'][1];

$date = date('Y-m-d H:i:s');

//creation panier

$requete_panier = "INSERT INTO paniers(user,total,date_creation) VALUES ('$user','$total','$date')";

$resultat = $connexion->query($requete_panier);

$panier_id = $connexion->lastInsertId();

$commandes = $_SESSION['panier'][3];

foreach($commandes as $commande){
    //ajouter commande

    $quantite = $commande['0'];

    $total = $commande['1'];

    $id_produit = $commande['4'];

    $requete="INSERT INTO commandes (quantite,total,panier,date_creation,date_modification,produit) VALUES('$quantite','$total',$panier_id,'$date','$date','$id_produit')";

    $resultat = $connexion->query($requete);
}

$_SESSION['panier'] = null;

header("Location: ../index.php");

?>