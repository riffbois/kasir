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
                    <li class="nav-item"> <a class="nav-link" href="index.php?page=home"> <i class="bi bi-house"></i> Dashboard </a> </li>
                    <li class="nav-item"> <a class="nav-link" href="barang1.php"> <i class="bi bi-bookmarks"></i> Barang </a> </li>
                    <li class="nav-item"> <a class="nav-link" href="role1.php"> <i class="bi bi-bar-chart"></i> Role </a> </li>
					<li class="nav-item"> <a class="nav-link" href="index.php?page=user"> <i class="bi bi-people"></i> Users </a> </li>
                </ul> <!-- Divider -->
                <div class="mt-auto"></div> <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" href="#"> ©2022 - Marvelous Store </a> </li>
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
                            <h1 class="h2 mb-0 ls-tight">Marvelous Store</h1>
                        </div> <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1"> <a href="logout.php" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1"> <span class=" pe-2"> <i class="bi bi-box-arrow-left"></i> </span> <span> Log Out </span> </a> </div>
                        </div>
                    </div> <!-- Nav -->
                    <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    </ul>
                </div>
            </div>
        </header> <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <?php
				if(isset($_GET['page']) && $_GET['page'] != ''){
					include 'page/'.$_GET['page'].'.php';
				}else{
				include 'page/home.php';
				}
				?>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</body>
	</html>