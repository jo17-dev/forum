<?php
session_start();

$users_id = $_GET["users_id"];

include("../requette.php");
$user_info = executer("SELECT * FROM users WHERE id=$users_id");
$_SESSION["users_id"] = $users_id;
$_SESSION["nom"] = $user_info[0]["nom"];
$_SESSION["prenom"] = $user_info[0]["prenom"];
$_SESSION["email"] = $user_info[0]["email"];

header("location: ../posts/liste_post.php?include=1");
?>