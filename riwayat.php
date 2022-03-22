<?php
include 'config.php';
//session_start();
include 'authcheckkasir.php';
$view = $dbconnect->query("SELECT * FROM transaksi");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Riwayat Transaksi</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<?php if (isset($_SESSION['success']) && $_SESSION['success'] != '') {?>
		<div class="alert alert-success" role="alert">
		<?=$_SESSION['success']?>
		</div>
	<?php
		}
		$_SESSION['sucsess'] = '';	
	?>
	<h1>Riwayat Transaksi</h1>
	<a href="kasir.php">Kembali</a>
	<a href="riwayat_excel.php" target="_blank">EXPORT KE EXCEL</a><BR>
	<table class="table table-bordered">
		<tr><th>No.</th>
			<th>#Nomor</th>
			<th>Tanggal</th>
			<th>Total</th>
			<th>Kasir</th>
			<th>Aksi</th>
		</tr>
			<?php $noUrut = 1; ?>
			<?php error_reporting(0);?>
			<?php while ($row = $view->fetch_array()) { ?>
		<tr><td><?=$noUrut++ ?></td>
			<td><?= $row['nomor'] ?></td>
			<td><?= $row['tanggal_waktu'] ?></td>
			<td><?= $row['total'] ?></td>
			<td><?= $row['nama'] ?></td>
			<td><a href="view_struk.php?idtrx=<?=$row['id_transaksi']?>" class="btn btn-primary">View</a>
			</td>
		</tr>
		<?php } ?>
	</table>
</div>
</body>
</html>