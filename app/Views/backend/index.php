<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Admin</title>

    <link rel="apple-touch-icon" href="<?= base_url('assets/images/ico/apple-icon-120.png')?>">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/logo/Logo-Apple.png')?>">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link href="<?= base_url('assets/css/fonts/css93c2.css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet')?>">

    <!-- BEGIN: Custom CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
	<!-- END: Custom CSS-->

    <!-- BEGIN: Page CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/core/menu/menu-types/vertical-menu.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/core/colors/palette-gradient.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/core/colors/palette-gradient.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/pages/chat-application.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/pages/dashboard-analytics.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/plugins/pickers/daterange/daterange.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/plugins/animate/animate.min.css')?>">
	<!-- END: Page CSS-->

    <!-- BEGIN: Theme CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-extended.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/colors.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/components.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fonts/line-awesome/css/line-awesome.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fonts/line-awesome/1.1/css/line-awesome.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fonts/feather/style.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fonts/simple-line-icons/style.min.css')?>">
	<!-- END: Theme CSS-->

    <!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/css/vendors.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/css/forms/toggle/switchery.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/plugins/forms/switch.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/core/colors/palette-switch.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/css/charts/chartist.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/css/charts/chartist-plugin-tooltip.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/css/tables/datatable/datatables.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/css/pickers/daterange/daterangepicker.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/css/pickers/pickadate/default.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/css/pickers/pickadate/default.date.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/css/pickers/pickadate/default.time.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/css/forms/selects/select2.min.css')?>">

	<link rel="stylesheet" href="<?= base_url('assets/css/plugins/easy-autocomplete/easy-autocomplete.min.css')?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/plugins/easy-autocomplete/easy-autocomplete.themes.min.css')?>">
	<!-- END: Vendor CSS-->

</head>




	
<body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu"
	  data-color="bg-gradient-x-blue-green" data-col="2-columns">

	  


<!-- BEGIN: Header-->
<nav
	class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light d-print-none">
	<div class="navbar-wrapper">
		<div class="navbar-container content">
			<div class="collapse navbar-collapse show" id="navbar-mobile">
				<ul class="nav navbar-nav mr-auto float-left">
					<li class="nav-item mobile-menu d-md-none mr-auto"><a
							class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
								class="ft-menu font-large-1"></i></a></li>
					<li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
															  href="#"><i class="ft-menu"></i></a></li>
					<li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
								class="ficon ft-maximize"></i></a></li>
				</ul>
				<ul class="nav navbar-nav float-right">
					<li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
																   href="#" data-toggle="dropdown"> <span
								class="avatar avatar-online"><img
									src="../assets/images/portrait/small/profil-circle-512.png"
									alt="avatar"></span></a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="arrow_box_right">
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php"><i class="ft-power"></i>
									Logout</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion d-print-none menu-shadow " data-scroll-to-active="true"
	 data-img="../assets/images/backgrounds/04.jpg">
	<div class="navbar-header">
		<ul class="nav navbar-nav flex-row">
			<li class="nav-item mr-auto"><a class="navbar-brand" href="">
					<img class="brand-logo"
						 alt="Chameleon admin logo"
						 src="../assets/images/logo/Logo-Apple.png"/>
					<h3 class="brand-text"> Admin</h3></a></li>
			<li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
		</ul>
	</div>
	<div class="navigation-background"></div>
	<div class="main-menu-content">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
			<li class="nav-item"><a
					href=""><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
			</li>
			<li class="nav-item"><a href="#"><i class="ft-layers">
            </i><span class="menu-title" data-i18n="">Data Master</span></a>
				<ul class="menu-content">

					<li class="">
                        <a class="menu-item" href="">
                            <i class="bx bx-data"> </i> 
                            Data Produk</a>
					</li>
					<li class="">
                        <a class="menu-item" href="">
                            <i class="bx bx-data"> </i> 
                            Data Kategori</a>
					</li>
					<li class="">
                        <a class="menu-item" href="">
                            <i class="ft-users"> </i> 
                            Data Akses</a>
					</li>
					
				</ul>
			</li>

			<li class=" nav-item d-none d-md-block"><a class="nav-link" href=""><i class="ft-file"></i><span
						class="menu-title"
						data-i18n=""> Laporan Transaksi</span></a>
					</li>
			
			<li>
					<a class="menu-item" href=""><i class="ft-power"></i>
									Logout</a>
					</li>
		</ul>
	</div>
</div>
<!-- END: Main Menu-->
 

<!-- BEGIN: Content-->
<div class="app-content content d-print-none">
	<div class="content-wrapper">
		<div class="content-wrapper-before d-print-none">
            
        </div>
		<div class="content-header row d-print-none">
            
		</div>
		<div class="content-body d-print-none"><!-- Revenue, Hit Rate & Deals -->
            
		

        </div>
    </div>
</div>
<!-- END: Content-->



