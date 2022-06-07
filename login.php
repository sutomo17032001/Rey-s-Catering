
<?php
	$title="Login";
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
			  <h3 style="color:#FF0000" id="wrn"></h3>
			  <div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<input type="text" name="username" required placeholder="Masukkan Nama" class="form-control" type="text"/>
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="password" required placeholder="Masukkan Password" class="form-control" type="password">
			  </div>
			  <button type="button" id="blogin" class="btn btn-success">Login</button> atau <a href="register.php"><button type="button" class="btn btn-warning">Register</button></a>
		
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
		$("#blogin").click(function()
		{
			var postForm=new Object();	
			postForm.username=$( "input[name='username']" ).val();
			postForm.password=$( "input[name='password']" ).val();
			$.ajax({
				   url : 'assets/plogin.php',
				   type : 'GET',
				   data      : postForm,
				   dataType  : 'json',
				   success : function(data) {
					    if (data==null)
						{
							$("#wrn").html("Username yang anda inputkan salah");
						}
						else {
							window.location="dashboard.php";
						}
				   }
		    });
		});
	});
</script>
</html>