<?php
	require_once "assets/dbconnect.php";
	 mysqli_query($dbconnect,"update belanja set status = 'verified' where id='".$_GET["id"]."'");			
?>