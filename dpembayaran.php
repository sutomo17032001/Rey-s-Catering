<?php
	$title="Status Pembayaran";
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
			<?php
				$q="SELECT * ".
				   "FROM belanja ".
				   "WHERE id='".$_GET["id"]."'";
				$res=mysqli_query($dbconnect,$q);
				$row=mysqli_fetch_array($res);
			?>
			<div class="container">
				<div class="col-md-6">
					<h3>Detail Pembayaran</h3>
					<table class="table">
						<tbody>
							<tr>
								<td>Nama</td>
								<td><?php echo @$row["nama"]; ?></td>
							</tr>
							<tr>
								<td>Bukti Transaksi</td>
								<td><a href="assets/img/item/<?php echo $row["bukti"]; ?>" target="_newtab">Bukti Transaksi</a></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<?php
										$q="SELECT * FROM pengguna WHERE id='".$_SESSION["id"]."'";
										$result=mysqli_query($dbconnect,$q);
										$user=mysqli_fetch_array($result);
										if ($row["status"] == "belum verified" && $user["tipe"]=="admin") {
											?>
											<a href="upembayaran.php?id=<?php echo $_GET["id"];?>" class="btn btn-sm btn-success">Verified</a>
											<?php
										}
									?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>		
			</div>
		  <!-- your content here -->
        </div>
      </div>
      <?php
		require_once "assets/js.php";
	  ?>
    </div>
  </div>
</body>