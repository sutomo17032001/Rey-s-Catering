<?php
	$title="Keranjang";
	require_once "assets/dbconnect.php";
	$shoppingcart=array();
	if (isset($_SESSION["shoppingcart"]))
	{
		$shoppingcart=$_SESSION["shoppingcart"];
	}
	
	$q="INSERT INTO belanja (tanggal,penggunaid,total,status) VALUES (SYSDATE(),'".$_SESSION["id"]."',0,'belum verified') ";
	$res=mysqli_query($dbconnect,$q);
	$idB=mysqli_insert_id($dbconnect);
	
	
	$total=0;
	foreach ($shoppingcart as $key => $value)
	{
	   $sql="SELECT b.*,k.nama as kategori,b2.nama as brand ".
		 "FROM barang b ".
		 "INNER JOIN kategori k ON (b.kategori=k.id) ".
		 "INNER JOIN brand b2 ON (b2.id=b.brand) ".
		 "WHERE b.id=".$key;
		$result=mysqli_query($dbconnect,$sql);
		$hsl=mysqli_fetch_array($result);
		
		$harga=0;
		if ($hsl["disc"]>0)
		{
			$hasilD=((100-$hsl["disc"])/100)*$hsl["harga"];
			$harga=$hasilD;
		}
		else {
			$harga=$hsl["harga"];
		}
		$subtotal=$harga*$value;
		$total+=$subtotal;
		
		$q="INSERT INTO detailbelanja (belanjaid,barangid,jumlah,harga,subtotal) VALUES ('$idB','$key','$value','$harga','$subtotal')";
		mysqli_query($dbconnect,$q);
	}
	
	$q="UPDATE belanja SET total='$total' WHERE id='$idB'";
	mysqli_query($dbconnect,$q);
	
	
	$_SESSION["shoppingcart"]=array();
	header("location:pembayaran.php?id=".$idB);
?>
				