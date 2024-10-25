<?php

session_start();

$id = $_GET['id'];

echo $id;

//var_dump($_SESSION['panier'][3]);

$total_enlver = $_SESSION['panier'][3][$id][1];

$_SESSION['panier'][1] -= $total_enlver;

unset($_SESSION['panier'][3][$id]);

//var_dump($_SESSION['panier'][3]);

header("Location: ../panier.php");


?>