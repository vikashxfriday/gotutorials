<?php include "include/common.php"; ?>
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
								<h2 class="main-content-title tx-24 mg-b-5">Profile</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</div>
							
						</div>
						<!-- End Page Header -->

						<div class="row square">
							<div class="col-lg-12 col-md-12">
								<div class="card custom-card">
									<div class="card-body">
										<div class="panel profile-cover">
											<div class="profile-cover__img">
												<img src="assets/img/profile.png" alt="img">
												<h3 class="h3"><?=ucwords($_SESSION['loged_user']['admin_name']);?></h3>
<h5 class="h5 text-danger">[ <?=$data['admin_typ'][$_SESSION['loged_user']['admin_type']];?> ]</h5>
											</div>
											
												
												
											
											<div class="profile-cover__action bg-img"></div>
											<div class="profile-cover__info">
<ul class="nav">
<li><i class="fa-solid fa-mobile fa-fade text-info"></i>&nbsp;<strong><?=ucwords($_SESSION['loged_user']['admin_mobile']);?></strong></li>
<li><i class="fa-solid fa-envelope fa-fade text-info"></i>&nbsp;<strong><?=ucwords($_SESSION['loged_user']['admin_email']);?></strong></li>

</ul>
											</div>
                                        </div>
										<div class="profile-tab tab-menu-heading">
											<nav class="nav main-nav-line p-3 tabs-menu profile-nav-line bg-gray-100">
												
												
<a class="btn btn-primary up my-1" data-bs-toggle="collapse" href="#EditCollapse" role="button" aria-expanded="false" aria-controls="EditCollapse"> <i class="fa-solid fa-user-pen"></i> Edit Profile</a>&nbsp;<a class="btn btn-primary text-white my-1" id="submit_reset"> <i class="fa-brands fa-keycdn" ></i> Reset Password</a>
<a class="text-success mt-1" id="mbox" style="display:none;">
	<strong>Password Reset link sent your Registered Email id</strong>
</a>
    
 
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-12 col-md-12">
								<div class="card custom-card main-content-body-profile">
									<div class="tab-content">
									
										
										<div class="collapse main-content-body tab-pane88 p-4 border-top-0 down" id="EditCollapse">
											<div class="card-body border">
												<div class="mb-4 main-content-label">Personal Information</div>
												<form class="form-horizontal">
													<div class="mb-4 main-content-label">Name</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Full Name</label>
															</div>
															<div class="col-md-9">
<input type="text" class="form-control" placeholder="Full Name" value="<?=ucwords($_SESSION['loged_user']['admin_name']);?>"  name="admin_name" id="admin_name" title="Full Name" required>
															</div>
														</div>
													</div>
													
													
													
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Designation</label>
															</div>
															<div class="col-md-9">
<input type="text" class="form-control" placeholder="Designation" value="<?=ucwords($_SESSION['loged_user']['admin_designation']);?>" name="admin_designation" id="admin_designation" title="Designation" required>
															</div>
														</div>
													</div>
													<div class="mb-4 main-content-label">Contact Info</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Email</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Email" value="<?=ucwords($_SESSION['loged_user']['admin_email']);?>" name="admin_email" id="admin_email"  title="Email" required>
															</div>
														</div>
													</div>
													
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Mobile / Phone</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Mobile / Phone number" value="<?=ucwords($_SESSION['loged_user']['admin_mobile']);?>" name="admin_mobile" id="admin_mobile" title="Mobile / Phone" required>
															</div>
														</div>
													</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Address</label>
															</div>
															<div class="col-md-9">
																<textarea class="form-control" rows="2" placeholder="Address"  name="admin_address" id="admin_address" title="Address" required><?=ucwords($_SESSION['loged_user']['admin_address']);?></textarea>
															</div>
														</div>
													</div>
<div class="col-md-12">
<a class="btn btn-primary text-white" id="update_profile"> <i class="fa-regular fa-circle-check"></i> Submit</a>
<a href="signin.html?S=1" class="text-success fa-beat-fade" role="alert" id="sbox" style="display:none;height:38px;margin-bottom:0px;padding-top:9px;"><strong>Profile Update Successfully - Display after relogin</strong></a>

<a class="alert alert-outline-danger" role="alert" id="fbox" style="display:none;height:38px;margin-bottom:0px;padding-top:9px;"><strong>Profile Not Update - Try Again</strong></a>
</div>
												</form>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->


                    </div>
                </div>
            </div>
            <!-- END MAIN-CONTENT -->

<!-- FOOTER -->
            
            <? include "include/footer.php"; ?>
            <!-- END FOOTER -->

        </div>
       
            <? include "include/js.php"; ?>
			
			<script>

$('#submit_reset').on('click', function () {


$("#submit_reset").html("<i class='fa-solid fa-spinner fa-spin-pulse'></i>");
var vvvv="<?=$_SESSION['loged_user']['admin_user'];?>";

$.ajax({
	url: "include/reset-password.php",
	data:'admin_user='+vvvv,
	type: "POST",
	success:function(data){
	  if(data==1){ 
	  $("#submit_reset").hide();
	  $("#mbox").show();
	  }else{
	  $("#submit_reset").html("Reset Password");
	  }
	},
	error:function (){}
	});
	
	

});


$('#update_profile').on('click', function () {

    var admin_name=$('#admin_name').val();
	var admin_designation=$('#admin_designation').val();
	var admin_email=$('#admin_email').val();
	var admin_mobile=$('#admin_mobile').val();
	var admin_address=$('#admin_address').val();

         if(admin_name==''){
			alert('Please enter full name');
			$('#admin_name').focus();
			return false;
		}else if(admin_designation==''){
			alert('Please enter your designation');
			$('#admin_designation').focus();
			return false;
		}else if(admin_email==''){
			alert('Please enter emailid');
			$('#admin_email').focus();
			return false;
		}else if(admin_mobile==""){
			alert('Please enter mobile no');
			$('#admin_mobile').focus();
			return false;
		}else if(admin_address==""){
			alert('Please enter Address');
			$('#admin_address').focus();
			return false;
		}

$("#update_profile").html("<i class='fa-solid fa-spinner fa-spin-pulse'></i>");


$.ajax({
	url: "include/update-profile.php",
	data:'admin_name='+admin_name+'&admin_designation='+admin_designation+'&admin_email='+admin_email+'&admin_mobile='+admin_mobile+'&admin_address='+admin_address,
	type: "POST",
	success:function(data){
	  //alert(data);
	  if(data==1){ 
	  $("#update_profile").hide();
	  $("#sbox").show();
	  }else{
	  $("#update_profile").html("Reset Password");
	  $("#fbox").show();
	  }
	},
	error:function (){}
	});
	
	

});

$(".up").click(function() {
     $('html, body').animate({
         scrollTop: $(".down").offset().top
     }, 1000);
 });
</script>

    </body>


</html>
