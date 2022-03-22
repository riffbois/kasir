<?php
include 'config.php';
include 'authcheckkasir.php';
$barang = mysqli_query($dbconnect, "SELECT * FROM kasir");
$sum = 0;
if(isset($_SESSION['cart'])){
	foreach($_SESSION['cart'] as $key =>$value){
		$sum +=$value['harga']*$value['qty']- $value['diskon'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Kasir</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
<div class="container">
<div class="container-fluid">
<div class="row">
		<h1>Selamat Datang</h1>
		<h3>Hai <?=$_SESSION['nama']?>, Anda sebagai kasir</h3>
		<p><a href="logout.php">Logout</a> | <a href="keranjang_reset.php">Reset Keranjang</a> | <a href="riwayat.php">Riwayat Transaksi</a></p>
</div>
<hr>
<div class="row">
	<div class="col-md-8">
		<form method="post" action="keranjang_act.php" class="form-inline">
		<div class="input-group">
			<select class="form-control" name="id_barang">
				<option value="">Pilih Barang</option>
				<?php while($row = mysqli_fetch_array($barang)){?>
				<option value="<?=$row['id_barang']?>"><?=$row['nama']
				?></option>
				<?php }?>
				</select>
				<input type"number" name="qty" class="form-control" placeholder="jumlah">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit">Tambah</button>
				</span>
</div>
</div>
</form>
</div>
		<div class="col-md-8">
			<form method="post" action="keranjang_update.php">
			<table class="table table-bordered mt-3">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Harga</th>
				<th>Qty</th>
				<th>Sub Total</th>
				<th></th>
			</tr>
			<?php $noUrut = 1; ?>
			<?php error_reporting(0);?>
			<?php foreach($_SESSION['cart'] as $key=>$value) { ?>
			<tr>
				<td><?=$noUrut++ ?></td>
				<td><?=$value['nama']?>
					<?php if ($value['diskon'] > 0): ?>
					<br><small class="label label-danger"><i>Diskon <?=number_format($value['diskon'])?></i></small>
					<?php endif;?>
				</td>
				<td align="right"><?=number_format($value['harga'])?></td>
				<td class="col-md-2"><input type="number" name="qty[]" value="<?=$value['qty']?>" class="form-control"></td>
				<td align="right"><?=number_format(($value['qty'] * $value['harga'])-$value['diskon'])?></td>
				<td><a href="keranjang_hapus.php?id=<?=$value['id']?>" class=""><i class='fas fa-window-close' style='font-size:24px;color:red'></i></a></td>  
			</tr>	
			<?php }?>
			</table>
					<button type="submit" class="btn btn-success">Ubah</button>
					</form>
				</div>
				<div class="col-md-4 mt-3">
					<h3>Total Rp. <?=number_format($sum)?></h3>
					<form action="transaksi_act.php" method="post">
					<input type="hidden" name="total" value="<?=$sum?>">
					<div class="form-group">
						<label>Bayar</label>
						<input type="text" id="rupiah" name="bayar" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary mt-1">Selesai</button>
					</form>
				</div>
			</div>
			</div>
		</div>
		<script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
</script>
</body>
</html>
