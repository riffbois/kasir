<?php
include 'config.php';
session_start();
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$data = mysqli_query($dbconnect, "SELECT * FROM kasir where id_barang = '$id'");
	$data = mysqli_fetch_assoc($data);
}

if(isset($_POST['update'])){
	$id = $_GET['id'];
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$jumlah = $_POST['jumlah'];
	mysqli_query($dbconnect,"UPDATE kasir SET nama='$nama', harga='$harga', jumlah='$jumlah' where id_barang='$id'");
	
	$_SESSION['success'] = ' mengubah data';
	header("location:barang.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Ubah Barang</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="container-fluid">
<div class="col-md-6">
	<h1>Ubah Barang</h1>
	<form method="post">
		<div class="form-group">
		<label>Nama Barang</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama Barang" value="<?=$data['nama']?>">
		</div>
		<div class="form-group">
		<label>Harga</label>
		<input type="number" name="harga" class="form-control" placeholder="Harga" value="<?=$data['harga']?>">
		</div>
		<div class="form-group">
		<label>Jumlah Stok</label>
		<input type="number" name="jumlah" class="form-control" placeholder="Jumlah Stok" value="<?=$data['jumlah']?>">
		</div><br>
		
		<input type="submit" name="update" value="Update" class="btn btn-primary">
		<a href="barang.php" class="btn btn-warning">Kembali</a>
		</form>
</div>
</div>
</div>
</body>
</html>