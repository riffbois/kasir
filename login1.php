<?php
include 'config.php';
session_start();
if(isset($_POST['masuk'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = mysqli_query($dbconnect, "SELECT * FROM user WHERE username='$username'and password='$password'");
	$data = mysqli_fetch_assoc($query);
	
	$check = mysqli_num_rows ($query);
	
	if(!$check) {
		$_SESSION['error']='username & password salah';
	}else{
	$_SESSION['userid'] = $data['id_user'];
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['role_id'] = $data['role_id'];
	header("location:index.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Form Login</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="container-fluid">
<div class="col-md-6">
	<?php if(isset($_SESSION['error'])&& $_SESSION['error']!=''){?>
	<div class="alert alert-danger" role="alert">
	<?=$_SESSION['error']?>
	</div>
	<?php }
	$_SESSION['error']='';
	?>
	<h1>Login</h1>
	<form method="post">
		<div class="form-group">
			<label for="exampleInputEmail">Username</label>
			<input type="text" name="username" class="form-control" placholder="Username">
			</div>
		<div class="form-group">
			<label for="exampleInputEmail">Password</label>
			<input type="password" name="password" class="form-control" placholder="Password">
			</div>
			<input type="submit" name="masuk" value="masuk" class="btn btn-primary mt-3">
	</form>
	</div>
	</div>
</div>
</body>
</html>