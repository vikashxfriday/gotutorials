<?php include "include/common.php"; check_permission($pagename); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Dashboard - <?=$host_company;?></title>
<meta name="description" content="Admin Dashboard - <?=$host_company;?>">
<meta name="keywords" content="Admin Dashboard - <?=$host_company;?>">
<? include "include/meta-css.php"; ?>
<style>
.predefined_styles { padding: 0 5px;text-align: left; }
.predefined_styles h4 { margin-left:20px; }
    
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
								<h2 class="main-content-title tx-24 mg-b-5">Template Setting</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Template Setting</li>
								</ol>
							</div>
							
						</div>
						<!-- End Page Header -->

						

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-12 col-md-12">
								<div class="card custom-card main-content-body-profile">
									<div class="tab-content">
									
										
										<div class=" main-content-body tab-pane88 p-4 border-top-0">
											<div class="card-body border">
												<div class="switcher-wrapper">
			<div class="demo_changer66">
				<div class="form_holder sidebar-right1">
					<div class="row">
						<div class="predefined_styles">
						  
							<div class="swichermainleft">
								<h4 class="btn btn-sm btn-primary w-100">LTR and RTL Versions</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">LTR</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch7"
													id="myonoffswitch19" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch19" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">RTL</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch7"
													id="myonoffswitch20" class="onoffswitch2-checkbox">
												<label for="myonoffswitch20" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft menu-styles">
								<h4 class="btn btn-sm btn-primary w-100">Navigation Style</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Vertical Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch01"
													id="myonoffswitch01" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch01" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Horizontal Click Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch01"
													id="myonoffswitch02" class="onoffswitch2-checkbox">
												<label for="myonoffswitch02" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Horizontal Hover Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch01"
													id="myonoffswitch03" class="onoffswitch2-checkbox">
												<label for="myonoffswitch03" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4 class="btn btn-sm btn-primary w-100">Light Theme Style</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Light Theme</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch1"
													id="myonoffswitch1" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch1" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Light Primary</span>
											<div class="">
												<input class="wd-30 ht-30 input-color-picker color-primary-light"
													value="#6259ca" id="colorID" oninput="changePrimaryColor()" type="color"
													data-id="bg-color" data-id1="bg-hover" data-id2="bg-border"
													data-id7="transparentcolor" name="lightPrimary">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4 class="btn btn-sm btn-primary w-100">Dark Theme Style</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Dark Theme</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch1"
													id="myonoffswitch2" class="onoffswitch2-checkbox">
												<label for="myonoffswitch2" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Dark Primary</span>
											<div class="">
												<input class="wd-30 ht-30 input-dark-color-picker color-primary-dark"
													value="#6259ca" id="darkPrimaryColorID" oninput="darkPrimaryColor()"
													type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border"
													data-id3="primary" data-id8="transparentcolor" name="darkPrimary">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft menu-colors">
								<h4 class="btn btn-sm btn-primary w-100">Menu Styles</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle lightMenu d-flex">
											<span class="me-auto">Light Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch2"
													id="myonoffswitch3" class="onoffswitch2-checkbox">
												<label for="myonoffswitch3" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle colorMenu d-flex mt-2">
											<span class="me-auto">Color Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch2"
													id="myonoffswitch4" class="onoffswitch2-checkbox">
												<label for="myonoffswitch4" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle darkMenu d-flex mt-2">
											<span class="me-auto">Dark Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch2"
													id="myonoffswitch5" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch5" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft header-colors">
								<h4 class="btn btn-sm btn-primary w-100">Header Styles</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle lightHeader d-flex">
											<span class="me-auto">Light Header</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch3"
													id="myonoffswitch6" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch6" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle  colorHeader d-flex mt-2">
											<span class="me-auto">Color Header</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch3"
													id="myonoffswitch7" class="onoffswitch2-checkbox">
												<label for="myonoffswitch7" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle darkHeader d-flex mt-2">
											<span class="me-auto">Dark Header</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch3"
													id="myonoffswitch8" class="onoffswitch2-checkbox">
												<label for="myonoffswitch8" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft layout-width-style">
								<h4 class="btn btn-sm btn-primary w-100">Layout Width Styles</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Full Width</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch4"
													id="myonoffswitch9" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch9" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Boxed</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch4"
													id="myonoffswitch10" class="onoffswitch2-checkbox">
												<label for="myonoffswitch10" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft layout-positions">
								<h4 class="btn btn-sm btn-primary w-100">Layout Positions</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Fixed</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch5"
													id="myonoffswitch11" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch11" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Scrollable</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch5"
													id="myonoffswitch12" class="onoffswitch2-checkbox">
												<label for="myonoffswitch12" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft vertical-switcher">
								<h4 class="btn btn-sm btn-primary w-100">Sidemenu layout Styles</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Default Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch13" class="onoffswitch2-checkbox default-menu" checked>
												<label for="myonoffswitch13" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Icon with Text</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch14" class="onoffswitch2-checkbox">
												<label for="myonoffswitch14" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Icon Overlay</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch15" class="onoffswitch2-checkbox">
												<label for="myonoffswitch15" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Closed Sidemenu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch16" class="onoffswitch2-checkbox">
												<label for="myonoffswitch16" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Hover Submenu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch17" class="onoffswitch2-checkbox">
												<label for="myonoffswitch17" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Hover Submenu Style 1</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch18" class="onoffswitch2-checkbox">
												<label for="myonoffswitch18" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Reset All Styles</h4>
								<div class="skin-body">
									<div class="switch_section my-4">
										<button class="btn btn-danger btn-block" onClick="localStorage.clear();
											document.querySelector('html').style = '';
											names() ;
											resetData();" type="button">Reset All
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
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


                    </div>
                </div>
            </div>
            <!-- END MAIN-CONTENT -->



            <!-- FOOTER -->
            
            <? include "include/footer.php"; ?>
            <!-- END FOOTER -->

        </div>
       
            <? include "include/js.php"; ?>
			
			

    </body>


</html>
