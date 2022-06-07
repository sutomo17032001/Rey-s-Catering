<?php
	include "dbconnect.php";
	$username=mysqli_real_escape_string($dbconnect,$_GET["username"]);
	$password=mysqli_real_escape_string($dbconnect,$_GET["password"]);
	
	$sql="SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
	$result=mysqli_query($dbconnect,$sql);
	$hsl=mysqli_fetch_array($result);
	if ($hsl!=null)
	{
		$_SESSION["id"]=$hsl["id"];
		$_SESSION["tipe"]=$hsl["tipe"];
	}
	echo json_encode($hsl);
?>