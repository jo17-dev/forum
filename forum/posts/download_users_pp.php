<?php

$target_dir = "../users_pp/";
        $file_complete_name = '';
        $dir = $target_dir;
    if (is_dir($dir)){
        if ($dh = opendir($dir)){
            // liste de tous les fichiers avec extention
        while (($file = readdir($dh)) !== false){
            if(!empty($id_owner)){
                if(fnmatch("$id_owner.*", $file)){
                    $target_file = $target_dir . $file;
                    $file_complete_name = $target_file;
                }
            }else if(!empty($users_id)){
                if(fnmatch("$users_id.*", $file)){
                    $target_file = $target_dir . $file;
                    $file_complete_name = $target_file;
                }
            }
        }

        if(!empty($file_complete_name)){
            echo "<img src='$file_complete_name' alt='user_profil'>";

        }else{
            $file_complete_name = $target_dir . "0.png";
            echo "<img src='$file_complete_name' alt='user_profil'>";
            
        }
        closedir($dh);
        }
    }
?>