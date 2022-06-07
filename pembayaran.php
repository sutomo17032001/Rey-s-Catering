<?php
	$title="pembayaran";
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
		<div class="content">
        <div class="container-fluid">
			<h4>
                Pengisian Data Pembeli :
            </h4>
			<hr>
			<form action="sipembayaran.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $_GET["id"];?>"/>
					<div class="form-group">
						<label for="exampleInputPassword1">Nama</label>
						<input type="text" name="nama" required placeholder="Masukkan nama" class="form-control" type="password">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Telephone</label>
						<input type="text" name="telephone" required placeholder="Masukkan nomor hp" class="form-control" type="password">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Alamat Pengiriman</label>
						<input type="text" name="alamat" required placeholder="Masukkan alamat" class="form-control" type="password">
					</div>
					<div class="form-group">
						<br/>Bukti Transaksi<br/>
						<input name="gambar" style="opacity: 1;" class="form-control" type="file"/>
					</div>	
				<input type="submit" name="form-order" value="Proses" class="btn btn-success">
			</form>
		</div>
		
		<div class="col-md-12">
			<hr>
			<h4>
				Detail Pesanan :
            </h4>
				<table class="table" style="width:100%">
					<thead>
					<tr style="background:#fc8621;font-weight:bold;">
						<td style="width:15%">Produk</td>
						<td style="width:10%">QTY</td>
						<td style="width:10%">Harga</td>
						<td style="width:15%">Total</td>
					</tr>
					</thead>
					<tbody>
						<?php
							$total=0;
							$q="SELECT b.nama,db.* ".
							   "FROM detailbelanja db ".
							   "INNER JOIN barang b ON (b.id=db.barangid) ".
							   "WHERE db.belanjaid='".$_GET["id"]."'";
							$res=mysqli_query($dbconnect,$q);
							while ($row=mysqli_fetch_array($res))
							{
								?>
									<tr>
										<td>
											<?php
												echo $row["nama"];
											?>
										</td>
										<td>
											<?php
												echo $row["jumlah"];
											?>
										</td>
										<td style="text-align:right">
											<?php
												echo number_format($row["harga"]);
											?>
										</td>
										<td style="text-align:right">
											<?php
												echo number_format($row["subtotal"]);
												$total+=$row["subtotal"];
											?>
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
				</table>
		  <!-- your content here -->
        </div>
      </div>
      <?php
		require_once "assets/js.php";
	  ?>
    </div>
  </div>
</body>