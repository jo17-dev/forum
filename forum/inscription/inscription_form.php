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
    <h1>Forumlaire d'inscription</h1>
    <form action="./inscription.php" method="post" class="form">
        <div class="div">
            <label for="nom">Renseignez votre nom</label>
            <input type="text" name="nom" id="nom" class="text">
        </div>
        <div class="div">
            <label for="prenom">Renseignez votre prenom</label>
            <input type="text" name="prenom" id="prenom" class="text">
        </div>
        <div class="div">
            <label for="email">Renseignez votre email</label>
            <input type="email" name="email" id="email" class="text">
        </div>
        <div class="div">
            <label for="pass">Choisir un mot de passe</label>
            <input type="password" name="pass" id="pass" class="text">
        </div>
        <div class="div">
            <label for="cpass">Confimez votre mot de passe</label>
            <input type="password" name="cpass" id="cpass" class="text">
        </div>
            <input type="submit" value="inscription" class="submit">
    </form>
    <br>
    <h3>Vous avez dejas un compte ?<a href="../connexion/connexion_form.php">Connectez-vous</a></h3>
</body>
</html>