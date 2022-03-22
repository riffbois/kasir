<?php
include 'config.php';
session_start();
if(isset($_POST['simpan'])){
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role_id = $_POST['role_id'];
	mysqli_query($dbconnect,"INSERT INTO user VALUES (NULL, '$nama', '$username', '$password', '$role_id')");
	$_SESSION['success'] = ' menambahkan data';
	header("location:user.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Tambah User Pegawai</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

 * {
     margin: 0;
     padding: 0;
     box-sizing: border-box;
     font-family: 'Poppins', sans-serif
 }

 body {
     background: #ecf0f3
 }

 .wrapper {
     max-width: 1200px;
     min-height: 500px;
     margin: 80px auto;
     padding: 60px 30px 30px 30px;
     background-color: #ecf0f3;
     border-radius: 15px;
     box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff
 }

 </style>
<body>
<div class="wrapper">
<div class="container">
<div class="container-fluid">
<div class="col-md-6">
	<h1>Tambah User Pegawai</h1>
	<form method="post">
		<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama Pegawai">
		</div>
		<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username">
		</div>
		<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password">
		</div>
		<div class="form-group">
		<label>Role (1 = Admin, 2 = Kasir)</label>
		<select name="role_id" class="form-control" placeholder="(1 = Admin, 2 = Kasir)">
		<option value="1">1</option>
        <option value="2">2</option>
            </select>
		</div>
		<br>
		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
		<a href="user.php" class="btn btn-warning">Kembali</a>
		</form>
</div>
</div>
</div>
</div>
</body>
</html>