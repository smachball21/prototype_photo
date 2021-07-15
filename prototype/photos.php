<!DOCTYPE html>
<?php
	include("./secure/config.php");
?>
<html lang="fr">
	<head>
		<title>Prototype | RayFormatics</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css" >  
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://kit.fontawesome.com/305787ac24.js"></script>		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="./js/plugins.js"></script>	
		<script src="./js/footer.js"></script>		
		<meta charset="utf-8">
	</head>
	<body>
		<!-- HEADER -->
		<div id="header" class="header">	
			<ul class="rf_header_nav">
				<a onclick="openNav()" class="mobile"><i class="fas fa-bars"></i></a>
				<span>Prototype RayFormatic's</span>
				<a class="pc" href="./"><li>Accueil</li></a>
				<a class="pc" id="active" href="./photos.php"><li>Photo</li></a>
				<a class="pc" href="./services.php"><li>Services & tarifs</li></a>
				<a class="pc" href="./contact.php"><li>Contact</li></a>
			</ul>		
		</div>
		<div id="myNav" class="overlay">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		  <div class="overlay-content">
			<a href="./">Accueil</a>
			<a href="./photos.php">Photo</a>
			<a href="./services.php">Services & tarifs</a>
			<a href="./contact.php">Contact</a>
		  </div>
		</div>
	</body>
	<footer>
		<div id="footer">
			<div class="rf_social">
				<p class="social"><span>Réseaux sociaux</span></p>
				<br>
				<?php
					$conn->set_charset("utf8");
					$requete = "SELECT * FROM social WHERE type = 'facebook'";
					$resultat = $conn->query($requete);
					$ligne = $resultat->fetch_assoc();
				?>
				<a class="social" href="<?php echo $ligne['link']; ?>" target="_blank"><img class="social" src="./img/social/facebook.png" alt="facebook"></a>
				<?php
					$conn->set_charset("utf8");
					$requete = "SELECT * FROM social WHERE type = 'instagram'";
					$resultat = $conn->query($requete);
					$ligne = $resultat->fetch_assoc();
				?>
				<a class="social" href="<?php echo $ligne['link']; ?>" target="_blank"><img class="social" src="./img/social/instagram.png" alt="instagram"></a>
				<?php
					$conn->set_charset("utf8");
					$requete = "SELECT * FROM social WHERE type = 'twitter'";
					$resultat = $conn->query($requete);
					$ligne = $resultat->fetch_assoc();
				?>
				<a class="social" href="<?php echo $ligne['link']; ?>" target="_blank"><img class="social" src="./img/social/twitter.png" alt="twitter"></a>
				<?php
					$conn->set_charset("utf8");
					$requete = "SELECT * FROM social WHERE type = 'linkedin'";
					$resultat = $conn->query($requete);
					$ligne = $resultat->fetch_assoc();
				?>
				<a class="social" href="<?php echo $ligne['link']; ?>" target="_blank"><img class="social" src="./img/social/linkedin.png" alt="LinkedIn"></a>
			</div>
			<div  class="copyright">
					<p class="text">
					<span>© 2019 Rayformatics</span>
					<a href="./">Accueil</a>
					<a href="./services.php">Service & Tarifs</a>
					<a href="./contact.php">Contact</a>
				</p>
			</div>
		</div>
	</footer>
</html>