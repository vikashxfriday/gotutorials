<?php include "include/common.php"; check_permission($pagename);

	$action="Submit";
	$mid="";
	if(isset($_GET['action'])&&$_GET['action']){ $action=$_GET['action'];}
	if(isset($_GET['mid'])&&$_GET['mid']){ $mid=$_GET['mid'];}

//Query for Insert Data
if(isset($_POST['submit-button'])&&$_POST['submit-button']=="Submit"){
	$mid=$_POST['mid'];
	$menu_id=$_POST['menu_id'];
	$submenu_title=$_POST['submenu_title'];
	$upd=mysqli_query($con,"INSERT INTO itio_submenu set menu_id='$menu_id',submenu_title='$submenu_title'");
	$lastid=mysqli_insert_id($con);
	add_activity($loged_user,"Add Sub Menu - $submenu_title ",$lastid);
	header("location:submenu-manager.php?msg=Submenu Added Sucessfully");
}

// Query for Update Data
if(isset($_POST['submit-button'])&&$_POST['submit-button']=="Update"){
	$mid=$_POST['mid'];
	$menu_id=$_POST['menu_id'];
	$submenu_title=$_POST['submenu_title'];
	$upd=mysqli_query($con,"update itio_submenu set menu_id='$menu_id',submenu_title='$submenu_title' where submenu_id ='$mid'");
	add_activity($loged_user,"Update Sub Menu - $submenu_title ",$mid);
	header("location:submenu-manager.php?msg=Submenu Update Sucessfully");
}

// for update data
if(isset($_GET['mid'])&&$_GET['mid']&&$_GET['action']=="Update"){
	$mid=$_GET['mid'];
	$sel=mysqli_query($con,"select * from itio_submenu where submenu_id='$mid'");
	$rs=mysqli_fetch_array($sel);
	$menu_id=$rs['menu_id'];
	$submenu_title=$rs['submenu_title'];
}

// for delete data
if(isset($_GET['mid'])&&$_GET['mid']&&$_GET['action']=="delete"){
	$mid=$_GET['mid'];
	$act=delete_table_data("itio_submenu",$mid,"submenu_id");
	if($act){
	header("location:submenu-manager.php?msg=Submenu Deleted Sucessfully");
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Dashboard - <?=$host_company;?></title>
<meta name="description" content="Admin Dashboard - <?=$host_company;?>">
<meta name="keywords" content="Admin Dashboard - <?=$host_company;?>">
<? include "include/meta-css.php"; ?>
<style>
@media (min-width: 1200px){
.offset-xl-3 { margin-left: 0% !important; }
}
</style>
</head>
<body class="ltr main-body leftmenu">
<!-- SWITCHER -->

<!-- END SWITCHER -->
<!-- PAGE -->
<div class="page">
  <!-- HEADER -->
  <?php include "include/header.php"; ?>
  <!-- END HEADER -->
  <!-- SIDEBAR -->
  <?php include "include/sidebar.php"; ?>
  <!-- END SIDEBAR -->
  <!-- MAIN-CONTENT -->
  <div class="main-content side-content pt-0">
    <div class="main-container container-fluid">
      <div class="inner-body">
        <!-- Page Header -->
        <div class="page-header">
          <div>
            <h2 class="main-content-title tx-24 mg-b-5">Submenu Manager</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Manage Sub Menu</li>
            </ol>
          </div>
          <div class="d-flex">
           
          </div>
        </div>
        <!-- End Page Header -->
        <!-- Row -->
        <!--End Row-->
        <!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-12 col-md-12">
								<div class="card custom-card main-content-body-profile">
									<div class="tab-content">
									
										
										<div class="main-content-body tab-pane88 p-4 border-top-0">
											<div class="card-body border">
		<form method="post">
		<input type="hidden" name="mid" value="<?php if(isset($mid)&&$mid){ echo $mid;} ?>">
     
<? if(isset($_GET['msg'])&&$_GET['msg']){?>
<div class="alert alert-info alert-dismissible fade show my-2" role="alert">
<strong><?=$_GET['msg'];?></strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<? } ?>
<div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <p class="mg-b-10">Menu</p>
<select name="menu_id" id="menu_id" class="form-control select-lg select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" title="Menu Title" required>
<option value="">Select Menu Title</option>
<?php
$result=get_table_list("itio_menu","*"," AND `status`=1 ","",""); // Menu list call from function
//print_r($result);
foreach($result as $key => $val){
?>
<option value="<?=$val['menu_id'];?>" <? if(isset($menu_id)&&$menu_id==$val['menu_id']){ ?> selected="selected" <? } ?>><?=$val['menu_title'];?></option>
<?php
}
?>
</select>

            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <p class="mg-b-10">Sub Menu Title</p>
              <input type="text" class="form-control" placeholder="Sub Menu Title" name="submenu_title"  title="Sub Menu" value="<? if(isset($submenu_title)&&$submenu_title){ echo $submenu_title;}?>" required>
            </div>
          </div>
          
		  <div class="col-md-12 ps-md-2">
		  <button class="btn ripple btn-primary pd-x-30 mg-r-5 mb-3" name="submit-button" value="<?=$action;?>"><?=$action;?></button>
		  </div>
</div>	
		</form>	
		</div>
										
									</div>
								</div>
							</div>
						</div>	
						 </div>
        <!--End Row-->
		
		
		                <!--Row-->
						<div class="row row-sm">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
								<div class="card custom-card">
									<div class="card-header border-bottom-0 pb-0">
										<div class="d-flex justify-content-between">
											<label class="main-content-label mb-0 pt-1">Submenu List</label>
											<div class="ms-auto float-end">
												&nbsp;
											</div>
										</div>
										
									</div>
									<div class="card-body">
										<div class="table-responsive border userlist-table">
											<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
												<thead>
													<tr>
														<th>Menu</th>
														<th>Sub Menu</th>
														<th>Status</th>
														<th>Added On</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
<?php
$table_name="itio_submenu";
$fetch_fields="*";
$where_condation=" ORDER BY `submenu_id` DESC ";
$number_of_records=(isset($_GET['page']))?$_GET['page']:1;
$result=get_table_list($table_name,$fetch_fields,$where_condation,$number_of_records,$page=1);
if(isset($page)&&$page){ $cnt=count($result); }
$total_listing=$result[0]['count'];
if($total_listing > 0 ){
foreach($result as $key=>$row){
?>
<tr>
<td><?=get_menu_title($row['menu_id']);?></td>
<td><?=$row['submenu_title'];?></td>
<td><?=$data['status'][$row['status']];?></td>
<td><?=prndates($row['addedon']);?></td>
<td style="width: 30px;" class="text-center">
<a href="submenu-manager.php?action=Update&mid=<?=$row['submenu_id'];?>" class="btn btn-sm btn-info"><i class="fe fe-edit-2"></i></a>
<a href="submenu-manager.php?action=delete&mid=<?=$row['submenu_id'];?>" class="btn btn-sm btn-danger"><i class="fe fe-trash"></i></a>	
</td>
</tr>
<?php
}	}											
?>	
												</tbody>
											</table>
										</div>
										<? include "include/paging.php"; ?>
									</div>
								</div>
							</div><!-- COL END -->
						</div>
						<!-- row closed  -->
						
						
      </div>
    </div>
  </div>
  <!-- END MAIN-CONTENT -->
  <!-- FOOTER -->
  <?php include "include/footer.php"; ?>
  <!-- END FOOTER -->
</div>
<?php include "include/js.php"; ?>

</body>
</html>
