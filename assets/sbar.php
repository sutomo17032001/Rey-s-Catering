  <div class="sidebar" data-color="danger" data-image="assets/img/batik2.jpg">
      <div class="logo">
        <a  class="simple-text logo-mini">
          Rey's Caterings
        </a>
      </div>
	  <?php
		function current_url()
		{
			$url      = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			$validURL = str_replace("&", "&amp", $url);
			
			$temp=explode("/",$_SERVER["REQUEST_URI"]);
			return $temp[count($temp)-1];
		}

		$offer_url = current_url();
		
		function contains($needle, $haystack)
		{
			return strpos($haystack, $needle) !== false;
		}
	  ?>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <?php
			if (isset($_SESSION["id"]))
			{
				$level="";
				$q="SELECT * FROM pengguna WHERE id='".$_SESSION["id"]."'";
				$result=mysqli_query($dbconnect,$q);
				$user=mysqli_fetch_array($result);
				
				if ($user["tipe"]=="admin")
				{
					 ?>
					  <li class="nav-item <?php if ($offer_url=="dashboard.php") echo "active";?>">
						<a class="nav-link" href="dashboard.php">
						  <p>Dashboard</p>
						</a>
					  </li>
					  <li class="nav-item <?php if ($offer_url=="kategori.php") echo "active";?>">
						<a class="nav-link" href="kategori.php">
						  <p>Kategori</p>
						</a>
					  </li>
					  <li class="nav-item <?php if ($offer_url=="item2.php") echo "active";?>">
						<a class="nav-link" href="item2.php">
						  <p>Item</p>
						</a>
					  </li>
					  <li class="nav-item <?php if ($offer_url=="apembayaran2.php") echo "active";?>">
						<a class="nav-link" href="apembayaran2.php">
						  <p>pembayaran</p>
						</a>
					  </li>
					  <li class="nav-item <?php if ($offer_url=="logout.php") echo "active";?>">
						<a class="nav-link" href="plogout.php">
						  <p>Logout</p>
						</a>
					  </li>
					<?php
				}
				else if ($user["tipe"]=="user"){
					?>
						 <li class="nav-item <?php if ($offer_url=="dashboard.php") echo "active";?>">
						<a class="nav-link" href="dashboard.php">
						  <p>Home</p>
						</a>
					  </li>
						 <li class="nav-item <?php if ($offer_url=="info.php") echo "active";?>">
						<a class="nav-link" href="info.php">
						  <p>info</p>
						</a>
					  </li>
					  <li class="nav-item <?php if ($offer_url=="item.php") echo "active";?>">
						<a class="nav-link" href="item.php">
						  <p>Barang</p>
						</a>
					  </li>
					  <li class="nav-item <?php if ($offer_url=="keranjang.php") echo "active";?>">
						<a class="nav-link" href="keranjang.php">
						  <p>Keranjang</p>
						</a>
					  </li>
					  <li class="nav-item <?php if ($offer_url=="apembayaran.php") echo "active";?>">
						<a class="nav-link" href="apembayaran.php">
						  <p>Transaksi</p>
						</a>
					  </li>
					  <li class="nav-item <?php if ($offer_url=="logout.php") echo "active";?>">
						<a class="nav-link" href="plogout.php">
						  <p>Logout</p>
						</a>
					  </li>
					<?php
				}
				
			
			}
			else {
				?>
				  
				  <li class="nav-item <?php if ($offer_url=="index.php") echo "active";?>">
					<a class="nav-link" href="index.php">
					  <p>Home</p>
					</a>
				  </li>
				  <li class="nav-item <?php if (contains("item.php",$offer_url)) echo "active";?> dropdown">
					<a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   Barang
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
					  <a class="dropdown-item"  href="item.php">All</a>
					  <?php
						$sql="SELECT * FROM kategori ";
						$result=mysqli_query($dbconnect,$sql);
						while ($hsl=mysqli_fetch_array($result))
						{
							?>
								<a class="dropdown-item" href="item.php?id=<?php echo $hsl["id"];?>"><?php echo $hsl["nama"];?></a>
							<?php
						}
					  ?>
					</div>
				  </li>
				  </li>
				   <li class="nav-item <?php if ($offer_url=="login.php") echo "active";?>">
					<a class="nav-link" href="login.php">
					  <p>Login</p>
					</a>
				  </li>
				<?php
			}
		  ?>
		  
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>