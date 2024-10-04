		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">
				
				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body">
						<div class="card-body text-center">
							<a href="#">
								<img src="<?= base_url() ?>template/global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark">Presenter</h6>
							<span class="font-size-sm text-white text-shadow-dark">Marketing</span>
						</div>
													
						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="icon-user-plus"></i>
									<span>My profile</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /user menu -->
	
				
				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header">
							<div class="text-uppercase font-size-xs line-height-xs">Main</div> 
						<i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="<?= base_url() ?>mkt/" class="nav-link <?= $this->session->userdata("dashboard") ?> ">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>mkt/database_siswa" class="nav-link <?= $this->session->userdata("database_siswa") ?> ">
								<i class="icon-users4"></i>
								<span>
									Database Siswa
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>mkt/database_siswa_pmb" class="nav-link <?= $this->session->userdata("database_siswa_pmb") ?> ">
								<i class="icon-users4"></i>
								<span>
									Database Siswa PMB
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>mkt/marketing_plan" class="nav-link <?= $this->session->userdata("marketing_plan") ?> ">
								<i class="icon-users4"></i>
								<span>
									Database Marketing Plan
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>mkt/marketing_plan_mhs" class="nav-link <?= $this->session->userdata("marketing_plan_mhs") ?> ">
								<i class="icon-users4"></i>
								<span>
									Database Marketing Plan Mhs
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>mkt/beasiswa" class="nav-link <?= $this->session->userdata("beasiswa") ?> ">
								<i class="icon-users4"></i>
								<span>
									Beasiswa
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="http://pmb.politekniklp3i-tasikmalaya.ac.id/admin" class="nav-link">
								<i class="icon-home4"></i>
								<span>
									Kembali
								</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>