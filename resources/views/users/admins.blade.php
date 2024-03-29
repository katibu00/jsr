<!DOCTYPE html>
<!-- 
Jampack
Author: Hencework
Contact: contact@hencework.com
-->
<html lang="en">
<head>
    <!-- Meta Tags -->
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts | Jampack - Admin CRM Dashboard Template</title>
    <meta name="description" content="A modern CRM Dashboard Template with reusable and flexible components for your SaaS web applications by hencework. Based on Bootstrap."/>
    
	<!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Bootstrap Dropify CSS -->
	<link href="/backend/vendors/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- select2 CSS -->
    <link href="/backend/vendors/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

	<!-- Data Table CSS -->
    <link href="/backend/vendors/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/vendors/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />

	<!-- CSS -->
    <link href="/backend/dist/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
   	<!-- Wrapper -->
	<div class="hk-wrapper" data-layout="vertical" data-layout-style="collapsed" data-menu="light" data-footer="simple" data-hover="active">
		<!-- Top Navbar -->
		<nav class="hk-navbar navbar navbar-expand-xl navbar-light fixed-top">
			<div class="container-fluid">
			<!-- Start Nav -->
			<div class="nav-start-wrap">
				<button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle d-xl-none"><span class="icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span></button>
					
				<!-- Search -->
				<form class="dropdown navbar-search">
					<div class="dropdown-toggle no-caret" data-bs-toggle="dropdown" data-dropdown-animation data-bs-auto-close="outside">
						<a href="#" class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover  d-xl-none"><span class="icon"><span class="feather-icon"><i data-feather="search"></i></span></span></a>
						<div class="input-group d-xl-flex d-none">
							<span class="input-affix-wrapper input-search affix-border">
								<input type="text" class="form-control  bg-transparent"  data-navbar-search-close="false" placeholder="Search..." aria-label="Search">
								<span class="input-suffix"><span>/</span>
									<span class="btn-input-clear"><i class="bi bi-x-circle-fill"></i></span>
									<span class="spinner-border spinner-border-sm input-loader text-primary" role="status">
										<span class="sr-only">Loading...</span>
									</span>
								</span>
							</span>
						</div>
					</div>
					<div  class="dropdown-menu p-0">
						<!-- Mobile Search -->
						<div class="dropdown-item d-xl-none bg-transparent">
							<div class="input-group mobile-search">
								<span class="input-affix-wrapper input-search">
									<input type="text" class="form-control" placeholder="Search..." aria-label="Search">
									<span class="input-suffix">
										<span class="btn-input-clear"><i class="bi bi-x-circle-fill"></i></span>
										<span class="spinner-border spinner-border-sm input-loader text-primary" role="status">
											<span class="sr-only">Loading...</span>
										</span>
									</span>
								</span>
							</div>
						</div>
						<!--/ Mobile Search -->
						<div data-simplebar class="dropdown-body p-2">
							<h6 class="dropdown-header">Recent Search
							</h6>
							<div class="dropdown-item bg-transparent">
								<a href="#" class="badge badge-pill badge-soft-secondary">Grunt</a>
								<a href="#" class="badge badge-pill badge-soft-secondary">Node JS</a>
								<a href="#" class="badge badge-pill badge-soft-secondary">SCSS</a>
							</div>
							<div class="dropdown-divider"></div>
							<h6 class="dropdown-header">Help
							</h6>
							<a href="javascript:void(0);" class="dropdown-item">
								<div class="media align-items-center">
									<div class="media-head me-2">
										<div class="avatar avatar-icon avatar-xs avatar-soft-light avatar-rounded">
											<span class="initial-wrap">
												<span class="svg-icon">
													<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-corner-down-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
														<path d="M6 6v6a3 3 0 0 0 3 3h10l-4 -4m0 8l4 -4"></path>
													 </svg>
												</span>
											</span>
										</div>
									</div>
									<div class="media-body">
										How to setup theme?
									</div>
								</div>
							</a>
							<a href="javascript:void(0);" class="dropdown-item">
								<div class="media align-items-center">
									<div class="media-head me-2">
										<div class="avatar avatar-icon avatar-xs avatar-soft-light avatar-rounded">
											<span class="initial-wrap">
												<span class="svg-icon">
													<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-corner-down-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
														<path d="M6 6v6a3 3 0 0 0 3 3h10l-4 -4m0 8l4 -4"></path>
													 </svg>
												</span>
											</span>
										</div>
									</div>
									<div class="media-body">
										View detail documentation
									</div>
								</div>
							</a>
							<div class="dropdown-divider"></div>
							<h6 class="dropdown-header">Users
							</h6>
							<a href="javascript:void(0);" class="dropdown-item">
								<div class="media align-items-center">
									<div class="media-head me-2">
										<div class="avatar avatar-xs avatar-rounded">
											<img src="/backend/dist/img/avatar3.jpg" alt="user" class="avatar-img">
										</div>
									</div>
									<div class="media-body">
										Sarah Jone
									</div>
								</div>
							</a>
							<a href="javascript:void(0);" class="dropdown-item">
								<div class="media align-items-center">
									<div class="media-head me-2">
										<div class="avatar avatar-xs avatar-soft-primary avatar-rounded">
											<span class="initial-wrap">J</span>
										</div>
									</div>
									<div class="media-body">
										Joe Jackson
									</div>
								</div>
							</a>
							<a href="javascript:void(0);" class="dropdown-item">
								<div class="media align-items-center">
									<div class="media-head me-2">
										<div class="avatar avatar-xs avatar-rounded">
											<img src="/backend/dist/img/avatar4.jpg" alt="user" class="avatar-img">
										</div>
									</div>
									<div class="media-body">
										Maria Richard
									</div>
								</div>
							</a>
						</div>
						<div class="dropdown-footer d-xl-flex d-none"><a href="#"><u>Search all</u></a></div>
					</div>
				</form>
				<!-- /Search -->
			</div>
			<!-- /Start Nav -->
			
			<!-- End Nav -->
			<div class="nav-end-wrap">
				<ul class="navbar-nav flex-row">
					<li class="nav-item">
						<a href="email.html" class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover"><span class="icon"><span class=" position-relative"><span class="feather-icon"><i data-feather="inbox"></i></span><span class="badge badge-sm badge-soft-primary badge-sm badge-pill position-top-end-overflow-1">4</span></span></span></a>
					</li>
					<li class="nav-item">
						<div class="dropdown dropdown-notifications">
							<a href="#" class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover dropdown-toggle no-caret" data-bs-toggle="dropdown" data-dropdown-animation role="button" aria-haspopup="true" aria-expanded="false"><span class="icon"><span class="position-relative"><span class="feather-icon"><i data-feather="bell"></i></span><span class="badge badge-success badge-indicator position-top-end-overflow-1"></span></span></span></a>
							<div class="dropdown-menu dropdown-menu-end p-0">
								<h6 class="dropdown-header px-4 fs-6">Notifications<a href="#" class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"><span class="icon"><span class="feather-icon"><i data-feather="settings"></i></span></span></a>
								</h6>
								<div data-simplebar class="dropdown-body  p-2">
									<a href="javascript:void(0);" class="dropdown-item">
										<div class="media">
											<div class="media-head">
												<div class="avatar avatar-rounded avatar-sm">
													<img src="/backend/dist/img/avatar2.jpg" alt="user" class="avatar-img">
												</div>
											</div>
											<div class="media-body">
												<div>
													<div class="notifications-text">Morgan Freeman accepted your invitation to join the team</div>
													<div class="notifications-info">
														<span class="badge badge-soft-success">Collaboration</span>
														<div class="notifications-time">Today, 10:14 PM</div>
													</div>
												</div>
											</div>
										</div>
									</a>
									<a href="javascript:void(0);" class="dropdown-item">
										<div class="media">
											<div class="media-head">
												<div class="avatar  avatar-icon avatar-sm avatar-success avatar-rounded">
													<span class="initial-wrap">
														<span class="feather-icon"><i data-feather="inbox"></i></span>
													</span>
												</div>
											</div>
											<div class="media-body">
												<div>
													<div class="notifications-text">New message received from Alan Rickman</div>
													<div class="notifications-info">
														<div class="notifications-time">Today, 7:51 AM</div>
													</div>
												</div>
											</div>
										</div>
									</a>
									<a href="javascript:void(0);" class="dropdown-item">
										<div class="media">
											<div class="media-head">
												<div class="avatar  avatar-icon avatar-sm avatar-pink avatar-rounded">
													<span class="initial-wrap">
														<span class="feather-icon"><i data-feather="clock"></i></span>
													</span>
												</div>
											</div>
											<div class="media-body">
												<div>
													<div class="notifications-text">You have a follow up with Jampack Head on Friday, Dec 19 at 9:30 am</div>
													<div class="notifications-info">
														<div class="notifications-time">Yesterday, 9:25 PM</div>
													</div>
												</div>
											</div>
										</div>
									</a>
									<a href="javascript:void(0);" class="dropdown-item">
										<div class="media">
											<div class="media-head">
												<div class="avatar avatar-sm avatar-rounded">
													<img src="/backend/dist/img/avatar3.jpg" alt="user" class="avatar-img">
												</div>
											</div>
											<div class="media-body">
												<div>
													<div class="notifications-text">Application of Sarah Williams is waiting for your approval</div>
													<div class="notifications-info">
														<div class="notifications-time">Today 10:14 PM</div>
													</div>
												</div>
											</div>
										</div>
									</a>
									<a href="javascript:void(0);" class="dropdown-item">
										<div class="media">
											<div class="media-head">
												<div class="avatar avatar-sm avatar-rounded">
													<img src="/backend/dist/img/avatar10.jpg" alt="user" class="avatar-img">
												</div>
											</div>
											<div class="media-body">
												<div>	
													<div class="notifications-text">Winston Churchil shared a document with you</div>
													<div class="notifications-info">
														<span class="badge badge-soft-violet">File Manager</span>
														<div class="notifications-time">2 Oct, 2021</div>
													</div>
												</div>
											</div>
										</div>
									</a>
									<a href="javascript:void(0);" class="dropdown-item">
										<div class="media">
											<div class="media-head">
												<div class="avatar  avatar-icon avatar-sm avatar-danger avatar-rounded">
													<span class="initial-wrap">
														<span class="feather-icon"><i data-feather="calendar"></i></span>
													</span>
												</div>
											</div>
											<div class="media-body">
												<div>	
													<div class="notifications-text">Last 2 days left for the project to be completed</div>
													<div class="notifications-info">
														<span class="badge badge-soft-orange">Updates</span>
														<div class="notifications-time">14 Sep, 2021</div>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-footer"><a href="#"><u>View all notifications</u></a></div>
							</div>
						</div>
					</li>
					<li class="nav-item">
						<div class="dropdown ps-2">
							<a class=" dropdown-toggle no-caret" href="#" role="button" data-bs-display="static" data-bs-toggle="dropdown" data-dropdown-animation data-bs-auto-close="outside" aria-expanded="false">
								<div class="avatar avatar-rounded avatar-xs">
									<img src="/backend/dist/img/avatar12.jpg" alt="user" class="avatar-img">
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<div class="p-2">
									<div class="media">
										<div class="media-head me-2">
											<div class="avatar avatar-primary avatar-sm avatar-rounded">
												<span class="initial-wrap">Hk</span>
											</div>
										</div>
										<div class="media-body">
											<div class="dropdown">
												<a href="#" class="d-block dropdown-toggle link-dark fw-medium"  data-bs-toggle="dropdown" data-dropdown-animation data-bs-auto-close="inside">Hencework</a>
												<div class="dropdown-menu dropdown-menu-end">
													<div class="p-2">
														<div class="media align-items-center active-user mb-3">
															<div class="media-head me-2">
																<div class="avatar avatar-primary avatar-xs avatar-rounded">
																	<span class="initial-wrap">Hk</span>
																</div>
															</div>
															<div class="media-body">
																<a href="#" class="d-flex align-items-center link-dark">Hencework <i class="ri-checkbox-circle-fill fs-7 text-primary ms-1"></i></a>
																<a href="#" class="d-block fs-8 link-secondary"><u>Manage your account</u></a>
															</div>
														</div>
														<div class="media align-items-center mb-3">
															<div class="media-head me-2">
																<div class="avatar avatar-xs avatar-rounded">
																	<img src="/backend/dist/img/avatar12.jpg" alt="user" class="avatar-img">
																</div>
															</div>
															<div class="media-body">
																<a href="#" class="d-block link-dark">Jampack Team</a>
																<a href="#" class="d-block fs-8 link-secondary">contact@hencework.com</a>
															</div>
														</div>
														<button class="btn btn-block btn-outline-light btn-sm">
															<span><span class="icon"><span class="feather-icon"><i data-feather="plus"></i></span></span>
															<span>Add Account</span></span>
														</button>
													</div>
												</div>
											</div>
											<div class="fs-7">contact@hencework.com</div>
											<a href="#" class="d-block fs-8 link-secondary"><u>Sign Out</u></a>
										</div>
									</div>
								</div>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="profile.html">Profile</a>
								<a class="dropdown-item" href="#"><span class="me-2">Offers</span><span class="badge badge-sm badge-soft-pink">2</span></a><div class="dropdown-divider"></div>
								<h6 class="dropdown-header">Manage Account</h6>
								<a class="dropdown-item" href="#"><span class="dropdown-icon feather-icon"><i data-feather="credit-card"></i></span><span>Payment methods</span></a>
								<a class="dropdown-item" href="#"><span class="dropdown-icon feather-icon"><i data-feather="check-square"></i></span><span>Subscriptions</span></a>
								<a class="dropdown-item" href="#"><span class="dropdown-icon feather-icon"><i data-feather="settings"></i></span><span>Settings</span></a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#"><span class="dropdown-icon feather-icon"><i data-feather="tag"></i></span><span>Raise a ticket</span></a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Terms & Conditions</a>
								<a class="dropdown-item" href="#">Help & Support</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<!-- /End Nav -->
			</div>									
		</nav>
		<!-- /Top Navbar -->

        <!-- Vertical Nav -->
        <div class="hk-menu">
			<!-- Brand -->
			<div class="menu-header">
				<span>
					<a class="navbar-brand" href="index.html">
						<img class="brand-img img-fluid" src="/backend/dist/img/brand-sm.svg" alt="brand" />
						<img class="brand-img img-fluid" src="/backend/dist/img/Jampack.svg" alt="brand" />
					</a>
					<button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle">
						<span class="icon">
							<span class="svg-icon fs-5">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-to-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<line x1="10" y1="12" x2="20" y2="12"></line>
									<line x1="10" y1="12" x2="14" y2="16"></line>
									<line x1="10" y1="12" x2="14" y2="8"></line>
									<line x1="4" y1="4" x2="4" y2="20"></line>
								</svg>
							</span>
						</span>
					</button>
				</span>
			</div>
			<!-- /Brand -->

			@include('layouts.sidebar')
		</div>
        <div id="hk_menu_backdrop" class="hk-menu-backdrop"></div>
        <!-- /Vertical Nav -->

		<!-- Main Content -->
		<div class="hk-pg-wrapper pb-0">
			<!-- Page Body -->
			<div class="hk-pg-body py-0">
				<div class="contactapp-wrap">
					<nav class="contactapp-sidebar">
						<div data-simplebar class="nicescroll-bar">
							<div class="menu-content-wrap">
								<button type="button" class="btn btn-primary btn-rounded btn-block mb-4" data-bs-toggle="modal" data-bs-target="#add_new_contact">
									Add new contact
								</button>
								<div class="menu-group">
									<ul class="nav nav-light navbar-nav flex-column">
										<li class="nav-item active">
											<a class="nav-link" href="javascript:void(0);">
												<span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="inbox"></i></span></span>
												<span class="nav-link-text">All Contacts</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="javascript:void(0);">
												<span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="star"></i></span></span>
												<span class="nav-link-text">Important</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="javascript:void(0);">
												<span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="archive"></i></span></span>
												<span class="nav-link-text">Archive</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="javascript:void(0);">
												<span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="edit"></i></span></span>
												<span class="nav-link-text">Pending</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="javascript:void(0);">
												<span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="trash-2"></i></span></span>
												<span class="nav-link-text">Deleted</span>
											</a>
										</li>
									</ul>
								</div>
								<div class="separator separator-light"></div>
								<div class="menu-group">
									<ul class="nav nav-light navbar-nav flex-column">
										<li class="nav-item">
											<a class="nav-link" href="javascript:void(0);">
												<span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="upload"></i></span></span>
												<span class="nav-link-text">Export</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="javascript:void(0);">
												<span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="download"></i></span></span>
												<span class="nav-link-text">Import</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="javascript:void(0);">
												<span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="printer"></i></span></span>
												<span class="nav-link-text">Print</span>
											</a>
										</li>
									</ul>
								</div>
								<div class="separator separator-light"></div>
								<div class="d-flex align-items-center justify-content-between mb-2">
									<div class="title-sm text-primary mb-0">Labels</div>
									<a href="#" class="btn btn-xs btn-icon btn-rounded btn-light" data-bs-toggle="modal" data-bs-target="#add_new_label"><span class="icon" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Add Label"><span class="feather-icon"><i data-feather="plus"></i></span></span></a>
								</div>
								<div class="menu-group">
									<ul class="nav nav-light navbar-nav flex-column">
										<li class="nav-item">
											<a class="nav-link link-badge-right" href="#">
												<span class="nav-link-text">Design</span>
												<span class="badge badge-pill badge-sm badge-soft-primary ms-auto">136</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link link-badge-right" href="#">
												<span class="nav-link-text">Development</span>
												<span class="badge badge-pill badge-sm badge-soft-primary ms-auto">2</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link link-badge-right" href="#">
												<span class="nav-link-text">Inventory</span>
												<span class="badge badge-pill badge-sm badge-soft-primary ms-auto">86</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link link-badge-right" href="#">
												<span class="nav-link-text">Human Resource</span>
												<span class="badge badge-pill badge-sm badge-soft-primary ms-auto">34</span>
											</a>
										</li>
									</ul>
								</div>
								<div class="separator separator-light"></div>
								<div class="d-flex align-items-center justify-content-between mb-4">
									<div class="title-sm text-primary mb-0">Tags</div>
									<a href="#" class="btn btn-xs btn-icon btn-rounded btn-light" data-bs-toggle="modal" data-bs-target="#add_new_tag"><span class="icon" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Add Tag"><span class="feather-icon"><i data-feather="plus"></i></span></span></a>
								</div>
								<div class="tag-cloud">
									<a href="#" class="badge badge-outline badge-light">Collaboration</a>
									<a href="#" class="badge badge-outline badge-light">React Developer</a>
									<a href="#" class="badge badge-outline badge-light">Angular Developer</a>
									<a href="#" class="badge badge-outline badge-light">promotion</a>
									<a href="#" class="badge badge-outline badge-light">Advertisement</a>
								</div>
							</div>
						</div>
						<!--Sidebar Fixnav-->
						<div class="contactapp-fixednav">
							<div class="hk-toolbar">
								<ul class="nav nav-light">
									<li class="nav-item nav-link">
										<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Settings" href="#"><span class="icon"><span class="feather-icon"><i data-feather="settings"></i></span></span></a>
									</li>
									<li class="nav-item nav-link">
										<a href="#" class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Archive"><span class="icon"><span class="feather-icon"><i data-feather="archive"></i></span></span></a>
									</li>
									<li class="nav-item nav-link">
										<a href="#" class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Help"><span class="icon"><span class="feather-icon"><i data-feather="book"></i></span></span></a>
									</li>
								</ul>
							</div>
						</div>
						<!--/ Sidebar Fixnav-->
					</nav>
					<div class="contactapp-content">
						<div class="contactapp-detail-wrap">
							<header class="contact-header">
								<div class="d-flex align-items-center">
									<div class="dropdown">
										<a class="contactapp-title dropdown-toggle link-dark" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
											<h1>Contacts</h1>
										</a>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="users"></i></span><span>All Contacts</span></a>
											<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="star"></i></span><span>Important</span></a>
											<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="archive"></i></span><span>Archive</span></a>
											<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="edit"></i></span><span>Pending</span></a>
											<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="trash-2"></i></span><span>Deleted</span></a>
										</div>
									</div>
									<div class="dropdown ms-3">
										<button class="btn btn-sm btn-outline-secondary flex-shrink-0 dropdown-toggle d-lg-inline-block d-none" data-bs-toggle="dropdown">Create New</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="#">Add New Contact</a>
											<a class="dropdown-item" href="#">Add New Department</a>
											<a class="dropdown-item" href="#">Add Category</a>
											<a class="dropdown-item" href="#">Add New Tag</a>
										</div>
									</div>
								</div>
								<div class="contact-options-wrap">	
									<a class="btn btn-icon btn-flush-dark flush-soft-hover dropdown-toggle no-caret active" href="#" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="list"></i></span></span></a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item active" href="contact.html"><span class="feather-icon dropdown-icon"><i data-feather="list"></i></span><span>List View</span></a>
										<a class="dropdown-item" href="contact-cards.html"><span class="feather-icon dropdown-icon"><i data-feather="grid"></i></span><span>Grid View</span></a>
										<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="server"></i></span><span>Compact View</span></a>
									</div>
									<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover no-caret d-sm-inline-block d-none" href="#" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Refresh"><span class="icon"><span class="feather-icon"><i data-feather="refresh-cw"></i></span></span></a>
									<div class="v-separator d-lg-block d-none"></div>
									<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret  d-lg-inline-block d-none  ms-sm-0" href="#" data-bs-toggle="dropdown"><span class="icon" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Manage Contact"><span class="feather-icon"><i data-feather="settings"></i></span></span></a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Manage Contact</a>
										<a class="dropdown-item" href="#">Import</a>
										<a class="dropdown-item" href="#">Export</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Send Messages</a>
										<a class="dropdown-item" href="#">Delegate Access</a>
									</div>
									<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret d-lg-inline-block d-none" href="#" data-bs-toggle="dropdown"><span class="icon" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="More"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="profile.html"><span class="feather-icon dropdown-icon"><i data-feather="star"></i></span><span>Stared Contacts</span></a>
										<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="archive"></i></span><span>Archive Contacts</span></a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="email.html"><span class="feather-icon dropdown-icon"><i data-feather="slash"></i></span><span>Block Content</span></a>
										<a class="dropdown-item" href="email.html"><span class="feather-icon dropdown-icon"><i data-feather="external-link"></i></span><span>Feedback</span></a>
									</div>
									<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover hk-navbar-togglable d-sm-inline-block d-none" href="#" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Collapse">
										<span class="icon">
											<span class="feather-icon"><i data-feather="chevron-up"></i></span>
											<span class="feather-icon d-none"><i data-feather="chevron-down"></i></span>
										</span>
									</a>
								</div>
								<div class="hk-sidebar-togglable"></div>
							</header>
							<div class="contact-body">
								<div data-simplebar class="nicescroll-bar">
									<div class="collapse" id="collapseQuick">
										<div class="quick-access-form-wrap">
											<form class="quick-access-form border">
												<div class="row gx-3">
													<div class="col-xxl-10">
														<div class="position-relative">
															<div class="dropify-square">
																<input type="file"  class="dropify-1"/>
															</div>
															<div class="col-md-12">
																<div class="row gx-3">
																	<div class="col-lg-4">
																		<div class="form-group">
																			<input class="form-control" placeholder="First name*" value="" type="text">
																		</div>
																		<div class="form-group">
																			<input class="form-control" placeholder="Last name*" value="" type="text">
																		</div>
																	</div>
																	<div class="col-lg-4">
																		<div class="form-group">
																			<input class="form-control" placeholder="Email Id*" value="" type="text">
																		</div>
																		<div class="form-group">
																			<input class="form-control" placeholder="Phone" value="" type="text">
																		</div>
																	</div>
																	<div class="col-lg-4">
																		<div class="form-group">
																			<input class="form-control"  placeholder="Department" value="" type="text">
																		</div>
																		<div class="form-group">
																			<select id="input_tags" class="form-control" multiple="multiple">
																				<option selected="selected">Collaborator</option>
																				<option>Designer</option>
																				<option selected="selected">Developer</option>
																			</select>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-xxl-2">
														<div class="form-group">
															<button data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false"  class="btn btn-block btn-primary ">Create New
															</button>
														</div>
														<div class="form-group">
															<button data-bs-toggle="collapse" disabled  data-bs-target="#collapseExample" aria-expanded="false"  class="btn btn-block btn-secondary">Discard
															</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
									<div class="contact-list-view">
										<table id="datable_1" class="table nowrap w-100 mb-5">
											<thead>
												<tr>
													<th><span class="form-check mb-0">
														<input type="checkbox" class="form-check-input check-select-all" id="customCheck1">
														<label class="form-check-label" for="customCheck1"></label>
													</span></th>
													<th>Name</th>
													<th>Email Address</th>
													<th>Phone</th>
													<th>Tags</th>
													<th>Labels</th>
													<th>Date Created</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<span class="contact-star marked"><span class="feather-icon"><i data-feather="star"></i></span></span>
														</div>
													</td>
													<td>
														<div class="media align-items-center">
															<div class="media-head me-2">
																<div class="avatar avatar-xs avatar-rounded">
																	<img src="/backend/dist/img/avatar1.jpg" alt="user" class="avatar-img">
																</div>
															</div>
															<div class="media-body">
																<span class="d-block text-high-em">Morgan Freeman</span> 
															</div>
														</div>
													</td>
													<td class="text-truncate">morgan@jampack.com</td>
													<td>+145 52 5689</td>
													<td><span class="badge badge-soft-violet my-1  me-2">Promotion</span><span class="badge badge-soft-danger  my-1  me-2">Collaborator</span></td>
													<td>Design</td>
													<td>13 Jan, 2020</td>
													<td>
														<div class="d-flex align-items-center">
															<div class="d-flex">
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Archive" href="#"><span class="icon"><span class="feather-icon"><i data-feather="archive"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="edit-contact.html"><span class="icon"><span class="feather-icon"><i data-feather="edit"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
															</div>
															<div class="dropdown">
																<button class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" aria-expanded="false" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></button>
																<div class="dropdown-menu dropdown-menu-end">
																	<a class="dropdown-item" href="edit-contact.html"><span class="feather-icon dropdown-icon"><i data-feather="edit"></i></span><span>Edit Contact</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="trash-2"></i></span><span>Delete</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="copy"></i></span><span>Duplicate</span></a>
																	<div class="dropdown-divider"></div>
																	<h6 class="dropdown-header dropdown-header-bold">Change Labels</h6>
																	<a class="dropdown-item" href="#">Design</a>
																	<a class="dropdown-item" href="#">Developer</a>
																	<a class="dropdown-item" href="#">Inventory</a>
																	<a class="dropdown-item" href="#">Human Resource</a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<span class="contact-star marked"><span class="feather-icon"><i data-feather="star"></i></span></span>
														</div>
													</td>
													<td>
														<div class="media align-items-center">
															<div class="media-head me-2">
																<div class="avatar avatar-xs avatar-rounded">
																	<img src="/backend/dist/img/avatar9.jpg" alt="user" class="avatar-img">
																</div>
															</div>
															<div class="media-body">
																<span class="d-block text-high-em">Huma Therman</span> 
															</div>
														</div>
													</td>
													<td class="text-truncate">huma@clariesup.au</td>
													<td>+234 48 2365</td>
													<td><span class="badge badge-soft-danger my-1  me-2">Collaborator</span><span class="badge badge-soft-success  my-1  me-2">Angular Developer</span></td>
													<td>Developer</td>
													<td>13 Jan, 2020</td>
													<td>
														<div class="d-flex align-items-center">
															<div class="d-flex">
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Archive" href="#"><span class="icon"><span class="feather-icon"><i data-feather="archive"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="edit-contact.html"><span class="icon"><span class="feather-icon"><i data-feather="edit"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
															</div>
															<div class="dropdown">
																<button class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" aria-expanded="false" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></button>
																<div class="dropdown-menu dropdown-menu-end">
																	<a class="dropdown-item" href="edit-contact.html"><span class="feather-icon dropdown-icon"><i data-feather="edit"></i></span><span>Edit Contact</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="trash-2"></i></span><span>Delete</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="copy"></i></span><span>Duplicate</span></a>
																	<div class="dropdown-divider"></div>
																	<h6 class="dropdown-header dropdown-header-bold">Change Labels</h6>
																	<a class="dropdown-item" href="#">Design</a>
																	<a class="dropdown-item" href="#">Developer</a>
																	<a class="dropdown-item" href="#">Inventory</a>
																	<a class="dropdown-item" href="#">Human Resource</a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<span class="contact-star"><span class="feather-icon"><i data-feather="star"></i></span></span>
														</div>
													</td>
													<td>
														<div class="media align-items-center">
															<div class="media-head me-2">
																<div class="avatar avatar-xs avatar-soft-info avatar-rounded">
																	<span class="initial-wrap">C</span>
																</div>
															</div>
															<div class="media-body">
																<span class="d-block text-high-em">Charlie Chaplin</span> 
															</div>
														</div>
													</td>
													<td class="text-truncate">charlie@leernoca.monster</td>
													<td>+741 56 7896</td>
													<td><span class="badge badge-soft-danger my-1  me-2">Collaborator</span></td>
													<td>Inventory</td>
													<td>13 Jan, 2019</td>
													<td>
														<div class="d-flex align-items-center">
															<div class="d-flex">
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Archive" href="#"><span class="icon"><span class="feather-icon"><i data-feather="archive"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="edit-contact.html"><span class="icon"><span class="feather-icon"><i data-feather="edit"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
															</div>
															<div class="dropdown">
																<button class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" aria-expanded="false" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></button>
																<div class="dropdown-menu dropdown-menu-end">
																	<a class="dropdown-item" href="edit-contact.html"><span class="feather-icon dropdown-icon"><i data-feather="edit"></i></span><span>Edit Contact</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="trash-2"></i></span><span>Delete</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="copy"></i></span><span>Duplicate</span></a>
																	<div class="dropdown-divider"></div>
																	<h6 class="dropdown-header dropdown-header-bold">Change Labels</h6>
																	<a class="dropdown-item" href="#">Design</a>
																	<a class="dropdown-item" href="#">Developer</a>
																	<a class="dropdown-item" href="#">Inventory</a>
																	<a class="dropdown-item" href="#">Human Resource</a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<span class="contact-star marked"><span class="feather-icon"><i data-feather="star"></i></span></span>
														</div>
													</td>
													<td>
														<div class="media align-items-center">
															<div class="media-head me-2">
																<div class="avatar avatar-xs avatar-rounded">
																	<img src="/backend/dist/img/avatar10.jpg" alt="user" class="avatar-img">
																</div>
															</div>
															<div class="media-body">
																<span class="d-block text-high-em">Winston Churchil</span> 
															</div>
														</div>
													</td>
													<td class="text-truncate">winston@worthniza.ga</td>
													<td>+145 52 5463</td>
													<td><span class="badge badge-soft-danger my-1  me-2">Promotion</span><span class="badge badge-soft-light my-1  me-2">Advertisement</span></td>
													<td>Human Resource</td>
													<td>13 Jan, 2020</td>
													<td>
														<div class="d-flex align-items-center">
															<div class="d-flex">
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Archive" href="#"><span class="icon"><span class="feather-icon"><i data-feather="archive"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="edit-contact.html"><span class="icon"><span class="feather-icon"><i data-feather="edit"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
															</div>
															<div class="dropdown">
																<button class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" aria-expanded="false" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></button>
																<div class="dropdown-menu dropdown-menu-end">
																	<a class="dropdown-item" href="edit-contact.html"><span class="feather-icon dropdown-icon"><i data-feather="edit"></i></span><span>Edit Contact</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="trash-2"></i></span><span>Delete</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="copy"></i></span><span>Duplicate</span></a>
																	<div class="dropdown-divider"></div>
																	<h6 class="dropdown-header dropdown-header-bold">Change Labels</h6>
																	<a class="dropdown-item" href="#">Design</a>
																	<a class="dropdown-item" href="#">Developer</a>
																	<a class="dropdown-item" href="#">Inventory</a>
																	<a class="dropdown-item" href="#">Human Resource</a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<span class="contact-star"><span class="feather-icon"><i data-feather="star"></i></span></span>
														</div>
													</td>
													<td>
														<div class="media align-items-center">
															<div class="media-head me-2">
																<div class="avatar avatar-xs avatar-rounded">
																	<img src="/backend/dist/img/avatar3.jpg" alt="user" class="avatar-img">
																</div>
															</div>
															<div class="media-body">
																<span class="d-block text-high-em">Jaquiline Joker</span> 
															</div>
														</div>
													</td>
													<td class="text-truncate">jaquljoker@jampack.com</td>
													<td>+145 53 4715</td>
													<td><span class="badge badge-soft-violet my-1  me-2">Promotion</span><span class="badge badge-soft-danger  my-1  me-2">Collaborator</span></td>
													<td>Design</td>
													<td>3 July, 2020</td>
													<td>
														<div class="d-flex align-items-center">
															<div class="d-flex">
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Archive" href="#"><span class="icon"><span class="feather-icon"><i data-feather="archive"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="edit-contact.html"><span class="icon"><span class="feather-icon"><i data-feather="edit"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
															</div>
															<div class="dropdown">
																<button class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" aria-expanded="false" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></button>
																<div class="dropdown-menu dropdown-menu-end">
																	<a class="dropdown-item" href="edit-contact.html"><span class="feather-icon dropdown-icon"><i data-feather="edit"></i></span><span>Edit Contact</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="trash-2"></i></span><span>Delete</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="copy"></i></span><span>Duplicate</span></a>
																	<div class="dropdown-divider"></div>
																	<h6 class="dropdown-header dropdown-header-bold">Change Labels</h6>
																	<a class="dropdown-item" href="#">Design</a>
																	<a class="dropdown-item" href="#">Developer</a>
																	<a class="dropdown-item" href="#">Inventory</a>
																	<a class="dropdown-item" href="#">Human Resource</a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<span class="contact-star marked"><span class="feather-icon"><i data-feather="star"></i></span></span>
														</div>
													</td>
													<td>
														<div class="media align-items-center">
															<div class="media-head me-2">
																<div class="avatar avatar-xs avatar-rounded">
																	<img src="/backend/dist/img/avatar7.jpg" alt="user" class="avatar-img">
																</div>
															</div>
															<div class="media-body">
																<span class="d-block text-high-em">Tom Cruz</span> 
															</div>
														</div>
													</td>
													<td class="text-truncate">tomcz@jampack.com</td>
													<td>+456 52 4862</td>
													<td><span class="badge badge-soft-danger my-1  me-2">Collaborator</span><span class="badge badge-soft-warning my-1  me-2">Angular Developer</span></td>
													<td>Inventory</td>
													<td>24 Jun, 2019</td>
													<td>
														<div class="d-flex align-items-center">
															<div class="d-flex">
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Archive" href="#"><span class="icon"><span class="feather-icon"><i data-feather="archive"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="edit-contact.html"><span class="icon"><span class="feather-icon"><i data-feather="edit"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
															</div>
															<div class="dropdown">
																<button class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" aria-expanded="false" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></button>
																<div class="dropdown-menu dropdown-menu-end">
																	<a class="dropdown-item" href="edit-contact.html"><span class="feather-icon dropdown-icon"><i data-feather="edit"></i></span><span>Edit Contact</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="trash-2"></i></span><span>Delete</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="copy"></i></span><span>Duplicate</span></a>
																	<div class="dropdown-divider"></div>
																	<h6 class="dropdown-header dropdown-header-bold">Change Labels</h6>
																	<a class="dropdown-item" href="#">Design</a>
																	<a class="dropdown-item" href="#">Developer</a>
																	<a class="dropdown-item" href="#">Inventory</a>
																	<a class="dropdown-item" href="#">Human Resource</a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<span class="contact-star"><span class="feather-icon"><i data-feather="star"></i></span></span>
														</div>
													</td>
													<td>
														<div class="media align-items-center">
															<div class="media-head me-2">
																<div class="avatar avatar-xs avatar-rounded">
																	<img src="/backend/dist/img/avatar2.jpg" alt="user" class="avatar-img">
																</div>
															</div>
															<div class="media-body">
																<span class="d-block text-high-em">Danial Craig</span> 
															</div>
														</div>
													</td>
													<td class="text-truncate">danialc@jampack.com</td>
													<td>+145 52 5689</td>
													<td><span class="badge badge-soft-danger my-1  me-2">Collaborator</span></td>
													<td>Developer</td>
													<td>24 Jun, 2019</td>
													<td>
														<div class="d-flex align-items-center">
															<div class="d-flex">
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Archive" href="#"><span class="icon"><span class="feather-icon"><i data-feather="archive"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="edit-contact.html"><span class="icon"><span class="feather-icon"><i data-feather="edit"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
															</div>
															<div class="dropdown">
																<button class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" aria-expanded="false" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></button>
																<div class="dropdown-menu dropdown-menu-end">
																	<a class="dropdown-item" href="edit-contact.html"><span class="feather-icon dropdown-icon"><i data-feather="edit"></i></span><span>Edit Contact</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="trash-2"></i></span><span>Delete</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="copy"></i></span><span>Duplicate</span></a>
																	<div class="dropdown-divider"></div>
																	<h6 class="dropdown-header dropdown-header-bold">Change Labels</h6>
																	<a class="dropdown-item" href="#">Design</a>
																	<a class="dropdown-item" href="#">Developer</a>
																	<a class="dropdown-item" href="#">Inventory</a>
																	<a class="dropdown-item" href="#">Human Resource</a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<span class="contact-star"><span class="feather-icon"><i data-feather="star"></i></span></span>
														</div>
													</td>
													<td>
														<div class="media align-items-center">
															<div class="media-head me-2">
																<div class="avatar avatar-xs avatar-rounded">
																	<img src="/backend/dist/img/avatar8.jpg" alt="user" class="avatar-img">
																</div>
															</div>
															<div class="media-body">
																<span class="d-block text-high-em">Katharine Jones</span> 
															</div>
														</div>
													</td>
													<td class="text-truncate">joneskath@jampack.com</td>
													<td>+741 56 7896</td>
													<td><span class="badge badge-soft-violet my-1  me-2">Promotion</span></td>
													<td>Inventory</td>
													<td>24 Jun, 2019</td>
													<td>
														<div class="d-flex align-items-center">
															<div class="d-flex">
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Archive" href="#"><span class="icon"><span class="feather-icon"><i data-feather="archive"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="edit-contact.html"><span class="icon"><span class="feather-icon"><i data-feather="edit"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
															</div>
															<div class="dropdown">
																<button class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" aria-expanded="false" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></button>
																<div class="dropdown-menu dropdown-menu-end">
																	<a class="dropdown-item" href="edit-contact.html"><span class="feather-icon dropdown-icon"><i data-feather="edit"></i></span><span>Edit Contact</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="trash-2"></i></span><span>Delete</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="copy"></i></span><span>Duplicate</span></a>
																	<div class="dropdown-divider"></div>
																	<h6 class="dropdown-header dropdown-header-bold">Change Labels</h6>
																	<a class="dropdown-item" href="#">Design</a>
																	<a class="dropdown-item" href="#">Developer</a>
																	<a class="dropdown-item" href="#">Inventory</a>
																	<a class="dropdown-item" href="#">Human Resource</a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<span class="contact-star marked"><span class="feather-icon"><i data-feather="star"></i></span></span>
														</div>
													</td>
													<td>
														<div class="media align-items-center">
															<div class="media-head me-2">
																<div class="avatar avatar-xs avatar-primary avatar-rounded">
																	<span class="initial-wrap">H</span>
																</div>
															</div>
															<div class="media-body">
																<span class="d-block text-high-em">Hence Work</span> 
															</div>
														</div>
													</td>
													<td class="text-truncate">contact@hencework.com</td>
													<td>+145 52 5463</td>
													<td><span class="badge badge-soft-violet my-1  me-2">Promotion</span></td>
													<td>Design</td>
													<td>30 Mar, 2019</td>
													<td>
														<div class="d-flex align-items-center">
															<div class="d-flex">
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Archive" href="#"><span class="icon"><span class="feather-icon"><i data-feather="archive"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="edit-contact.html"><span class="icon"><span class="feather-icon"><i data-feather="edit"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
															</div>
															<div class="dropdown">
																<button class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" aria-expanded="false" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></button>
																<div class="dropdown-menu dropdown-menu-end">
																	<a class="dropdown-item" href="edit-contact.html"><span class="feather-icon dropdown-icon"><i data-feather="edit"></i></span><span>Edit Contact</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="trash-2"></i></span><span>Delete</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="copy"></i></span><span>Duplicate</span></a>
																	<div class="dropdown-divider"></div>
																	<h6 class="dropdown-header dropdown-header-bold">Change Labels</h6>
																	<a class="dropdown-item" href="#">Design</a>
																	<a class="dropdown-item" href="#">Developer</a>
																	<a class="dropdown-item" href="#">Inventory</a>
																	<a class="dropdown-item" href="#">Human Resource</a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<span class="contact-star marked"><span class="feather-icon"><i data-feather="star"></i></span></span>
														</div>
													</td>
													<td>
														<div class="media align-items-center">
															<div class="media-head me-2">
																<div class="avatar avatar-xs avatar-rounded">
																	<img src="/backend/dist/img/avatar13.jpg" alt="user" class="avatar-img">
																</div>
															</div>
															<div class="media-body">
																<span class="d-block text-high-em">Dean Shaw</span> 
															</div>
														</div>
													</td>
													<td class="text-truncate">dean-shaw@poww.me</td>
													<td>+234 48 2365</td>
													<td><span class="badge badge-soft-danger my-1  me-2">Collaborator</span><span class="badge badge-soft-success  my-1  me-2">Angular Developer</span></td>
													<td>Design</td>
													<td>21 Feb, 2019</td>
													<td>
														<div class="d-flex align-items-center">
															<div class="d-flex">
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Archive" href="#"><span class="icon"><span class="feather-icon"><i data-feather="archive"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="edit-contact.html"><span class="icon"><span class="feather-icon"><i data-feather="edit"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
															</div>
															<div class="dropdown">
																<button class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" aria-expanded="false" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></button>
																<div class="dropdown-menu dropdown-menu-end">
																	<a class="dropdown-item" href="edit-contact.html"><span class="feather-icon dropdown-icon"><i data-feather="edit"></i></span><span>Edit Contact</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="trash-2"></i></span><span>Delete</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="copy"></i></span><span>Duplicate</span></a>
																	<div class="dropdown-divider"></div>
																	<h6 class="dropdown-header dropdown-header-bold">Change Labels</h6>
																	<a class="dropdown-item" href="#">Design</a>
																	<a class="dropdown-item" href="#">Developer</a>
																	<a class="dropdown-item" href="#">Inventory</a>
																	<a class="dropdown-item" href="#">Human Resource</a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<span class="contact-star"><span class="feather-icon"><i data-feather="star"></i></span></span>
														</div>
													</td>
													<td>
														<div class="media align-items-center">
															<div class="media-head me-2">
																<div class="avatar avatar-xs avatar-soft-danger avatar-rounded">
																	<span class="initial-wrap">J</span>
																</div>
															</div>
															<div class="media-body">
																<span class="d-block text-high-em">John Brother</span> 
															</div>
														</div>
													</td>
													<td class="text-truncate">john@cryodrakon.info</td>
													<td>+456 52 4862</td>
													<td><span class="badge badge-soft-violet my-1  me-2">Promotion</span><span class="badge badge-soft-danger  my-1  me-2">Collaborator</span></td>
													<td>Human Resource</td>
													<td>14 Jan, 2019</td>
													<td>
														<div class="d-flex align-items-center">
															<div class="d-flex">
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Archive" href="#"><span class="icon"><span class="feather-icon"><i data-feather="archive"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="edit-contact.html"><span class="icon"><span class="feather-icon"><i data-feather="edit"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
															</div>
															<div class="dropdown">
																<button class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" aria-expanded="false" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></button>
																<div class="dropdown-menu dropdown-menu-end">
																	<a class="dropdown-item" href="edit-contact.html"><span class="feather-icon dropdown-icon"><i data-feather="edit"></i></span><span>Edit Contact</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="trash-2"></i></span><span>Delete</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="copy"></i></span><span>Duplicate</span></a>
																	<div class="dropdown-divider"></div>
																	<h6 class="dropdown-header dropdown-header-bold">Change Labels</h6>
																	<a class="dropdown-item" href="#">Design</a>
																	<a class="dropdown-item" href="#">Developer</a>
																	<a class="dropdown-item" href="#">Inventory</a>
																	<a class="dropdown-item" href="#">Human Resource</a>
																</div>
															</div>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- Edit Info -->
						<div id="add_new_contact" class="modal fade add-new-contact" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-body">
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<h5 class="mb-5">Create New Conatct</h5>
										<form>
											<div class="row gx-3">
												<div class="col-sm-2 form-group">
													<div class="dropify-square">
														<input type="file"  class="dropify-1"/>
													</div>
												</div>
												<div class="col-sm-10 form-group">
													<textarea class="form-control mnh-100p" rows="4" placeholder="Add Biography"></textarea>
												</div>
											</div>
											<div class="title title-xs title-wth-divider text-primary text-uppercase my-4"><span>Basic Info</span></div>
											<div class="row gx-3">
												<div class="col-sm-4">
													<div class="form-group">
														<label class="form-label">First Name</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label class="form-label">Middle Name</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label class="form-label">Last Name</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
											</div>
											<div class="row gx-3">
												<div class="col-sm-6">
													<div class="form-group">
														<label class="form-label">Email ID</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="form-label">Phone</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
											</div>
											<div class="row gx-3">
												<div class="col-sm-4">
													<div class="form-group">
														<label class="form-label">City</label>
														<select class="form-select">
															<option selected="">--</option>
															<option value="1">One</option>
															<option value="2">Two</option>
															<option value="3">Three</option>
														</select>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label class="form-label">State</label>
														<select class="form-select">
															<option selected="">--</option>
															<option value="1">One</option>
															<option value="2">Two</option>
															<option value="3">Three</option>
														</select>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label class="form-label">Country</label>
														<select class="form-select">
															<option selected="">--</option>
															<option value="1">One</option>
															<option value="2">Two</option>
															<option value="3">Three</option>
														</select>
													</div>
												</div>
											</div>
											<div class="title title-xs title-wth-divider text-primary text-uppercase my-4"><span>Company Info</span></div>
											<div class="row gx-3">
												<div class="col-sm-6">
													<div class="form-group">
														<label class="form-label">Company Name</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="form-label">Designation</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="form-label">Website</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="form-label">Work Phone</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
											</div>
											<div class="title title-xs title-wth-divider text-primary text-uppercase my-4"><span>Additional Info</span></div>
											<div class="row gx-3">
												<div class="col-sm-12">
													<div class="form-group">
														<label class="form-label">Tags</label>
														<select id="input_tags_2" class="form-control" multiple="multiple">
														</select>
														<small class="form-text text-muted">
														   You can add upto 4 tags per contact
														</small>
													</div>
												</div>
											</div>
											<div class="row gx-3">
												<div class="col-sm-6">
													<div class="form-group">
														<input class="form-control" type="text" placeholder="Facebook"/>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input class="form-control" type="text" placeholder="Twitter"/>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input class="form-control" type="text" placeholder="LinkedIn"/>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input class="form-control" type="text" placeholder="Gmail"/>
													</div>
												</div>
											</div>
										</form>
									</div>
									<div class="modal-footer align-items-center">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
										<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Create Contact</button>
									</div>
								</div>
							</div>
						</div>
						<!-- /Edit Info -->
						
						<!-- Add Label -->
						<div id="add_new_label" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
								<div class="modal-content">
									<div class="modal-body">
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<h6 class="text-uppercase fw-bold mb-3">Add Label</h6>
										<form>
											<div class="row gx-3">
												<div class="col-sm-12">
													<div class="form-group">
														<input class="form-control" type="text" placeholder="Label Name"/>
													</div>
												</div>
											</div>
											<button type="button" class="btn btn-primary float-end" data-bs-dismiss="modal">Add</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- Add Label -->
						
						<!-- Add Tag -->
						<div id="add_new_tag" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
								<div class="modal-content">
									<div class="modal-body">
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<h6 class="text-uppercase fw-bold mb-3">Add Tag</h6>
										<form>
											<div class="row gx-3">
												<div class="col-sm-12">
													<div class="form-group">
														<select id="input_tags_3" class="form-control" multiple="multiple">
															<option selected="selected">Collaborator</option>
															<option selected="selected">Designer</option>
															<option selected="selected">React Developer</option>
															<option selected="selected">Promotion</option>
															<option selected="selected">Advertisement</option>
														</select>
													</div>
												</div>
											</div>
											<button type="button" class="btn btn-primary float-end" data-bs-dismiss="modal">Add</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- Add Tag -->
					</div>
				</div>
			</div>
			<!-- /Page Body -->
		</div>
		<!-- /Main Content -->
	</div>
    <!-- /Wrapper -->

	<!-- jQuery -->
    <script src="/backend/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JS -->
   	<script src="/backend/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FeatherIcons JS -->
    <script src="/backend/dist/js/feather.min.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="/backend/dist/js/dropdown-bootstrap-extended.js"></script>

	<!-- Simplebar JS -->
	<script src="/backend/vendors/simplebar/dist/simplebar.min.js"></script>
	
	<!-- Data Table JS -->
    <script src="/backend/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/backend/vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
	<script src="/backend/vendors/datatables.net-select/js/dataTables.select.min.js"></script>
    
	<!-- Select2 JS -->
    <script src="/backend/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="/backend/dist/js/select2-data.js"></script>
	
	<!-- Dropify JS -->
	<script src="/backend/vendors/dropify/dist/js/dropify.min.js"></script>
	<script src="/backend/dist/js/dropify-data.js"></script>

	<!-- Init JS -->
	<script src="/backend/dist/js/init.js"></script>
	<script src="/backend/dist/js/contact-data.js"></script>
	<script src="/backend/dist/js/chips-init.js"></script>
</body>
</html>