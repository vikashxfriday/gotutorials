<?php include "include/common.php"; 

if(isset($_GET['s_cat'])&&isset($_GET['s_key'])&&$_GET['s_cat']&&$_GET['s_key']){ 
$s_cat=$_GET['s_cat'];
$s_key=$_GET['s_key'];

		if($s_cat=="company"){
			$where_condation=" AND `company_name` like '%$s_key%' ";
			$result=get_table_list("itio_company_fetched_list","*",$where_condation,"1","");
		}elseif($s_cat=="image"){
			$where_condation=" AND `template` = 'Image Generator' AND `content_title` like '%$s_key%' ";
			$result=get_table_list("itio_content_master","*",$where_condation,"1","");
		}elseif($s_cat=="content"){
			$where_condation=" AND `template` != 'Image Generator' AND `content_title` like '%$s_key%' ";
			$result=get_table_list("itio_content_master","*",$where_condation,"1","");
		}else{
			$where_condation=" AND `template` != 'Image Generator' AND `content_title` like '%$s_key%' ";
			$result=get_table_list("itio_content_master","*",$where_condation,"1","");
		}

//echo count($result);

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
.form-control { color: #ff4401 !important; }
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
								<h2 class="main-content-title tx-24 mg-b-5">Search</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"><?=$s_cat;?> :: <?=$s_key;?></li>
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
											<label class="main-content-label mb-0 pt-1">Data List</label>
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

									</div>
									<div class="card-body">
										<div class="table-responsive border userlist-table">
<? if(isset($_GET['s_cat'])&&$_GET['s_cat']=="company"){ ?>										
										
											<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
												<thead>
													<tr>
														<th class="wd-lg-8p"><span>Company Name</span></th>
														<th class="wd-lg-20p"><span>Company Url </span></th>
														<th class="wd-lg-20p"><span>Source</span></th>
														<th class="wd-lg-20p" style="width:90px;">Details</th>
													</tr>
												</thead>
												<tbody>
<?php
foreach($result as $key=>$val){
$company_url=$val['company_url'];

if(strstr($company_url,'http://') || strstr($company_url,'https://')) {
}else{ 
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
<? }else{ ?>

<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
												<thead>
													<tr>
														<th class="wd-lg-8p"><span>Content Title</span></th>
														<th class="wd-lg-20p"><span>Token Used</span></th>
														<th class="wd-lg-20p"><span>Timestamp</span></th>
														<th class="wd-lg-20p" style="width:90px;">Action</th>
													</tr>
												</thead>
												<tbody>
<?php
foreach($result as $key=>$val){
?>
<tr>
														<td class="text-wrap"><?=$val['content_title'];?></td>
														<td><?=$val['total_tokens'];?></td>
														<td><?=$val['timestamp'];?></td>
														<td>
<div class="next_tr_<?=$val['content_id'];?> row" style="display:none;">
<div class="mboxtitle" style="display:none;"><?=$val['content_title'];?></div>
<div class="row border bg-light my-2 text-start rounded">
<div class="col-sm-12 m-2"><strong>Description :</strong></div>
<div class="col-sm-12 m-2">

<? if($val['template']=="Single Page Website Creator"){ echo $val['content']; ?>
<? }elseif($val['template']=="Image Generator"){ ?>
<img src="<?=$val['content'];?>" title="<?=$val['content_title'];?>" align="<?=$val['content_title'];?>" class="">
<? }else{ ?>
<textarea class="form-control" rows="10"><? if(isset($val['content'])&&$val['content']){ echo $val['content'];}?></textarea>
<? } ?>

</div>

</div>
</div>
<a data-bs-target="#myModal" data-bs-toggle="modal" href="javascript:void(0);"  data-count="<?=$val['content_id'];?>" class="btn btn-sm btn-primary tr_open_on_modal" title="View Details"><i class="fe fe-search"></i></a></tr>
<? } ?>
												</tbody>
											</table>
<? } ?>
										
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
