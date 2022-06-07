<?php
	require_once "assets/dbconnect.php";
	$nama=mysqli_real_escape_string($dbconnect,$_POST["nama"]);
	$sql="INSERT INTO kategori (nama) VALUES ('$nama')";
	mysqli_query($dbconnect,$sql);
	header("location:kategori.php");
?>
