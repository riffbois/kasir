<?php 
include 'config.php';
session_start();
include 'authcheckkasir.php';

if(isset($_POST['id_barang'])){
	$id_barang = $_POST['id_barang'];
	$qty = $_POST['qty'];
	$data = mysqli_query($dbconnect, "SELECT * FROM kasir WHERE id_barang='$id_barang'");
	$b = mysqli_fetch_assoc($data);
	$disbarang = mysqli_query($dbconnect, "SELECT * FROM disbarang WHERE barang_id='$b[id_barang]'");
    $disb = mysqli_fetch_assoc($disbarang);
    $key = array_search($b['id_barang'], array_column($_SESSION['cart'], 'id'));

    if ($key !== false) {
        $c_qty = $_SESSION['cart'][$key]['qty'];
        $_SESSION['cart'][$key]['qty'] = $c_qty + 1;

        if ($disb['qty'] && $_SESSION['cart'][$key]['qty'] >= $disb['qty']) {
            $mod = $_SESSION['cart'][$key]['qty'] % $disb['qty'];
            if ($mod == 0) {
                $d = $_SESSION['cart'][$key]['qty'] / $disb['qty'];
            } else {
                $d = ($_SESSION['cart'][$key]['qty'] - $mod) / $disb['qty'];
            }
            $_SESSION['cart'][$key]['diskon'] = $d * $disb['potongan'];
        }
    } else {
          $barang = [
            'id' => $b['id_barang'],
            'nama' => $b['nama'],
            'harga' => $b['harga'],
            'qty' => $qty,
            'diskon' => 0,
        ];
        $_SESSION['cart'][] = $barang;
    }
    header('location:kasir.php');
}
?>
