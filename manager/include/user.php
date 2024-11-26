<?php
ob_start();
session_start();
include "web-config.php";
include "functions.php";
include "mailer.php";

//$login_ip=$_SERVER["REMOTE_ADDR"];

$admin_addedby=$_SESSION['loged_user']['admin_id'];

if(isset($_POST['submit'])&&$_POST['submit']=="Add"){

$admin_name=trim($_REQUEST['admin_name']);
$admin_email=trim($_REQUEST['admin_email']);
$admin_mobile=trim($_REQUEST['admin_mobile']);
$admin_address=trim($_REQUEST['admin_address']);
$admin_type=trim($_REQUEST['admin_type']);
$admin_user=trim($_REQUEST['admin_user']);
$admin_pass=trim($_REQUEST['admin_pass']);
$admin_pass=hash_f($admin_pass);

//=====================================Insert Query =================

$ins = "INSERT INTO `itio_admin` SET `admin_name`='$admin_name',
								`admin_email`='$admin_email',
								`admin_mobile`='$admin_mobile',
								`admin_address`='$admin_address',
								`admin_type`='$admin_type',
								`admin_user`='$admin_user',
								`admin_pass`='$admin_pass',
								`admin_addedby`='$admin_addedby'";
								
$insert=mysqli_query($con,$ins);
$lastid=mysqli_insert_id($con);
add_activity($admin_addedby,"Add New User - $admin_name ($admin_user) ",$lastid);
$insert_id=encryption_value($lastid);
$usr=encryption_value($admin_user);
if($insert){
header("location:../manage-roles.php?mid=$insert_id&usr=$usr");exit;
}


}

if(isset($_POST['submit'])&&$_POST['submit']=="Edit"){

$admin_name=trim($_REQUEST['admin_name']);
$admin_email=trim($_REQUEST['admin_email']);
$admin_mobile=trim($_REQUEST['admin_mobile']);
$admin_address=trim($_REQUEST['admin_address']);
$admin_type=trim($_REQUEST['admin_type']);
$mid=trim($_REQUEST['mid']);

//=====================================Insert Query =================

$upd = "UPDATE `itio_admin` SET `admin_name`='$admin_name',
								`admin_email`='$admin_email',
								`admin_mobile`='$admin_mobile',
								`admin_address`='$admin_address',
								`admin_type`='$admin_type',
								`admin_addedby`='$admin_addedby' WHERE `admin_id`='$mid'";
								
$upd=mysqli_query($con,$upd);
add_activity($admin_addedby,"Update User - $admin_name ",$mid);
if($upd){
header("location:../manage-user.php?msg=User Update Successfully");exit;
}


}


?>