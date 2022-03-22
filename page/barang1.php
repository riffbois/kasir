<?php
include 'config.php';
//session_start();
$view = $dbconnect->query("SELECT * FROM kasir");
?>
<!DOCTYPE html>
<html>
<head>
<title>Data Barang</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<div class="wrapper">
<div class="container">
<div class="container-fluid">
<div class="col-md-12">
	<h3>LIST STOK BARANG</h3>
	<a href="index.php?page=barang_add" class="btn btn-primary ">Tambah Data</a>
	 <?php if(isset($_SESSION['success']) && $_SESSION['success']!=''){?>
      <div class="alert alert-success col-md-6 mt-3" role="alert">
          <strong>berhasil</strong> <?=$_SESSION['success']?>
		</div>
	  <?php }
	$_SESSION['success']='';
	?>
	<table class="table table-bordered mt-3">
	<tr>
	<th width="10%">No. Urut</th>
	<th width="10%">Id Barang</th>
	<th width="30%">Nama</th>
	<th>Kode</th>
	<th>Harga</th>
	<th>Jumlah Stok</th>
	<th>Aksi</th>
	</tr>
	<?php
	$noUrut = 1;
	while ($row=$view->fetch_array()){?>
	<tr>
		<td><?= $noUrut++ ?></td>
		<td><?= $row['id_barang']?></td>
		<td><?= $row['nama']?></td>
		<td><?= $row['kode_barang']?></td>
		<td><?= $row['harga']?></td>
		<td><?= $row['jumlah']?></td>
		<td><a href="barang_edit.php?id=<?=$row['id_barang']?>">Edit</a> | <a href="barang_hapus.php?id=<?=$row['id_barang']?>" onclick="return confirm('Yakin Hapus?')">Hapus</a></td>		
	</tr>
	<?php } ?>
	</table>
</div>
</div>
</div>
</div>
</body>
</html>