<!DOCTYPE HTML>



<html>
	<head>	
		<title>Votre sous domaine | Rayformatics</title>
		<link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
		<style>
			* {
				margin:0;
			}
			html {
				background-color: #696969;
				border:10px solid #ff0000;
				height:97.9%;
				overflow: hidden;
			}
			
			h1 {
				font-family: 'Baloo Chettan', cursive;
				color:white;
				text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
				margin-bottom:50px;
			}
			span {
				font-family: 'Lobster', cursive;
				font-size: 18px;
				color:white;
			}
			div.new {
					
					width:100%;
					margin-top: 20vh; 
					transform: translateY(-80%); 
			}
			
			div.1 {
				font-size:22px;
			}

		</style>
	</head>
	<center><img src="https://rayformatics.fr/img/RAYMAN.png" style="margin-top: 100px" width="200px" alt="rayman"></center>
	<center><div class="new">
		<h1>VOTRE SOUS DOMAINE RAYFORMATICS</h1>
		<span>
			<p>votre sous-domaine <?php echo $_SERVER["HTTP_HOST"] ?> à été temporairement désactivé par l'administrateur!</p> 
			<p>Pour toute demande de réactivation, veuillez contacter le support <a href="mailto:webmaster@rayformatics.fr" /> ICI (webmaster@rayformatics.fr)</p>
		</span>	
	</div></center>
	


</html>