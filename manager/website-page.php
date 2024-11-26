<?php
include("include/web-config.php");
if(isset($_REQUEST['webid'])&&$_REQUEST['webid']){
$webid=$_REQUEST['webid'];
$query = "SELECT `content` FROM `itio_content_master` WHERE `content_id`='$webid'";
$result=mysqli_fetch_array(mysqli_query($con,$query));
$content=$result['content'];
if(isset($content)&&$content){
echo $content;exit;
}
}
exit;
?>