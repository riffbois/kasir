<?php
include 'config.php';
session_start();
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$data = mysqli_query($dbconnect, "SELECT * FROM user where id_user = '$id'");
	$data = mysqli_fetch_assoc($data);
}

if(isset($_POST['update'])){
	$id = $_GET['id'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role_id = $_POST['role_id'];
	mysqli_query($dbconnect,"UPDATE user SET nama='$nama', username='$username', password='$password', role_id='$role_id' where id_user='$id'");
	
	$_SESSION['success'] = ' mengubah data';
	header("location:user.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Ubah Barang</title>
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
	<h1>Ubah User Pegawai</h1>
	<form method="post">
		<div class="form-group">
		<label>Nama Pegawai</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?=$data['nama']?>">
		</div>
		<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?=$data['username']?>">
		</div>
		<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password" value="<?=$data['password']?>">
		</div>
		<div class="form-group">
		<label>Role (1 = Admin, 2 = Kasir)</label>
            <select name="role_id" class="form-control" placeholder="(1 = Admin, 2 = Kasir)" value="<?=$data['role_id']?>">
				<option value="1">1</option>
                <option value="2">2</option>
            </select>
		</div><br>
		
		<input type="submit" name="update" value="Update" class="btn btn-primary">
		<a href="user.php" class="btn btn-warning">Kembali</a>
		</form>
</div>
</div>
</div>
</div>
</body>
</html>