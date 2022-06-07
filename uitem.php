<?php
	require_once "assets/dbconnect.php";
	$nama=mysqli_real_escape_string($dbconnect,$_POST["nama"]);
	$kategori=mysqli_real_escape_string($dbconnect,$_POST["kategori"]);
	$harga=mysqli_real_escape_string($dbconnect,$_POST["harga"]);
	$id=mysqli_real_escape_string($dbconnect,$_GET["id"]);
	$brand=mysqli_real_escape_string($dbconnect,$_POST["brand"]);
	$disc=mysqli_real_escape_string($dbconnect,$_POST["disc"]);
	
	if ($_FILES["gambar"]["size"]>0)
	{
		$akg=rand(0,1000);
		move_uploaded_file($_FILES["gambar"]["tmp_name"],"assets/img/item/" . $akg.$_FILES["gambar"]);
		
		$sql="UPDATE barang SET disc='$disc',brand='$brand',gambar='".$akg.$_FILES["gambar"]."',nama='$nama',kategori='$kategori',harga='$harga' WHERE id='$id'";
		mysqli_query($dbconnect,$sql);
	}
	else {
		$sql="UPDATE barang SET disc='$disc',brand='$brand',nama='$nama',kategori='$kategori',harga='$harga' WHERE id='$id'";
		mysqli_query($dbconnect,$sql);
	}
	
	
	header("location:item2.php");
?>
