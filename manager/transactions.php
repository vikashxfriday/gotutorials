<?php include "include/common.php"; check_permission($pagename);
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
								<h2 class="main-content-title tx-24 mg-b-5">Transactions</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Transactions</li>
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
											<label class="main-content-label mb-0 pt-1">Transactions</label>
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
$where_condation=" ORDER BY `transaction_id` DESC";
$number_of_records=(isset($_GET['page']))?$_GET['page']:1;
$result=get_table_list($table_name,$fetch_fields,$where_condation,$number_of_records,$page=1);
if(isset($page)&&$page){ $cnt=count($result); }
$total_listing=$result[0]['count'];
foreach($result as $key=>$val){





?>
 <tr class="text-primary">
	<td class="font-weight-semibold d-flex"><?=$val['transaction_id'];?></td>
	<td><?=$val['converted_transaction_currency'];?> <?=$val['converted_transaction_amount'];?></td>
	<td><?=$val['transaction_date'];?></td>
	<td><?=$val['transaction_type'];?> - <?=$val['transaction_for'];?></td>
	<td><?=$val['transaction_status'];?></td>

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
