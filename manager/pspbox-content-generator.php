<?php include "include/common.php"; check_permission($pagename);
$btn="Add";
$ptitle="PSPBOX";

if(isset($_POST['submit'])){ 

$source_url=trim($_POST['source_url']);

$_SESSION['sessid']=$sessid=session_id();

include "api/pspbox-fetch-data-api.php";

	if(isset($ins)&& $ins){
	include "api/ai-api.php";
	}
	
header("location:pspbox-content-generator.php?msg=$messagess&css=$css");exit;

}

if(isset($_SESSION['last_id'])&&$_SESSION['last_id']){
$sel=mysqli_query($con,"select * from `itio_fetched_data` where `content_id`='".$_SESSION['last_id']."'");
$row=mysqli_fetch_array($sel);
$get_content_title=$row['company_name'];
$get_content=$row['company_details'];
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

	.contact-css li {
	  color: darkblue;
	  list-style-type: disclosure-closed;
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
								<h2 class="main-content-title tx-24 mg-b-5"><?=$ptitle;?> Company Data</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Company Data</li>
								</ol>
							</div>
							
						</div>
						<!-- End Page Header -->

						

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-12 col-md-12">
								<div class="card custom-card main-content-body-profile">
									<div class="tab-content">
									
								
										<div class="main-content-body tab-pane88 p-4 border-top-0">
											<div class="card-body border">
												
<form action="" method="post">													
<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-12">
																<label class="form-label">Enter <?=$ptitle;?> Company URL <small class="category">Enter URl Like - https://pspbox.com/payment-solution/hayvn-pay/</small></label>
															</div>
															<div class="col-md-12">
<input type="text" class="form-control" placeholder="Enter <?=$ptitle;?> Company URL" name="source_url" id="source_url" title="Enter <?=$ptitle;?> Company URL"  autocomplete="off" required>
															</div>
														</div>
													</div>
<!-- End Row -->													
<div>
<button type="submit" class="btn btn-primary text-white submit_loader" name="submit" value="submit"> Generate </button>

</div>
</form>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->
						
<? if(isset($_SESSION['last_id'])&&$_SESSION['last_id']){ ?>						
						<!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-12 col-md-12">
								<div class="card custom-card main-content-body-profile">
									<div class="tab-content">
										
										
										<div class="main-content-body tab-pane88 p-4 border-top-0">
											<div class="card-body border">
<? if(isset($_GET['msg'])&&$_GET['msg']){ ?>

<div class="alert alert-success" role="alert">
	<button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button">
		<span aria-hidden="true">&times;</span>
	</button>
	<strong><?=$_GET['msg'];?></strong>
</div>

<? } ?>	
<div class="text-right"><a href="include/download-fetched-content.php?act=<?=$_SESSION['last_id'];?>" title="Download Content" target="_blank" class="btn btn-warning pull-right ms-2"><i class="fa-solid fa-file-arrow-down"></i></a>&nbsp;&nbsp;<a title="Copy Content" onClick="CopyValTestbox('<?=$get_content_title;?>')" class="btn btn-warning pull-right "><i class="fa-solid fa-clone"></i></a></div>

<div class="clearfix"></div>								
													
<div class="form-group ">
														<form>
				    <div class="row">
					<div class="col-md-12 row" >
					<div class="col-md-3"><strong><?=$row['company_name'];?></strong><br><?=$row['company_url'];?><br><?=$row['source_url'];?><br>Reviews : <strong><?=$row['company_reviews'];?></strong> Rating :  <strong><?=$row['company_rating'];?></strong> </div>
					<div class="col-md-3  contact-css"><?=$row['company_contact'];?></div>
					<div class="col-md-3  contact-css"><?=$row['company_categories'];?></div>
					<div class="col-md-3 text-right">
					<? if(isset($row['company_logo'])&&$row['company_logo']){ ?>
                    <img src="<?=$row['company_logo'];?>" title="<?=$row['company_name'];?>" style="height:100px;" />
                    <? } ?></div>
					</div>
                      <div class="col-md-12" >
					    <h4> <strong>Original : Content</strong> </h4>
                        <textarea rows="5"  style="width:100%; padding:20px;" ><?=$row['company_details'];?></textarea>
                      </div>
					  <div class="col-md-12" >
					  <h4> <strong>Generated Ai : Content</strong> </h4>
                        <textarea rows="5"  style="width:100%; padding:20px;" id="myInput"><?=$row['generated_ai_content'];?></textarea>
                      </div>
					  <div class="col-md-12" >
					  <h4> <strong>Generated Ai JSON : Content</strong> </h4>
                        <textarea rows="10"  style="width:100%; padding:20px;"><?=$row['generated_ai_json'];?></textarea>
                      </div>
                    </div>
				  </form>
													</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->
<? } ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN-CONTENT -->


            <!-- FOOTER -->
            
            <? include "include/footer.php"; ?>
            <!-- END FOOTER -->

        </div>
       
            <? include "include/js.php"; ?>
			
<!-- INTERNAL WYSIWYG EDITOR JS -->
<script src="assets/plugins/wysiwyag/jquery.richtext.js"></script>
<script src="assets/plugins/wysiwyag/wysiwyag.js"></script>		
<script>
$(".submit_loader").click(function()
	{
	var title=$("#source_url").val();
	if(title==""){ alert("Enter Company Source Url"); return; }
	 
	 $(".submit_loader").html("<i class='fa-solid fa-spinner fa-spin'></i>");
	});
	
	
	// js for copy data
	function CopyValTestbox(theLabel) {
   
	var range = document.createRange();
	range.selectNode(document.getElementById("myInput"));
	window.getSelection().removeAllRanges(); // clear current selection
	window.getSelection().addRange(range); // to select text
	
	
	        if (document.execCommand('copy')) {
                window.getSelection().removeAllRanges();// to deselect
				alert("Copied : " + theLabel);
            }
	}
		
</script>
    </body>


</html>
