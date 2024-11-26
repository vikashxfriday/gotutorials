<?php
ob_start();
session_start();
include "web-config.php";
include "functions.php";
include "mailer.php";
$rnd=rand();
$login_ip=$_SERVER["REMOTE_ADDR"];

if(isset($_REQUEST['admin_user'])){
$admin_user=$_REQUEST['admin_user'];
$n_password=$_REQUEST['n_password'];
$c_password=$_REQUEST['c_password'];
$uid=$_REQUEST['uid'];
//$admin_user=$_REQUEST['admin_user'];

if($n_password<>$c_password){ echo 0; exit;}


//=====================================Match Query =================
$query = "SELECT * FROM itio_admin WHERE admin_user = '$admin_user' AND admin_id='$uid' LIMIT 0,1";
$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0){
		
		$row=mysqli_fetch_assoc($result);
		$password=hash_f($n_password);

$upd = "UPDATE `itio_admin` SET `admin_pass`='$password'  WHERE `admin_user` = '$admin_user' AND `admin_id`='$uid'";
mysqli_query($con,$upd);

		
				//////Mail Start/////// 
				$template="CHANGED-PASSWORD";
				$postvar['fullname']=$row['admin_name'];
				$postvar['username']=$row['admin_user'];
				$postvar['email']=$row['admin_email'];
				sent_template_mail($template,$postvar);
				//////Mail End///////
		
		
		echo 1;
		}else{
		echo 0;
		}


}else{
echo 0;
}

?>