
<?php
	$title="Tambah Item";
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
			<form method="post" action="sitem.php" enctype="multipart/form-data">
			  <h3 style="color:#FF0000" id="wrn"></h3>
			  <div class="form-group">
				<label for="exampleInputEmail1">Nama</label>
				<input type="text" name="nama" class="form-control" type="text"/>
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1">Kategori</label>
				<select name="kategori" class="form-control">
					<?php
						$sql="SELECT * FROM kategori ";
						$result=mysqli_query($dbconnect,$sql);
						while ($hsl=mysqli_fetch_array($result))
						{
							?>
								<option value="<?php echo $hsl["id"];?>">
									<?php
										echo $hsl["nama"];
									?>
								</option>
							<?php
						}
					?>
				</select>
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1">Brand</label>
				<select name="brand" class="form-control">
					<?php
						$sql="SELECT * FROM brand ";
						$result=mysqli_query($dbconnect,$sql);
						while ($hsl=mysqli_fetch_array($result))
						{
							?>
								<option value="<?php echo $hsl["id"];?>">
									<?php
										echo $hsl["nama"];
									?>
								</option>
							<?php
						}
					?>
				</select>
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1">Harga</label>
				<input name="harga" class="form-control" type="number"/>
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1">Discount</label>
				<input name="disc" class="form-control" value="<?php echo $hsl["disc"];?>" type="number"/>
			  </div>
			  <div class="form-group">
			    <br/><br/>
				<input name="gambar" style="opacity: 1;" class="form-control" type="file"/>
			  </div>
			  <button type="submit" class="btn btn-success">Tambah</button> atau <a href="item2.php"><button type="button" class="btn btn-warning">Kembali</button></a>
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