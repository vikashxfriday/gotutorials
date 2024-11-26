<?php include "include/common.php";
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
								<h2 class="main-content-title tx-24 mg-b-5">My Activity</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Login Activity</li>
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
<?php
$table_name="itio_activity";
$fetch_fields="*";
$where_condation=" AND `addedby`='$loged_user' ORDER BY `id` DESC";
$number_of_records=(isset($_GET['page']))?$_GET['page']:1;
$result=get_table_list($table_name,$fetch_fields,$where_condation,$number_of_records,$page=1);
if(isset($page)&&$page){ $cnt=count($result); }
$total_listing=$result[0]['count'];

if($total_listing > 0){
?>
									<div class="card-body">
									<div class="table-responsive border userlist-table">
											<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
												<thead>
													<tr>
														
														<th class="col"><span>Work Title</span></th>
														<th class="col"><span>IP</span></th>
														<th class="col"><span>Timestamp</span></th>
													</tr>
												</thead>
												<tbody>
<?php
foreach($result as $key=>$val){
?>
<tr>
														<td class="text-truncate text-wrap"><?=$val['work_title'];?></td>
														<td><?=$val['ip'];?></td>
                                                        <td><?=$val['addedon'];?></td>
														
													</tr>
<? } ?>
												</tbody>
											</table>
										</div>
										
										<? include "include/paging.php"; ?>
										
										
										
									</div>
<?php } ?>
									<div class="card-body">
									<label class="main-content-label mb-0 pt-1 mb-2">Login Activity</label>
									<div class="table-responsive border userlist-table">
											<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
												<thead>
													<tr>
														<th class="col"><span>IP</span></th>
														<th class="col"><span>Login Time</span></th>
														<th class="col"><span>Logout Time</span></th>
														
													</tr>
												</thead>
												<tbody>
<?php
$table_name="itio_login_master";
$fetch_fields="*";
$where_condation=" AND `user_id`='".$_SESSION['loged_user']['admin_id']."' ORDER BY `id` DESC";
$result=get_table_list($table_name,$fetch_fields,$where_condation,-10,$page=0);
foreach($result as $key=>$val){

?>
<tr>
														<td><?=$val['log_ip'];?></td>
														<td><?=$val['log_on'];?></td>
                                                        <td><?=$val['log_out'];?></td>
														
													</tr>
<? } ?>
												</tbody>
											</table>
										</div>	
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
