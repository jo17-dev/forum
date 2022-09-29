<?php
session_start();

// l'ors de la deconnexion, on revient sur cette page et on vide les données de sessions
/*foreach($_SESSION as $session_data){
    $session_data ="";
}*/

$retour = "Echec de la connexion, les différents champs entrés ne sont pas corrects.<br>" .
"veuillez s'il vous plait recommencer le processus.";
// Represantant visuel du statu de l'insctiption qu seras affiché a l'ecran



// On recupere les donnees envoyes par l'user actuel et on verifie
if(!empty($_POST)){
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $is_already_exist = false;

// script de connexion a la BD
    include("../connexion_serveur.php");


// inclusion de la fonctions qui permettras de traiter les requettes

        $sql ="SELECT * FROM users";
        include("../requette.php");
        $users = executer($sql);

// verification de l'existence d'un compte avec ses informations
        foreach($users as $comptes){
            if($comptes["email"] == $email && $comptes["pass"] == $pass){
                $is_already_exist = true;
                $users_id = $comptes["id"];
            }
        }

// si toutes les verifications sont effectués avec succes, on met les donnees en session et on redirige vers l'acceuil ppal du forum
        if($is_already_exist){
            header("location: ./is_connected.php?include=1&users_id=$users_id");
        }else{
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../../css/forumForm.css">
                <link rel="stylesheet" href="../../css/navBar.css">
                <title>connexion</title>
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
                <h1><?php echo $retour; ?></h1>
            </body>
            <script src="likes.Js"></script>
            </html>
<?php 

        }
    }else if(!empty($_SESSION)){
        $users_id = $_SESSION["users_id"];
        header("location: ./is_connected.php?include=1&users_id=$users_id");
    }
?>
