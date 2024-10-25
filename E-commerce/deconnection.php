<?php
//deconnect de mon compte
session_start();

session_unset();

session_destroy();





//redirection
header('location:index.php');



?>