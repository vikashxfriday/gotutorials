<?php include "include/common.php"; check_permission($pagename);
$btn="Add";


if(isset($_POST['submit'])){ 
$upi_id=$_SESSION['upi_id']=trim($_POST['upi_id']);
$amount=$_SESSION['amount']=trim($_POST['amount']);

//include "upi-payment.php";

exit;
header("location:payment-status.php");exit;
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
								<h2 class="main-content-title tx-24 mg-b-5"><i class="fa-brands fa-amazon-pay sidemenu-icon menu-icon  text-primary me-2"></i>Send Payment</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Send Payment</li>
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
															
															<div class="col-md-6">
															<label class="form-label">UPI ID</label>
<input type="text" class="form-control" placeholder="Enter your upi id " name="upi_id" id="upi_id" title="Enter your upi id"  autocomplete="off" required>
															</div>
															
															
															<div class="col-md-6">
															<label class="form-label">Amount</label>
<input type="text" class="form-control allow_decimal" placeholder="Enter amount to pay" name="amount" id="amount" title="Enter amount to pay"  autocomplete="off" required>
															</div>
														</div>
														
														
														
													</div>
<!-- End Row -->													
<div>
<button type="submit" class="btn btn-primary text-white submit_loader" name="submit" value="submit"> Pay Now </button>

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
			
<!-- INTERNAL WYSIWYG EDITOR JS -->
	
<script>

   function validateUPI(upi) {
    // UPI pattern: alphanumeric with allowed special characters -._@
    var upiPattern = /^[\w.-]+@[\w.-]+$/;

    // Check if the UPI matches the pattern
    if (upiPattern.test(upi)) {
        return true; // Valid UPI/VPA
    } else {
        return false; // Invalid UPI/VPA
    }
    }

    // Form Validation
    $(".submit_loader").click(function(){
	
	var upi_id=$("#upi_id").val();
	if(upi_id==""){ alert("Enter your upi id "); return; }
	
	if(validateUPI(upi_id)==false) { alert("Enter valid upi id "); return false;} 
	
	var amount=$("#amount").val();
	if(amount==""){ alert("Enter amount to pay "); return; }
	 
	 $(".submit_loader").html("<i class='fa-solid fa-spinner fa-spin'></i>");
	 
	});
	
   $(".allow_decimal").on("input", function(evt) {
   var self = $(this);
   self.val(self.val().replace(/[^0-9\.]/g, ''));
   if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
   {
     evt.preventDefault();
   }
 });
	

		
</script>
    </body>


</html>
