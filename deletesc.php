<?php
	//$title="Penjualan";
	require_once "assets/dbconnect.php";
	$shopingcart=array();
	if (isset($_SESSION["shoppingcart"]))
	{
		$shopingcart=$_SESSION["shoppingcart"];
	}
	
	
	unset($shopingcart[$_GET["key"]]);
	$_SESSION["shoppingcart"]=$shopingcart;
	
	header("location:keranjang.php");
?>
