<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/AdminLTE-2.1.1/dist/css/adminlte.css"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        
		<nav class="app-header navbar navbar-expand bg-body">
			<!--begin::Container-->
			<div class="container-fluid">
				<!--begin::Start Navbar Links-->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
							<i class="bi bi-list"></i>
						</a>
					</li>
				</ul>
				<!--end::Start Navbar Links-->

				<!--begin::End Navbar Links-->
				<ul class="navbar-nav ms-auto">
					<!-- User menu -->
					<li class="nav-item dropdown user-menu">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/AdminLTE-2.1.1/dist/assets/img/user2-160x160.jpg" class="user-image rounded-circle shadow" alt="User Image">
							<span class="d-none d-md-inline"><?php echo Yii::app()->user->name; ?></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
							<!-- User menu items -->
							<li class="user-header text-bg-primary">
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/AdminLTE-2.1.1/dist/assets/img/user2-160x160.jpg" class="rounded-circle shadow" alt="User Image">
								<p>
									<?php echo Yii::app()->user->name; ?> - Web Developer
									<small>Member since Nov. 2023</small>
								</p>
							</li>
							<li class="user-footer">
								<div class="d-flex justify-content-between">
									<!-- Profile Button -->
									<?php 
									$this->widget('zii.widgets.CMenu', array(
										'htmlOptions' => array('class' => 'navbar-nav mb-0'),
										'items' => array(
											array('label' => 'Profile', 'url' => array('/site/profile'), 'linkOptions' => array('class' => 'btn btn-default btn-flat')),
										),
									)); 
									?>
									
									<!-- Login/Logout Button -->
									<?php 
									$this->widget('zii.widgets.CMenu', array(
										'htmlOptions' => array('class' => 'navbar-nav mb-0'),
										'items' => array(
											array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'btn btn-default btn-flat')),
											array('label' => 'Logout ('.Yii::app()->user->name.')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'btn btn-default btn-flat')),
										),
									)); 
									?>
								</div>
							</li>

						</ul>
					</li>
				</ul>
				<!--end::End Navbar Links-->
			</div>
			<!--end::Container-->
		</nav>
		<!--end::Header-->

		<!--begin::Sidebar-->
		<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
			<!--begin::Sidebar Brand-->
			<div class="sidebar-brand">
				<!--begin::Brand Link-->
				<a href="<?php echo Yii::app()->createUrl('site/index'); ?>" class="brand-link">
					<!--begin::Brand Image-->
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/AdminLTE-2.1.1/dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow">
					<!--end::Brand Image-->
					<!--begin::Brand Text-->
					<span class="brand-text fw-light">Atri CUY</span>
					<!--end::Brand Text-->
				</a>
				<!--end::Brand Link-->
			</div>
			<!--end::Sidebar Brand-->
			<!--begin::Sidebar Wrapper-->
			<div class="sidebar-wrapper">
				<nav class="mt-2">
					<!--begin::Sidebar Menu-->
					<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
						<li class="nav-item menu-open">
							<a href="#" class="nav-link active">
								<i class="nav-icon bi bi-speedometer"></i>
								<p>
									Menu
									<i class="nav-arrow bi bi-chevron-right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<?php 
									$this->widget('zii.widgets.CMenu', array(
										'htmlOptions' => array('class' => 'nav sidebar-menu flex-column'), // Class untuk sidebar-menu
										'items' => array(
											array(
												'label' => 'Buat Antrian',
												'url' => array('/queues/create'),
												'linkOptions' => array('class' => 'nav-link active'), // Class nav-link active untuk Home
												'itemOptions' => array('class' => 'nav-item'), // Class nav-item untuk li
											),
											array(
												'label' => 'My Antrian',
												'url' => array('/queues/index', 'view' => 'about'),
												'linkOptions' => array('class' => 'nav-link'), // Class nav-link untuk About
												'itemOptions' => array('class' => 'nav-item'), // Class nav-item untuk li
											),
											array(
												'label' => 'Contact',
												'url' => array('/site/contact'),
												'linkOptions' => array('class' => 'nav-link'), // Class nav-link untuk Contact
												'itemOptions' => array('class' => 'nav-item'), // Class nav-item untuk li
											),
										),
									)); 
								?>
							</ul>
						</li>

						<!-- Tampilkan menu Master Data hanya jika user adalah admin -->
						<?php if(Yii::app()->user->name === 'admin'): ?>
						<li class="nav-item menu-open">
							<a href="#" class="nav-link active">
								<i class="nav-icon bi bi-speedometer"></i>
								<p>
									Master Data
									<i class="nav-arrow bi bi-chevron-right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<?php 
									$this->widget('zii.widgets.CMenu', array(
										'htmlOptions' => array('class' => 'nav sidebar-menu flex-column'), // Class untuk sidebar-menu
										'items' => array(
											array(
												'label' => 'Categories',
												'url' => array('/categories/admin'),
												'linkOptions' => array('class' => 'nav-link active'), // Class nav-link active untuk Categories
												'itemOptions' => array('class' => 'nav-item'), // Class nav-item untuk li
											),
											array(
												'label' => 'Merchants',
												'url' => array('/merchants/admin'),
												'linkOptions' => array('class' => 'nav-link'), // Class nav-link untuk Merchants
												'itemOptions' => array('class' => 'nav-item'), // Class nav-item untuk li
											),
											array(
												'label' => 'Services',
												'url' => array('/services/admin'),
												'linkOptions' => array('class' => 'nav-link'), // Class nav-link untuk Services
												'itemOptions' => array('class' => 'nav-item'), // Class nav-item untuk li
											),
											array(
												'label' => 'Antrian',
												'url' => array('/queues/admin'),
												'linkOptions' => array('class' => 'nav-link'), // Class nav-link untuk Services
												'itemOptions' => array('class' => 'nav-item'), // Class nav-item untuk li
											),
										),
									)); 
								?>
							</ul>
						</li>
						<?php endif; ?>

						<!-- Add more sidebar items here -->
					</ul>
					<!--end::Sidebar Menu-->
				</nav>
			</div>
			<!--end::Sidebar Wrapper-->
		</aside>
		<!--end::Sidebar-->


        <!--begin::Content-->
        <div class="app-content">
            <div class="container-fluid" id="page">
                <!-- Breadcrumbs -->
                <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    )); ?><!-- breadcrumbs -->
                <?php endif?>

                <!-- Page content -->
                <?php echo $content; ?>

                <div class="clear"></div>

                <!-- Footer -->
                <footer class="app-footer"> <!--begin::To the end-->
					<div class="float-end d-none d-sm-inline">Anything you want</div> <!--end::To the end--> <!--begin::Copyright--> <strong>
						Copyright &copy; 2024&nbsp;
					</strong>
					All rights reserved.
					<!--end::Copyright-->
				</footer> <!--end::Footer-->
                <!-- footer -->
            </div>
            <!-- page -->
        </div>
        <!--end::Content-->

    </div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!--end::App Wrapper-->
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/AdminLTE-2.1.1/dist/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
	<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js" integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ=" crossorigin="anonymous"></script> <!-- sortablejs -->
	<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script> <!-- ChartJS -->
	<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js" integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js" integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY=" crossorigin="anonymous"></script> <!-- jsvectormap -->
	<script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script> <!--end::OverlayScrollbars Configure--> <!-- OPTIONAL SCRIPTS --> <!-- sortablejs -->
	<script>
        const connectedSortables =
            document.querySelectorAll(".connectedSortable");
        connectedSortables.forEach((connectedSortable) => {
            let sortable = new Sortable(connectedSortable, {
                group: "shared",
                handle: ".card-header",
            });
        });

        const cardHeaders = document.querySelectorAll(
            ".connectedSortable .card-header",
        );
        cardHeaders.forEach((cardHeader) => {
            cardHeader.style.cursor = "move";
        });
    </script>
</body>
</html>
