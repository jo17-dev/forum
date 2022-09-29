<?php
session_start();
// Si la session est non vide, on redirige directement vers la liste des posts

if(isset($_GET["disconect"]) || count($_SESSION) == " ") {
    session_destroy();
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
        <img src="#" alt="logo" id="logo">
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
    <h1>Formulaire de connexion</h1>
    <form action="./connexion.php" method="post" class="form">
        <div class="div">
            <label for="email">Renseignez votre email</label>
            <input type="email" name="email" id="email" class="text">
        </div>
        <div class="div">
            <label for="pass">choisir un mot de passe</label>
            <input type="password" name="pass" id="pass" class="text">
        </div>
            <input type="submit" value="Connexion" class="submit">
    </form>
    <br>
    <h3>Vous n'avez pas encore de compte ?<a href="../inscription/inscription_form.php">Inscrivez-vous</a></h3>
</body>
</html>
<?php
// si les donnes de session sont presentes, on redirige vers la liste des post
}else if(!empty($_SESSION)) {
    header("location: ../connexion/connexion.php");
}
?>