<?php
	$title="Pembayaran";
	require_once "assets/dbconnect.php";
?>

<!doctype html>
<html lang="en">

<head>
	<title>Rey's catering</title>
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
			<table class="table table-striped table-hove">
				<thead>
					<tr>
						<th>#</th>
						<th>Tanggal</th>
						<th>Total</th>
						<th>Nama</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$q="SELECT * ".
						   "FROM belanja ".
						   "WHERE penggunaid='".$_SESSION["id"]."'";
						$res=mysqli_query($dbconnect,$q);
						while ($row=mysqli_fetch_array($res))
						{
							?>	
								<tr>
									<td>
										<?php
											echo $row["id"];
										?>
									</td>
									<td>
										<?php
											echo date("d-M-Y",strtotime($row["tanggal"]));
										?>
									</td>
									<td style="text-align:justify">
										<?php
											echo number_format($row["total"]);
										?>
									</td>
									<td>
										<?php
											echo $row["nama"];
										?>
									</td>
									<td>
										<?php
											echo $row["status"];
										?>
									</td>
									<td>
										<a href="dpembayaran.php?id=<?php echo $row["id"];?>">
											Detail
										</a>
									</td>
								</tr>
							<?php
						}
					?>
				</tbody>
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


</html>