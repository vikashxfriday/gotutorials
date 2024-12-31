<?php
$con = mysqli_connect("localhost","root","","tutorial_master");

$rr=["Home","Overview","Environment Setup","CLI","Functions","Pre-Rendering","Partial Pre-Rendering","Pages","Static File Serving","Components","Image Component","Font Component","Head Component","Form Component","Link Component","Script Component","Routing","Nested Routing","Dynamic Routing","Imperative Routing","Shallow Routing","Redirecting Routes","Navigation and Linking","Server Side Rendering","Client Side Rendering","API Routes","API MiddleWares","Response Helpers","CSS Support","Global CSS Support","Meta Data","TypeScript","Environment Variables","Caching","Request Memoization","Data Caching","Router Caching","Full Route Caching","Debugging","Deployment"];

echo count($rr);

foreach($rr as $vv){
$rs=mysqli_real_escape_string($con,trim($vv));
$tid=21;
//echo "INSERT INTO `itio_tutorial_menu` SET `title_id`='$tid',`title`='$rs'";
mysqli_query($con,"INSERT INTO `itio_tutorial_menu` SET `title_id`='$tid',`title`='$rs'");
 } ?>
