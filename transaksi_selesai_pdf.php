<?php
include 'config.php';
//session_start();
include "authcheckkasir.php";

$id_trx = $_GET['idtrx'];
$data = mysqli_query($dbconnect, "SELECT * FROM transaksi WHERE id_transaksi='$id_trx'");
$trx = mysqli_fetch_assoc($data);
$detail = mysqli_query($dbconnect, "SELECT transaksi_detail.*, kasir.nama FROM `transaksi_detail` INNER JOIN kasir ON transaksi_detail.id_barang=kasir.id_barang WHERE transaksi_detail.id_transaksi='$id_trx'");?>

<!DOCTYPE html>
<html>
<head>
<title>Kasir Selesai</title>
	<style type="text/css">
		body{color: #a7a7a7; }
	</style>
	</head>
	<body>
	<div align="center">
		<table width="500" border="0" cellpadding=1" cellspacing="0">
			<tr>
			<th colspan="2"><font style="font-size:3vw">Marvelous Komputer</font><BR> Jl. Babakan Sari 3 No.11 <br> 
			Kiaracondong Bandung</th>
			</tr>
			<tr align="center"><td colspan="2"<hr></td></td>
			<tr><td>#<?=$trx['nomor']?> | <?=date('Y-m-d H:i:s', strtotime($trx['tanggal_waktu']))?></td><td align="right">Kasir: <?=$trx['nama']?></td></tr>
			<tr><td colspan="2"><hr></td></tr>
		</table>
		<table width="500" border="0" cellpadding="3" cellspacing="0">
			<tr><th align="left">No</th>
				<th align="left">Nama Barang</th><th align="right">Qty</th><th align="right">Harga</th><th align="right">Total</th>
			</tr>
			<tr><td colspan="5"><hr></td></tr>
			<?php $noUrut = 1; ?>
			<?php while ($row = mysqli_fetch_array($detail)) { ?>
			<tr><td><?=$noUrut++ ?></td>
				<td valign="top"><?=$row['nama']?>
				<?php if ($row['diskon'] > 0): ?>
						<br>
						<small><i>Diskon</i></small>
						<?php endif; ?>
				</td>
				<td valign="top" align="right"><?=$row['qty']?></td>
				<td valign="top" align="right"><?=number_format($row['harga'])?></td>
				<td valign="top" align="right"><?=number_format($row['total'])?>
				<?php if ($row['diskon'] > 0): ?>
						<br>
						<small>-<?=number_format($row['total'])?>
						<?php endif; ?>
				</td>
			</tr>
			<?php } ?>
			<tr><td colspan="5"><hr></td></td>
			<tr>
				<td align="right" colspan="4">Total</td>
				<td align="right"><?=number_format($trx['total'])?></td>
			</tr>
			<tr>
				<td align="right" colspan="4">Bayar</td>
				<td align="right"><?=number_format($trx['bayar'])?></td>
			</tr>
			<tr>
				<td align="right" colspan="4">Kembali</td>
				<td align="right"><?=number_format($trx['kembali'])?></td>
			</tr>
		</table>
		<table width="500" border="0" cellpadding="1" cellspacing="0">
		<tr><td><hr></td></tr>
			<tr>
				<th>Terima Kasih, Anda puas kami senang</th>
			</tr>
			<tr>
				<th>====== Layanan Konsumen ======</th>
			</tr>
			<tr>
				<th>SMS/Call/WA 085878200797</th>
			</tr>
		<table>
	</div>
	</body>
	</html>