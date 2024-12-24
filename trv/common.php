<?php
ob_start();
session_start();
//error_reporting( E_ALL );
$dir_path=str_replace("include","",dirname(__FILE__));

$serverip = array('127.0.0.1', "::1");
if(!in_array($_SERVER['REMOTE_ADDR'], $serverip)){
$host = "http://localhost/go/temp";
}else{
$host = "http://localhost/go/temp";
}

$host_logo=$host."/images/admin-logo.png";
$host_path=$host;
$host_company="ITIO INNOVEX";
$host_email="info@itio.in";
$host_mobile="+ 0120-4638249";