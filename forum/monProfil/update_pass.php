<?php
// *************** fichier d'update du mot de passe 
session_start();
var_dump($_SESSION);
// recuperation des infos de l'utilisateur actuel
$users_id = $_SESSION["users_id"];
$nom = $_SESSION["nom"];
$prenom = $_SESSION["prenom"];
$email = $_SESSION["email"];

// inclusion du script des requettes
include("../requette.php");

// Recuperation de des infos du nouveau mot de passe
$old_pass = $_POST["old_pass"];
$new_pass = $_POST["new_pass"];
$new_cpass = $_POST["new_cpass"];
$is_ok = 0; // vaut 1 si toutes les conditions pour changer le mot de passe ne sont pas vérifiées
// verification de l'authenticité des
$users_actual_pass = executer("SELECT pass FROM users WHERE id='$users_id'");

// Si il ya un pb avec les donnes on signal
if(($users_actual_pass[0]["pass"] != $old_pass) || ($new_cpass != $new_pass)){
    $is_ok = 1;
    header("location: monProfil.php?updated=0");
}

//Si tous est en regle pour changer le mot de passe, on le change
if($is_ok == 0){
    executer("UPDATE users SET pass='$new_pass' WHERE id='$users_id'");
    header("location: monProfil.php?updated=1");
}
?>