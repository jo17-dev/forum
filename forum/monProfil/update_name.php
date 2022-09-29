<?php
// *************** fichier d'update du nom et prenom
session_start();
var_dump($_SESSION);
// recuperation des infos de l'utilisateur actuel
$users_id = $_SESSION["users_id"];
$nom = $_SESSION["nom"];

// inclusion du script des requettes
include("../requette.php");

// recuperation des données envoyés par l'user, et mise a jour
// s'il s'agit du prenom,
if(isset($_GET["who"])){
    $new_user_info = addslashes($_POST["prenom"]);
    
    // mise a jour du prenom
    executer("UPDATE users SET prenom='$new_user_info' WHERE id='$users_id'");
    // remplacement des données de session
    $_SESSION["prenom"] = $new_user_info;
}else{
    $new_user_info = addslashes($_POST["nom"]);

    // mise a jour du nom
    executer("UPDATE users SET nom='$new_user_info' WHERE id='$users_id'");
    // remplacment des données de session
    $_SESSION["nom"] = $new_user_info;
}



// redirection ver la page "mon profil"
header("location: monProfil.php?updated=1");
?>