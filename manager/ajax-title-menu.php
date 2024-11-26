<?php
include "include/common.php"; 
$title_id = $_POST['title_id'];
$result=get_table_list("itio_tutorial_menu","*"," AND `status`=1 AND `title_id`='$title_id' ","",""); 
// Menu list call from function
if(isset($result)&&$result){
foreach($result as $key => $val){
?>
<option value="<?=$val['id'];?>"><?=$val['title'];?></option>
<?php
}
}else{
?>
<option value="">No Data Found</option>
<?php
}
?>