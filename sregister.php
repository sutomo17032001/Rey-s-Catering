<?php
	require_once "assets/dbconnect.php";
	$username=mysqli_real_escape_string($dbconnect,$_POST["username"]);
	$password=mysqli_real_escape_string($dbconnect,$_POST["password"]);
	$sql="INSERT INTO pengguna (username,password,tipe) VALUES ('$username','$password','user')";
	mysqli_query($dbconnect,$sql);
	
	header("location:login.php");
?>