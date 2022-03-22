<?php
include 'config.php';
//session_start();
//$view = $dbconnect->query("SELECT * FROM kasir");
?>

<?php
	$batas = 4;
	$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1 ;
	$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

	$previous = $halaman - 1;
	$next = $halaman + 1;

	$data = mysqli_query($dbconnect,"select * from kasir");
	$jumlah_data = mysqli_num_rows($data);
	$total_halaman = ceil($jumlah_data / $batas);
	
	//$view = mysqli_query($dbconnect,"select * from kasir limit $halaman_awal, $batas");
	//$nomor = $halaman_awal+1;
?>
<?php

	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$view = mysqli_query($dbconnect,"select * from kasir where nama like '%".$cari."%' limit $halaman_awal, $batas");
	}else{
		$view = mysqli_query($dbconnect,"select * from kasir limit $halaman_awal, $batas");
		$nomor = $halaman_awal+1;
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Data Barang</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="container-fluid">
<div class="col-md-12">
	<h1>List Barang</h1>
	<a href="barang_add.php" class="btn btn-primary ">Tambah Data</a>
	 <?php if(isset($_SESSION['success']) && $_SESSION['success']!=''){?>
      <div class="alert alert-success col-md-6 mt-3" role="alert">
          <strong>berhasil</strong> <?=$_SESSION['success']?>
		</div>
	  <?php }
	$_SESSION['success']='';
	?>
	
	<form action="" method="get" class="mt-3">
	<label>Cari: </label>
	<input type="text" name="cari">
	<input type="submit" value="Cari" class="btn btn-primary ">
	</form>
	<?php
	if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil Pencarian: ".$cari."</b>";
	}
	?>
	
	<table class="table table-bordered mt-3">
	<tr>
	<th width="10%">No. Urut</th>
	<th width="10%">Id Barang</th>
	<th width="30%">Nama</th>
	<th>Kode</th>
	<th>Harga</th>
	<th>Jumlah Stok</th>
	<th width="10%">Aksi</th>
	</tr>
	<?php
	$noUrut = $halaman_awal+1;
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
	
	<nav>
	<ul class="pagination justify-content-center">
		<li class="page-item">
		<a class="page-link" <?php error_reporting(0); if($halaman > 1) {echo "href='?halaman=$previous'"; } ?>>Previous</a>
		</li>
		<?php
			for($x=1;$x<=$total_halaman;$x++) {
			if ($x != $halaman) {
		?>
		<li class="page-item "><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
		
		<?php
		}else{
		?>
		
		<li class="page-item active"><a class="page-link" href="#"><?php echo $x; ?></a></li>
		
		<?php
		}}
		?>
		
		<li class="page-item">
		<a class="page-link" <?php if($halaman < $total_halaman) {echo "href='?halaman=$next'"; } ?>>Next</a>
		</li>
		</ul>
	</nav>
</div></div></div>
<script src="js/bootstrap.bundle.min.js" "></script>
</body></html>