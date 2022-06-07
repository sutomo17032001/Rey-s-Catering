<?php
	require_once "assets/dbconnect.php";
	$nama=mysqli_real_escape_string($dbconnect,$_POST["nama"]);
	$kategori=mysqli_real_escape_string($dbconnect,$_POST["kategori"]);
	$harga=mysqli_real_escape_string($dbconnect,$_POST["harga"]);
	$brand=mysqli_real_escape_string($dbconnect,$_POST["brand"]);
	$disc=mysqli_real_escape_string($dbconnect,$_POST["disc"]);
	$akg=rand(0,1000);

	move_uploaded_file($_FILES["gambar"]["tmp_name"],"assets/img/item/" . $akg.$_FILES["gambar"]);
	$sql="INSERT INTO barang (nama,kategori,gambar,harga,brand,disc) VALUES ('$nama','$kategori','".$akg.$_FILES["gambar"] ."',$harga,$brand,'$disc')";
	mysqli_query($dbconnect,$sql);
	header("location:item2.php");
?>
