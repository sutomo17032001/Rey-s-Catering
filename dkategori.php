<?php
	require_once "assets/dbconnect.php";
	$sql="DELETE FROM kategori WHERE id='".$_GET["id"]."'";
	mysqli_query($dbconnect,$sql);
	header("location:kategori.php");
?>
