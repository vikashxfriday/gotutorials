<?php
ob_start();
session_start();
include "web-config.php";
$serverip = array('127.0.0.1', "::1");
if(!in_array($_SERVER['REMOTE_ADDR'], $serverip)){
$host = "https://gotutorials.in/manager/";
}else{
$host = "http://localhost/gotutorials/";
}

$upquery=mysqli_query($con,$aa="UPDATE `itio_login_master` set log_out=now() where `id`='".$_SESSION['loged_user']['last_login_id']."'");
//echo $aa;exit;
$_SESSION['loged_user']="";
session_unset();
session_destroy();
$logout_url=$host."signin.html"; 
session_start();
$_SESSION['log-out']="1";
header("location:$logout_url");
?>