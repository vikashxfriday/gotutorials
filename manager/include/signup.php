<?php
ob_start();
session_start();
include "web-config.php";
include "functions.php";
include "mailer.php";
$login_ip=$_SERVER["REMOTE_ADDR"];

if(isset($_REQUEST['admin_name'])){
$admin_user=trim($_REQUEST['admin_user']);
$cntusr=check_user_exist($admin_user);

if($cntusr==0){
$admin_name=$_REQUEST['admin_name'];
$admin_email=$_REQUEST['admin_email'];
$admin_mobile=$_REQUEST['admin_mobile'];
$admin_user=$_REQUEST['admin_user'];
$admin_passf=$admin_pass=randomPassword();
$admin_pass=hash_f($admin_pass);

$sql="INSERT INTO `itio_admin` SET `admin_name`='$admin_name',`admin_email`='$admin_email', `admin_mobile`='$admin_mobile',`admin_user`='$admin_user',`admin_pass`='$admin_pass',`admin_status`=4,`admin_addedby`=0";
$result=mysqli_query($con,$sql);

if($result){
                //////Mail Start/////// 
				$template="SIGNUP-TO-MEMBER";
				$postvar['fullname']=$admin_name;
				$postvar['username']=$admin_user;
				$postvar['password']=$admin_passf;
				$postvar['email']=trim($admin_email);
				sent_template_mail($template,$postvar);
				//////Mail End///////
$_SESSION['registered_user_name']=$admin_name;
echo 1;
}else{
echo "DB Error . Please try with other";
}

}else{ echo "Username already exist. Please try with other"; }

}else{
echo "Error on Data. Please check and try with correct";
}

?>