<?php
session_start();
if(!empty($_SESSION)){
    $users_id = $_SESSION["users_id"];
    $users_nom = $_SESSION["nom"];
    $users_prenom = $_SESSION["prenom"];
    //$id_post = $_SESSION["id_post"];
    $id_post = $_GET["id_post"];
}

// inclusion du script(fonction) pour traiter les requettes
include("../requette.php");

$all_comments = executer("SELECT content FROM commentaires WHERE id_post=$id_post ORDER BY id DESC");

// ici on gere l'nvoie du commentaire
if(!empty($_POST)){
    $last_comment = " ";
    if(!empty($all_comments)){
        $last_comment = $all_comments[0]["content"];
    }
    $new_comment= $_POST["new_comment"];
    if($new_comment == "" || $new_comment == "" || $new_comment == $last_comment){
    }else{
        $new_comment = addslashes($new_comment);
        executer("INSERT INTO commentaires (content,id_owner,id_post)
                VALUES('$new_comment', '$users_id', '$id_post')");
    }
}


$selected_post = executer ("SELECT * FROM posts WHERE id=$id_post");

$sql = "SELECT users.nom, users.prenom, users.email, commentaires.content, commentaires.id_owner
        FROM users
        INNER JOIN commentaires
        ON users.id = commentaires.id_owner WHERE id_post=$id_post ORDER BY commentaires.id DESC";
$selected_comments = executer($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../posts/detailsPost.css">
    <link rel="stylesheet" href="../../css/navBar.css">
    <title>Details du post</title>
</head>
<body>
    <nav>
        <img src="#" alt="logo" id="logo">
        <div id="responsive-content">
            <div class="liens">
                <ul>
                    <li><a href="../posts/liste_post.php?include=1">Accueuil</a></li>
                    <li><a href="../connexion/connexion_form.php?disconect=1">déconnexion</a></li>
                    <li><a href="../../index.html">Menu principal</a></li>
                    <li><a href="../posts/nouveau_post.php">Nouveau sujet</a></li>
                    <li><a href="../monProfil/monProfil.php" class="user_pp" id="profil"><?php include("user_pp.php"); ?></a></li>
                </ul>
            </div>
        </div>
    </nav><br><br>
    <div id="root">
        <div class="image">
            <?php
            include("upload_posts_img.php");
            ?>
        </div>
        <div class="post_title">
            <span>
            <?php
            echo $selected_post[0]["title"];
            ?>
            </span>
        </div>
        <div class="short_content">
            <span>
                <?php
                echo $selected_post[0]["short_title"];
                ?>
            </span>
        </div>
        <div class="post_content">
            <span>Contenu: </span>
            <?php
            echo $selected_post[0]["content"];
            ?>
        </div>
        <div class="post_autor">
            <span>Auteur: </span>
            <?php
            $autor_id = $selected_post[0]["id_owner"];
            $autor = executer("SELECT nom, prenom FROM users WHERE id=$autor_id");
            echo $autor[0]["nom"] . " " . $autor[0]["prenom"];
            ?>
        </div>
        <div id="comments">
            <div class="comment_form_new">
                <div class="user_pp">
                    <?php include("user_pp.php"); ?>
                </div>
                <div class="form_div">
                    <form action="" method="post" class="form">
                        <!-- <input type="text" name="new_comment" id="new_comment" class="text" placeholder="saisir un commentaire"> -->
                        <textarea name="new_comment" id="new_comment" cols="30" rows="7" placeholder="Votre commentaire ici"></textarea>
                        <input type="submit" value="Envoyer" class="submit">
                    </form>
                </div>
            </div>
            <h2>Commentaires:</h2>
            <?php foreach($selected_comments as $comment){ 
            $id_owner = $comment["id_owner"];
            ?>
            <div class="comment_form">
                <div class="users_profil">
                <?php
                    include("download_users_pp.php");
                ?>
                </div>
                <div class="message">
                    <div class="owner">
                        <?php
                        echo $comment["nom"] . " " . $comment["prenom"];
                        //echo $comment["email"];
                        ?>
                    </div>
                    <div class="content">
                        <?php
                        echo $comment["content"];
                        ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>