<?php
	$title="Info Pembayaran";
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
			$koneksi = mysqli_connect("localhost","root","","catering2");
			$q = mysqli_query($koneksi,"Select * from info_pembayaran limit 1") or die (mysql_error($koneksi));
			$data = mysqli_fetch_object($q);
			?>
			<?php echo $data->info?>
		  <!-- your content here -->
        </div>
      </div>
      <?php
		require_once "assets/js.php";
	  ?>
    </div>
  </div>
</body>