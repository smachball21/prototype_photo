<?php
	include('../secure/config.php');
	session_start();
	
	if (! $_SESSION['connected']){
		header('Location: ../panel/');
	}	
?>



<html>
	<head>
		<title>Prototype | ADMINISTRATION</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<link rel="stylesheet" type="text/css" href="./css/panel.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://kit.fontawesome.com/305787ac24.js"></script>		
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
<script>
	window.onload = function()
	{	
		document.body.style.opacity = 1;
	}
	function goback(){
		document.body.style.transform = "translate3d(-100%, 0, 0)";
		setTimeout('Redirect()', 700);
	}
	
	function Redirect() 
	{  
		
		window.location="../panel/custom.php"; 
	} 

</script>	
	<body>
		<a onclick="goback()" class="moving" ><i class="fas fa-chevron-left"></i> Return</a>
		<span class="copyright">© 2019 Rayformatics</span>

		<?php
			if ($_GET['username']){

			
		?>
			<form class="users" method="POST">
				<input type="text" placeholder="username" value="">
				<input type="submit" value="Enregistrer">
			</form>
				<input type="submit" value="Supprimer le compte">
		<?php
			}else{
		?>
			<div class="usersform">
				<form class="users" method="POST">
					<p><input type="text" placeholder="username" value=""></p>
					<p><input type="submit" value="Ajouter"></p>
				</form>
			</div>
		<?php
			}
		?>
	</body>
</html>