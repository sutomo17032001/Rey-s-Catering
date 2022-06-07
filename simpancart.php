<?php
	//$title="Penjualan";
	require_once "assets/dbconnect.php";
	$shopingcart=array();
	if (isset($_SESSION["shoppingcart"]))
	{
		$shopingcart=$_SESSION["shoppingcart"];
	}
	
	$shopingcart[$_POST["id"]]=$_POST["jumlah"];
	$_SESSION["shoppingcart"]=$shopingcart;
	
	header("location:keranjang.php");
?>
