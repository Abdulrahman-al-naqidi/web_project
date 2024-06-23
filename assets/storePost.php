<?php
session_start();
if(!empty($_REQUEST["title"]&& !empty($_REQUEST["content"]))){
require_once('../classes.php');
    $user = unserialize($_REQUEST["user"]);
// var_dump($user);
// echo"<pre>";
// print_r($_FILES);
if($_FILES["image"]["name"]){
$imageName="images/posts/".$_FILES["image"]["name"];
move_uploaded_file($_FILES["image"]["tmp_name"],$imageName);
}else{
    $imageName=null;
}

$user->store_post($_REQUEST["title"],$_REQUEST["content"],$imageName,$user->id);
header("Location:profile.php?msg=done");
// echo"</pre>";

}else{
    header("Location:profile.php?msg=required_fields");
}