<?php
include "common.php";

if(isset($_GET['act'])&&$_GET['act']){
$sel=mysqli_query($con,"select * from itio_content_master where content_id='".$_GET['act']."'");
$rs=mysqli_fetch_array($sel);
$get_content_title=$rs['content_title'];
$get_content=$rs['content'];

}



$fileName = $get_content_title."_".date("Ymdhis").".txt";
header('Content-Encoding: UTF-8');
header('Content-Disposition: attachment; filename='.$fileName);
echo $get_content_title."\r\n\r\n".$get_content;
exit;


?>
