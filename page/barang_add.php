<?php
include 'config.php';
//session_start();
if(isset($_POST['simpan'])){
	$nama = $_POST['nama'];
	$kode_barang = $_POST['kode_barang'];
	$harga = $_POST['harga'];
	$jumlah = $_POST['jumlah'];
	mysqli_query($dbconnect,"INSERT INTO kasir VALUES (NULL, '$nama', '$harga', '$jumlah', '$kode_barang')");
	$_SESSION['success'] = ' menambahkan data';
	header("location:barang1.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Tambah Barang</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="container-fluid">
<div class="col-md-6">
	<h1>Tambah Barang</h1>
	<form method="post">
		<div class="form-group">
		<label>Nama Barang</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama Barang">
		</div>
		<div class="form-group">
		<label>Kode Barang</label>
		<input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang">
		</div>
		<div class="form-group">
		<label>Harga</label>
		<input type="number" name="harga" class="form-control" placeholder="Harga">
		</div>
		<div class="form-group">
		<label>Jumlah Stok</label>
		<input type="number" name="jumlah" class="form-control" placeholder="Jumlah Stok">
		</div>
		<br>
		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
		<a href="index.php?page=barang" class="btn btn-warning">Kembali</a>
		</form>
</div>
</div>
</div>
</body>
</html>