<?php
session_start();
if(isset($_SESSION['userid'])){
	if($_SESSION['role_id']==1) {
		header("Location:login.php");
	}
}else{
	$_SESSION['error'] = 'Anda harus login dahulu';
	header("Location:login.php");
}
?>