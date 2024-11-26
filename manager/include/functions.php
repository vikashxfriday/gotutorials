<?php
$page_limit="50";

//Encryption Value
function encryption_value($rec_data){
$ciphering_value = "AES-128-CTR";
$encryption_key ="ITIO";
$encryption_value = @openssl_encrypt($rec_data, $ciphering_value, $encryption_key); 
return $encryption_value;
}

//Decryption Value
function decryption_value($rec_data){
$ciphering_value = "AES-128-CTR";
$decryption_key ="ITIO";
$decryption_value = @openssl_decrypt($rec_data, $ciphering_value, $decryption_key);
return $decryption_value;
}

//generate password
function hash_f($password){
	$result=$password;
	if($password){
		$result=hash('sha256', $password);	
	}
	return $result;
}

// Fetch Email Template
function get_email_template($template){
global $con;

$query = "SELECT `template_subject`,`template_desc` FROM `itio_email_template` WHERE `template_code`='$template'";
$result=mysqli_fetch_assoc(mysqli_query($con,$query));
return $result;
}

// Fetch USER Detail BY ID
function get_user_detail_by_id($mid,$field_name){
global $con;
$query = "SELECT $field_name FROM `itio_admin` WHERE `admin_id`='$mid' LIMIT 0,1";
$result=mysqli_fetch_assoc(mysqli_query($con,$query));
return $result;
}

// Fetch USER Exist or Not
function check_user_exist($user_name){
global $con;
$query = "SELECT admin_user FROM `itio_admin` WHERE `admin_user`='$user_name' LIMIT 0,1";
$result=mysqli_num_rows(mysqli_query($con,$query));
return $result;
}

// Fetch USER Field BY ID
function get_user_field_by_id($mid,$field_name){
global $con;
$query = "SELECT $field_name FROM `itio_admin` WHERE `admin_id`='$mid' LIMIT 0,1";
$result=mysqli_fetch_assoc(mysqli_query($con,$query));
return $result[$field_name];
}

// Fetch Table List
function get_table_list($table_name,$fetch_fields,$where_condation,$number_of_records,$page){
global $con;
global $page_limit;

if(!isset($fetch_fields)&&empty($fetch_fields)){
$fetch_fields="*";
}

if(isset($number_of_records)&&$number_of_records){
if($number_of_records==-2){
$number_of_records=" LIMIT 0,1";
}else if($number_of_records==-5){
$number_of_records=" LIMIT 0,5";
}else if($number_of_records==-10){
$number_of_records=" LIMIT 0,10";
}else{
$number_of_records=($number_of_records - 1) * $page_limit; 
$number_of_records=" LIMIT ".$number_of_records.",".$page_limit;
//$number_of_records=" LIMIT 0,".$page_limit;
}
}

if(isset($where_condation)&&$where_condation){
$where_condation=$where_condation;
}

if(isset($page)&&$page){
$cnt_query = "SELECT {$fetch_fields} FROM `{$table_name}` WHERE 1 {$where_condation} ";
$result[0]['count']=mysqli_num_rows(mysqli_query($con,$cnt_query));
}

$query = "SELECT {$fetch_fields} FROM `{$table_name}` WHERE 1 {$where_condation} {$number_of_records} ";
if(isset($_REQUEST['print'])&&$_REQUEST['print']){
echo @$cnt_query."<br>";
echo @$query."<br>";
}
$qr=mysqli_query($con,$query);
//$rs=mysqli_fetch_array($result);
$count=mysqli_num_rows($qr);

        for($i=0; $i<$count; $i++){
			$record=@mysqli_fetch_array($qr, MYSQLI_ASSOC);
			foreach($record as $key=>$value)
			{$result[$i][$key]=$value;}
		}
		
return @$result;
}

// Fetch Menu Title
function get_menu_title($menuid){
global $con;
$query = "SELECT `menu_title` FROM `itio_menu` WHERE `menu_id`='$menuid'";
$result=mysqli_fetch_array(mysqli_query($con,$query));
$menu_title=$result['menu_title'];
return $menu_title;
}

// Fetch Menu Title
function get_tutorials_title($menuid){
global $con;
$query = "SELECT `title` FROM `itio_tutorial_title` WHERE `id`='$menuid'";
$result=mysqli_fetch_array(mysqli_query($con,$query));
$menu_title=$result['title'];
return $menu_title;
}

// fetch json data for assign role
function fetch_json_data($uid){
global $con;
$query = "SELECT `admin_roles` FROM `itio_admin` WHERE `admin_id`='$uid'";
$result=mysqli_fetch_array(mysqli_query($con,$query));
$admin_roles=$result['admin_roles'];
$admin_roles = json_decode($admin_roles, true);
return $admin_roles;
}

// Delete Table Data
function delete_table_data($tablename,$tableid,$field="id"){
global $con;
global $loged_user;
$query = "UPDATE `{$tablename}` SET `status`=2 WHERE `{$field}`='{$tableid}'";
$result=mysqli_query($con,$query);
$activity_title=ucwords(str_replace("itio_","",$tablename));
add_activity($loged_user,"Delete - $activity_title",$tableid);
return $act=1;
}

// Count Table Data
function count_table_data($tablename,$where){
global $con;
$cnt_query = "SELECT * FROM `{$tablename}` WHERE 1 $where ";
if(isset($_REQUEST['print'])&&$_REQUEST['print']){ echo @$cnt_query."<br>"; }
$result=mysqli_num_rows(mysqli_query($con,$cnt_query));
return $result;
}

// Update USER STATUS
function user_status($userid,$status){
global $con;
$query = "UPDATE `itio_admin` SET `admin_status`={$status} WHERE `admin_id`='{$userid}'";
$result=mysqli_query($con,$query);
return $act=1;
}

// Insert Activity
function add_activity($addedby,$work_title,$table_id){
global $con;

$ip=$_SERVER["REMOTE_ADDR"];
$query = "INSERT INTO `itio_activity` SET `table_id`='$table_id',
										  `work_title`='$work_title',
										  `addedby`='$addedby',
										  `ip`='$ip'";
$result=mysqli_query($con,$query);
return $act=1;
}

// Make Url from string
function make_url($string){
$string = trim(str_replace(array(" ", "_"), '-', strtolower($string)) );
return $string;
}

// Make Url with https://
function make_url_with_https($url){

if(!strstr($url,"http")){
$url="https://".$url;
}

return $url;
}

// Check Page view Permission
function check_permission($page){

$roles=$_SESSION['loged_user']['admin_roles'];
$roles_list = json_decode($roles,1);
if(isset($roles_list[$page]) && $roles_list[$page] == 1) {
    //$page="Authrized";
}else{
	$_SESSION['missing-page']=$page;
	header("location:missing.php");exit;
}

//return $page;
}
//The function prndate() return the date in customized format with second if DATE is valid, return '---' if not a valid DATE.
function prndates($date,$time=0){ 
	if($date=='0000-00-00 00:00:00'){
	return '---';
	}else if($time==1){ 
	return date('m/d/y H:i:s', strtotime($date));
	}else{ 
	return date('m/d/y', strtotime($date));
	}
}

function randomPassword() {
    $pass=rand(10000000,99999999);
    return $pass;
}

//function for remove extra code from fetched contact detail data
function remove_html($data){

$data=str_replace('<path fill-rule="evenodd" clip-rule="evenodd" d="M3.404 1.904A6.5 6.5 0 0 1 14.5 6.5v.01c0 .194 0 .396-.029.627l-.004.03-.023.095c-.267 2.493-1.844 4.601-3.293 6.056a18.723 18.723 0 0 1-2.634 2.19 11.015 11.015 0 0 1-.234.154l-.013.01-.004.002h-.002L8 15.25l-.261.426h-.002l-.004-.003-.014-.009a13.842 13.842 0 0 1-.233-.152 18.388 18.388 0 0 1-2.64-2.178c-1.46-1.46-3.05-3.587-3.318-6.132l-.003-.026v-.068c-.025-.2-.025-.414-.025-.591V6.5a6.5 6.5 0 0 1 1.904-4.596ZM8 15.25l-.261.427.263.16.262-.162L8 15.25Zm-.002-.598a17.736 17.736 0 0 0 2.444-2.04c1.4-1.405 2.79-3.322 3.01-5.488l.004-.035.026-.105c.018-.153.018-.293.018-.484a5.5 5.5 0 0 0-11 0c0 .21.001.371.02.504l.005.035v.084c.24 2.195 1.632 4.109 3.029 5.505a17.389 17.389 0 0 0 2.444 2.024Z"/>','',$data);

$data=str_replace('<path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5ZM4.5 6.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0Z"/>','',$data);

$data=str_replace('class="styles_contactInfoElements__YqQAJ"','',$data);

$data=str_replace('class="styles_contactInfoElement__SxlS3"','',$data);

$data=str_replace('class="styles_contactInfoElementIconWrapper__rMPLL"','',$data);

$data=str_replace('class="typography_body-m__xgxZ_ typography_appearance-default__AAY17 styles_contactInfoAddressList__RxiJI"','',$data);

$data=str_replace('class="link_internal__7XN06 typography_body-m__xgxZ_ typography_appearance-action__9NNRY link_link__IZzHN link_underlined__OXYVM"','',$data);

$data=str_replace('class="link_internal__7XN06 typography_body-m__xgxZ_ typography_appearance-action__9NNRY link_link__IZzHN link_underlined__OXYVM"','',$data);

$data=str_replace('target="_self"','',$data);

$data=str_replace('<defs><clipPath id="a"><path d="M0 0h16v16H0z"/></clipPath></defs>','',$data);

$data=str_replace('<g clip-path="url(#a)">','',$data);

$data=str_replace('<svg viewBox="0 0 16 16" fill="inherit" class="icon_icon__ECGRl icon_appearance-subtle__9l3Sf" xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"><path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5ZM4.5 6.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0Z"/></svg>','',$data);

$data=str_replace('<svg viewBox="0 0 16 16" fill="inherit" class="icon_icon__ECGRl icon_appearance-subtle__9l3Sf" xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.882 1.258a7 7 0 1 0 1.385 12.933l.466.884A8 8 0 1 1 16 8.01c0 2.437-1.16 3.793-2.558 3.982a2.341 2.341 0 0 1-2.53-1.532 4 4 0 1 1-.162-5.097v-.854h1v5c0 1.055.79 1.596 1.558 1.492.727-.098 1.692-.855 1.692-2.992a7 7 0 0 0-5.118-6.75Zm.868 6.75a3 3 0 1 0-6 0 3 3 0 0 0 6 0Z"></path></svg>','',$data);

$data=str_replace('<svg viewBox="0 0 16 16" fill="inherit" class="icon_icon__ECGRl icon_appearance-subtle__9l3Sf" xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"></svg>','',$data);
$data=str_replace('','',$data);

$data=str_replace('M9.882 1.258a7 7 0 1 0 1.385 12.933l.466.884A8 8 0 1 1 16 8.01c0 2.437-1.16 3.793-2.558 3.982a2.341 2.341 0 0 1-2.53-1.532 4 4 0 1 1-.162-5.097v-.854h1v5c0 1.055.79 1.596 1.558 1.492.727-.098 1.692-.855 1.692-2.992a7 7 0 0 0-5.118-6.75Zm.868 6.75a3 3 0 1 0-6 0 3 3 0 0 0 6 0Z','',$data);

$data=str_replace('m4.622.933.04.057.003.006L6.37 3.604l.002.003a1.7 1.7 0 0 1-.442 2.29l-.036.029c-.392.325-.627.519-.652.85-.026.364.206 1.09 1.562 2.445 1.356 1.357 2.073 1.58 2.426 1.55.318-.027.503-.252.816-.632l.057-.069a1.7 1.7 0 0 1 2.29-.442l.003.002 2.608 1.705.006.004c.204.141.454.37.649.645.188.267.376.655.31 1.09-.031.213-.147.495-.305.774a4.534 4.534 0 0 1-.715.941C14.323 15.422 13.377 16 12.1 16c-1.236 0-2.569-.483-3.877-1.246-1.315-.768-2.642-1.84-3.877-3.075C3.112 10.444 2.033 9.118 1.26 7.8.49 6.49 0 5.15 0 3.9c0-1.274.52-2.215 1.144-2.845C1.751.442 2.478.098 2.954.03c.507-.072.896.088 1.182.327.224.187.387.43.486.576Zm-1.127.191a.46.46 0 0 0-.4-.104c-.223.032-.758.25-1.24.738C1.393 2.227 1 2.924 1 3.9c0 1.001.398 2.161 1.122 3.394.72 1.226 1.74 2.486 2.932 3.678 1.19 1.19 2.45 2.204 3.673 2.918 1.23.718 2.384 1.11 3.373 1.11.949 0 1.652-.422 2.138-.914.245-.247.43-.508.556-.73.134-.237.181-.393.186-.43.01-.065-.014-.19-.139-.366a1.737 1.737 0 0','',$data);

$data=str_replace('0-.396-.396l-2.59-1.693a.7.7 0 0 0-.946.19l-.011.017-.013.016-.08.098c-.261.33-.723.91-1.491.975-.841.07-1.85-.47-3.218-1.838-1.369-1.37-1.912-2.381-1.85-3.225.056-.783.638-1.25.97-1.517l.09-.072.016-.013.016-.011a.7.7 0 0 0 .191-.946l-1.694-2.59-.051-.076c-.104-.152-.182-.265-.29-.355Z','',$data);

$data=str_replace('<svg viewBox="0 0 16 16" fill="inherit" class="icon_icon__ECGRl icon_appearance-subtle__9l3Sf" xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"><path fill-rule="evenodd" clip-rule="evenodd" d=" "></path></svg>','',$data);

$data=str_replace('<path fill-rule="evenodd" clip-rule="evenodd" d=""></path>','',$data);

$data=str_replace('class="icon_icon__ECGRl icon_appearance-subtle__9l3Sf"','',$data);

$data=str_replace('xmlns="http://www.w3.org/2000/svg"','',$data);

$data=str_replace('fill="inherit"','',$data);

$data=str_replace('width="16px" height="16px"','',$data);

$data=str_replace('viewBox="0 0 16 16"','',$data);

$data=str_replace('fill-rule="evenodd"','',$data);

$data=str_replace('clip-rule="evenodd"','',$data);

$data = str_replace( array( '<address>', '</address>', 'span', 'path', 'svg', 'd=""', 'd=" "', '< ><     ><   />', '< >' ), '', $data);

// for category
$data=str_replace('class="typography_body-m__xgxZ_ typography_appearance-default__AAY17"','',$data);
$data=str_replace('data-business-unit-info-category-typography="true"','',$data);
$data=str_replace('class="link_internal__7XN06 typography_appearance-action__9NNRY link_link__IZzHN link_notUnderlined__szqki"','',$data);
$data=str_replace('< class="typography_appearance-inherit__D7XqR typography_weight-heavy__E1LTj" weight="heavy">','',$data);
$data=str_replace('class="link_internal__7XN06 typography_appearance-action__9NNRY link_link__IZzHN link_underlined__OXYVM"','',$data);
$data=str_replace('class="styles_categoriesListLongTextElement__JQ3zi"','',$data);
return $data;

}

?>