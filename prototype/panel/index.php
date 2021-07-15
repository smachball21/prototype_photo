<! DOCTYPE html>
<?php
	include('../secure/config.php');
	session_start();
	
	if ($_SESSION['connected']){
		header('Location: ../panel/custom.php');
	}else{
		if ( isset($_POST['submit']) ){
			include('./db.php');

			$usr = $_POST['usr'];
			$pwd = $_POST['pwd'];
			
			$sql = "SELECT * FROM users WHERE username = '".$usr."'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);

			if (! $row < 1){
				if ( password_verify($pwd, $row['password']) == true ){
					$_SESSION['connected'] = true;
					$_SESSION['id'] = $row['id'];
					$_SESSION['user'] = $row['username'];		
					$_SESSION['pwd'] = $row['password'];
					
					header('Location: ../panel/custom.php');
				}else{
					echo "<p class='error'><div class='error'> Le mot de passe ou l'utilisateur est incorrect !</div></p>";
				}
			}else{
				echo "<p class='error'><div class='error'>Le mot de passe ou l'utilisateur est incorrect !</div></p>";
			}
		}else{
			
		}
	}
?>

<html>
	<head>
		<title>Prototype | ADMINISTRATION</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://kit.fontawesome.com/305787ac24.js"></script>		
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
<script>
	window.onload = function()
	{
		
		document.body.style.opacity = 1;
		document.getElementById("form").style.transform = "translateY(-50%) translate3d(0, 0, 0)";

	}
	
	function goback(){
		document.body.style.transform = "translate3d(-100%, 0, 0)";
		setTimeout('Redirect()', 1000);
	}
	
	function Redirect() 
	{  
		window.location="../"; 
	} 
	
	function submit()
	{
	    document.body.style.opacity=0;	
	}

</script>	
	<body>
		<a onclick="goback()" class="moving" ><i class="fas fa-chevron-left"></i> Go Back</a>
		
		<center>
			<div id="form" class="form">
				<h2>Administration Login</h2>
				<form class="login" method="POST">
					<p><input autocomplete="off" required type="text" name="usr" class="text" placeholder="Username"></p>
					<p><input required type="password" name="pwd" class="text" placeholder="Password"></p>
					<p><input onclick="submit();" required type="submit" name="submit" class="submit" value="Log In"></p>
				</form>	
			</div>
		</center>
		
		<span class="copyright">© 2019 Rayformatics</span>
	</body>
</html>