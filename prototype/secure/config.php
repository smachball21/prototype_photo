<?php
	$url=$_SERVER['REQUEST_URI'];
	
	if (strpos($url, "config.php")) {
		header("Location: ../");
	}
	
	$SQLhost = 'localhost';
	$SQLpass = 'pr0to21';
	$SQLlogin = 'prototype';
	$SQLdb = 'prototype';
	
	$conn = mysqli_connect($SQLhost, $SQLlogin, $SQLpass, $SQLdb);
	
	if (! $conn ){
		echo '
		<style>
			* {
				background-color:#252525;
				color:white;
			}
		</style>
		
		<h1>Error !</h1>';
		die();
	}
?>