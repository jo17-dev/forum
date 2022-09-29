<?php
include("../requette.php"); // script pour gerer efficassement les requettes
$users_id = executer("SELECT id FROM users ORDER BY id DESC LIMIT 0, 1");
$pp_id = $users_id[0][0]; // $pp_id est la pp de l'utilisateur d'id = $users_id[0][0]

// bref...
$target_dir = "../users_pp/";
//$target_file = $target_dir . basename($_FILES["pp"]["name"]);

// Dans cette partie du script, on fabrique le nouveau nom du fichier une fois uploadé, pour pourvoir l'identifier uniquement
$file_name = basename($_FILES["pp"]["name"]);
$extention_img = pathinfo($file_name, PATHINFO_EXTENSION); // pour recuperer l'extension du fichier
$target_file = $target_dir . $pp_id . "." . $extention_img;


$check = getimagesize($_FILES["pp"]["tmp_name"]);

$uploadOK = 1;

if($check !== false){
    $uploadOK = 1;
}else{
    $uploadOK = 0;
}

// on verifie l'unicité du nom de fichier.. Normalement devrait etre unique
if(file_exists($target_file)) {
    echo "cette photos de profil existe dejas";
    $uploadOk = 0;
}

// si tout es OK, on upload le fichier en question
if($uploadOK != 0){
    move_uploaded_file($_FILES["pp"]["tmp_name"], $target_file);
}
?>