<?php
ob_start();
session_start();
include "web-config.php";
include "functions.php";
$rnd=rand();
$login_ip=$_SERVER["REMOTE_ADDR"];

if(isset($_REQUEST['admin_user'])){
$admin_user=$_REQUEST['admin_user'];
$admin_pass=$_REQUEST['admin_pass'];
$admin_pass=hash_f($admin_pass);
$sql="SELECT * FROM  itio_admin WHERE admin_user='$admin_user' and admin_pass='$admin_pass' LIMIT 0,1";

$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)>0)
{
if(isset($row['admin_status'])&&$row['admin_status']==1){
$_SESSION['loged_user']=$row;
unset($_SESSION['loged_user']['admin_pass']);
$upquery=mysqli_query($con,"insert into itio_login_master set user_id='".$row['admin_id']."',log_ip='$login_ip',log_on=now()");
$_SESSION['loged_user']['last_login_id']=mysqli_insert_id($con);
echo 1;
}else{
echo "Account Not Active";
}
}else{

echo "Wrong Username / Password";
}

}else{
echo "UnAuthorized User";
}

?>