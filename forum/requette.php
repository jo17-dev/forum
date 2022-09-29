<?php
function executer($sql) {
    include("../connexion_serveur.php");
    $requete = $connexion->prepare($sql);
    $requete->execute();
    $resultat = $requete->fetchall();
    return $resultat;
}
?>