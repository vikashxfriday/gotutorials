<?php include "include/common.php"; check_permission($pagename); ?>
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
              <form method="POST" action="/admin/emailTemplatePost" autocomplete="off">
                <input type="hidden" name="tableID" value="">
                <input type="hidden" name="mode" value="Add">
                <div class="row">
                  
                  <div class="col-md-3 my-2">
                    <div class="form-floating">
                      <select class="form-select" name="status" id="status" title="Status" required="">
                        <option value=1 >Active</option>
                        <option value=2 >Deleted</option>
                      </select>
                      <label for="status">Status</label>
                    </div>
                  </div>
                  <div class="col-md-3 my-2">
                    <div class="form-floating">
                      <select class="form-select" name="status" id="status" title="Status" required="">
                        <option value=1 >Active</option>
                        <option value=2 >Deleted</option>
                      </select>
                      <label for="status">Status</label>
                    </div>
                  </div>
				  <div class="col-md-6 my-2">
                    <div class="form-floating">
                      <input type="text" id="template_subject" name="template_subject" class="form-control" title="Template Subject" required="" value="">
                      <label for="template_subject">Template Subject</label>
                    </div>
                  </div>
                  <div class="col-md-12 my-2">
                    <div class="form-floating">
                      <textarea  id="template_desc" name="template_desc" class="form-control editor" required></textarea>
                    </div>
                  </div>
				  <div class="col-md-12 my-2">
                    <div class="form-floating">
                      <textarea  id="template_desc" name="template_desc" class="form-control editor" required></textarea>
                    </div>
                  </div>
				  <div class="col-md-12 my-2">
                    <div class="form-floating">
                      <textarea  id="template_desc" name="template_desc" class="form-control editor" required></textarea>
                    </div>
                  </div>
				  <div class="col-md-12 my-2">
                    <div class="form-floating">
                      <textarea  id="template_desc" name="template_desc" class="form-control editor" required></textarea>
                    </div>
                  </div>
				  <div class="col-md-12 my-2">
                    <div class="form-floating">
                      <textarea  id="template_desc" name="template_desc" class="form-control editor" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 my-2">
                    <div class="form-floating">
                      <button type="submit" id="submit" class="btn btn-primary btn  btn-primary  mt-1" name="submit" title="submit" value="submit">Submit</button>
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
</script>
</body>
</html>
