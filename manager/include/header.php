<div class="main-header side-header sticky">
				<div class="main-container container-fluid">
					<div class="main-header-left">
						<a class="main-header-menu-icon" href="javascript:void(0);" id="mainSidebarToggle"><span></span></a>
						<div class="hor-logo">
							<a class="main-logo" href="<?=$host_path;?>index.html">
<img 15 src="<?=$host_path;?>assets/img/admin-logo-dark.png" class="header-brand-img desktop-logo" alt="logo" style=" max-height:40px;">
<img 16 src="<?=$host_path;?>assets/img/admin-logo.png" class="header-brand-img desktop-logo-dark" alt="logo" style=" max-height:40px;">
									
							</a>
						</div>
					</div>
					<div class="main-header-center">
						<div class="responsive-logo">
						<a href="<?=$host_path;?>index.html"><img 17 src="<?=$host_path;?>assets/img/admin-logo-dark.png" class="mobile-logo" alt="logo"></a>
						<a href="<?=$host_path;?>index.html"><img 18 src="<?=$host_path;?>assets/img/admin-logo.png" class="mobile-logo-dark" alt="logo"></a>
									
						</div>
						<form action="search.php" method="get">
						<div class="input-group">
							<div class="input-group-btn search-panel">
								<select class="form-control select2" name="s_cat" title="Search Categories" required>
									<option label="Select categories"></option>
									<option value="company">By Company Name</option>
									<option value="content">By Ai Content</option>
									<option value="image">By Image</option>
								</select>
							</div>
		<input type="search" class="form-control rounded-0" placeholder="Search for anything..." name="s_key" required>
							<button type="submit" class="btn search-btn"><i class="fe fe-search"></i></button>
						</div>
						</form>
					</div>
					<div class="main-header-right">
						<button class="navbar-toggler navresponsive-toggler" type="button" data-bs-toggle="collapse"
							data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
							aria-expanded="false" aria-label="Toggle navigation">
							<i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
						</button><!-- Navresponsive closed -->
						<div
							class="navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
							<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
								<div class="d-flex order-lg-2 ms-auto">
									<!-- Search -->
									<div class="dropdown header-search">
										<a class="nav-link icon header-search">
											<i class="fe fe-search header-icons"></i>
										</a>
										<div class="dropdown-menu">
											<div class="main-form-search p-2">
											<?php /*?><form action="search.php" method="get">
												<div class="input-group">
													<div class="input-group-btn search-panel">
														<select class="form-control select2" name="s_cat">
															<option label="All categories">
															</option>
															<option value="IT Projects">
																IT Projects 111
															</option>
															<option value="Business Case">
																Business Case
															</option>
															<option value="Microsoft Project">
																Microsoft Project
															</option>
															<option value="Risk Management">
																Risk Management
															</option>
															<option value="Team Building">
																Team Building
															</option>
														</select>
													</div>
						<input type="search" class="form-control" name="s_key" placeholder="Search for anything..." requitred>
													<button type="submit" class="btn search-btn"></button>
												</div>
												</form><?php */?>
												<form action="search.php" method="get">
						<div class="input-group">
							<div class="input-group-btn search-panel">
								<select class="form-control select2" name="s_cat" title="Search Categories" required>
									<option label="Select categories"></option>
									<option value="company">By Company Name</option>
									<option value="content">By Ai Content</option>
									<option value="image">By Image</option>
								</select>
							</div>
		<input type="search" class="form-control rounded-0" placeholder="Search for anything..." name="s_key" required>
							<button type="submit" class="btn search-btn"><i class="fe fe-search"></i></button>
						</div>
						</form>
											</div>
										</div>
									</div>
									<!-- Search -->
									<!-- Theme-Layout -->
									<div class="dropdown d-flex main-header-theme">
										<a class="nav-link icon layout-setting">
											<span class="dark-layout">
												<i class="fe fe-sun header-icons"></i>
											</span>
											<span class="light-layout">
												<i class="fe fe-moon header-icons"></i>
											</span>
										</a>
									</div>
									<!-- Theme-Layout -->
	
									<!-- Full screen -->
									<div class="dropdown ">
										<a class="nav-link icon full-screen-link">
											<i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
											<i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
										</a>
									</div>
									<!-- Full screen -->

									<!-- Profile -->
									<div class="dropdown main-profile-menu">
										<a class="d-flex" href="javascript:void(0);">
											<span class="main-img-user"><img alt="avatar"
													src="<?=$host_path;?>assets/img/profile.png"></span>
										</a>
										<div class="dropdown-menu">
										<div class="header-navheading">
										<h6 class="main-notification-title"><?=ucwords($_SESSION['loged_user']['admin_name']);?></h6>
										<p class="main-notification-text"><?=$data['admin_typ'][$_SESSION['loged_user']['admin_type']];?></p>
										</div>
											<a class="dropdown-item border-top" href="<?=$host_path;?>profile.php">
												<i class="fe fe-user"></i> My Profile
											</a>
											
											<a class="dropdown-item" href="<?=$host_path;?>activity.php">
												<i class="fe fe-compass"></i> Activity
											</a>
											<?php /*?><a class="dropdown-item" href="<?=$host_path;?>template-setting.php">
												<i class="fe fe-settings"></i> Template Settings
											</a><?php */?>
											<a class="dropdown-item" href="<?=$host_path;?>include/logout.php">
												<i class="fe fe-power"></i> Sign Out
											</a>
										</div>
									</div>
									<!-- Profile -->
									<!-- Sidebar -->
									<div class="dropdown  header-settings">
										<a href="javascript:void(0);" class="nav-link icon" data-bs-toggle="sidebar-right"
											data-bs-target=".sidebar-right">
											<i class="fe fe-align-right header-icons"></i>
										</a>
									</div>
									<!-- Sidebar -->
								</div>
							</div>
						</div>
						<?php /*?><div class="d-flex header-setting-icon demo-icon fa-spin">
							<a class="nav-link icon" href="javascript:void(0);">
								<i class="fe fe-settings settings-icon "></i>
							</a>
						</div><?php */?>
					</div>
				</div>
			</div>