<?php
// ce fichier permet de trouver le nom de l'image correspondante a un post et d'afficher celle-ci
$target_dir = "../posts_pp/";
        $file_complete_name = '';
        $dir = $target_dir;
    if (is_dir($dir)){
        if ($dh = opendir($dir)){
            // liste de tous les fichiers avec extention
        while (($file = readdir($dh)) !== false){
            if(fnmatch("$id_post.*", $file)){
                $target_file = $target_dir . $file;
                $file_complete_name = $target_file;
            }
        }

        if(!empty($file_complete_name)){
            echo "<img src='$file_complete_name' alt='image_post'>";

        }else{
            $file_complete_name = $target_dir . "0.png";
            echo "<img src='$file_complete_name' alt='user_profil'>";
            
        }
        closedir($dh);
        }
    }
?>