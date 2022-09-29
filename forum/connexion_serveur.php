<?php
    $serveur = "premier";
    $login = "root";

    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=forum", $login, "");
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch(PDOException $e){
        echo "erreur: " . $e->getMessage();
    }
?>