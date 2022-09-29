<?php
session_start();
if(!empty($_SESSION)){
    $users_id = $_SESSION["users_id"];
    $users_nom = $_SESSION["nom"];
    $users_prenom = $_SESSION["prenom"];
}
include("../requette.php");
$users_email = executer("SELECT email FROM users WHERE id='$users_id'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/navBar.css">
    <link rel="stylesheet" href="../../css/monProfilCss.css">
    <title>Details du post</title>
</head>
<body>
<nav>
    <img src="#" alt="logo" id="logo">
    <div id="responsive-content">
        <div class="liens">
            <ul>
                <li><a href="../posts/liste_post.php?include=1">Accueuil</a></li>
                <li><a href="../connexion/connexion_form.php?disconect=1">Déconnexion</a></li>
                <li><a href="../../index.html">Menu princiapl</a></li>
                <li><a href="../posts/nouveau_post.php">Nouveau sujet</a></li>
                <li><a href="" class="user_pp" id="profil"><?php include("../posts/user_pp.php"); ?></a></li>
            </ul>
        </div>
    </div>
</nav><br><br>
<h1>Mon profil</h1>
<div class="image">
    <div>
        <?php include("../posts/user_pp.php"); ?>
    </div>
</div>
<div class="actions">
    <div class="user_informations">
        <div class="changeName">
            <button> <?php echo $users_nom; ?> </button>
            <form action="update_name.php" method="post" class="updateForm">
                <div>
                    <input type="text" name="nom" placeholder="Entrez le nouveau nom:" required="required">
                </div>
                <div>
                    <input type="submit" value="valider" class="submit">
                </div>
            </form>
        </div>
        <div class="changeName">
            <button><?php echo $users_prenom; ?></button>
            <form action="update_name.php?who=surname" method="post" class="updateForm">
                <div>
                    <input type="text" name="prenom" placeholder="Entrez le nouveau prenom" required="required">
                </div>
                <div>
                    <input type="submit" value="valider" class="submit">
                </div>
            </form>
        </div>
        <div class="changeName">
            <button><?php echo $users_email[0]["email"]; ?></button>
        </div>
    </div>
    <div class="user_identification">
        <div class="changePass">
            <button>Changer mon mot de passe</button>
            <form action="update_pass.php" method="post" class="updateForm">
                <div>
                    <input type="password" name="old_pass" placeholder="Saisir l'ancien mot de passe" required="required">
                </div>
                <div>
                    <input type="password" name="new_pass" placeholder="Saisir le nouveau mot de passe" required="required">
                </div>
                <div>
                    <input type="password" name="new_cpass" placeholder="Resaisir le nouveau mot de passe" required="required">
                </div>
                <div>
                    <input type="submit" value="valider" class="submit">
                </div>
            </form>
        </div>
        <div class="changePass">
            <button>Changer ma photos de profil</button>
            <form action="update_profile.php" method="post" enctype="multipart/form-data" class="updateForm">
                <input type="file" name="new_pp">
                <input type="submit" value="Valider" class="submit">
            </form>
        </div>
    </div>
</div>
<script src="updateForms.js"></script>
</body>
</html>