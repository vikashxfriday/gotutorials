<?php include "include/common.php"; check_permission($pagename); ?>
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
								<h2 class="main-content-title tx-24 mg-b-5">Finscanner Content History</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Finscanner Content History</li>
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
											<label class="main-content-label mb-0 pt-1">Finscanner Data List</label>
											<div class="ms-auto float-end">
												<div class="">
													<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Download Data"><i class="fa-solid fa-cloud-arrow-down fa-fade"></i></a>
													<div class="dropdown-menu dropdown-menu-end" style="">
<a class="dropdown-item" href="include/download-content-excel.php?sid=Finscanner"><i class="fa-regular fa-file-excel text-danger" style="font-size: 18px;" title="Download Excel File"></i>&nbsp;Excel</a>
<a class="dropdown-item" href="include/download-content-word.php?sid=Finscanner"><i class="fa fa-file-word-o text-info" style="font-size: 18px;" title="Download Word File"></i>&nbsp;Word</a>
<a class="dropdown-item" href="view-html.php?sid=Finscanner"><i class="fa-brands fa-chrome text-warning" style="font-size: 18px;" title="Html View"></i>&nbsp;Html</a>
													</div>
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
													  <th class="wd-lg-20p"><span>Logo</span></th>
														<th class="wd-lg-8p"><span>Company</span></th>
														<th class="wd-lg-20p"><span>Services</span></th>
														<th class="wd-lg-20p"><span>Other</span></th>
														<th class="wd-lg-20p" style="width:90px;">Action</th>
													</tr>
												</thead>
												<tbody>
<?php
$table_name="itio_fetched_data";
$fetch_fields="*";
$where_condation=" AND `source`='Finscanner' ORDER BY `company_name` ASC";
$number_of_records=(isset($_GET['page']))?$_GET['page']:1;
$result=get_table_list($table_name,$fetch_fields,$where_condation,$number_of_records,$page=1);
if(isset($page)&&$page){ $cnt=count($result); }
$total_listing=$result[0]['count'];
echo "<div class='text-end m-2 fw-bold'>Total : ".$total_listing."</div>";
foreach($result as $key=>$val){

if($val['company_logo']=="https://admin.finscanner.ionull"){ $val['company_logo']=""; }
?>
<tr>
<td>
<? if(isset($val['company_logo'])&&$val['company_logo']){ ?>
<img src="<?=$val['company_logo'];?>" title="<?=$val['company_name'];?>" style="height:100px;width:100px;" />
<? } ?></td>
<td><?php echo trim($val['company_name']);?></strong><br>
<?php echo $val['company_url'];?><br>
Country : <?php echo trim($val['company_contact']);?><br>
<?php echo date("d F Y",strtotime($val['addedon']));?></td>
<td >
<p class="d-inline-block text-truncate" style="max-width: 150px;" title="<?php echo $val['company_categories'];?>"><?php echo $val['company_categories'];?></p><br>Rating : <?php echo $val['company_rating'];?></td>
<td>
                        Entity Type : <?php echo $val['entity_type'];?><br>
						Client Type : <?php echo $val['client_type'];?><br>
						License : <?php echo $val['company_license'];?></td>
														<td>
<div class="next_tr_<?=$val['content_id'];?> row" style="display:none;">
<div class="mboxtitle" style="display:none;"><?=$val['company_name'];?></div>
<div class="row">
					<div class="col-md-12 row" >
					<div class="col-md-8"><strong><?=$val['company_name'];?></strong><br><?=$val['company_url'];?><br><?=$val['source_url'];?><br>Company Country :: <?=$val['company_contact'];?><br>Entity Type :: <?=$val['entity_type'];?><br>Client Type :: <?=$val['client_type'];?><br>License :: <?=$val['company_license'];?><br>Rating :: <?=$val['company_rating'];?></div>
					<div class="col-md-4 text-right">
					<? if(isset($val['company_logo'])&&$val['company_logo']){ ?>
                    <img src="<?=$val['company_logo'];?>" title="<?=$val['company_name'];?>" style="height:100px;" />
                    <? } ?></div>
					</div>
					
					  <div class="col-md-12" >
					    <h4> <strong>Services</strong> </h4>
                        <?=$val['company_categories'];?>
                      </div>
					  
					  	<div class="col-md-12 my-2 media" >
					    <h4> <strong>Social Media</strong> </h4>
                        <?=$val['follow_us'];?>
                      </div>
					  
					  
					  
                      <div class="col-md-12" >
					    <h4> <strong>Original : Content</strong> </h4>
                        <textarea rows="5"  style="width:100%; padding:20px;" ><?=$val['company_details'];?></textarea>
                      </div>
					  <div class="col-md-12" >
					  <h4> <strong>Generated Ai : Content</strong> </h4>
                        <textarea rows="5"  style="width:100%; padding:20px;" id="myInput"><?=$val['generated_ai_content'];?></textarea>
                      </div>
					  <div class="col-md-12" >
					  <h4> <strong>Generated Ai JSON : Content</strong> </h4>
                        <textarea rows="10"  style="width:100%; padding:20px;"><?=$val['generated_ai_json'];?></textarea>
                      </div>
                    </div>
</div>
<a data-bs-target="#myModal" data-bs-toggle="modal" href="javascript:void(0);"  data-count="<?=$val['content_id'];?>" class="btn btn-sm btn-primary tr_open_on_modal" title="View Details"><i class="fe fe-search"></i></a>
<? if($val['generated_ai_content']&&$val['generated_ai_content']){?>
								  <i class="fa fa-check-circle btn btn-sm btn-success" title="AI Generated"></i>
								  <? }else{ ?>
								  
								  <a href="include/ai-api-update.php?content_id=<?=$rs['content_id'];?>" title="Generate Content" target="_blank"><i class="fa fa-times-circle btn btn-sm btn-danger" title="AI Not Generated"></i></a>
								  <? } ?>
<a href="<?=$val['source_url'];?>" target="_blank" title="Source URL" class="btn btn-sm btn-success"><i class="fa fa-external-link"></i></a></tr>
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
