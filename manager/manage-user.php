<?php include "include/common.php"; check_permission($pagename);
include "include/mailer.php";

if(isset($_GET['mid'])&&isset($_GET['action'])&&$_GET['action']=="deactive"){ 
$act=user_status($_GET['mid'],3);
	if($act){
	add_activity($loged_user,"User - Deactivated ",$_GET["mid"]);
	header("location:manage-user.php?msg=User Deactivated");
	}
}

if(isset($_GET['mid'])&&isset($_GET['action'])&&$_GET['action']=="active"){ 
$act=user_status($_GET['mid'],1);
$rs=get_user_detail_by_id($_GET['mid']," `admin_user`,`admin_name`,`admin_email` ");

                //////Mail Start/////// 
				$template="ACCOUNT-ACTIVATION";
				$postvar['fullname']=$rs['admin_name'];
				$postvar['username']=$rs['admin_user'];
				$postvar['email']=$rs['admin_email'];
				sent_template_mail($template,$postvar);
				//////Mail End///////

	if($act){
	add_activity($loged_user,"User - Activated ",$_GET["mid"]);
	header("location:manage-user.php?msg=User Activated");
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
.profile-cover__info .nav strong { font-size:  unset !important; }
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
								<h2 class="main-content-title tx-24 mg-b-5">Users & Roles</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add New User</li>
								</ol>
							</div>
							
						</div>
						<!-- End Page Header -->

						

						<!--Row-->
						<div class="row row-sm">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
								<div class="card custom-card">
									<div class="card-header border-bottom-0 pb-0">
										
<?php if(isset($_GET['msg'])&&$_GET['msg']) { ?>										
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 alert alert-success mb-0" role="alert">
	<button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button">
		<span aria-hidden="true">&times;</span>
	</button>
<strong><?=$_GET['msg'];?></strong>
</div>
<?php } ?>	
									</div>
									<div class="card-body">
										<div class="table-responsive border userlist-table">
											<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
												<thead>
													<tr>
														<th class="wd-lg-8p"><span>User Name</span></th>
														<th class="wd-lg-20p"><span>Full Name </span></th>
														<th class="wd-lg-20p"><span>Email</span></th>
														<th class="wd-lg-20p"><span>Mobile</span></th>
														<th class="wd-lg-20p"><span>Type</span></th>
														<th class="wd-lg-20p">Date</th>
														<th class="wd-lg-20p">Action</th>
													</tr>
												</thead>
												<tbody>
<?php
$table_name="itio_admin";
$fetch_fields="*";
$where_condation="";
$number_of_records=(isset($_GET['page']))?$_GET['page']:1;
$result=get_table_list($table_name,$fetch_fields,$where_condation,$number_of_records,$page=1);
if(isset($page)&&$page){ $cnt=count($result); }
$total_listing=$result[0]['count'];
echo "<label class='main-content-label btn btn-sm btn-outline-primary float-end m-2'>Total Records :: ".$total_listing."</label>";
foreach($result as $key=>$val){

$activestatus="success";
$activeink="deactive";
$ustatus="Click for Deactive";

if($val['admin_status']==3){ $activestatus="danger"; $activeink="active"; $ustatus="Click for Active Deactive"; }
elseif($val['admin_status']==4){ $activestatus="warning"; $activeink="active"; $ustatus="Click for Active New"; }

?>
<tr>
														<td><i class="fa-solid fa-circle fa-2xs text-<?=$activestatus;?>" title="Status - <?=$data['status'][$val['admin_status']];?>"></i>&nbsp;<?=$val['admin_user'];?></td>
														<td><?=$val['admin_name'];?></td>
														<td><?=$val['admin_email'];?></td>
														<td><?=$val['admin_mobile'];?></td>
														<td><?=$data['admin_typ'][$val['admin_type']];?></td>
														<td><?=prndates($val['admin_addedon']);?></td>
														<td>
<div class="next_tr_<?=$val['admin_id'];?> row" style="display:none;">
<div class="mboxtitle" style="display:none;"><?=$val['admin_name'];?> : (<?=$val['admin_user'];?>)</div>
<div class="row border bg-light my-2 text-start rounded">
<div class="col-sm-12 m-2"><strong>User Name :</strong> <?=$val['admin_user'];?></div>
<div class="col-sm-12 m-2"><strong>Full Name :</strong> <?=$val['admin_name'];?></div>
<div class="col-sm-12 m-2"><strong>Mobile No :</strong> <?=$val['admin_mobile'];?></div>
<div class="col-sm-12 m-2"><strong>Email ID  :</strong> <?=$val['admin_email'];?></div>
<div class="col-sm-12 m-2"><strong>Address   :</strong> <?=$val['admin_address'];?></div>
<div class="col-sm-12 m-2"><strong>User Type :</strong> <?=$data['admin_typ'][$val['admin_type']];?></div>
<div class="col-sm-12 m-2"><strong>Status    :</strong> <?=$data['status'][$val['admin_status']];?></div>
<div class="col-sm-12 m-2"><strong>Added By  :</strong> <?=$val['admin_addedby'];?></div>
<div class="col-sm-12 m-2"><strong>Added On  :</strong> <?=$val['admin_addedon'];?></div>
</div>
</div>
<a data-bs-target="#myModal" data-bs-toggle="modal" href="javascript:void(0);"  data-count="<?=$val['admin_id'];?>" class="btn btn-sm btn-primary tr_open_on_modal" title="View Details"><i class="fe fe-search"></i></a>
<a href="add-user.php?mid=<?=$val['admin_id'];?>&action=edit" class="btn btn-sm btn-info confirm" title="Update User"><i class="fe fe-edit-2"></i></a>
<a href="manage-user.php?mid=<?=$val['admin_id'];?>&action=<?=$activeink;?>" class="btn btn-sm btn-<?=$activestatus;?> confirm" title="<?=$ustatus;?> User"><i class="fa-solid fa-user-slash"></i></a>
<a href="manage-roles.php?mid=<?=encryption_value($val['admin_id']);?>" class="btn btn-sm btn-warning confirm" title="Manage Roles"><i class="fa-solid fa-user-gear"></i></a>														</td>
													</tr>
<? } ?>
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
            
            <? include "include/footer.php"; ?>
            <!-- END FOOTER -->

        </div>
       
            <? include "include/js.php"; ?>
			
			

    </body>


</html>
