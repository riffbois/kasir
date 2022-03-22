<?php
include 'config.php';
//session_start();
$view = $dbconnect->query("SELECT * FROM role");
?>
<!DOCTYPE html>
<html>
<head>
<title>DATA USER</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="style_.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="container-fluid">
<div class="col-md-12">
	<h1><font style="font-size:3vw">List Role</font></h1>
	<?php if(isset($_SESSION['success'])&& $_SESSION['success']!=''){?>
	<div class="alert alert-success col -md-6 mt-3" role="alert">
		<strong>Berhasil</strong> <?=$_SESSION['success']?>
		</div>
		<?php }
		$_SESSION['success']='';
		?>
	<table class="table table-bordered mt-3">
	<tr style="background: aqua;" align="center">
	<th width="5%">id_Role</th>
	<th width="5%">Nama</th>
	</tr>
	<?php
	while($row=$view->fetch_array()){?>
	<tr style="background: white;" align="center">
	<td><?= $row['id_role']?></td>
	<td><?= $row['nama']?></td>
	</tr>
	<?php } ?>
	</table>
</div>
</div>
</div>
</body>
</html>