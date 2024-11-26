<div class="sticky">
				<div class="main-menu main-sidebar main-sidebar-sticky side-menu">
					<div class="main-sidebar-header main-container-1 active">
						<div class="sidemenu-logo">
							<a class="main-logo" href="index.php">
<img 11 src="<?=$host_path;?>assets/img/admin-logo.png" class="header-brand-img desktop-logo" alt="logo" style="height:37px;">
<img 22 src="<?=$host_path;?>assets/img/logoicon.png" class="header-brand-img icon-logo" alt="logo" style="height:37px;">
<img 33 src="<?=$host_path;?>assets/img/admin-logo.png" class="header-brand-img desktop-logo theme-logo" alt="logo" style="height:37px;">
<img 44 src="<?=$host_path;?>assets/img/admin-logo.png" class="header-brand-img icon-logo theme-logo" alt="logo" style="height:37px;">
							</a>
						</div>
						<div class="main-sidebar-body main-body-1">
							<div class="slide-left disabled" id="slide-left"><i class="fe fe-chevron-left"></i></div>
							<ul class="menu-nav nav">
								<li class="nav-header"><span class="nav-label">Dashboard</span></li>
								<li class="nav-item">
									<a class="nav-link" href="index.php">
										<span class="shape1"></span>
										<span class="shape2"></span>
										<i class="ti-home sidemenu-icon menu-icon"></i>
										<span class="sidemenu-label">Dashboard</span>
									</a>
								</li>
<?php
$assign_roles=$_SESSION['loged_user']['admin_roles']; // for show / hide menu/subminu according to Permission
$assign_roles_list = json_decode($assign_roles,1);
//print_r($assign_roles_list);

$menu_data=get_table_list("itio_menu",' `menu_title`,`menu_id`,`menu_icon` '," AND `status`='1' ORDER BY `priority` ","",0);
$m_cnt=count($menu_data);
if($m_cnt > 0 ){
foreach($menu_data as $mkey=>$mdata){

// for show / hide menu according to Permission
$mm_menu=make_url($mdata['menu_title']);
if(isset($assign_roles_list[$mm_menu]) && $assign_roles_list[$mm_menu] == 1) {

?>

								<li class="nav-item">
									<a class="nav-link with-sub" href="javascript:void(0)">
										<span class="shape1"></span>
										<span class="shape2"></span>
										<i class="<?=$mdata['menu_icon'];?> sidemenu-icon menu-icon "></i>
										<span class="sidemenu-label"><?=$mdata['menu_title'];?></span>
										<i class="angle fe fe-chevron-right"></i>
									</a>
<ul class="nav-sub">
<li class="side-menu-label1"><a href="javascript:void(0)"><?=$mdata['menu_title'];?></a></li>
<?php
$m_menu_id=$mdata['menu_id'];
$submenu_data=get_table_list("itio_submenu",' `submenu_title` '," AND `menu_id`='$m_menu_id' AND `status`='1' ORDER BY `submenu_title` ","",0);

if(isset($submenu_data)&&$submenu_data){ $sm_cnt=count($submenu_data); }else{ $sm_cnt=0; } //exit;
if($sm_cnt > 0 ){
foreach($submenu_data as $smkey=>$smdata){

// for show / hide submenu according to Permission
$mm_submenu=make_url($smdata['submenu_title']);
if(isset($assign_roles_list[$mm_submenu]) && $assign_roles_list[$mm_submenu] == 1) {

?>										
<li class="nav-sub-item"><a class="nav-sub-link" href="<?=make_url($smdata['submenu_title']);?>.php"><?=$smdata['submenu_title'];?></a></li>
<?php 
}
}
} 
?>

										
</ul>
								</li>
								
<?php 
}
}
}
 ?>
</ul>
							<div class="slide-right" id="slide-right"><i class="fe fe-chevron-right"></i></div>
						</div>
					</div>
				</div>
			</div>