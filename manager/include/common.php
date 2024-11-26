<?php
ob_start();
session_start();
error_reporting( E_ALL );
$dir_path=str_replace("include","",dirname(__FILE__));

$serverip = array('127.0.0.1', "::1");
if(!in_array($_SERVER['REMOTE_ADDR'], $serverip)){
$host = "https://gotutorials.in/manager/";
}else{
$host = "http://localhost/gotutorials/manager/";
}

// Get Current Page Name from URL
$pagename=basename($_SERVER['PHP_SELF']);

// remove ext from page name
$pagename = trim(str_replace(array(".php", ".html"), '', $pagename));

// Get Current Page Name from URL
$pagetitle=ucwords(str_replace("-"," ",$pagename));


$without_session_page = array("signin","forgot","reset","signup","signup-success");
if(!in_array($pagename, $without_session_page)){
	if(!isset($_SESSION['loged_user'])|| $_SESSION['loged_user']==""){ 
	  if($pagename=="index"){
	  $urlss=$host."signin.html";
	  }else{
	  $urlss=$host."include/logout.php";
	  }
	 header("Location:$urlss");exit;
	}
}

$host_path=$host;
date_default_timezone_set("Asia/Kolkata"); // Set default timezone
echo $dir_path."include/web-config.php";
include $dir_path."include/web-config.php";


$host_logo=$host."images/admin-logo.png";
$host_path=$_SESSION['host']['host_path']=$host;
$host_company=$_SESSION['host']['company_name']="Go Tutorials";
$host_email=$_SESSION['host']['company_email']="info@gotutorials.in";
$host_mobile=$_SESSION['host']['company_phone']="+ 011-XXXXXX";


if(isset($_SESSION['loged_user']['admin_id'])&&$_SESSION['loged_user']['admin_id']){
$loged_user=$_SESSION['loged_user']['admin_id'];
$loged_user_name=$_SESSION['loged_user']['admin_name'];
}


//define Admin Type
$data['admin_typ']=array(
    0=>('Not Assign'),
	1=>('Accounts Executive'),
	2=>('Admin'),
	3=>('Business Development Executive'),
	4=>('Content Writer'),
	5=>('HR Recruiter'),
	6=>('Operations Executive'),
	7=>('Project coordinator'),
	8=>('Web Designer'),
	9=>('Web Programmer'),
	10=>('SEO Executive'),
	11=>('Super Admin'),
	12=>('Outsourcing Employees'),

);

//define Admin Type
$data['status']=array(
	1=>('Active'),
	2=>('Deleted'),
	3=>('Deactive'),
	4=>('Pending'),
);



include $dir_path."include/functions.php";

//print_r($_SESSION['loged_user']);
?>