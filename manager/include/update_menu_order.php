<?php
ob_start();
session_start();
include "web-config.php";

if(isset($_REQUEST['order'])){

	$tags = explode(',',$_REQUEST['order']);
	$i=1;
	foreach($tags as $key) {    
		$upd = mysqli_query($con,"UPDATE `itio_menu` SET `priority`='$i'  WHERE `menu_id` = '$key' ");  
		$i++;
	}
     

}

?>