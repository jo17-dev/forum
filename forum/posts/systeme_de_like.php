<?php

include("../requette.php");

$id_post = $_GET["id_post"];
$new_like_nbre = $_GET["new_like_nbre"];

$selected_post = executer("SELECT * FROM posts WHERE id = '$id_post'");
$new_like_nbre = $selected_post[0]["nombre_de_likes"];

$new_like_nbre = $new_like_nbre +1;

$sql = "UPDATE posts SET nombre_de_likes = '$new_like_nbre' WHERE id ='$id_post'";
executer($sql);
echo $id_post;
echo $new_like_nbre;

var_dump($_GET);

?>