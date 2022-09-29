<?php
$retour=" "; // Represantant visuel du statu de l'insctiption qu seras affiché a l'ecran



// On recupere les donnees envoyes par l'user actuel et on verifie
if(!empty($_POST)){
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];

    $is_already_exist = 0;

// verificartion des donnees(s'il sont integre et uniques):
    $is_not_empty = 0;
    foreach($_POST as $item){
        if($item != "" && $item!=" "){
            $is_not_empty++;
        }
    }
    if($pass == $cpass && $is_not_empty >= 4) {
// script de connexion a la BD
        include("../connexion_serveur.php");

// verification de l'unicité des données
        $sql ="SELECT * FROM users";
        $requete = $connexion->prepare($sql);
        $requete->execute();
        $users = $requete->fetchall();

        foreach($users as $comptes){
            if($comptes["email"] == $email){
                $is_already_exist = 1;
            }
        }
        $uploadOK = 1;
// si toutes les verifications sont effectués avec succes, on ajoute les données dans la BD
        if($is_already_exist == 0){
// ceci est le script qui vas permettre de  sauvegarder la pp precement choisie

// inscription definitive du client
            if($uploadOK !=0){
            $sql ="INSERT INTO users(nom,prenom,email,pass) VALUES ('$nom', '$prenom', '$email', '$pass') ";
            $requete = $connexion->prepare($sql);
            $requete->execute();
            
            header("location: ./is_new_users.php");
            $lien_suiv = "<a href='../connexion/connexion_form.php' class='lien_suiv'>connectez-vous</a>";
            $retour = "Vous êtes inscrits avec succes,<br> ". $lien_suiv ."a votre compte pour tchater avec vos amis ";
            }
        }
    }else{
// Si les donnes ne sont pas integre, on le lui dit qu'il recommence le processus

        $retour = "Echec de l'inscription, les différents champs entrés ne sont pas corrects.<br>" .
        "veuillez s'il vous plait recommencer le processus.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/forumForm.css">
    <link rel="stylesheet" href="../../css/navBar.css">
    <title>inscription</title>
</head>
<body>
    <nav>
        <div id="logo"></div>
        <div id="responsive-content">
            <div class="liens">
                <ul>
                    <li><a href="../../index.html">Acceuil</a></li>
                    <li><a href="../connexion/connexion_form.php">Connexion</a></li>
                    <li><a href="../inscription/inscription_form.php">inscription</a></li>
                </ul>
            </div>
        </div>
    </nav><br><br><br>
    <h1> <?php echo $retour; ?></h1>
</body>
</html>