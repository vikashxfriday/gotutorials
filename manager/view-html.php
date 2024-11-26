<?php include "include/common.php"; 


if(isset($_REQUEST['sid'])&&$_REQUEST['sid']){
$ptitle=$_REQUEST['sid'];
}else{
$ptitle="Trustpilot";
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
.contact-css li {color: darkblue;list-style-type: disclosure-closed;}
.term-icon.image-icon { display:none!important; }
	.media33 img { height:35px !important;width:35px !important; padding:2px !important; }
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
								<h2 class="main-content-title tx-24 mg-b-5"><?=$ptitle;?> Content Html View</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"><?=$ptitle;?> Content Html View</li>
								</ol>
							</div>
							
						</div>
						<!-- End Page Header -->

						<!--Row-->
						<div class="row row-sm">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
								<div class="card custom-card">
									<div class="card-header border-bottom-0 pb-0">
										

									</div>
									<div class="card-body">
										<div class="table-responsive border userlist-table">
											<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
												
												<tbody>
<?php
$table_name="itio_fetched_data";
$fetch_fields="*";
$where_condation=" AND `source`='".$ptitle."' ORDER BY `company_name` ASC";
$number_of_records=(isset($_GET['page']))?$_GET['page']:1;
$result=get_table_list($table_name,$fetch_fields,$where_condation,$number_of_records,$page=1);
if(isset($page)&&$page){ $cnt=count($result); }
$total_listing=$result[0]['count'];
echo "<div class='text-end m-2 fw-bold'>Total : ".$total_listing."</div>";
$i=1;
foreach($result as $key=>$rs){

?>
<tr valign="top">
 <td class="col contact-css media">

                                   
                                      
<div class="">
                    <p><div class="row">
					<div class="col-md-12 row" >
					<div class="col-md-12 text-end p-2">
					<? if(isset($rs['company_logo'])&&$rs['company_logo']){ ?>
                    <img src="<?=$rs['company_logo'];?>" title="<?=$rs['company_name'];?>" style="height:100px;" />
                    <? } ?>
					</div>
					<div class="col-md-4"><strong><?=$i;?> . <?=$rs['company_name'];?></strong><br>
					<a href="<?=make_url_with_https($rs['company_url']);?>" title="move to website" target="_blank"><?=make_url_with_https($rs['company_url']);?></a><br>
					<?=$rs['source_url'];?><br>

					
					</div>
					
					<div class="col-md-4" >
					    <h4><strong>Contact</strong></h4>
                        <?=$rs['company_contact'];?>
                      </div>
					  <div class="col-md-4" >
					    <h4><strong>Categories</strong></h4>
                        <?=$rs['company_categories'];?>
                      </div>
					  <div class="col-md-12" >
					  
					  <? if(isset($rs['company_rating'])&&$rs['company_rating']){ ?>
					  <div class="my-2"><strong>Rating</strong> :: <?=$rs['company_rating'];?></div>
					  <? } ?>
					  
					  <? if(isset($rs['company_reviews'])&&$rs['company_reviews']){ ?>
					  <div class="my-2"><strong>Reviews</strong> :: <?=$rs['company_reviews'];?></div>
					  <? } ?>
					  
					  
					  <? if(isset($rs['follow_us'])&&$rs['follow_us']){ ?>
					  <div class="my-2"><strong>Follow US</strong> :: <?=$rs['follow_us'];?></div>
					  <? } ?>
					  
					  
					  <? if(isset($rs['company_email'])&&$rs['company_email']){ ?>
					  <div class="my-2"><strong>Email</strong> :: <?=$rs['company_email'];?></div>
					  <? } ?>
					  
					  <? if(isset($rs['risk_appetite'])&&$rs['risk_appetite']){ ?>
					  <div class="my-2"><strong>Risk Appetite</strong> :: <?=$rs['risk_appetite'];?></div>
					  <? } ?>
					  
					  <? if(isset($rs['payment_methods'])&&$rs['payment_methods']){ ?>
					  <div class="my-2"><strong>Payment Methods</strong> :: <?=$rs['payment_methods'];?></div>
					  <? } ?>
					  
					  <? if(isset($rs['payment_options'])&&$rs['payment_options']){ ?>
					  <div class="my-2"><strong>Payment Options</strong> :: <?=$rs['payment_options'];?></div>
					  <? } ?>
					  
					  <? if(isset($rs['features'])&&$rs['features']){ ?>
					  <div class="my-2"><strong>Features</strong> :: <?=$rs['features'];?></div>
					  <? } ?>
					  
					  <? if(isset($rs['solutions'])&&$rs['solutions']){ ?>
					  <div class="my-2"><strong>Solutions</strong> :: <?=$rs['solutions'];?></div>
					  <? } ?>
					  
					  <? if(isset($rs['accepted_industries'])&&$rs['accepted_industries']){ ?>
					  <div class="my-2"><strong>Accepted Industries</strong> :: <?=$rs['accepted_industries'];?></div>
					  <? } ?>
					  
					  <? if(isset($rs['jurisdiction'])&&$rs['jurisdiction']){ ?>
					  <div class="my-2"><strong>Jurisdiction</strong> :: <?=$rs['jurisdiction'];?></div>
					  <? } ?>
					  
					  <? if(isset($rs['legal_entities'])&&$rs['legal_entities']){ ?>
					  <div class="my-2"><strong>Legal Entities</strong> :: <?=$rs['legal_entities'];?></div>
					  <? } ?>
					  
					  <? if(isset($rs['entity_type'])&&$rs['entity_type']){ ?>
					  <div class="my-2"><strong>Entity Type</strong> :: <?=$rs['entity_type'];?></div>
					  <? } ?>
					  
					  <? if(isset($rs['client_type'])&&$rs['client_type']){ ?>
					  <div class="my-2"><strong>Client Type</strong> :: <?=$rs['client_type'];?></div>
					  <? } ?>
					  
					  <? if(isset($rs['company_license'])&&$rs['company_license']){ ?>
					  <div class="my-2"><strong>Company License</strong> :: <?=$rs['company_license'];?></div>
					  <? } ?>
					  
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
                    </div></p>
                                </div>
                                      
                                    </div>
                              
								  
								  
</td>
</tr>

<? $i++; } ?>
														

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
