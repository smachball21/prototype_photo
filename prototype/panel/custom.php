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
		
		window.location="../panel/logout.php"; 
	} 

</script>	
	<body>
		<a onclick="goback()" class="moving" ><i class="fas fa-chevron-left"></i> Disconnect</a>
		<div class="menu">
		  <a class="text" href="?id=home">Home</a>
		  <a href="?id=photos">Photos</a>
		  <a href="?id=tarifs">Tarifs</a>
		  <a href="?id=reseaux">Réseaux</a>		
		  <a href="?id=users">Utilisateurs</a>		
		</div>
		
		<center>
			<?php
							
				if ( ($_GET['id'] == 'home') || (! $_GET['id'] )){	
					if (isset($_POST['homesubmit'])){
						$conn->set_charset("utf8");
						$requete = 'UPDATE home SET text = "'.$_POST['hometext'].'" WHERE id = "'.$_POST['combo'].'"';
						$conn->query($requete);
					}
			?>
			
			<div id='home'>
				<table id="customers">
					<tr>
					   <th><b>ID</b></th>
					   <th><b>NAME</b></th>
					   <th><b>TEXT</b></th>
					   <th><b>DELETE</b></th>   
					</tr>
					<?php
						$conn->set_charset("utf8");
						$requete = 'SELECT * FROM home';
						$resultat = $conn->query($requete);
						while ($ligne = $resultat->fetch_assoc()) {
							echo '<tr><td><b>'.$ligne['id'].'</b></td>';
							echo '<td><b><img src="../img/banniere/'.$ligne['name'].'" width="100px" alt="photos"></img></b></td>';
							echo '<td><b>'.$ligne['text'].'</b></td>';
							echo '<td><b><a href="" ><i class="fas fa-trash"></i></a></b></td></tr>';
						}
					?>
				</table>
				<form method="POST">
					<p class="home">
						<span>ID : </span>
						<select name="combo" required>
							<option></option>
							<?php
								$conn->set_charset("utf8");
								$requete = 'SELECT * FROM home';
								$resultat = $conn->query($requete);
								while ($ligne = $resultat->fetch_assoc()) {
									echo '<option>'.$ligne['id'].'</option>';
								}
							
							?>
						</select>
						<input type="text" required name="hometext" placeholder="Text">
						<input type="submit" class="homesubmit" name="homesubmit" value="Update">

					</p>
				</form>
				


					
					<!--<form method="post" enctype="multipart/form-data" action="">
					<p>
					<input type="file" name="fichier" size="30">
					<input type="submit" name="upload" value="Uploader">
					</p>
					</form>	-->	
					<?php

						// if ( isset($_POST['badd']) ) {
							 // $dossier = '../img/banniere/';
							 // $fichier = basename($_FILES['background']['name']);
							 // if(move_uploaded_file($_FILES['background']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
							 // {
								  // echo 'Upload effectué avec succès !';
							 // }
							 // else //Sinon (la fonction renvoie FALSE).
							 // {
								  // echo 'Echec de l\'upload !';
							 // }
							// $conn->set_charset("utf8");
							// $requete = 'INSERT INTO `home`(`name`, `text`) VALUES ([value-1],[value-2],[value-3])';
							// $resultat = $conn->query($requete);
						
						// }
					?>
			</div>
			
			<?php
				}
				if ( $_GET['id'] == 'photos' ){
				
			?>
			<div id='photos'>
				
			</div>
			<?php
				}
				if ( $_GET['id'] == 'tarifs' ){
			?>
			<div id='tarifs'>
				
			</div>		
			<?php
				}
				if ( $_GET['id'] == 'reseaux' ){
			?>
			<div id='reseaux'>
				<?php 
					if (isset($_POST['fsubmit'])){
						$conn->set_charset("utf8");
						$requete = "UPDATE social SET link = '".$_POST['flink']."' WHERE type = 'facebook'";
						$resultat = $conn->query($requete);
						$ligne = $resultat->fetch_assoc();
					}

				?>
				<?php
					$conn->set_charset("utf8");
					$requete = "SELECT * FROM social WHERE type = 'facebook'";
					$resultat = $conn->query($requete);
					$ligne = $resultat->fetch_assoc();
				?>
				<form id="border" class="Facebook" method="POST">
					<p><span>Facebook Link</span></p>
					<p><input class="text" required name="flink" type="text" value="<?php echo $ligne['link']; ?>" placeholder="link">
					<input class="submit" type="submit" name="fsubmit" value="Enregistrer"></p>
				</form>
				<?php 
					if (isset($_POST['tsubmit'])){
						$conn->set_charset("utf8");
						$requete = "UPDATE social SET link = '".$_POST['tlink']."' WHERE type = 'twitter'";
						$resultat = $conn->query($requete);
						$ligne = $resultat->fetch_assoc();
					}

				?>
				<?php
					$conn->set_charset("utf8");
					$requete = "SELECT * FROM social WHERE type = 'twitter'";
					$resultat = $conn->query($requete);
					$ligne = $resultat->fetch_assoc();
				?>
				<form id="border" class="Twitter" method="POST">
					<p><span>Twitter Link</span></p>
					<p><input class="text" required name="tlink" type="text" value="<?php echo $ligne['link']; ?>" placeholder="link">
					<input class="submit" name="tsubmit" type="submit" value="Enregistrer"></p>
				</form>
				<?php 
					if (isset($_POST['isubmit'])){
						$conn->set_charset("utf8");
						$requete = "UPDATE social SET link = '".$_POST['ilink']."' WHERE type = 'instagram'";
						$resultat = $conn->query($requete);
						$ligne = $resultat->fetch_assoc();
					}

				?>
				<?php
					$conn->set_charset("utf8");
					$requete = "SELECT * FROM social WHERE type = 'instagram'";
					$resultat = $conn->query($requete);
					$ligne = $resultat->fetch_assoc();
				?>
				<form id="border" class="Instagram" method="POST">
					<p><span>Instagram Link</span></p>
					<p><input class="text" required name="ilink" type="text" value="<?php echo $ligne['link']; ?>" placeholder="link">
					<input class="submit" name="isubmit" type="submit" value="Enregistrer"></p>
				</form>
				<?php 
					if (isset($_POST['lisubmit'])){
						$conn->set_charset("utf8");
						$requete = "UPDATE social SET link = '".$_POST['lilink']."' WHERE type = 'linkedin'";
						$resultat = $conn->query($requete);
						$ligne = $resultat->fetch_assoc();
					}

				?>
				<?php
					$conn->set_charset("utf8");
					$requete = "SELECT * FROM social WHERE type = 'linkedin'";
					$resultat = $conn->query($requete);
					$ligne = $resultat->fetch_assoc();
				?>
				<form id="border" class="LinkedIn" method="POST">
					<p><span>LinkedIn Link</span></p>
					<p><input class="text" required name="lilink" type="text" value="<?php echo $ligne['link']; ?>" placeholder="link">
					<input class="submit" name="lisubmit" type="submit" value="Enregistrer"></p>
				</form>
			</div>
			<?php
				}
				if ( $_GET['id'] == 'users' ){

			
			?>
			<div id='users'>
				<table id="customers">
					<tr>
					   <th><b>Utilisateur</b></th>
					   <th><b>Mot de passe</b></th>
					   <th><b>Modifier</b></th>
					</tr>
					
				<?php
					$conn->set_charset("utf8");
					$requete = 'SELECT * FROM users';
					$resultat = $conn->query($requete);
					while ($ligne = $resultat->fetch_assoc()) {
						echo '<tr><td><b>'.$ligne['username'].'</b></td>';
						echo '<td><b>•••••••••</b></td>';
						if ($ligne['admin'] == 1){
							echo '<td><b>superadmin</a></b></td></tr>';
						}else{
				?>
						<td><b><a href="./users.php?username=<?php echo $ligne['username'] ?>"><i class="fas fa-pen"></i></a></b></td>
				<?php
					}
				}
				?>
				</table>
				<p class="buttons">
					<a class="btn" href="./users.php">Ajouter un utilisateur</a>
				</p>
			</div>
			<?php
				}
			?>
		</center>
		
		<span class="copyright">© 2019 Rayformatics</span>
	</body>
</html>