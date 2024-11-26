<?php include "include/common.php"; 
$date=date("Y-m-d");

$status="success00";
$transid="1234567890";
$amount=$_SESSION['amount'];
$payto=$_SESSION['upi_id'];

if($status=="success"){
$paymentstatus="Payment Successfull";
$bgcss="bg-success";
$icon="fa-regular fa-circle-check";
}else{
$paymentstatus="Payment Failed";
$bgcss="bg-danger";
$icon="fa-regular fa-circle-xmark";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Dashboard -
<?=$host_company;?>
</title>
<meta name="description" content="Admin Dashboard - <?=$host_company;?>">
<meta name="keywords" content="Admin Dashboard - <?=$host_company;?>">
<? include "include/meta-css.php"; ?>
<style>
@media (min-width: 1200px){
.offset-xl-3 { margin-left: 0% !important; }
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
        <div class="page-header">&nbsp;</div>
        <!-- End Page Header -->
        <!--Row-->
        <div class="row row-sm">
          <div class="col-sm-12 col-lg-12 col-xl-12">
            <!--Row-->
            <!--Row -->
            <!--Row-->
            <!--End row-->
            <!--row-->
            <!-- Row -->
				<div class="row  ext-center">
					<div class="col-md-7 mx-auto">
						<div class="card alert-message">
							<div class="card-body <?=$bgcss;?>">
								<div class="text-center text-white">
									<i class="<?=$icon;?> fa-beat-fade" style="font-size:100px;"></i>
									<h2 class="mt-4 mb-3"><?=$paymentstatus;?></h2>
									<h4 class="mt-4 mb-3">Hi, <?=ucwords($_SESSION['loged_user']['admin_name']);?> </h4>
									<h6 class="mt-4 mb-3">Amount RS <?=$amount;?> pay to <?=$payto;?></h6>
									<h6 class="mt-4 mb-3">Transaction ID : <?=$transid;?></h6>
									<a href="send-payment.php" class="btn btn-light btn-sm">Pay Again</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Row -->
            <!-- Row end -->
          </div>
          <!-- col end -->
          <!-- col end -->
        </div>
        <!-- Row end -->
      </div>
    </div>
  </div>
  <!-- END RIGHT-SIDEBAR -->
  <!-- FOOTER -->
  <? include "include/footer.php"; ?>
  <!-- END FOOTER -->
</div>
<? include "include/js.php"; ?>
</body>
</html>
