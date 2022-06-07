<?php
	$title="register";
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
			<form method="post" action="sregister.php">
			  <h3 style="color:#FF0000" id="wrn"></h3>
			  <div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<input type="text" name="username" required placeholder="Masukkan Nama" class="form-control" type="text"/>
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="password" required placeholder="Masukkan Password" class="form-control" type="password">
			  </div>
			  <button type="submit" class="btn btn-success">Register</button>
			<br/>Sudah Punya Akun ? <a href="login.php">Login Sekarang !</a>
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