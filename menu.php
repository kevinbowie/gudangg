<!DOCTYPE html>
<html>
<head>
	<title>MENU GUDANG</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" > 
	<link href="bootstrap/css/main.css" rel="stylesheet" > 
	<link href="style.css" rel="stylesheet" > 
</head>
<body>
	<div class="container">
		<div class="row">
			<br>
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<div id="navbar-admin" class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li>
								<a href="master_stok.php">
									<span class="glyphicon glyphicon-user"> TAMBAH JENIS BARANG |</span>
								</a>
							</li>
							<li>
								<a href="transaksi.php">
									<span class="glyphicon glyphicon-stats"> TRANSAKSI BARU |</span>
								</a>
							</li>
							<li>
								<a href="laporan_stok.php">
									<span class="glyphicon glyphicon-dashboard"> LAPORAN STOCK |</span>
								</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="hidden-sm hidden-xs">
								<a id="logout" href="logout.php">
									<span class="glyphicon glyphicon-lock"></span>
									LOGOUT
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>