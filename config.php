<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "db_kasir";
	$dbconnect = new mysqli("$host", "$user", "$pass", "$db");
	//$dbconnect = mysqli_connect('localhost', 'root', '', 'db_kasir');
	if($dbconnect->connect_error){
		echo "Koneksi Gagal ->".$dbconnect->connect_error;
	}
?>