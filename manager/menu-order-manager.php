<?php include "include/common.php"; check_permission($pagename); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Dashboard - <?=$host_company;?></title>
<meta name="description" content="Admin Dashboard - <?=$host_company;?>">
<meta name="keywords" content="Admin Dashboard - <?=$host_company;?>">
<? include "include/meta-css.php"; ?>
  <style>
  #sortable { list-style-type: none;}
  #sortable li { margin: 10px; padding: 10px; }
  </style>
  
<style>
@media (min-width: 1200px){
.offset-xl-3 { margin-left: 0% !important; }
}
</style>
</head>
<body class="ltr main-body leftmenu">
<!-- SWITCHER -->
<!-- END SWITCHER -->
<!-- PAGE -->
<div class="page">
  <!-- HEADER -->
  <?php include "include/header.php"; ?>
  <!-- END HEADER -->
  <!-- SIDEBAR -->
  <?php include "include/sidebar.php"; ?>
  <!-- END SIDEBAR -->
  <!-- MAIN-CONTENT -->
  <div class="main-content side-content pt-0">
    <div class="main-container container-fluid">
      <div class="inner-body">
        <!-- Page Header -->
        <div class="page-header">
          <div>
            <h2 class="main-content-title tx-24 mg-b-5">Menu Order / Priority Manager</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Manage Menu Order / Priority</li>
            </ol>
          </div>
          <div class="d-flex"> </div>
        </div>
        <!-- End Page Header -->
        <!-- Row -->
        <!--End Row-->
        <!-- Row -->
        
        <!--End Row-->
        <!--Row-->
        <div class="row row-sm">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card custom-card">
              <div class="card-header border-bottom-0 pb-0">
                <div class="d-flex justify-content-between">
                  <label class="main-content-label mb-0 pt-1">Drag And Drop Menu for display order in side menu</label>
                  <div class="ms-auto float-end"> &nbsp; </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive border userlist-table">
                  <ul id="sortable">
	<?php
	$sql_query = "SELECT menu_id, menu_title FROM itio_menu ORDER BY priority";
	$result = mysqli_query($con, $sql_query) or die("database error:". mysqli_error($conn));
	while( $row = mysqli_fetch_assoc($result)) 
	{	?>
		<li class="ui-state-default border border-success rounded bg-gray-300" id="<?php echo $row["menu_id"]; ?>"><i class="fa-solid fa-up-down fa-fade mx-2"></i><?php echo $row["menu_title"]; ?></li>
	  <?php 
	} ?>
</ul>
                </div>
                
              </div>
            </div>
          </div>
          <!-- COL END -->
        </div>
        <!-- row closed  -->
      </div>
    </div>
  </div>
  <!-- END MAIN-CONTENT -->
  <!-- FOOTER -->
  <?php include "include/footer.php"; ?>
  <!-- END FOOTER -->
</div>
<?php include "include/js.php"; ?>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
	$(function() {
		$("#sortable").sortable({		
			update: function( event, ui ) {
				updateOrder();
			}
		});  
	});
  
	function updateOrder() {	
		var item_order = new Array();
		$('#sortable li').each(function() {
			item_order.push($(this).attr("id"));
		});
		var order_string = 'order='+item_order;
		alert(order_string);
		$.ajax({
			type: "POST",
			url: "include/update_menu_order.php",
			data: order_string,
			cache: false,
			success: function(data){	 alert("Change Done");		
			}
		});
	}
  </script>
</body>
</html>
