<?php
ob_start();
session_start();
include "web-config.php";
include "functions.php";
include "mailer.php";

//$login_ip=$_SERVER["REMOTE_ADDR"];

$uid=$_SESSION['loged_user']['admin_id'];


if(isset($_REQUEST['admin_name'])){
$admin_name=$_REQUEST['admin_name'];
$admin_designation=$_REQUEST['admin_designation'];
$admin_email=$_REQUEST['admin_email'];
$admin_mobile=$_REQUEST['admin_mobile'];
$admin_address=$_REQUEST['admin_address'];



//=====================================Match Query =================


$upd = "UPDATE `itio_admin` SET `admin_name`='$admin_name',`admin_designation`='$admin_designation',`admin_email`='$admin_email',`admin_mobile`='$admin_mobile',`admin_address`='$admin_address' WHERE `admin_id`='$uid'";

$_SESSION['loged_user']['admin_designation']=$admin_designation;
$_SESSION['loged_user']['admin_address']=$admin_address;
mysqli_query($con,$upd);

		
				//////Mail Start/////// 
				$template="UPDATE-PROFILE";
				$postvar['fullname']=$_SESSION['loged_user']['admin_name'];
				$postvar['username']=$_SESSION['loged_user']['admin_user'];
				$postvar['email']=$_SESSION['loged_user']['admin_email'];
				sent_template_mail($template,$postvar);
				//////Mail End///////
		
echo 1;
}else{
echo 0;
}

?>