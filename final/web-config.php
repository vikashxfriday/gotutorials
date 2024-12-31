<?php
$whitelist = array('127.0.0.1', "::1");
if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
$con = mysqli_connect("localhost","tutorial_master","Admin@2023","tutorial_master");
}else{
$con = mysqli_connect("localhost","root","","itio_epayment");
}
if (!$con){ echo "Conncetion Not Connect";exit; }
?>

