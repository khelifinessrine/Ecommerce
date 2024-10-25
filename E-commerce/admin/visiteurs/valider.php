<?php

$iduser = $_GET['id'];

include "../../include/fonctions.php";

$connexion = connection();

$requete = "UPDATE users SET etat=1 WHERE id='$iduser'";

$resultat = $connexion->query($requete);

if($resultat){
    header('location:liste.php?valider=ok');
}else{
    echo "erreur de validation";
}

?>