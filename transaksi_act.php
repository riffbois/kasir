<?php
include 'config.php';
//session_start();
include 'authcheckkasir.php';


$bayar = preg_replace('/\D/', '', $_POST['bayar']);

$tanggal_waktu = date('Y-m-d H:i:s');
$nomor = rand(111111,999999);
$total = $_POST['total'];
$nama = $_SESSION['nama'];
$kembali = $bayar - $total;


mysqli_query($dbconnect, "INSERT INTO transaksi (id_transaksi,tanggal_waktu,nomor,total,nama,bayar,kembali) VALUES (NULL, '$tanggal_waktu', '$nomor', '$total', '$nama', '$bayar', '$kembali')");


$id_transaksi = mysqli_insert_id($dbconnect);


foreach ($_SESSION['cart'] as $key => $value) {

		$id_barang = $value['id'];
		$harga = $value['harga'];
		$qty = $value['qty'];
		$tot = $harga*$qty;
		$disk = $value['diskon'];
		
mysqli_query($dbconnect,"INSERT INTO transaksi_detail (id_transaksi_detail,id_transaksi,id_barang,harga,qty,total,diskon) VALUES (NULL, '$id_transaksi', '$id_barang', '$harga', '$qty', '$tot', '$disk')");
}
$_SESSION['cart'] = [];


header("Location:transaksi_selesai.php?idtrx=".$id_transaksi);
?>