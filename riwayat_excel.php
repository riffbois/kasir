<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Riwayat_transaksi.xls");
?>
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
	<table class="table table-bordered">
		<tr><th>No.</th>
			<th>#Nomor</th>
			<th>Tanggal</th>
			<th>Total</th>
			<th>Kasir</th>
		</tr>
			<?php $noUrut = 1; ?>
			<?php error_reporting(0);?>
			<?php while ($row = $view->fetch_array()) { ?>
		<tr><td><?=$noUrut++ ?></td>
			<td><?= $row['nomor'] ?></td>
			<td><?= $row['tanggal_waktu'] ?></td>
			<td><?= $row['total'] ?></td>
			<td><?= $row['nama'] ?></td>
		</tr>
		<?php } ?>
	</table>
</div>
<script>
	window.print();
</script>
</body>
</html>