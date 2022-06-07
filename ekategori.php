
<?php
	$title="Edit Kategori";
	
	require_once "assets/dbconnect.php";
	$sql="SELECT * FROM kategori WHERE id='". $_GET["id"] ."'";
	$result=mysqli_query($dbconnect,$sql);
	$hsl=mysqli_fetch_array($result);
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
			<form method="post" action="ukategori.php?id=<?php echo $_GET["id"];?>">
			  <h3 style="color:#FF0000" id="wrn"></h3>
			  <div class="form-group">
				<label for="exampleInputEmail1">Nama</label>
				<input type="text" name="nama" value="<?php echo $hsl["nama"];?>" class="form-control" type="text"/>
			  </div>
			  <button type="submit" class="btn btn-success">Simpan</button> atau  <a href="kategori.php"><button type="button" class="btn btn-warning">Kembali</button></a>
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
<script>

</script>
</html>