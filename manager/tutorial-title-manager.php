<?php include "include/common.php"; check_permission($pagename);

	$action="Submit";
	$mid="";
	if(isset($_GET['action'])&&$_GET['action']){ $action=$_GET['action'];}
	if(isset($_GET['mid'])&&$_GET['mid']){ $mid=$_GET['mid'];}

//Query for Insert Data
if(isset($_POST['submit-button'])&&$_POST['submit-button']=="Submit"){
	$title=trim($_POST['title']);
	$icon=trim($_POST['icon']);
	$ins=mysqli_query($con,"INSERT INTO `itio_tutorial_title` SET `title`='$title',`icon`='$icon' ");
	$lastid=mysqli_insert_id($con);
	add_activity($loged_user,"Add Main Title - $title ",$lastid);
	header("location:tutorial-title-manager.php?msg=Title Added Sucessfully");
}

//Query for Update Data
if(isset($_POST['submit-button'])&&$_POST['submit-button']=="Update"){
	$mid=$_POST['mid'];
	$id=$_POST['id'];
	$title=trim($_POST['title']);
	$icon=trim($_POST['icon']);
	$upd=mysqli_query($con,"UPDATE `itio_tutorial_title` set `title`='$title',`icon`='$icon' where `id` ='$mid'");  add_activity($loged_user,"Update Main Title - $title ",$mid);
	header("location:tutorial-title-manager.php?msg=Title Update Sucessfully");
}

//Fetch Edit Data
if(isset($_GET['mid'])&&$_GET['mid']&&$_GET['action']=="Update"){
	$mid=$_GET['mid'];
	$sel=mysqli_query($con,"SELECT * FROM `itio_tutorial_title` where `id`='$mid'");
	$rs=mysqli_fetch_array($sel);
	$id=$rs['id'];
	$title=$rs['title'];
	$icon=$rs['icon'];
}

//Delete Data
if(isset($_GET['mid'])&&$_GET['mid']&&$_GET['action']=="delete"){
	$mid=$_GET['mid'];
	$act=delete_table_data("itio_tutorial_title",$mid,"id");
	if($act){
	header("location:tutorial-title-manager.php?msg=Title Deleted Sucessfully");
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
            <h2 class="main-content-title tx-24 mg-b-5">Tutorial Title Manager</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Manage Tutorial Title</li>
            </ol>
          </div>
          <div class="d-flex"> </div>
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
          <div class="row">
            <? if(isset($_GET['msg'])&&$_GET['msg']){?>
            <div class="alert alert-info alert-dismissible fade show my-2" role="alert"> <strong>
              <?=$_GET['msg'];?>
              </strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <? } ?>
            <div class="col-md-6">
              <div class="form-group">
                <p class="mg-b-10">Title Title</p>
                <input type="text" class="form-control" placeholder="Title" name="title"  title="Title" value="<? if(isset($title)&&$title){ echo $title;}?>" required>
              </div>
            </div>
			
			<div class="col-md-6">
              <div class="form-group">
                <p class="mg-b-10">Title Icon</p>
                <input type="text" class="form-control" placeholder="Title Icon" name="icon"  title="Icon" value="<? if(isset($icon)&&$icon){ echo $icon;}?>">
              </div>
            </div>
            <div class="col-md-12 ps-md-2">
              <button class="btn ripple btn-primary pd-x-30 mg-r-5 mb-3" name="submit-button" value="<?=$action;?>">
              <?=$action;?>
              </button>
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
                  <label class="main-content-label mb-0 pt-1">Title List</label>
                  <div class="ms-auto float-end"> &nbsp; </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive border userlist-table">
                  <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                    <thead>
                      <tr>
                        <th>Title</th>
						<th>Icon</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
$table_name="itio_tutorial_title";
$fetch_fields="*";
$where_condation=" AND `status`=1 ORDER BY `priority` ASC ";
$number_of_records=(isset($_GET['page']))?$_GET['page']:1;
$result=get_table_list($table_name,$fetch_fields,$where_condation,$number_of_records,$page=1);
if(isset($page)&&$page){ $cnt=count($result); }
$total_listing=$result[0]['count'];
if($total_listing > 0 ){
foreach($result as $key=>$row){
?>
                      <tr>
                        <td><i class="<?=$row['icon'];?> mx-2"></i><?=$row['title'];?></td>
						<td><?=$row['icon'];?></td>
                        <td><?=$data['status'][$row['status']];?></td>
                        <td style="width: 30px;" class="text-center"><a href="tutorial-title-manager.php?action=Update&mid=<?=$row['id'];?>" class="btn btn-sm btn-info"><i class="fe fe-edit-2"></i></a> <a href="tutorial-title-manager.php?action=delete&mid=<?=$row['id'];?>" class="btn btn-sm btn-danger"><i class="fe fe-trash"></i></a> </td>
                      </tr>
<?php
}}												
?>
                    </tbody>
                  </table>
                </div>
                <? include "include/paging.php"; ?>
              </div>
            </div>
          </div>
          <!-- COL END -->
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