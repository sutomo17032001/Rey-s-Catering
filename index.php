
<?php
	$title="Home";
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
			<div class="row">
				<div class="col-md-12" style="text-align:center">
					<h3>Now Open Rey's Catering</h3>
				</div>
				<div class="col-md-8 offset-md-2" style="background-color:#DDDDDD">
					<div class="slick">
				
						<?php
							 $active="active";
							 $sql="SELECT b.*,k.nama as kategori,b2.nama as brand ".
								 "FROM barang b ".
								 "INNER JOIN brand b2 ON (b2.id=b.brand) ".
								 "INNER JOIN kategori k ON (b.kategori=k.id) ".
								 "ORDER BY b.id DESC ".
								 "LIMIT 5 ";
							 $result=mysqli_query($dbconnect,$sql);
							 while ($hsl=mysqli_fetch_array($result))
							 {
								 ?>
									<div style="padding:10px;">
									  <a href="detailitem.php?id=<?php echo $hsl["id"];?>" style="text-align:center">
										  <div style="width:100%;justify-content: center;display:flex">
											<img style="height:600px;clear:both" src="assets/img/item/<?php echo $hsl["gambar"];?>">
										  </div>
										  <br/>
										  <h4><?php echo $hsl["nama"];?></h4>
									  </a>
								   </div>
								 <?php
							 }
						?>
					</div>
				</div>
			</div>	
			
			<div class="col-md-12" style="text-align:center;margin-top:40px">
					<h3>Feature</h3>
			</div>
			<div class="row">
						<?php
							 $sql="SELECT b.*,k.nama as kategori,b2.nama as brand ".
								 "FROM barang b ".
								 "INNER JOIN brand b2 ON (b2.id=b.brand) ".
								 "INNER JOIN kategori k ON (b.kategori=k.id) ".
								 "ORDER BY b.id DESC ".
								 "LIMIT 5 ";
							 $result=mysqli_query($dbconnect,$sql);
							 while ($hsl=mysqli_fetch_array($result))
							 {
								 ?>
									<div class="col-md-3">
									  <a href="detailitem.php?id=<?php echo $hsl["id"];?>" style="text-align:center">
										  <div style="width:100%;justify-content: center;display:flex">
											<img style="width:90%;margin-left:5%;clear:both" src="assets/img/item/<?php echo $hsl["gambar"];?>" alt="First slide">
										  </div>
										
										  <h4><?php echo $hsl["nama"];?></h4>
									  </a>
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
<script>
	$(function() {
		$(".slick").slick();
	});
</script>
</html>