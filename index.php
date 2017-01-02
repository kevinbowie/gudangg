<?php
include_once 'dbconfig.php';
if(!isset($_SESSION['user']) == 0){
	header('Location: menu.php');
}
if(isset($_POST['login'])){
	$user = $_POST['username'];
	$password = $_POST['password'];
	if($lib->login($user, $password)){
		header("location: menu.php");
	}
	else{
		$msg = "<div class='alert alert-danger'>
					<strong>USERNAME DAN PASSWORD TIDAK TEPAT</strong>
				</div>";
	}
}
else{
	$msg = '';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>GUDANG</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" > 
	<link href="bootstrap/css/main.css" rel="stylesheet" > 
	<link href="style.css" rel="stylesheet" > 

</head>
<body>
	<?php echo $msg; ?>
	<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">WELCOME</div>
				<span>Please Login</span>
			</div>
			<div class="panel-body">
				<div id="login-alert" class="alert alert-danger col-sm-12"></div>
				<form id="loginform" class="form-horizontal" role="form" method="post">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-user"></i>
						</span>
						<input id="login-username" class="form-control" name="username" value="" placeholder="username" type="text" required="true"></input>
					</div>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-lock"></i>
						</span>
						<input id="login-password" class="form-control" name="password" value="" placeholder="password" type="password" required="true"></input>
					</div>
					<div class="form-group">
						<div class="controls col-sm-12">
							<input type="submit" name="login" value="login" id="btn-login" class="btn btn-success">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>