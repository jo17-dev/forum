<?php
session_start();
$users_id = $_SESSION["users_id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/forumForm.css">
    <link rel="stylesheet" href="../../css/navBar.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <img src="#" alt="logo" id="logo">  
        <div id="responsive-content">
            <div class="liens">
                <ul>
                    <li><a href="../../index.html">Acceuil</a></li>
                    <li><a href="../connexion/connexion_form.php">Déconnexion</a></li> 
                    <li><a href="../posts/liste_post.php?include=1">Annuler</a></li>
                    <li><a href="../monProfil/monProfil.php" class="user_pp" id="profil"><?php include("user_pp.php"); ?></a></li>
                </ul>
            </div>
        </div>
    </nav><br><br><br>
    <h1>Nouveau post</h1>
    <form action="../posts/liste_post.php?id_owner=<?php echo $_SESSION["users_id"]; ?>&include=1" method="post" class="form" enctype="multipart/form-data">
        <div class="div">
            <label for="image_post">Chargez une image pour representer le post</label>
            <input type="file" name="pp_post" id="image_post" class="text">
        </div>
        <div class="div">
            <label for="title">Renseignez le titre du post</label>
            <input type="text" name="title" id="title" class="text">
        </div>
        <div class="div">
            <label for="short_title">Renseignez le contenue court</label>
            <input type="text" name="short_title" id="title" class="text">
        </div>
        <div class="div">
            <label for="content">Saisir ce que vous pensez ici:</label>
            <textarea name="content" id="content" cols="40" rows="5" placeholder="Votre post:"></textarea>
        </div>
            <input type="submit" value="Envoyer" class="submit">
    </form>
</body>
</html>