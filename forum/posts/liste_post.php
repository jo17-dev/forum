<?php
session_start();
$users_id = $_SESSION["users_id"];
function add_post(){

    if(!empty($_POST)){
        //var_dump($_POST);
        $last_post = executer("SELECT * FROM posts ORDER BY id DESC LIMIT 0, 1");
            //$image_post = $_POST["image_post"];
            $title = $_POST["title"];
            $short_title = $_POST["short_title"];
            $content = $_POST["content"];
            $id_owner = $_GET["id_owner"];
            $is_can_be_posted = 1;
            if(empty($title) || empty($short_title) || empty($content)){
                $is_can_be_posted = 0;
            }

            if(($last_post[0]["title"] == $title && $last_post[0]["short_title"] == $short_title && $last_post[0]["content"] == $content) || $is_can_be_posted == 0){
// si ces données ont déjas été enregistrées, on ne le fait plus.
            }else{
                // on echape les caratères spéciaux
                $title = addslashes($title);
                $short_title = addslashes($short_title);
                $content = addslashes($content);
                $sql = "INSERT INTO posts(`image`,title,short_title,content,id_owner,nombre_de_likes)
                VALUES('0', '$title', '$short_title', '$content', '$id_owner', '0')";
                executer($sql);
                include("../posts/posts_pp_upload.php"); // enregsitrer la photos de representation du post
            }
    }
}

if(!include("../connexion_serveur.php")){
    include("../connexion_serveur.php");
}

if(isset($_GET["include"])){
    include("../requette.php");

    add_post(); // ajouter le posts que l'users a fait precedement

    $sql = "SELECT * FROM posts ORDER BY id DESC";
    $liste_posts = executer($sql);
    //var_dump($liste_posts);
}else{
    $sql = "SELECT * FROM posts ORDER BY id DESC";
    $liste_posts = executer($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/listposts.css">
    <link rel="stylesheet" href="../../css/navBar.css">
    <title>Sujets de discussion</title>
</head>
<body>
    <nav>
        <div id="logo"></div>
        <div id="responsive-content">
            <div class="liens">
                <ul>
                    <li><a href="../posts/liste_post.php?include=1">Accueuil</a></li>
                    <li><a href="../connexion/connexion_form.php?disconect=1">Déconnexion</a></li>
                    <li><a href="../../index.html">Menu principal</a></li>
                    <li><a href="../posts/nouveau_post.php">Nouveau sujet</a></li>
                    <li><a href="../monProfil/monProfil.php" class="user_pp" id="profil"><?php include("user_pp.php"); ?></a></li>
                </ul>
            </div>
        </div>
    </nav><br><br><br>
    <h1>Liste des posts</h1>
    <div id="root">
        <?php foreach($liste_posts as $post_item){
            $owner_id = $post_item["id_owner"];
            $id_post = $post_item["id"];
        ?>
        <div class="item">
            <a href="../posts/details_post.php?id_post=<?php echo $id_post; ?>" class="link">
                <div class="img">
                    <?php include("upload_posts_img.php"); ?>
                </div>
            </a>
            <div class="post_info">
                <div class="id_post" style="display: none;"><?php  echo $id_post; ?></div>
                <div class="short_content">
                    <?php
                    echo $post_item["short_title"];
                    ?>
                </div>
                <div class="autor">
                    <span>Auteur: </span>
                    <?php
                    $nom = executer("SELECT nom, prenom From users WHERE id='$owner_id'");
                    echo $nom[0]["nom"] . " " . $nom[0]["prenom"];
                    ?>
                </div>

                <div class="commentaires">
                    <span>Commentaires:
                    <p style="display: inline;font-weight: 100;">
                        <?php
                        // ce lien ne fonctionne qu'en un seul sens, ce qui est facheux
                        $_SESSION["id_post"] = $id_post;
                        echo count(executer("SELECT * FROM commentaires WHERE id_post=$id_post"))
                        ?>
                    </p>
                    </span>

                </div>
                <div class="likes">
                <span style="cursor: pointer; font-weight: bold;" class="like">Likes: </span>
                    <span class = "nbre_likes">
                        <?php
                        echo $post_item["nombre_de_likes"];
                        ?>
                    </span>
                </div>
            </div>
            
        </div>

        <?php } ?>
    </div>
    <script src="../posts/likes.Js"></script>
</body>
</html>