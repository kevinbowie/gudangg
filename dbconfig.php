<?php
session_start();

try{
	$con = new PDO('mysql:host=localhost;dbname=gudang', 'root', '', array(PDO::ATTR_PERSISTENT => true));
}

catch(PDOException $e){
	echo $e -> getMessage();
}

include_once 'library.php';
$lib = new lib($con);
?>

