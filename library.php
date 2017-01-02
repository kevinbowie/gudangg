<?php
class lib{
	private $db;
	function __construct($con){
		$this->db = $con;
	}

	public function newCust($id, $nama, $alamat, $handphone){
		try{
			$sql = $this->db->prepare("INSERT INTO mst_customers(id, nama, alamat, handphone) VALUES(:id, :nama, :alamat, :handphone)");
			$sql->bindparam(":id", $id);
			$sql->bindparam(":nama", $nama);
			$sql->bindparam(":alamat", $alamat);
			$sql->bindparam(":handphone", $handphone);
			$sql->execute();
			return true;
		}
		catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}
	
	public function newItems($id, $nama, $HPP, $HET){
		try{
			$sql = $this->db->prepare("SELECT * FROM barang WHERE idbarang = :idbarang");
			$sql->bindparam(':idbarang', $id);
			$sql->execute();
			$row = $sql->rowCount();
			if ($row == 1){
				return false;
			}
			else{
				$sql = $this->db->prepare("INSERT INTO barang(idbarang, namabarang, hpp, het) VALUES(:idbarang, :nama, :HPP, :HET)");
				$sql->bindparam(':idbarang', $id);
				$sql->bindparam(':nama', $nama);
				$sql->bindparam(':HPP', $HPP);
				$sql->bindparam(':HET', $HET);
				$sql->execute();
				return true;
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}

	public function login($user, $password){
		try{
			$sql = $this->db->prepare("SELECT * FROM operator WHERE user = :user AND password = :password");
			$sql->bindparam(':user', $user);
			$sql->bindparam(':password', $password);
			$sql->execute();
			$row = $sql->rowCount();
			if ($row == 1){
				$_SESSION['user'] = $user;
				return true;
			}
			else{
				return false;
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}

	public function cekId($id){
		try{
			$sql = $this->db->prepare("SELECT * FROM barang WHERE idbarang = :idbarang");
			$sql->bindparam(':idbarang', $id);
			$sql->execute();
			$row = $sql->rowCount();
			if ($row == 1){
				return true;
			}
			else{
				return false;
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}

	public function transaksi($idbarang, $nama, $qty){		
		// foreach ($idbarang as $nomor) {
		// 	if(cekId($nomor)){
		// 		return false;
		// 	}
		// }
		try{
			for ($i=0;$i<count($idbarang);$i++){
				$sql = $this->db->prepare("INSERT INTO pembelian (idbarang, namabarang, qty) VALUES (:idbarang, :nama, :qty)");
				$sql->bindparam(':idbarang', $idbarang[$i]);
				$sql->bindparam(':nama', $nama[$i]);
				$sql->bindparam(':qty', $qty[$i]);
				$sql->execute();
			}
			return true;
		}
		catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}
}
?>