<?php
include_once 'dbconfig.php';
global $param;
$msg = "";
$me = $_SERVER['PHP_SELF'];
if(isset($_POST['add'])){
	$msg = validateForm();
	if ($msg == ""){
		if($lib->transaksi($_POST['id'], $_POST['nama'], $_POST['qty'])){
			header("Location: transaksi.php?success");
		}
		else{
			header("Location: transaksi.php?failure");
		}
	}
	else{
		//changeAction();
		header("Location: transaksi.php?failure");
		//$param = "?failure";
	}
}
else{
	$msg = "";
}

function changeAction(){ ?>
	<script type="text/javascript">
		var x = document.getElementById("myForm").action = "hai";
		alert("hai");
	</script> <?php
}

function validateForm(){
	$message = "";
	for($i=0; $i<count($_POST['id']); $i++){
		if ($_POST['id'][$i] == ""){
			$message = "Kolom ID Barang kosong pada baris ke-" . ($i+1);
			break;
		}
		else if ($_POST['nama'][$i] == ""){
			$message = "Kolom Nama Barang kosong pada baris ke-" . ($i+1);
			break;
		}
		else if ($_POST['qty'][$i] == ""){
			$message = "Kolom Qty kosong pada baris ke-" . ($i+1);
			break;
		}
	}
	return $message;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>TRANSAKSI</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" > 
	<link href="bootstrap/css/main.css" rel="stylesheet" > 
	<link href="style.css" rel="stylesheet" > 
</head>
<body onload="reset()"> 
	<?php
	if(isset($_GET['success'])){
		?>
		<div class="container">
			<div class="alert alert-info">
				<strong>TRANSAKSI BERHASIL DITAMBAHKAN</strong>
			</div>
		</div>
		<?php
	}
	else if(isset($_GET['failure'])){
		?>
		<div class="container">
			<div class="alert alert-warning">
			<strong>ERROR! RECORD GAGAL DISIMPAN!</strong>
			<strong><?php echo $msg; ?></strong>
			</div>
		</div>
		<?php
	}
	?>
<h1>TRANSAKSI</h1>
<form id="myForm" name="myForm" method="post">
		<table class='table table-bordered' id = 'myTable'>
			<thead>
				<tr>	
					<th>Nomor</th>
					<th>ID Barang</th>
					<th>Nama Barang</th>
					<th>Qty</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1.</td>
					<td><input type="text" name="id[]" class="id"></td>
					<td><input type="text" name="nama[]" class="nama"></td>
					<td><input type="text" name="qty[]" class="qty" onkeydown="inputEnter(event)"></td>
				</tr>
			</tbody>
		</table>
		<script type="text/javascript">

			function reset(){
				var nama = document.getElementById('myForm').reset();
			}

			function inputEnter(e){
				if(e.which == 40){
					newRow();
				}
			}

			function newRow(){
				var table = document.getElementById('myTable'),
					tr_count = table.rows.length,
					x = document.getElementsByClassName('qty')[tr_count-2],
					y = document.getElementsByClassName('id')[tr_count-2],
					z = document.getElementsByClassName('nama')[tr_count-2];
				if (document.activeElement === x && x.value != "" && y.value != "" && z.value != ""){
					var row = table.insertRow(tr_count),
						nomor = row.insertCell(0),
						id = row.insertCell(1),
						nama = row.insertCell(2),
						qty = row.insertCell(3);
					nomor.innerHTML = tr_count + ".";
					id.innerHTML = "<td><input type='text' name='id[]' class='id'></td>";
					nama.innerHTML = "<td><input type='text' name='nama[]' class='nama'></td>";
					qty.innerHTML = "<td><input type='text' name='qty[]' class='qty' onkeydown='inputEnter(event)'></td>";
				}
			}

			// function addRow(){
			// 	var template = document.querySelector('#rowTemplate'),
			// 		tbl = document.querySelector('#myTable'),
			// 		tbody = document.querySelector('tbody'),
			// 	    td_slNo = template.content.querySelectorAll("td")[0],
			// 	    tr_count = tbl.rows.length;
			// 	td_slNo.textContent = tr_count + ".";
			// 	var clone = document.importNode(template.content, true);
			//   	tbody.appendChild(clone);
			// }
		</script>
		<!-- <template id="rowTemplate">
			<tr>
				<td></td>
				<td><input type="text" name="nama"></td>
				<td><input type="number" name="qty"></td>
			</tr>
		</template> -->
<button class="btn-primary btn" type="submit" name="add">ADD</button>
<button type="reset" name="reset" onclick="reset()" class="btn-primary btn">RESET</button>
<a id="back" href="menu.php">BACK</a>
</form>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>