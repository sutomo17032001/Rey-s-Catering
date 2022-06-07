<?php
	$title="Penjualan";
	require_once "assets/dbconnect.php";
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
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
			<div class="row">
				<?php
					$sql="SELECT b.*,k.nama as kategori,b2.nama as brand ".
						 "FROM barang b ".
						 "INNER JOIN kategori k ON (b.kategori=k.id) ".
						 "INNER JOIN brand b2 ON (b2.id=b.brand) ".
						 "WHERE b.id=".$_GET["id"];
					$result=mysqli_query($dbconnect,$sql);
					while ($hsl=mysqli_fetch_array($result))
					{
						?>
							<div class="col-md-4 ">
							  <img src="assets/img/item/<?php echo $hsl["gambar"];?>" style="width:100%" alt="Card image cap">
							</div>
							<div class="col-md-5 offset-md-1">
								<form action="simpancart.php" method="POST">
									<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
									<table class="table table-bordered">
										<tr>
											<th colspan="2">
												<?php
													echo $hsl["nama"];
												?>
											</th>
										</tr>
										<tr>
											<th>
												Harga
											</th>
											<td>
												<?php
													
													if ($hsl["disc"]>0)
													{
														$hasilD=((100-$hsl["disc"])/100)*$hsl["harga"];
														?>
															<label style="text-decoration: line-through;"><?php echo number_format($hsl["harga"]);?></label>
															<label><?php echo number_format($hasilD);?></label>
														<?php
													}
													else {
														?>
															<label><?php echo number_format($hsl["harga"]);?></label>
														<?php
													}
												?>
											</td>
										</tr>
										<tr>
											<th>
												Brand
											</th>
											<td>
												<?php
													echo $hsl["brand"];
												?>
											</td>
										</tr>
										<tr>
											<th>
												Quantity
											</th>
											<td>
												<input type="number" name="jumlah" value=0 class="form-control"/>
											</td>
										</tr>
										<tr>
											<th colspan="2">
												<button class="btn btn-primary">Add to Shopping Cart</button>
												atau
												<a href="item.php">Check Item Lain</a>
											</th>
										</tr>
									</table>
								</form>
							</div>
						<?php
					}
				?>
			</div>
		  <!-- your content here -->
        </div>
      </div>
      <?php
		require_once "assets/js.php";
	  ?>
	  <script>
		  var ibefore=-1;
		  function setButton(i)
		  {
			  if (ibefore!=-1)
			  {
				  $("#btn"+ibefore).removeClass("btn-primary");
			  }
			  $("#btn"+i).addClass("btn-primary");
			  ibefore=i;
		  }
	  </script>
    </div>
  </div>
</body>

</html>