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


//=====================================Match Query =================
$query = "SELECT * FROM itio_admin WHERE admin_user = '$admin_user' LIMIT 0,1";
$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0){
		
		$row=mysqli_fetch_assoc($result);
		$encryptionvalue=encryption_value($row['admin_id']);
		$encryptionusername=encryption_value($row['admin_user']);
		$generate_pass="<a href='".$_SESSION['host']['host_path']."reset.html?verify=".$encryptionvalue."&utype=".  						$encryptionusername."' title='Reset password'>Reset password</a>";
				//////Mail Start/////// 
				$template="RESTORE-PASSWORD";
				$postvar['fullname']=$row['admin_name'];
				$postvar['username']=$row['admin_user'];
				$postvar['email']=$row['admin_email'];
				$postvar['password_link']=$generate_pass;
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