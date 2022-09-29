<?php
session_start();
include("../requette.php");

$user_info = executer("SELECT * FROM users ORDER BY id DESC LIMIT 0, 1");

$_SESSION["users_id"] = $user_info[0]["id"] ;
$_SESSION["nom"] = $user_info[0]["nom"];
$_SESSION["prenom"] = $user_info[0]["prenom"];
$_SESSION["email"] = $user_info[0]["email"];

header("location: ../connexion/connexion_form.php");
?>