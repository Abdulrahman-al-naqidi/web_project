<?php 
session_start();
var_dump($_REQUEST);
// session_start();
if(!empty($_REQUEST["email"]) && !empty($_REQUEST["password"])){
    require_once('classes.php');
   $user= User::login($_REQUEST["email"],md5($_REQUEST["password"]));

    if(!empty($user)){
        $_SESSION["user"] = serialize($user);
        if($user->role == 'recruiter'){
            header("Location:assets/home_re.php");}
        else if($user->role == 'job_seeker'){
            header("Location:assets/home_se.php");}
    else{
        
            header("Location:index.php?msg=no_user");
    }
    }
}else{
        header("Location:index.php?msg=empty_field");
    }
