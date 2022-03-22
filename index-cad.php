<?php
session_start();
if(isset($_SESSION['userid'])){
	if($_SESSION['role_id']==2){
		header("Location:kasir.php");
	}
}else{
	$_SESSION['error'] = 'Anda Harus Login';
	header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Index kasir</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
@import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);
@import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");
</style>
<body>
<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler --> <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button> <!-- Brand --> <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#"> <img src="https://preview.webpixels.io/web/img/logos/clever-primary.svg" alt="..."> </a> <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle --> <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child"> <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle"> <span class="avatar-child avatar-badge bg-success"></span> </div>
                    </a> <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar"> <a href="#" class="dropdown-item">Profile</a> <a href="#" class="dropdown-item">Settings</a> <a href="#" class="dropdown-item">Billing</a>
                        <hr class="dropdown-divider"> <a href="#" class="dropdown-item">Logout</a> </div>
                </div>
            </div> <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" href="#"> <i class="bi bi-house"></i> Dashboard </a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#"> <i class="bi bi-bar-chart"></i> Role </a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#"> <i class="bi bi-chat"></i> Users <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto">6</span> </a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#"> <i class="bi bi-bookmarks"></i> Collections </a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#"> <i class="bi bi-people"></i> Users </a> </li>
                </ul> <!-- Divider -->
                <div class="mt-auto"></div> <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" href="#"> <i class="bi bi-person-square"></i> Account </a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#"> <i class="bi bi-box-arrow-left"></i> Logout </a> </li>
                </ul>
            </div>
        </div>
    </nav> <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">Application</h1>
                        </div> <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1"> <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1"> <span class=" pe-2"> <i class="bi bi-pencil"></i> </span> <span>Edit</span> </a> <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1"> <span class=" pe-2"> <i class="bi bi-plus"></i> </span> <span>Create</span> </a> </div>
                        </div>
                    </div> <!-- Nav -->
                    <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    </ul>
                </div>
            </div>
        </header> <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="row g-6 mb-6">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col"> <span class="h6 font-semibold text-muted text-sm d-block mb-2">Budget</span> <span class="h3 font-bold mb-0">$750.90</span> </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle"> <i class="bi bi-credit-card"></i> </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm"> <span class="badge badge-pill bg-soft-success text-success me-2"> <i class="bi bi-arrow-up me-1"></i>13% </span> <span class="text-nowrap text-xs text-muted">Since last month</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col"> <span class="h6 font-semibold text-muted text-sm d-block mb-2">New projects</span> <span class="h3 font-bold mb-0">215</span> </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white text-lg rounded-circle"> <i class="bi bi-people"></i> </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm"> <span class="badge badge-pill bg-soft-success text-success me-2"> <i class="bi bi-arrow-up me-1"></i>30% </span> <span class="text-nowrap text-xs text-muted">Since last month</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col"> <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total hours</span> <span class="h3 font-bold mb-0">1.400</span> </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white text-lg rounded-circle"> <i class="bi bi-clock-history"></i> </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm"> <span class="badge badge-pill bg-soft-danger text-danger me-2"> <i class="bi bi-arrow-down me-1"></i>-5% </span> <span class="text-nowrap text-xs text-muted">Since last month</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col"> <span class="h6 font-semibold text-muted text-sm d-block mb-2">Work load</span> <span class="h3 font-bold mb-0">95%</span> </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white text-lg rounded-circle"> <i class="bi bi-minecart-loaded"></i> </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm"> <span class="badge badge-pill bg-soft-success text-success me-2"> <i class="bi bi-arrow-up me-1"></i>10% </span> <span class="text-nowrap text-xs text-muted">Since last month</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Applications</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Offer</th>
                                    <th scope="col">Meeting</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5"> <span class="text-muted text-sm">Showing 10 items out of 250 results found</span> </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</body>
	</html>