<?php
session_start();
$Errors = [];
if (empty($_REQUEST["Name"])) $Errors["Name"] = " Name Is Required"; 
if (empty($_REQUEST["Email"])) $Errors["Email"] = " Email Is Required"; 
if (empty($_REQUEST["PW"])||empty($_REQUEST["PC"])) $Errors["PW"] = " Password And Password Confirmation Is Required"  ; 
if (empty($_REQUEST["phone"])) $Errors["phone"] = " phone Is Required"; 
else if (($_REQUEST["PW"]) != $_REQUEST["PC"]) {
    $Errors["PC"]="Password Confirmation Must be Equal to Password"; 
}
$phone=$_REQUEST["phone"];
$name = htmlspecialchars(trim($_REQUEST["Name"]));
$email = filter_var($_REQUEST["Email"],FILTER_SANITIZE_EMAIL);
$password = htmlspecialchars($_REQUEST["PW"]);
$Password_Confirmation = htmlspecialchars($_REQUEST["PC"]);
if ( !empty($_REQUEST["Email"]) && !filter_var ($_REQUEST["Email"],FILTER_SANITIZE_EMAIL)) $Errors["Email"]= "Email Invalid Format Please Add aa@pp.cc";
 
if (empty($Errors)) {
    require_once('classes.php');
     try{
    $rslt =Recruiter::register($name, $email,  $phone,md5($password),);    
    
    header("location:index.php?msg=sr");
     }
    catch(\Throwable $th) { 
        header("Location:index.php?msg=ar");
    }
    }
    else {
        $_SESSION["Errors"] = $Errors;
        header("location:recruiter.php");
    }

