<?php include "include/common.php"; check_permission($pagename);

if(isset($_GET['mid'])&&isset($_GET['action'])&&$_GET['action']=="deactive"){ 
$act=user_status($_GET['mid'],3);
	if($act){
	header("location:manage-user.php?msg=User Deactivated");
	}
}

if(isset($_GET['mid'])&&isset($_GET['action'])&&$_GET['action']=="active"){ 
$act=user_status($_GET['mid'],1);
	if($act){
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
								<h2 class="main-content-title tx-24 mg-b-5">Company Fetched List</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Company Fetched List</li>
								</ol>
							</div>
							
						</div>
						<!-- End Page Header -->

						

						<!--Row-->
						<div class="row row-sm">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
								<div class="card custom-card">
									<div class="card-header border-bottom-0 pb-0">
										<div class="d-flex justify-content-between">
											<label class="main-content-label mb-0 pt-1">Company List</label>
											<div class="ms-auto float-end">
												<div class="">
													<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal"></i></a>
													<?php /*?><div class="dropdown-menu dropdown-menu-end" style="">
														<a class="dropdown-item" href="javascript:void(0);">Today</a>
														<a class="dropdown-item" href="javascript:void(0);">Last Week</a>
														<a class="dropdown-item" href="javascript:void(0);">Last Month</a>
														<a class="dropdown-item" href="javascript:void(0);">Last Year</a>
													</div><?php */?>
												</div>
											</div>
										</div>
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
														<th class="wd-lg-8p"><span>Company Name</span></th>
														<th class="wd-lg-20p"><span>Company Url </span></th>
														<th class="wd-lg-20p"><span>Source</span></th>
														<th class="wd-lg-20p" style="width:90px;">Action</th>
													</tr>
												</thead>
												<tbody>
<?php
$table_name="itio_company_fetched_list";
$fetch_fields="*";
$where_condation="";
$number_of_records=(isset($_GET['page']))?$_GET['page']:1;
$result=get_table_list($table_name,$fetch_fields,$where_condation,$number_of_records,$page=1);
if(isset($page)&&$page){ $cnt=count($result); }
$total_listing=$result[0]['count'];
foreach($result as $key=>$val){

$company_url=$val['company_url'];
if ( strstr($company_url,'http://') || strstr($company_url,'https://')) {
   
   } else { 
      $company_url="https://".$val['company_url'];
   } 



?>
<tr>
														<td><?=$val['company_name'];?></td>
														<td><a href="<?=$company_url;?>" title="Move to Company Website" target="_blank"><?=$company_url;?></a></td>
<td><a href="<?=$val['source_url'];?>" title="Move to Fetcher Website" target="_blank"><?=$val['source_web'];?></a></td>
														<td>
<div class="next_tr_<?=$val['id'];?> row" style="display:none;">
<div class="mboxtitle" style="display:none;"><?=$val['company_name'];?></div>

<?php include "include/content-details.php"; ?>

</div>
<a data-bs-target="#myModal" data-bs-toggle="modal" href="javascript:void(0);"  data-count="<?=$val['id'];?>" class="btn btn-sm btn-primary tr_open_on_modal" title="View Details"><i class="fe fe-search"></i></a>
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
