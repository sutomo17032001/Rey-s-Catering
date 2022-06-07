
<?php
	$title="Tambah Kategori";
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
			<form method="post" action="skategori.php">
			  <h3 style="color:#FF0000" id="wrn"></h3>
			  <div class="form-group">
				<label for="exampleInputEmail1">Nama</label>
				<input type="text" name="nama" class="form-control" type="text"/>
			  </div>
			  <button type="submit" class="btn btn-success">Tambah</button> atau  <a href="kategori.php"><button type="button" class="btn btn-warning">Kembali</button></a>
			</form>	
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