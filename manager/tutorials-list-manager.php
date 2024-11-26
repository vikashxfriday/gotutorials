<?php include "include/common.php"; check_permission($pagename);
include "include/mailer.php";


if(isset($_GET['mid'])&&isset($_GET['action'])&&$_GET['action']=="status"){ 
//$act=user_status($_GET['mid'],1);
header("location:tutorials-list-manager.php?msg=Status Changed");
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
														<th class="wd-lg-8p"><span>Menu</span></th>
														<th class="wd-lg-20p"><span>Sub Menu </span></th>
														<th class="wd-lg-20p"><span>Title</span></th>
														<th class="wd-lg-20p"><span>Status</span></th>
														<th class="wd-lg-20p">Date</th>
														<th class="wd-lg-20p">Action</th>
													</tr>
												</thead>
												<tbody>
<?php
$table_name="itio_tutorial_master";
$fetch_fields="*";
$where_condation="";
$number_of_records=(isset($_GET['page']))?$_GET['page']:1;
$result=get_table_list($table_name,$fetch_fields,$where_condation,$number_of_records,$page=1);
if(isset($page)&&$page){ $cnt=count($result); }
$total_listing=$result[0]['count'];
echo "<label class='main-content-label btn btn-sm btn-outline-primary float-end m-2'>Total Records :: ".$total_listing."</label>";
foreach($result as $key=>$val){

?>
<tr>
														<td><?=$val['tutorial_menu'];?></td>
														<td><?=$val['tutorial_submenu'];?></td>
														<td><?=$val['tutorial_title'];?></td>
														<td><?=$val['tutorial_status'];?></td>
														<td><?=prndates($val['timestamp']);?></td>
														<td>
<?php /*?><div class="next_tr_<?=$val['tutorial_id'];?> row" style="display:none;">
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
</div><?php */?>
<a data-bs-target="#myModal" data-bs-toggle="modal" href="javascript:void(0);"  data-count="<?=$val['tutorial_id'];?>" class="btn btn-sm btn-primary tr_open_on_modal" title="View Details"><i class="fe fe-search"></i></a>

<a href="add-tutorial.php?mid=<?=$val['tutorial_id'];?>&action=edit" class="btn btn-sm btn-info confirm" title="Update"><i class="fe fe-edit-2"></i></a>

<a href="tutorials-list-manager.php?mid=<?=$val['tutorial_id'];?>&sid=<?=$val['tutorial_status'];?>&action=status" class="btn btn-sm btn-danger confirm" title="Status"><i class="fa-solid fa-user-slash"></i></a>
														</td>
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
