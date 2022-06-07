
<?php
	$title="Kategori";
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
			<div class="row">
				<a href="akategori.php">+ Data</a>
				<table class="table table-bordered table-striped ">
					<thead>
						<tr>
							<th style="font-weight:bold">
								Action
							</th>
							<th style="font-weight:bold">
								Nama
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql="SELECT * FROM kategori ";
							$result=mysqli_query($dbconnect,$sql);
							while ($hsl=mysqli_fetch_array($result))
							{
								?>
									<tr>
										<td>
											<a href="ekategori.php?id=<?php echo $hsl["id"];?>">Update</a> |  <a href="dkategori.php?id=<?php echo $hsl["id"];?>">Delete</a>
										</td>
										<td>
											<?php
												echo $hsl["nama"];
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