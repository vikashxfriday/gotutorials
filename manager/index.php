<?php include "include/common.php"; 
$date=date("Y-m-d");
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
<!-- PAGE -->
<div class="page">
  <!-- HEADER -->
  <? include "include/header.php"; ?>
  <!-- END HEADER -->
  <!-- SIDEBAR -->
  <? include "include/sidebar.php"; ?>
  <!-- END SIDEBAR -->
  <!-- MAIN-CONTENT -->
  <div class="main-content side-content pt-0">
    <div class="main-container container-fluid">
      <div class="inner-body">
        <!-- Page Header -->
        <div class="page-header">
          <div>
            <h2 class="main-content-title tx-24 mg-b-5">Welcome To Dashboard</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Project Dashboard</li>
            </ol>
          </div>
          <div class="d-flex">
								<div class="justify-content-center">
									
									<button type="button" class="btn btn-white btn-icon-text my-2 me-2">
									  <i class="fa-regular fa-clock fa-spin me-2"></i> Active From : <?=ucwords($_SESSION['loged_user']['admin_addedon']);?>
									</button>
									<button type="button" class="btn btn-primary my-2 btn-icon-text">
									  <?=$data['status'][$_SESSION['loged_user']['admin_status']];?> <i class="fa-regular fa-circle-check ms-2 text-success"></i> 
									</button>
								</div>
							</div>
        </div>
        <!-- End Page Header -->
        <!--Row-->
        <div class="row row-sm">
          <div class="col-sm-12 col-lg-12 col-xl-12">
            <!--Row-->
            <div class="row row-sm  mt-lg-4">
              <div class="col-sm-12 col-lg-12 col-xl-12">
                <div class="card bg-primary custom-card card-box">
                  <div class="card-body p-4">
                    <div class="row align-items-center">
                      <div class="offset-xl-3 offset-sm-6 col-xl-8 col-sm-6 col-12 img-bg ">
                        <h4 class="d-flex  mb-3"> <span class="font-weight-bold text-white ">
                          <?=ucwords($_SESSION['loged_user']['admin_name']);?>
                          !</span> </h4>
                        <p class="tx-white-7 mb-1">Welcome to
                          <?=$host_company;?>
                          Web Manager for Manage your Assign Task. 
                      </div>
                      <!--<img src="assets/img/pngs/work3.png" alt="user-img">-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<? if(!isset($_SESSION['loged_user']['admin_roles'])&&empty($_SESSION['loged_user']['admin_roles'])){ ?>
			
			<div class="alert alert-danger mb-3 fw-bold" role="alert">You do not have any assigned role.</div>
			<? } ?>
			
            <!--Row -->
            <!--Row-->

            <!--End row-->
			
			<? if($_SESSION['loged_user']['admin_type']==2 || $_SESSION['loged_user']['admin_type']==11){ 
			   // 2 for Admin and 11 for Super Admin
			?>
			
			 
			
            <!--row-->
            <div class="row row-sm">
              <!-- col end -->
              <div class="col-lg-12">
                <div class="card custom-card mg-b-20">
                  <div class="card-body">
                    <div class="card-header border-bottom-0 pt-0 pe-0 d-flex" style="padding-left: 0px;">
                      <div>
                        <label class="main-content-label mb-2">Last 10 Transactions</label>
                         </div>
                     
                    </div>
                    <div class="table-responsive tasks">
                      <table class="table card-table table-vcenter text-nowrap mb-0  border">
                        <thead>
                          <tr>
                            <th class="wd-lg-10p">TransID</th>
                            <th class="wd-lg-20p">Trans Amt</th>
                            <th class="wd-lg-20p">Timestamp</th>
                            <th class="wd-lg-20p">Trans Response</th>
							<th class="wd-lg-20p">Trans Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
$table_name="itio_master_trans_table";
$fetch_fields="*";
$where_condation=" AND `transaction_status`='Success' ORDER BY `transaction_id` DESC";
$number_of_records="-5";
$result=get_table_list($table_name,$fetch_fields,$where_condation,$number_of_records,$page=0);

foreach($result as $key=>$val){


?>
  <tr>
	<td class="font-weight-semibold d-flex"><?=$val['transaction_id'];?></td>
	<td class="text-primary"><?=$val['converted_transaction_currency'];?> <?=$val['converted_transaction_amount'];?></td>
	<td class="text-primary"><span class="badge bg-pill bg-success-light"><?=$val['transaction_date'];?></span></td>
	<td><?=$val['transaction_type'];?> - <?=$val['transaction_for'];?></td>
	<td><?=$val['transaction_status'];?></td>

  </tr>
                          <? } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- col end -->
            </div>
            <!-- Row end -->
			<? } ?>
			
          </div>
          <!-- col end -->
          <!-- col end -->
        </div>
        <!-- Row end -->
      </div>
    </div>
  </div>
  <!-- END MAIN-CONTENT -->
  <!-- RIGHT-SIDEBAR -->
  <?php /*?><div class="sidebar sidebar-right sidebar-animate">
    <div class="sidebar-icon"> <a href="#" class="text-end float-end text-dark fs-20" data-bs-toggle="sidebar-right" data-bs-target=".sidebar-right"><i class="fe fe-x"></i></a> </div>
    <div class="sidebar-body">
      <h5>Todo</h5>
      <div class="d-flex p-3">
        <label class="ckbox">
        <input checked  type="checkbox">
        <span>Hangout With friends</span></label>
        <span class="ms-auto"> <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i> <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i> </span> </div>
      <div class="d-flex p-3 border-top">
        <label class="ckbox">
        <input type="checkbox">
        <span>Prepare for presentation</span></label>
        <span class="ms-auto"> <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i> <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i> </span> </div>
      <div class="d-flex p-3 border-top">
        <label class="ckbox">
        <input type="checkbox">
        <span>Prepare for presentation</span></label>
        <span class="ms-auto"> <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i> <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i> </span> </div>
      <div class="d-flex p-3 border-top">
        <label class="ckbox">
        <input checked type="checkbox">
        <span>System Updated</span></label>
        <span class="ms-auto"> <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i> <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i> </span> </div>
      <div class="d-flex p-3 border-top">
        <label class="ckbox">
        <input type="checkbox">
        <span>Do something more</span></label>
        <span class="ms-auto"> <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i> <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i> </span> </div>
      <div class="d-flex p-3 border-top">
        <label class="ckbox">
        <input  type="checkbox">
        <span>System Updated</span></label>
        <span class="ms-auto"> <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i> <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i> </span> </div>
      <div class="d-flex p-3 border-top">
        <label class="ckbox">
        <input  type="checkbox">
        <span>Find an Idea</span></label>
        <span class="ms-auto"> <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i> <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i> </span> </div>
      <div class="d-flex p-3 border-top mb-0">
        <label class="ckbox">
        <input  type="checkbox">
        <span>Project review</span></label>
        <span class="ms-auto"> <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i> <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i> </span> </div>
      <h5>Overview</h5>
      <div class="p-4">
        <div class="main-traffic-detail-item">
          <div> <span>Founder &amp; CEO</span> <span>24</span> </div>
          <div class="progress">
            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" class="progress-bar progress-bar-xs wd-20p" role="progressbar"></div>
          </div>
          <!-- progress -->
        </div>
        <div class="main-traffic-detail-item">
          <div> <span>UX Designer</span> <span>1</span> </div>
          <div class="progress">
            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="15" class="progress-bar progress-bar-xs bg-secondary wd-15p" role="progressbar"></div>
          </div>
          <!-- progress -->
        </div>
        <div class="main-traffic-detail-item">
          <div> <span>Recruitment</span> <span>87</span> </div>
          <div class="progress">
            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" class="progress-bar progress-bar-xs bg-success wd-45p" role="progressbar"></div>
          </div>
          <!-- progress -->
        </div>
        <div class="main-traffic-detail-item">
          <div> <span>Software Engineer</span> <span>32</span> </div>
          <div class="progress">
            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar progress-bar-xs bg-info wd-25p" role="progressbar"></div>
          </div>
          <!-- progress -->
        </div>
        <div class="main-traffic-detail-item">
          <div> <span>Project Manager</span> <span>32</span> </div>
          <div class="progress">
            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar progress-bar-xs bg-danger wd-25p" role="progressbar"></div>
          </div>
          <!-- progress -->
        </div>
      </div>
    </div>
  </div><?php */?>
  <!-- END RIGHT-SIDEBAR -->
  <!-- FOOTER -->
  <? include "include/footer.php"; ?>
  <!-- END FOOTER -->
</div>
<? include "include/js.php"; ?>
</body>
</html>
