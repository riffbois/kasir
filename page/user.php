<?php
include 'config.php';
//session_start();
$view = $dbconnect->query("SELECT * FROM user");
?>
<!DOCTYPE html>
<html>
<head>
<title>Data User Pegawai</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<div class="container">
<div class="container-fluid">
<div class="col-md-12">
	<h3>Data Akun Pegawai</h3>
	<a href="user_add.php" class="btn btn-primary ">Tambah Data</a>
<div class="tengah">
	 <?php if(isset($_SESSION['success']) && $_SESSION['success']!=''){?>
      <div class="alert alert-success col-md-6 mt-3" role="alert">
          <strong>berhasil</strong> <?=$_SESSION['success']?>
		</div>
	  <?php }
	$_SESSION['success']='';
	?>
	<table class="table table-bordered mt-3">
	<tr>
	<th width="10%">Id User</th>
	<th>Nama</th>
	<th>Username</th>
	<th>Password</th>
	<th>Role</th>
	<th width="20%">Aksi</th>
	</tr>
	<?php
	$noUrut = 1;
	while ($row=$view->fetch_array()){?>
	<tr>
		<td><?= $row['id_user']?></td>
		<td><?= $row['nama']?></td>
		<td><?= $row['username']?></td>
		<td><?= $row['password']?></td>
		<td><?= $row['role_id']?></td>
		<td><a href="user_edit.php?id=<?=$row['id_user']?>">Edit</a> | <a href="user_hapus.php?id=<?=$row['id_user']?>" onclick="return confirm('Yakin Hapus?')">Hapus</a></td>	
	</tr>
	<?php } ?>
	</table>
</div>
</div>
</div>
</body>
</html>