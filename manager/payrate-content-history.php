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

	.contact-css li {
	  color: darkblue;
	  list-style-type: disclosure-closed;
	}
	.media img { height:35px !important;width:35px !important; padding:2px !important; }
	 svg {touch-action: none; height: 10px !important;}
    .category-icon { display:none !important;}
   
  
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
								<h2 class="main-content-title tx-24 mg-b-5">Payrate Content History</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Payrate Content History</li>
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
											<label class="main-content-label mb-0 pt-1">Payrate Data List</label>
											<div class="ms-auto float-end">
												<div class="">
													<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Download Data"><i class="fa-solid fa-cloud-arrow-down fa-fade"></i></a>
													<div class="dropdown-menu dropdown-menu-end" style="">
<a class="dropdown-item" href="include/download-content-excel.php?sid=Payrate"><i class="fa-regular fa-file-excel text-danger" style="font-size: 18px;" title="Download Excel File"></i>&nbsp;Excel</a>
<a class="dropdown-item" href="include/download-content-word.php?sid=Payrate"><i class="fa fa-file-word-o text-info" style="font-size: 18px;" title="Download Word File"></i>&nbsp;Word</a>
<a class="dropdown-item" href="view-html.php?sid=Payrate"><i class="fa-brands fa-chrome text-warning" style="font-size: 18px;" title="Html View"></i>&nbsp;Html</a>
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
														<th class="wd-lg-8p"><span>Company</span></th>
														<th class="wd-lg-20p"><span>Categories</span></th>
														<th class="wd-lg-20p"><span>Legal Entities</span></th>
														<th class="wd-lg-20p"><span>Follow US</span></th>
														<th class="wd-lg-20p" style="width:90px;">Action</th>
													</tr>
												</thead>
												<tbody>
<?php
$table_name="itio_fetched_data";
$fetch_fields="*";
$where_condation=" AND `source`='Payrate' ORDER BY `company_name` ASC";
$number_of_records=(isset($_GET['page']))?$_GET['page']:1;
$result=get_table_list($table_name,$fetch_fields,$where_condation,$number_of_records,$page=1);
if(isset($page)&&$page){ $cnt=count($result); }
$total_listing=$result[0]['count'];
echo "<div class='text-end m-2 fw-bold'>Total : ".$total_listing."</div>";
foreach($result as $key=>$rs){

?>
<tr>
<td><strong><?php echo trim($rs['company_name']);?></strong><br>
						<?php echo $rs['company_url'];?><br>
                        jurisdiction : <?php echo trim($rs['jurisdiction']);?><br>
						<?php echo date("d F Y",strtotime($rs['addedon']));?>
</td>
<td class="col contact-css media">
<?php echo $rs['company_categories'];?>
</td>
<td class="col contact-css">
<?php echo $rs['legal_entities'];?>
</td>
<td class="col contact-css">
<?php echo $rs['follow_us'];?>
</td>
														<td>
<div class="next_tr_<?=$rs['content_id'];?> row" style="display:none;">
<div class="mboxtitle" style="display:none;"><?=$rs['company_name'];?></div>
<div class="row">
					<div class="col-md-12 row" >
					<div class="col-md-8"><strong><?=$rs['company_name'];?></strong><br><?=$rs['company_url'];?><br><?=$rs['source_url'];?><br>Phone :: <?=$rs['company_contact'];?><br>jurisdiction :: <?=$rs['jurisdiction'];?></div>
					<div class="col-md-4 text-right">
					<? if(isset($rs['company_logo'])&&$rs['company_logo']){ ?>
                    <img src="<?=$rs['company_logo'];?>" title="<?=$rs['company_name'];?>" style="height:100px;" />
                    <? } ?></div>
					</div>
					
					 	<div class="col-md-4" >
					    <h4> <strong>Legal Entities</strong> </h4>
                        <?=$rs['legal_entities'];?>
                      </div>
					  <div class="col-md-4" >
					    <h4> <strong>Categories</strong> </h4>
                        <?=$rs['company_categories'];?>
                      </div>
					  
					  	<div class="col-md-4 media" >
					    <h4> <strong>Social Media</strong> </h4>
                        <?=$rs['follow_us'];?>
                      </div>
					  
					  
					  
                      <div class="col-md-12" >
					    <h4> <strong>Original : Content</strong> </h4>
                        <textarea rows="5"  style="width:100%; padding:20px;" ><?=$rs['company_details'];?></textarea>
                      </div>
					  <div class="col-md-12" >
					  <h4> <strong>Generated Ai : Content</strong> </h4>
                        <textarea rows="5"  style="width:100%; padding:20px;" id="myInput"><?=$rs['generated_ai_content'];?></textarea>
                      </div>
					  <div class="col-md-12" >
					  <h4> <strong>Generated Ai JSON : Content</strong> </h4>
                        <textarea rows="10"  style="width:100%; padding:20px;"><?=$rs['generated_ai_json'];?></textarea>
                      </div>
                    </div>
</div>
<a data-bs-target="#myModal" data-bs-toggle="modal" href="javascript:void(0);"  data-count="<?=$rs['content_id'];?>" class="btn btn-sm btn-primary tr_open_on_modal" title="View Details"><i class="fe fe-search"></i></a>
<? if($rs['generated_ai_content']&&$rs['generated_ai_content']){?>
								  <i class="fa fa-check-circle btn btn-sm btn-success" title="AI Generated"></i>
								  <? }else{ ?>
								  
								  <a href="include/ai-api-update.php?content_id=<?=$rs['content_id'];?>" title="Generate Content" target="_blank"><i class="fa fa-times-circle btn btn-sm btn-danger" title="AI Not Generated"></i></a>
								  <? } ?>
<a href="<?=$rs['source_url'];?>" target="_blank" title="Source URL" class="btn btn-sm btn-success"><i class="fa fa-external-link"></i></a></tr>
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
