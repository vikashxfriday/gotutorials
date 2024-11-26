<?php include "include/common.php"; check_permission($pagename); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Dashboard - <?=$host_company;?> </title>
<meta name="description" content="Admin Dashboard - <?=$host_company;?>">
<meta name="keywords" content="Admin Dashboard - <?=$host_company;?>">
<? include "include/meta-css.php"; ?>

<?php
if(isset($_POST['btn_submit'])){



$tutorial_menu = $_POST['tutorial_menu'];
$tutorial_submenu = $_POST['tutorial_submenu'];
$tutorial_title = $_POST['tutorial_title'];
$tutorial_desc1 = $_POST['tutorial_desc1'];
$tutorial_desc2 = $_POST['tutorial_desc2'];
$tutorial_desc3 = $_POST['tutorial_desc3'];
$tutorial_desc4 = $_POST['tutorial_desc4'];
$tutorial_desc5 = $_POST['tutorial_desc5'];
$tutorial_image_old = $_POST['tutorial_image_old'];
//$tutorial_image = $_POST['tutorial_image'];


if(isset($_FILES['tutorial_image']['name'])){
$tutorial_image = $_FILES['tutorial_image']['name'];
if(($tutorial_image)&&($_FILES["tutorial_image"]["size"]>6000000)){ //1000000*6=6000000 (6MB)
echo "File size should be less than 6MB";exit;	
}elseif(($tutorial_image)&&(!preg_match("/\.(jpg|jpeg|bmp|gif|png|svg)$/", $tutorial_image))){
echo  "Unsupported file type ".$ext;exit;	
}

$maxIdx=rand(100000,999999);
$fileimg	= $maxIdx.'_'.$_FILES['tutorial_image']['name'];
$uploaddirx 		= 'images/';
$updatelogo_filex = $uploaddirx . basename($fileimg); 

if (move_uploaded_file($_FILES['tutorial_image']['tmp_name'], $updatelogo_filex)) { 
     //if($tutorial_image_old){unlink($uploaddirx . basename($tutorial_image_old));}
     }else{
	 $fileimg = $tutorial_image_old;
	 }

}

$tutorial_id=$_POST['tableID'];

if(isset($_POST['tableID'])&&$_POST['tableID']){
$ins = mysqli_query($con,"UPDATE itio_tutorial_master SET  
									  tutorial_menu='$tutorial_menu',                                      tutorial_submenu='$tutorial_submenu',
                                      tutorial_title='$tutorial_title',
									  tutorial_desc1='$tutorial_desc1',
									  tutorial_desc2='$tutorial_desc2',
									  tutorial_desc3='$tutorial_desc3',
									  tutorial_desc4='$tutorial_desc4',
									  tutorial_desc5='$tutorial_desc5',
									  tutorial_image='$fileimg' WHERE 		       tutorial_id='$tutorial_id'");
	}else{
	
	$ins = mysqli_query($con,"INSERT INTO itio_tutorial_master SET 
                                                     tutorial_menu='$tutorial_menu',                                                     tutorial_submenu='$tutorial_submenu',
                                                     tutorial_title='$tutorial_title',
													 tutorial_desc1='$tutorial_desc1',
													 tutorial_desc2='$tutorial_desc2',
													 tutorial_desc3='$tutorial_desc3',
													 tutorial_desc4='$tutorial_desc4',
													 tutorial_desc5='$tutorial_desc5',
													 tutorial_image='$fileimg'");
	
	}

$_SESSION['msgok']="Tutorials Added Successfully";
header("location:tutorials-list-manager.php");exit;

}

$btn="Add";


if(isset($_GET['mid'])&&isset($_GET['action'])&&$_GET['action']=="edit"){ 
$mid=$_GET['mid'];
$result=get_table_list("itio_tutorial_master",'*'," AND `tutorial_id`='$mid' ","-2",0);
$get_data=$result[0];
$btn="Edit";
}

?>
<style>
    .img-icon { width: 40px;margin-right: 10px;}
    .jqte_tool.jqte_tool_1 .jqte_tool_label {height: unset !important;}
	.jqte { margin: 0px 0 !important;}
</style>
</head>
<body class="ltr main-body leftmenu d-flex flex-column h-100">
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
        <!-- End Page Header -->
        <!--Row-->
        <div class="row row-sm mt-2 toppadding">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card custom-card">
              <div class="card-body"  style="min-height:440px;">
                <div class="d-flex justify-content-between">
                  <form method="POST" action="add-tutorial.php" enctype="multipart/form-data">
                    <input type="hidden" name="tableID" value="<?=$get_data['tutorial_id'];?>">
					<input type="hidden" name="tutorial_image_old" value="<?=$get_data['tutorial_id'];?>">
                    <div class="row">
                      <div class="col-md-3 my-2">
                        <div class="form-floating">
<select name="tutorial_menu" id="title_id" class="form-select" tabindex="-1" aria-hidden="true" title="Menu Title" required>
<option value="">Select  Title</option>
<?php
$result=get_table_list("itio_tutorial_title","*"," AND `status`=1 ","",""); // Menu list call from function
//print_r($result);
foreach($result as $key => $val){
?>
<option value="<?=$val['id'];?>" <? if(isset($get_data['tutorial_id'])&&$get_data['tutorial_id']==$val['id']){ ?> selected="selected" <? } ?>>
<?=$val['title'];?>
</option>
<?php
}
?>
                          </select>
                          <label for="status">Status</label>
                        </div>
                      </div>
                      <div class="col-md-3 my-2">
                        <div class="form-floating">
                          <select class="form-select" name="tutorial_submenu" id="title_menu" title="Menu" required="">
                            
							<?php if($btn=="Edit"){ ?>
							<option value="<?=$get_data['tutorial_submenu'];?>"><?=$get_data['tutorial_submenu'];?></option>
							<?php }else{ ?>
							<option value="">Select menu</option>
							<?php } ?>
                          </select>
                          <label for="title_menu">Status Menu</label>
                        </div>
                      </div>
                      <div class="col-md-6 my-2">
                        <div class="form-floating">
                          <input type="text" id="tutorial_title" name="tutorial_title" class="form-control text-dark" title="Tutorial Title" required="" value="<?=$get_data['tutorial_title'];?>">
                          <label for="tutorial_title">Tutorial Title</label>
                        </div>
                      </div>
                      <div class="col-md-12 my-2">
                        <div class="form-floating">
<textarea id="tutorial_desc1" name="tutorial_desc1" class="form-control editor"><?=$get_data['tutorial_desc1'];?></textarea>
                        </div>
                      </div>
                      <div class="col-md-12 my-2">
                        <div class="form-floating">
                          <textarea  id="tutorial_desc2" name="tutorial_desc2" class="form-control editor" ><?=$get_data['tutorial_desc2'];?></textarea>
                        </div>
                      </div>
                      <div class="col-md-12 my-2">
                        <div class="form-floating">
                          <textarea  id="tutorial_desc3" name="tutorial_desc3" class="form-control editor" ><?=$get_data['tutorial_desc3'];?></textarea>
                        </div>
                      </div>
                      <div class="col-md-12 my-2">
                        <div class="form-floating">
                          <textarea  id="tutorial_desc4" name="tutorial_desc4" class="form-control editor" ><?=$get_data['tutorial_desc4'];?></textarea>
                        </div>
                      </div>
                      <div class="col-md-12 my-2">
                        <div class="form-floating">
                          <textarea  id="tutorial_desc5" name="tutorial_desc5" class="form-control editor" ><?=$get_data['tutorial_desc5'];?></textarea>
                        </div>
                      </div>
                      <div class="col-md-6 my-2">
                        <div class="form-floating">
                          <input type="file" name="tutorial_image" id="tutorial_image">
                        </div>
                      </div>
					  
					   <div class="col-md-6 my-2">
                         <? if(isset($get_data['tutorial_image'])&&$get_data['tutorial_image']){ ?>
                            <img src="images/<?=$get_data['tutorial_image'];?>" class="img-fluid  my-2" style="height:50px;">
                            <? } ?>
                      </div>
					  
                      <div class="col-md-12 my-2">
                        <div class="form-floating">
                          <input type="submit" class="btn btn-primary btn  btn-primary  mt-1" name="btn_submit" value="submit">
                        </div>
                      </div>
					  
					 
                    </div>
                  </form>
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
    <!-- RIGHT-SIDEBAR -->
  </div>
</div>
<? include "include/js.php"; ?>
<link rel="stylesheet" type="text/css" href="https://jqueryte.com/css/jquery-te.css"/>
<script src="https://jqueryte.com/js/jquery-te-1.4.0.min.js"></script>
<script>
	$('.editor').jqte();
	
	
	// Load Menu based on selected Title code
            $('#title_id').on('change', function() {
                var titleID = $(this).val();
				//alert(titleID)
                if (titleID) {
                    $.ajax({
                        url: 'ajax-title-menu.php',
                        type: 'POST',
                        data: { title_id: titleID },
                        success: function(data) {
						//alert(data);
                            $('#title_menu').html(data);
                        }
                    });
                } else {
                    $('#title_menu').html('<option value="">Select Menu</option>');
                }
            });
</script>
</body>
</html>
