<?php include "include/common.php"; check_permission($pagename);
$pageurl=make_url($pagetitle);

$btn="Add";


if(isset($_POST['submit'])){ 
$content_title=trim($_POST['content_title']);
$content_type=trim($_POST['content_type']);
include "api/common-api.php";
header("location:".$pageurl.".php?msg=".$pagetitle." Generate Sucessfully");exit;
}

if(isset($_SESSION['last_id'])&&$_SESSION['last_id']){
$sel=mysqli_query($con,"select * from itio_content_master where content_id='".$_SESSION['last_id']."'");
$rs=mysqli_fetch_array($sel);
@$get_content_title=$rs['content_title'];
@$get_content=$rs['content'];
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
								<h2 class="main-content-title tx-24 mg-b-5"><i class="fa-solid fa-globe text-primary me-2"></i><?=$pagetitle;?> AI</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">AI <?=$pagetitle;?></li>
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
<input type="hidden" name="content_type" value="<?=$pagetitle;?>">												
<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-12">
																<label class="form-label">Content for <?=$pagetitle;?></label>
															</div>
															<div class="col-md-12">


<textarea class="form-control" rows="6" name="content_title" id="content_title" title="Content" autocomplete="off" required></textarea>

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
<div class="text-right"><a href="include/download-content.php?act=<?=$_SESSION['last_id'];?>" title="Download Content" target="_blank" class="btn btn-warning pull-right ms-2"><i class="fa-solid fa-file-arrow-down"></i></a>&nbsp;&nbsp;<a title="Copy Content" onClick="CopyValTestbox('<?=$get_content_title;?>')" class="btn btn-warning pull-right "><i class="fa-solid fa-clone"></i></a></div>

<div class="clearfix"></div>								
													
<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-12">
																<label class="form-label"><strong><?=$pagetitle;?></strong> :: </label>
															</div>
															<div class="col-md-12">
<textarea rows="20"  style="width:100%; padding:20px;" id="myInput">Content : &nbsp;&nbsp;<?=$get_content_title."\n\n";?><?=$pagetitle;?> : &nbsp;&nbsp;<? echo "\n\n".$get_content;?></textarea>
															</div>
														</div>
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
	var title=$("#content_title").val();
	if(title==""){ alert("Enter Content for <?=$pagetitle;?>"); return; }
	 
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
