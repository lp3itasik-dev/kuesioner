	<div class="navbar navbar-expand-md navbar-light navbar-static">

		<!-- Header with logos -->
		<div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
			<div class="navbar-brand navbar-brand-md">
				<a href="index.html" class="d-inline-block">
					<img style="height:2rem" src="<?= base_url() ?>template/global_assets/images/logo-politeknik-3.png" alt="">
				</a>
			</div>
			
			<div class="navbar-brand navbar-brand-xs">
				<a href="index.html" class="d-inline-block">
					<img style="height:2rem" src="<?= base_url() ?>template/global_assets/images/logo-politeknik-1.png" alt="">
				</a>
			</div>
		</div>
		<!-- /header with logos -->
	

		<!-- Mobile controls -->
		<div class="d-flex flex-1 d-md-none">
			<div class="navbar-brand mr-auto">
				<a href="index.html" class="d-inline-block">
					<img src="<?= base_url() ?>template/global_assets/images/logo_dark.png" alt="">
				</a>
			</div>	

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>

			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>
		<!-- /mobile controls -->


		<!-- Navbar content -->
		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

				<li class="nav-item dropdown">
					
					
				</li>
			</ul>

			<span class="mr-md-auto"></span>

			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="<?= base_url() ?>log/logout" class="d-flex align-items-center btn btn-sm btn-dark" style="font-size:0.8rem">
						<i class="icon-switch2"></i>&nbsp;LOGOUT
					</a>
				</li>
			</ul>
		</div>
		<!-- /navbar content -->
		
	</div>