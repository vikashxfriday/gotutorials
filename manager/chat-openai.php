<?php include "include/common.php"; check_permission($pagename); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Dashboard - <?=$host_company;?></title>
<meta name="description" content="Admin Dashboard - <?=$host_company;?>">
<meta name="keywords" content="Admin Dashboard - <?=$host_company;?>">
<? include "include/meta-css.php"; ?>
<style>
.wdt { font-size : 50px; }
.ta {
	height:400px;
	width:100%;
	/*background:rgb(234, 237, 247);*/
	background:#ffffff;
	z-index:2;
	-webkit-transition:all 1s, color 400ms, outline 50ms;
	transition:all 1s, color 400ms, outline 50ms;
	overflow:hidden;
	border-radius: 10px;
}
.textarea {
	display:block;
	background:none;
	min-height:400px;
	width:100%;
	padding:10px;
	color:#ff4401;
	font-size:18px !important;
	/*border:0;*/
	/*margin-top: -40px !important;*/
}
.textarea.dim {
	color:rgba(236,236,236,0.3);
}
#secondhalf {
	display:none;
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
        
        <!-- End Page Header -->
        <!--Row-->
        <div class="row row-sm mt-2">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card custom-card">
              <div class="card-body">
                <div class="table-responsive border userlist-table">
                    <table class="table card-table table-striped table-vcenter mb-0">
					  <tr id="d1">
                        <td><div class="text-center tx-24 text-muted text-opacity-50" style="min-height:400px;"><span class="text-center"><strong>AI Chat</strong></span></div></td>
                      </tr>
					<tr id="q1" style="display:none;">
                        <td><a class="btn btn-danger text-white"><?=strtoupper(substr($_SESSION['loged_user']['admin_name'],0,2));?></a> <span id="q2" class="main-content-title tx-18"></span></td>
                      </tr>
					  
                      <tr id="a1" style="display:none;">
						<td>
						<div class="ta" style="display:none;"><textarea spellcheck="false" class="textarea form-control" style="height:400px !important;"></textarea></div>
						<span id="a2"></span></td>
                      </tr>
                      <tr>
                        <td><div style="width: calc(100% - 40px);float:left;">
<textarea name="content_title" class="form-control" id="content_title" cols="2" rows="2" placeholder="Start typing your mind...
" style="padding-top: 24px"></textarea>
                          </div>
                          <div style="width:40px; float:left;">
                            <button type="submit" class="btn btn-primary text-white w-100 btn_submit" name="Submit" style="height: 68px !important;"><i class="fa-solid fa-angles-right fa-xl"></i></button>
                          </div></td>
                      </tr>
                    </table>
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
  <? include "include/footer.php"; ?>
  <!-- END FOOTER -->
</div>
<? include "include/js.php"; ?>
<script src="<?=$host_path;?>assets/js/highlight.min.js"></script>
<script src="<?=$host_path;?>assets/js/jquery.typetype.js"></script>
<script type="text/javascript">
function flashTextarea(){
  console.log('fl')
 // $('.ta').css({'outline':'1px solid rgba(255,255,0,0.7)'})
  setTimeout(function(){
   // $('.ta').css({'outline':'1px solid rgba(255,255,0,0)'})
  },50)
}

$('.btn_submit').on('click', function () {

    var content_title=$('#content_title').val();
	var content_title=$.trim(content_title);

         if(content_title==''){
			alert('Please enter Search Content');
			$('#content_title').focus();
			return false;
		}
$("#d1").hide();		
$("#q1").show();
$("#q2").html(content_title);	
$("#a1").show();
$("#a2").html("<i class='fa-solid fa-ellipsis fa-fade fa-2xl wdt m-4'></i>");
$('#content_title').val('');
	
$.ajax({
	url: "include/get-content.php",
	data:'content_title='+content_title,
	type: "POST",
	success:function(data){
	  //alert(data);
	  if(data==0){ 
	  alert("Result not found. Please try again");
	  $("#a2").html("");
	  }else{
	  var data=$.trim(data);
	  $(".ta").show();
	  $("#a2").html("");
	  
	  ////////////////////////////////////////////////////
	  $('.textarea').focus()
    .typetype(data, {
      callback: function() {
        //$('body').addClass('reveal')
      }
    }).delay(1500)
    .fadeTo(400,0.3).delay(1000).queue(function(){$('#secondhalf').fadeIn(1000);$('textarea').dequeue()}).delay(4000).fadeTo(400,1.0).delay(1000)
    .typetype("\n\nAlways good to check for the latest data!...\n\n",{
      keypress:flashTextarea,
      t:60,
      e:0
    })
	  ////////////////////////////////////////////////////
		  
	  }
	},
	error:function (){}
	});

});

$('#content_title').keypress(function(e){
        if(e.which == 13){//Enter key pressed
            $('.btn_submit').click();//Trigger search button click event
        }
    });
	
    $('.textarea').on('input', function () { 
        this.style.height = 'auto'; 
  
        this.style.height = (this.scrollHeight) + 'px'; 
    }); 

</script>
</body>
</html>
