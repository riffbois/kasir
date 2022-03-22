<?php
include 'config.php';
session_start();
$view = $dbconnect->query("SELECT * FROM role");
?>
<!DOCTYPE html>
<html>
<head>
<head>
<title>Role | MS</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<style>
@import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);
@import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

 * {
     margin: 0;
     padding: 0;
     box-sizing: border-box;
     font-family: 'Poppins', sans-serif;
	 font-color: #000;
 }

 body {
     background: #fff;
 }

 .wrapper {
	 height: 618px;
     padding: 30px 30px 30px 30px;
     background-color: #fff;
	 background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat.svg');

 }
</style>
<body>
<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler --> <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button> <!-- Brand --> <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#"> <img src="https://telegra.ph/file/e2ab0d0584ec01cb2bee9.jpg" alt="..."> </a> <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle --> <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child"> <img alt="Image Placeholder" src="http://trimelive.com/wp-content/uploads/2020/12/Gambar-wa-12.jpg" class="avatar avatar- rounded-circle"> <span class="avatar-child avatar-badge bg-success"></span> </div>
                    </a> <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar"> <a href="#" class="dropdown-item">Profile</a> <a href="#" class="dropdown-item">Settings</a> <a href="#" class="dropdown-item">Billing</a>
                        <hr class="dropdown-divider"> <a href="#" class="dropdown-item">Logout</a> </div>
                </div>
            </div> <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" href="index.php"> <i class="bi bi-house"></i> Dashboard </a> </li>
                    <li class="nav-item"> <a class="nav-link" href="barang.php"> <i class="bi bi-bookmarks"></i> Barang </a> </li>
                    <li class="nav-item"> <a class="nav-link" href="role.php"> <i class="bi bi-bar-chart"></i> Role </a> </li>
					<li class="nav-item"> <a class="nav-link" href="user.php"> <i class="bi bi-people"></i> Users </a> </li>
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
                            <h1 class="h2 mb-0 ls-tight">Admin Page</h1>
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
<div class="wrapper">
<div class="container">
<div class="container-fluid">
<div class="col-md-12">
	<h3 align="center">List Role</h3>
	<table class="table table-bordered mt-3">
	<tr style="background: white" align="center">
	<th width="5%">Role</th>
	<th width="5%">Nama</th>
	</tr>
	<?php
	while($row=$view->fetch_array()){?>
	<tr align="center">
	<td><?= $row['id_role']?></td>
	<td><?= $row['nama']?></td>
	</tr>
	<?php } ?>
	</table>
</div>
</div>
</div>
</div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</body>
	</html>