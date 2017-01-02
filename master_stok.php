<?php
include_once 'dbconfig.php';
$me = $_SERVER['PHP_SELF'];
if(isset($_POST['btn-save'])){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$HPP = $_POST['HPP'];
	$HET = $_POST['HET'];

	if($lib->newItems($id, $nama, $HPP, $HET)){
		header("Location: master_stok.php?success");
	}
	else{
		header("Location: master_stok.php?failure");
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>JENIS BARANG</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" > 
	<link href="bootstrap/css/main.css" rel="stylesheet" > 
	<link href="style.css" rel="stylesheet" > 
</head>
<body>
	<?php
	if(isset($_GET['success'])){
		?>
		<div class="container">
			<div class="alert alert-info">
				<strong>RECORD BARU BERHASIL DITAMBAHKAN</strong>
			</div>
		</div>
		<?php
	}
	else if(isset($_GET['failure'])){
		?>
		<div class="container">
			<div class="alert alert-warning">
			<strong>ERROR! RECORD GAGAL DISIMPAN! ID BARANG SUDAH PERNAH DIPAKAI!</strong>
			</div>
		</div>
		<?php
	}
	?>
	<div class="clearfix"></div><br>
	<h1>JENIS BARANG</h1>
	<form method="post">
		<table class='table table-bordered'>
			<tr>
				<td>ID</td>
				<td><input type="text" name="id" class='form-control' required></td>
			</tr>
			<tr>
				<td>NAMA BARANG</td>
				<td><input type="text" name="nama" class="form-control" required="true"></td>
			</tr>
			<tr>
				<td>HPP</td>
				<td><input type="number" name="HPP" class="form-control" required="true"></td>
			</tr>
			<tr>
				<td>HET</td>
				<td><input type="number" name="HET" class="form-control" required="true"></td>
			</tr>
		</table>
		<button class="btn-primary btn" type="submit" name="btn-save">ADD</button>
		<a id="back" href="menu.php">BACK</a>
	</form>
</body>
</html>
