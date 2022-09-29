<?php
session_start();
// fichier d'update de la pp
/** etapes
 * on commence par verifier les donnes
 * si les donnes sont bonnes, on supprime l'ancienne photos (Si cette photos c'est celle par defaut, on la laisse.)
 * on ajoute la nouvelle pp
 * on redirige l'user ver la page de mon profil
 */
$users_id = $_SESSION["users_id"];
$target_dir = "../users_pp/"; // dossier contenant les pp
$target_file = $target_dir . $_FILES["new_pp"]["name"]; // chemin d'arrivé de la nouvelle pp

$extention = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // extention de la future pp

$check = getimagesize($_FILES["new_pp"]["tmp_name"]); // contient normalement image/jpeg si ce qui est uploader est bien une image

$is_ok = 1; // vaut 1 si tout est Ok

if($check !== false){ // si le fichier uploadé est une image
    $is_ok = 1;
}else{
    $is_ok=0;
    header("location: monProfil.php?err_message=Veuillez selectionnner une image");
}

// on verifie si l'extention de la pp est bien utilisable
if($extention != "jpg" && $extention != "png" && $extention != "jpeg" && $extention != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    header("location: monProfil.php?err_message=Seuls les extentions JPG, JPEG, PNG et GIF sont autorisés");
    $is_ok = 0;
}

if($is_ok == 0){
    header("location: monProfil.php?err_message=Echec l\'ors de la mise a jour");
}else{
// on suprime l'acienne pp, sauf si c'etait celle par defaut
    $dh = opendir($target_dir);
    if($dh){
        while(($file = readdir($dh)) !== false){
            echo $file;
            if(fnmatch("$users_id.*", $file)){
                echo "fichier trouvé";
                unlink("../users_pp/".$file);
            }

        }
        
        // on ajoute la nouvelle pp
        $target_file = $target_dir . $users_id .".".$extention;
        if (move_uploaded_file($_FILES["new_pp"]["tmp_name"], $target_file)) {
            header("location: monProfil.php?uploaded=1");
        } else {
            header("location: monProfil.php?err_message=Echec l\'ors de la mise a jour");
        }
        closedir($dh);
    }
}
echo $users_id;
echo "<pre>";
var_dump($_FILES);
echo "<pre>";
echo "<br>";
echo $extention;
var_dump(getimagesize($_FILES["new_pp"]["tmp_name"]));
?>