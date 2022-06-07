<?php
	require_once "assets/dbconnect.php";
	$id="";
	$title="";
	$keyword="";
	$bpilih=array();
	if (isset($_GET["brand"]))
	{
		$bpilih=$_GET["brand"];
	}
	if (isset($_GET["keyword"]))
	{
		$keyword=$_GET["keyword"];
	}
	if (isset($_GET["id"]))
	{
		$id=$_GET["id"];
	}
	
	$daftarBrand=array();
	if ($id=="")
	{
		$title="All";
		
		
		$sql="SELECT * FROM brand";
		$result=mysqli_query($dbconnect,$sql);
		while ($hsl=mysqli_fetch_array($result))
		{
			$daftarBrand[]=$hsl["id"];
		}
	}
	else {
	    $sql="SELECT k.* ".
			 "FROM kategori k WHERE k.id='$id' ";
			
		$result=mysqli_query($dbconnect,$sql);
		while ($hsl=mysqli_fetch_array($result))
		{
			$title=$hsl["nama"];
		}
		
		
		$sql="SELECT b.* ".
		     "FROM brand b ".
			 "INNER JOIN barang b2 ON (b2.brand=b.id) ".
			 "INNER JOIN kategori k ON (k.id=b2.kategori) ".
			 "WHERE k.id='$id'";
		$result=mysqli_query($dbconnect,$sql);
		while ($hsl=mysqli_fetch_array($result))
		{
			$daftarBrand[]=$hsl["id"];
		}
	}
	

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
			<form>
			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
			  <div class="form-group">
				<label for="keyword" style="font-weight:bold">Keyword</label>
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan keyword" value="<?php echo $keyword;?>"/>
			  </div>
			  <div class="form-group">
				<label for="menu" style="font-weight:bold">Menu</label>
				 <?php
					$q="SELECT * FROM brand WHERE id IN (".implode(",",$daftarBrand).")";
					$result=mysqli_query($dbconnect,$q);
					while ($hsl=mysqli_fetch_array($result))
					{
						$checked="checked";
						if (count($bpilih)>0)
						{
							if (!in_array($hsl["id"],$bpilih))
							{
								$checked="";
							}
						}
						?>
							<div class="container-fluid">
								<div class="row" style="display:flex;align-items: center;">
									<input  type="checkbox" value="<?php echo $hsl["id"];?>" <?php echo $checked;?> name="brand[]"/>
									<label class="form-check-label" for="defaultCheck1" style="margin-left:15px">
										<?php
											echo $hsl["nama"];
										?>
									</label>
								</div>
							</div>
						<?php
					}
				  ?>
			  </div>
			 
			  <button type="submit" class="btn btn-primary">Search</button>
			</form>
			<div class="row">
				<?php
					$sql="SELECT b.*,k.nama as kategori,b2.nama as brand ".
						 "FROM barang b ".
						 "INNER JOIN brand b2 ON (b2.id=b.brand) ".
						 "INNER JOIN kategori k ON (b.kategori=k.id) ".
						 "WHERE b.nama LIKE '%$keyword%' ";
					if ($id!="")
					{
						$sql=$sql." AND b.kategori=".$id;
					}
					if (count($bpilih)>0)
					{
						$sql=$sql." AND b.brand IN (".implode(",",$bpilih).")";
					}
					$result=mysqli_query($dbconnect,$sql);
					while ($hsl=mysqli_fetch_array($result))
					{
				?>
							<div class="card col-md-4">
							  <img src="assets/img/item/<?php echo $hsl["gambar"];?>" style="max-height:300px" alt="Card image cap">
							  <div class="card-body">
								<h5 class="card-title"><?php echo $hsl["nama"];?></h5>
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
								<p class="card-text"><?php echo $hsl["brand"];?></p>
								<a href="detailitem.php?id=<?php echo $hsl["id"];?>" class="btn btn-primary">View Detail</a>
							  </div>
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
    </div>
  </div>
</body>

</html>