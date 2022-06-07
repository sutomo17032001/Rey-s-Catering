
<?php
	$title="Kategori";
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
  <style>
	
  </style>
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
				<a href="aitem.php">+ Data</a>
				<table class="table table-bordered table-striped ">
					<thead>
						<tr>
							<th style="font-weight:bold">
								Action
							</th>
							<th style="font-weight:bold">
								Nama
							</th>
							<th style="font-weight:bold">
								Kategori
							</th>
							<th style="font-weight:bold">
								Harga
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql="SELECT b.*,k.nama as kategori ".
								 "FROM barang b ".
								 "INNER JOIN kategori k ON (b.kategori=k.id) ";
							$result=mysqli_query($dbconnect,$sql);
							while ($hsl=mysqli_fetch_array($result))
							{
								?>
									<tr>
										<td>
											<a href="eitem.php?id=<?php echo $hsl["id"];?>">Update</a> |  <a href="ditem.php?id=<?php echo $hsl["id"];?>">Delete</a>
										</td>
										<td>
											<?php
												echo $hsl["nama"];
											?>
										</td>
										<td>
											<?php
												echo $hsl["kategori"];
											?>
										</td>
										<td style="text-align:right">
											<?php
												echo number_format($hsl["harga"]);
											?>
										</td>
									</tr>
								<?php
							}
						?>
					</tbody>
				</table>
			</div>
        </div>
      </div>
      <?php
		require_once "assets/js.php";
	  ?>
	  
    </div>
  </div>
</body>
<script>

</script>
</html>