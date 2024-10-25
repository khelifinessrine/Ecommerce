<?php

//test user connecter

 session_start();

 if (!isset($_SESSION['nom'])){
   header('location: ../connexion.php');
   exit();
 }

 include "../include/fonctions.php";

// //selectionner le produit avec l'id

$connexion = connection();

$user = $_SESSION['id'];

$id_produit= $_POST['produit'];

$quantite= $_POST['quantite'];

$requete="SELECT prix , nom FROM produits WHERE id='$id_produit'";

$resultat = $connexion->query($requete);

$produit=$resultat->fetch();

$total =$quantite * $produit['prix'];

$date = date('Y-m-d H:i:s');

if(!isset($_SESSION['panier'])){

    $_SESSION['panier'] = array($user,0,$date,array());
}
$_SESSION['panier'][1] += $total;

$_SESSION['panier'][3][] = array($quantite , $total , $date , $date ,  $id_produit ,$produit['nom']);

header("Location: ../panier.php");


?>