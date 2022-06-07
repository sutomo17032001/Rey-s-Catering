<?php
	require_once "assets/dbconnect.php";
	$sql="DELETE FROM barang WHERE id='". $_GET["id"] ."'";
	mysqli_query($dbconnect,$sql);
	header("location:item2.php");
?>
