<?php
	require_once "assets/dbconnect.php";
	
	$nama=mysqli_real_escape_string($dbconnect,$_POST["nama"]);
	$telephone=mysqli_real_escape_string($dbconnect,$_POST["telephone"]);
	$alamat=mysqli_real_escape_string($dbconnect,$_POST["alamat"]);
	$id=mysqli_real_escape_string($dbconnect,$_POST["id"]);
	

	$nambaru=rand(0,100).$_FILES["gambar"]["name"];
	move_uploaded_file($_FILES["gambar"]["tmp_name"],"assets/img/item/" . $nambaru);
	
	
	$sql="UPDATE belanja SET nama='$nama',telepon='$telephone',bukti='$nambaru',alamat='$alamat' WHERE id='$id'";
	mysqli_query($dbconnect,$sql);
	header("location:dashboard.php");
?>