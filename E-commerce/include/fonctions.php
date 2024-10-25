<?php

function connection() {
    // Informations de connexion à la base de données
    $serveur = "localhost";
    $nomUtilisateur = "root";
    $motDePasse = "";
    $nomBaseDeDonnees = "ecommerce";

    try {
        // Création d'une instance de connexion PDO
        $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $nomUtilisateur, $motDePasse);
        // Configuration des options de PDO
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connexion à la base de données réussie";
    } catch(PDOException $e) {
        // En cas d'erreur de connexion, affichage du message d'erreur
        echo "Erreur de connexion : " . $e->getMessage();
    }
    return $connexion;
}




 function getALLproducts() {
        $connexion = connection();
        $requete = "SELECT * FROM produits";
        $resultat = $connexion->query($requete);
        return $resultat->fetchAll();
    }
    


function searchProducts($keywords) {
    $connexion = connection();
    // Création de la requête avec une préparation pour éviter les injections SQL
    $requete = $connexion->prepare("SELECT * FROM produits WHERE nom LIKE :keywords");
    $requete->execute(['keywords' => '%' . $keywords . '%']);
    // Résultat de la requête
    $produits = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $produits;
}

function getProduitById($id) {
    $connexion = connection();
    // Création de la requête avec une préparation pour éviter les injections SQL
    $requete = $connexion->prepare("SELECT * FROM produits WHERE id = :id");
    $requete->execute(['id' => $id]);
    // Résultat de la requête
    $produit = $requete->fetch(PDO::FETCH_ASSOC);
    return $produit;
}
function Adduser($data){
    $connexion = connection();
    $mpHash=md5($data['mp']);//mot de passe chiffré
    $requete="INSERT INTO users(nom,prenom,email,mp) VALUES('".$data['nom']."','".$data['prenom']."','".$data['email']."','".$mpHash."')";
    $resultat = $connexion->query($requete);
    if($resultat){
        return true;
    }else{
        return false;
    }
}
function Connectuser($data){
    $connexion = connection();
    $email=$data['email'];
    $mp=md5($data['mp']);
    $requete="SELECT * FROM users WHERE email='$email' AND mp='$mp'";
    $resultat = $connexion->query($requete);
    $user=$resultat->fetch();
    return $user;
}
function ConnectAdmin($data){
    $connexion = connection();
    $email=$data['email'];
    $mp=md5($data['mp']);
    $requete="SELECT * FROM administrateur WHERE email='$email' AND mp='$mp'";
    $resultat = $connexion->query($requete);
    $user=$resultat->fetch();
    return $user;
}
function getAllUsers(){
    $connexion = connection();
    $requete="SELECT * FROM users WHERE etat=0";
    $resultat = $connexion->query($requete);
    $users = $resultat->fetchAll();
    return $users;
}
function getStocks(){
    $connexion = connection();
    $requete="SELECT s.id,p.nom,s.quantite FROM produits p , stocks s WHERE p.id = s.produit";
    $resultat = $connexion->query($requete);
    $stocks = $resultat->fetchAll();
    return $stocks;
}
function getALLPaniers(){
    $connexion = connection();
    $requete="SELECT u.nom , u.prenom , p.total , p.etat , p.date_creation , p.id FROM paniers p , users u WHERE p.user = u.id";
    $resultat = $connexion->query($requete);
    $paniers = $resultat->fetchAll();
    return $paniers;
}
function getALLCommandes(){
    $connexion = connection();
    $requete="SELECT p.nom , p.image , c.quantite , c.total , c.panier FROM commandes c , produits p WHERE c.produit = p.id";
    $resultat = $connexion->query($requete);
    $commandes = $resultat->fetchAll();
    return $commandes;
}
function changerEtatPanier($data){
    $connexion = connection();
    $requete = "UPDATE paniers SET etat='".$data['etat']."' WHERE id='".$data['panier_id']."'";
    $resultat = $connexion->query($requete);

}
function getPaniersByEtat($paniers,$etat){
    $paniersEtat = array();
    foreach($paniers as $panier){
        if($panier['etat'] == $etat){
            array_push($paniersEtat , $panier);
        }
    }
    return $paniersEtat;

}
function EditAdmin($data){
    $connexion = connection();
    if($data['mp'] != ""){
        $requete = "UPDATE administrateur SET nom='".$data['nom']."' ,  email='".$data['email']."',  mp='".md5($data['mp'])."' WHERE id='".$data['id_admin']."'";
    }else{
        $requete = "UPDATE administrateur SET nom='".$data['nom']."' ,  email='".$data['email']."' WHERE id='".$data['id_admin']."'";
    }
    
    $resultat = $connexion->query($requete);
    return true ;
}
function getData(){
    $data = array();
    $connexion = connection();

    //calcul nbre des produits dans la bd
    $requete = "SELECT count(*) FROM produits";
    $resultat = $connexion->query($requete);
    $NombreProduits = $resultat ->fetch();

    //calcul nbre des visiteurs dans la bd
    $requete2 = "SELECT count(*) FROM users";
    $resultat2 = $connexion->query($requete2);
    $NombreClients = $resultat2 ->fetch();

    $data['produits'] = $NombreProduits[0] ;
    $data['users'] = $NombreClients[0] ;

    return $data;
}
?>

