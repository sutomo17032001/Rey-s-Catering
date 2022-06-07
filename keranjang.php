<?php
	$title="Keranjang";
	require_once "assets/dbconnect.php";
	$shoppingcart=array();
	if (isset($_SESSION["shoppingcart"]))
	{
		$shoppingcart=$_SESSION["shoppingcart"];
	}
	
?> 	 
<!doctype html>
<html lang="en">

<head>
  <title>Rey's Catering</title>
  <!-- Required meta tags -->
  <?php
	require_once "assets/css.php";
  ?>
</head>

<body>
  <div class="wrapper ">
    <?php
		require_once "assets/sbar.php";
	?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php
		require_once "assets/nbar.php";
	  ?>
		<div class="content">
			<div class="container-fluid">
				<h2>
					Keranjang anda :
				</h2>
				<table class="table table-striped" style="width:100%">
				<thead>
				<tr style="background:#c3ebf8;font-weight:bold;">
					<td style="width:15%">Produk </td>
					<td style="width:40%">Harga</td>
					<td style="width:10%">QTY</td>
					<td style="width:15%">Total</td>
					<td style="width:5%" class="delete">&nbsp;</td>
				</tr>
				</thead>
				<tbody>
					<?php
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
							?>
								<tr>
									<td>
										<?php
											echo $hsl["nama"];
										?>
									</td>
									<td style="text-align:right">
										<?php
											echo number_format($hsl["harga"]);
											$subtotal=$hsl["harga"]*$value;;
										?>
									</td>
									<td style="text-align:right">
										<?php
											echo $value;
										?>
									</td>
									<td style="text-align:right">
										<?php
											echo number_format($subtotal);
											$total+=$subtotal;
										?>
									</td>
									<td>
										<a href="deletesc.php?key=<?php echo $key;?>">
											Delete
										</a>
									</td>
								</tr>
							<?php
						}
					?>
				</tbody>
				<tfoot>	
					<tr>
						<th colspan="3">
							Total
						</th>
						<th style="text-align:right">
							<?php
								echo number_format($total);
							?>
						</th>
					</tr>
				</tfoot>
				<a href="checkout.php">Checkout</a> atau <a href="item.php">Belanja lagi</a>
			</div> 
		</div>
      <?php
		require_once "assets/js.php";
	  ?>
    </div>
  </div>
</body>
