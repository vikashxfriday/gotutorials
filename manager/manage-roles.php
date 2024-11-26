<?php include "include/common.php"; 

$mid="";
if(isset($_GET['mid'])&&$_GET['mid']){ $mid=decryption_value($_GET['mid']); }else{
echo "Error";exit;
}

if(isset($_POST['submit'])&&$_POST['submit']=="submit-form"){
$mid=$_POST['mid'];
unset($_POST['submit']);
unset($_POST['mid']);
$admin_type=$_POST['admin_type'];
unset($_POST['admin_type']);
$json = json_encode($_POST);
$upquery=mysqli_query($con,"UPDATE `itio_admin` SET `admin_roles`='$json',admin_type='$admin_type' WHERE `admin_id`='$mid'");
add_activity($loged_user,"Update Assign Role - $json ",$mid);
header("location:manage-user.php?msg=Roles Update Sucessfully");exit;
}

$jsondata=fetch_json_data($mid);
$get_admin_type=get_user_detail_by_id($mid," admin_type ");
$get_admin_type=$get_admin_type['admin_type'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Dashboard -
<?=$host_company;?>
</title>
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
            <h2 class="main-content-title tx-24 mg-b-5">Roles Manager</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Manage Roles</li>
            </ol>
          </div>
          <div class="d-flex"> </div>
        </div>

        <div class="row row-sm">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card custom-card">
              <div class="card-header border-bottom-0 pb-0">
                <div class="d-flex justify-content-between">
                  <label class="main-content-label mb-0 pt-1">Roles
                  <? if(isset($_GET['usr'])&&$_GET['usr']){ echo " - ".decryption_value($_GET['usr']); } ?>
                  </label>
                  <div class="ms-auto float-end"> &nbsp; </div>
                </div>
              </div>
              <div class="card-body">
                <form method="post">
                  <input type="hidden" name="mid" value="<?=$mid;?>">
                  <div class="row my-2">
                    <div class="col-md-2">
                      <label class="form-label">Admin Type</label>
                    </div>
                    <div class="col-md-3">
                      <select name="admin_type" class="form-control select-lg select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" title="Admin Type" required>
                        <option value="">Select Admin Type</option>
                        <?php
foreach($data['admin_typ'] as $key => $val){
?>
                        <option value="<?=$key;?>" <? if(isset($get_admin_type)&&$get_admin_type==$key){ ?> selected="selected" <? } ?>>
                        <?=$val;?>
                        </option>
                        <?php
}
?>
                      </select>
                    </div>
                  </div>
                  <div class="table-responsive border userlist-table">
                    <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                      <tr class="bg-primary">
                        <td class="px-4"><div class="form-check form-switch px-4">
                            <input class="form-check-input checkall" role="switch" type="checkbox">
                            <label class="form-check-label" >Toggle Menu</label>
                          </div></td>
                      </tr>
                      <?php
$query = mysqli_query($con,"SELECT `menu_id`,`menu_title` FROM `itio_menu` ORDER BY `priority` ASC");
while($val=mysqli_fetch_array($query)){
$menuname=str_replace(" ","-",strtolower($val['menu_title']));
$dspl="none"
?>
                      <tr class="border border-danger rounded">
                        <td class="px-4"><div class="form-check form-switch px-4">
                            <input type="checkbox" class="form-check-input vkg" name="<?=$menuname;?>" data-code="vkg<?=$val['menu_id'];?>" value="1"  <? if(isset($jsondata[$menuname])&&$jsondata[$menuname]==1){ $dspl="";?> checked="checked" <? } ?> />
                            <label class="form-check-label h6 text-warning" >
                            <?=$val['menu_title'];?>
                            </label>
                          </div></td>
                      </tr>
                      <tr style="display:<?=$dspl;?>;"  class="checkalldiv border border-success rounded" id="vkg<?=$val['menu_id'];?>">
                        <td><div class="row px-2">
                            <?php
$qr = mysqli_query($con,"SELECT `submenu_id`,`submenu_title` FROM `itio_submenu` WHERE `status`=1 AND `menu_id`='".$val['menu_id']."' ORDER BY `submenu_title` ASC");
while($rs=mysqli_fetch_array($qr)){
$submenuname=str_replace(" ","-",strtolower($rs['submenu_title']));
?>
                            <div class="col-sm-3 col-md-3 p-2 px-4 ">
                              <div class="form-check form-switch px-4 ">
                                <input type="checkbox" name="<?=$submenuname;?>" class="form-check-input" value="1" <? if(isset($jsondata[$submenuname])&&$jsondata[$submenuname]==1){?> checked="checked" <? } ?>  />
                                <label class="form-check-label h6 text-success" >
                                <?=$rs['submenu_title'];?>
                                </label>
                              </div>
                            </div>
                            <? } ?>
                          </div></td>
                      </tr>
                      <? } ?>
                      <tr class="border border-success rounded" >
                        <td><button type="submit" class="btn btn-primary text-white" name="submit" value="submit-form"> <i class="fa-regular fa-circle-check"></i> Submit</button></td>
                      </tr>
                    </table>
                  </div>
                </form>
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
<script>
$(function () {
      
		
		$(".vkg").click(function () {
		var gval='#'+$(this).attr('data-code');
		//alert(gval);
            if ($(this).is(":checked")) {
                $(gval).show();
            } else {
                $(gval).hide();
            }
        });
		
		
		$(".checkall").click(function () {
		//var gval='#'+$(this).val();
		//alert(gval);
            if ($(this).is(":checked")) {
                $(".checkalldiv").show();
				$('.vkg').prop("checked", true);
            } else {
                $(".checkalldiv").hide();
				$('.vkg').prop("checked", false);
            }
        });
		
		
		
		
		
		
       });
</script>
</body>
</html>
