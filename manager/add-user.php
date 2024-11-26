<?php include "include/common.php"; check_permission($pagename); 
$btn="Add";


if(isset($_GET['mid'])&&isset($_GET['action'])&&$_GET['action']=="edit"){ 
$mid=$_GET['mid'];
$result=get_table_list("itio_admin",'*'," AND `admin_id`='$mid' ","-2",0);
$get_data=$result[0];
$btn="Edit";
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
								<h2 class="main-content-title tx-24 mg-b-5">Users & Roles</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"><?=$btn;?> User</li>
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
										<?php /*?><div>User Information</div><?php */?>
<form class="form-horizontal" action="include/user.php" method="post" autocomplete="off">
<? if(isset($btn)&&$btn=="Add"){ ?>
													<div class="mb-4 main-content-label">Login Details</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">User Name</label>
															</div>
															<div class="col-md-9">
<input type="text" class="form-control auto_remove_space" placeholder="User Name" name="admin_user" id="admin_user" title="User Name" 
value="<? if(isset($get_data['admin_user'])){ echo $get_data['admin_user'];}?>" autocomplete="off" required>
															</div>
														</div>
													</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Password</label>
															</div>
															<div class="col-md-9">
<input type="text" class="form-control" placeholder="Password" name="admin_pass" id="admin_pass" title="Password" autocomplete="off" required>
															</div>
														</div>
													</div>
<? }else{ ?>
<input type="hidden" name="mid" value="<?=$mid;?>">

<? } ?>													
													
													<div class="mb-4 main-content-label">Contact Info</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Full Name</label>
															</div>
															<div class="col-md-9">
<input type="text" class="form-control" placeholder="Full Name" name="admin_name" id="admin_name" title="Full Name" value="<? if(isset($get_data['admin_name'])){ echo $get_data['admin_name'];}?>" autocomplete="off" required>
															</div>
														</div>
													</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Email</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Email" name="admin_email" id="admin_email"  title="Email" value="<? if(isset($get_data['admin_email'])){  echo $get_data['admin_email'];} ?>" autocomplete="off" required>
															</div>
														</div>
													</div>
													
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Mobile / Phone</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Mobile / Phone number" name="admin_mobile" id="admin_mobile" title="Mobile / Phone" value="<? if(isset($get_data['admin_mobile'])){ echo $get_data['admin_mobile'];} ?>" autocomplete="off" required>
															</div>
														</div>
													</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Address</label>
															</div>
															<div class="col-md-9">
																
																<input type="text" class="form-control" placeholder="Address" name="admin_address" id="admin_address" title="Address" value="<? if(isset($get_data['admin_address'])){  echo $get_data['admin_address']; }?>" autocomplete="off" required>
															</div>
														</div>
													</div>
													
													<div class="mb-4 main-content-label">Roles & Permission</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Admin Type</label>
															</div>
															<div class="col-md-9">
<select name="admin_type" id="admin_type" class="form-control select-lg select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" title="Admin Type" required>
<option value="">Select Admin Type</option>
<?php
foreach($data['admin_typ'] as $key => $val){
?>
<option value="<?=$key;?>" <? if(isset($get_data['admin_type'])&&$get_data['admin_type']==$key){ ?> selected="selected" <? } ?>><?=$val;?></option>
<?php
}
?>
</select>
															</div>
														</div>
													</div>
<!-- Row -->
						
							

						<!-- End Row -->													
													
													
<div>
<button type="submit" class="btn btn-primary text-white" id="submit_btn"  name="submit" value="<?=$btn;?>"> <i class="fa-regular fa-circle-check"></i> <?=$btn;?></button>

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
$('#submit_btn').on('click', function () {


	//alert(66);
	var admin_user=$('#admin_user').val();
	var admin_pass=$('#admin_pass').val();
	var admin_name=$('#admin_name').val();
	var admin_email=$('#admin_email').val();
	var admin_mobile=$('#admin_mobile').val();
	var admin_address=$('#admin_address').val();
	var admin_type=$('#admin_type').val();
	//alert(88);	
	if(admin_user==''){
		    alert('Please enter username');
			$('#admin_user').focus();
			return false;
		}else if(admin_user.length<6){
         alert("username must be at least of 6 characters.");
         $('#admin_user').focus();
         return false;
        }else if(admin_pass==''){
         alert('Please enter password');
         $('#admin_user').focus();
         return false;
        }else if(admin_pass.length<6){
         alert("Password must be at least of 6 characters.");
         $('#admin_pass').focus();
         return false;
        }else if(admin_name==''){
         alert('Please enter name');
         $('#admin_name').focus();
         return false;
        }else if(admin_email==''){
         alert('Please enter emai');
         $('#admin_email').focus();
         return false;
        }else if(admin_mobile==''){
         alert('Please enter mobile no');
         $('#admin_mobile').focus();
         return false;
        }else if(admin_address==''){
         alert('Please enter address');
         $('#admin_address').focus();
         return false;
        }else if(admin_type==''){
         alert('Please select Admin Type');
         $('#admin_type').focus();
         return false;
		 }

	

});
$('.auto_remove_space').on('keyup',function(e) {
  $( this ).val($( this ).val().replace(/\s/g, ''));
});	
</script>		

    </body>


</html>
