<!DOCTYPE html>
<?php
	include("./secure/config.php");

	$conn->set_charset("utf8");
	$requete = 'SELECT * FROM home';
	$resultat = $conn->query($requete);
	$i = 1;
	while ($ligne = $resultat->fetch_assoc()) {
		$var[$i] = $ligne['name'];
		
		$i++;
	}
	
	$y = 1;
	while ($y < $i){
		
		$final = $final . '"' .$var[$y] . '"' . ', ';
		$y++;
	}
		
		$final = substr($final, 0, -2);
	
	echo '<script>
		window.onload = function() {backgroundSequence();  };
		var bgImageArray = ['.$final.'],
		base = "https://prototype.rayformatics.fr/img/banniere/",
		secs = 10;
		bgImageArray.forEach(function(img){
			new Image().src = base + img; 
		});

		function backgroundSequence() {
			window.clearTimeout();
			var k = 0;
			for (i = 0; i < bgImageArray.length; i++) {
				setTimeout(function(){ 
					
					document.body.style.backgroundImage = "url(" + base + bgImageArray[k] + ")";
				if ((k + 1) === bgImageArray.length) { setTimeout(function() { backgroundSequence() }, (secs * 1000))} else { k++; }			
				}, (secs * 1000) * i)	
			}
		}	
		</script>';
?>
<html lang="fr">
	<head>
		<title>Prototype | RayFormatics</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css" >  
		<link rel="stylesheet" type="text/css" href="./css/rf_contact.css" >  
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://kit.fontawesome.com/305787ac24.js"></script>		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="./js/plugins.js" ></script>	
		<script src="./js/footercontact.js"></script>	
		<meta charset="utf-8">
	</head>
	<body>
		<!-- HEADER -->
		<div id="header" class="header">	
			<ul class="rf_header_nav">
				<a onclick="openNav()" class="mobile"><i class="fas fa-bars"></i></a>
				<span>Prototype RayFormatic's</span>
				<a class="pc" href="./"><li>Accueil</li></a>
				<a class="pc" href="./photos.php"><li>Photo</li></a>
				<a class="pc" href="./services.php"><li>Services & tarifs</li></a>
				<a class="pc" id="active" href="./contact.php"><li>Contact</li></a>
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
		<div id="contact">
			<form class="rf_contact" method="POST">
					<p><span>Nom <sup><i class="fas fa-star-of-life"></i></sup></span></p>
					<p><input required style="text-transform:uppercase;" class="info" type="text"></p>
				
					<p><span>Prénom <sup><i class="fas fa-star-of-life"></i></sup></span></p>
					<p><input required type="text" class="info"></p>
					
					<p><span>Email <sup><i class="fas fa-star-of-life"></i></sup></span></p>
					<p><input required type="email" class="info"></p>
					
					<p><span>Sujet <sup><i class="fas fa-star-of-life"></i></sup></span></p>
					<p><input required type="text" class="info"></p>
					
					<p><span>Votre message <sup><i class="fas fa-star-of-life"></i></sup></span></p>
					<p><textarea required></textarea></p>
					
					<p><input class="submit" type="submit" value="Envoyer"></p>
				
			</form>
			
			<div class="rf_infos">
				<h1>Social</h1>
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
				<hr color="white">
				<h1>Coordonnées</h1>
				<p class="rf_infos_name"><span>Webmaster Rayformatic's</span></p>
				<p class="rf_infos"><span>+33 6 01 02 03 04</span></p>
				<p class="rf_infos"><span>22 B Rue du Cap Vert, 21800 Quetigny</span></p>
			</div>
		</div>

	</body>
	<footer>
		<div class="copyright">
			<p class="text">
				<span>© 2019 Rayformatics</span>
				<a href="./">Accueil</a>
				<a href="./services.php">Service & Tarifs</a>
				<a href="./contact.php">Contact</a>
			</p>
		</div>
	</footer>
</html>