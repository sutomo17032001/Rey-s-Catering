<?php
	require_once "assets/dbconnect.php";
	$id=$_GET["id"];
	$nama=mysqli_real_escape_string($dbconnect,$_POST["nama"]);
	$sql="UPDATE kategori SET nama='$nama' WHERE id='$id'";
	mysqli_query($dbconnect,$sql);
	header("location:kategori.php");
?>
