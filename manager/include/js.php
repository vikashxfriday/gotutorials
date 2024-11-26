<!-- END PAGE -->

<!-- SCRIPTS -->

<!-- BACK TO TOP -->
<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

<!-- JQUERY JS -->
<script src="<?=$host_path;?>assets/plugins/jquery/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="<?=$host_path;?>assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="<?=$host_path;?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- PERFECT SCROLLBAR JS -->
<script src="<?=$host_path;?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!-- SIDEMENU JS -->
<script src="<?=$host_path;?>assets/plugins/sidemenu/sidemenu.js" id="leftmenu"></script>

<!-- SIDEBAR JS -->
<script src="<?=$host_path;?>assets/plugins/sidebar/sidebar.js"></script>

<!-- SELECT2 JS -->
<script src="<?=$host_path;?>assets/plugins/select2/js/select2.min.js"></script>
<script src="<?=$host_path;?>assets/js/select2.js"></script>

<!-- Internal Chart.Bundle js-->
<script src="<?=$host_path;?>assets/plugins/chart.js/Chart.bundle.min.js"></script>

<!-- Peity js-->
<script src="<?=$host_path;?>assets/plugins/peity/jquery.peity.min.js"></script>

<!-- Internal Morris js -->
<script src="<?=$host_path;?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?=$host_path;?>assets/plugins/morris.js/morris.min.js"></script>

<!-- Circle Progress js-->
<script src="<?=$host_path;?>assets/plugins/circle-progress/circle-progress.min.js"></script>
<script src="<?=$host_path;?>assets/js/chart-circle.js"></script>

<!-- Internal Dashboard js-->
<script src="<?=$host_path;?>assets/js/index.js"></script>

<!-- STICKY JS -->
<script src="<?=$host_path;?>assets/js/sticky.js"></script>

<!-- COLOR THEME JS -->
<script src="<?=$host_path;?>assets/js/themeColors.js"></script>

<!-- CUSTOM JS -->
<script src="<?=$host_path;?>assets/js/custom.js"></script>

<!-- SWITCHER JS -->
<script src="<?=$host_path;?>assets/switcher/js/switcher.js"></script>

<!-- END SCRIPTS -->
<script>
	// for detail display on modal
	
	 $('.tr_open_on_modal').click(function(){
	 
		var countNo=$(this).attr('data-count');
		var detailHtml=$('.next_tr_'+countNo).html();
		var Modtitle=$('.next_tr_'+countNo).find('.mboxtitle').html();
		
		$('#myModal .modal-dialog').css({"max-width":"600px"});
		//$('#myModal .modal-content').addClass("bg-primary text-white");
		$('#myModal .modal-title').html(Modtitle);
		$('#myModal .modal-body').html(detailHtml);
		$('#myModal').modal('show');
		
	});
	
	$('.confirm').click(function(){
    return confirm('Are you sure want to continue?');
    });
</script>