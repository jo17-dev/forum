<?php
//include("../requette.php"); // script pour gerer efficassement les requettes
$users_id = executer("SELECT id FROM posts ORDER BY id DESC LIMIT 0, 1");
$pp_id = $users_id[0][0]; // $pp_id est la photos du post d'id = $users_id[0][0]

// bref...
$target_dir = "../posts_pp/";
//$target_file = $target_dir . basename($_FILES["pp"]["name"]);

// Dans cette partie du script, on fabrique le nouveau nom du fichier une fois uploadé, pour pourvoir l'identifier uniquement
$file_name = basename($_FILES["pp_post"]["name"]);
$extention_img = pathinfo($file_name, PATHINFO_EXTENSION); // pour recuperer l'extension du fichier
$target_file = $target_dir . $pp_id . "." . $extention_img; // nouveau nom du fichier + chemin d'acces
$uploadOK = 1;

/*if(getimagesize($_FILES["pp_post"]["tmp_name"]) == true){
    $check = getimagesize($_FILES["pp_post"]["tmp_name"]);
}else{
    $uploadOK = 0;
    $check = " ";
}



if($check !== false){
    $uploadOK = 1;
}else{
    $uploadOK = 0;
}*/

// on verifie l'unicité du nom de fichier.. Normalement devrait etre unique
if(file_exists($target_file)) {
    echo "cette photos de profil existe dejas";
    $uploadOk = 0;
}

// si tout es OK, on upload le fichier en question
if($uploadOK != 0){
    move_uploaded_file($_FILES["pp_post"]["tmp_name"], $target_file);
}
?>