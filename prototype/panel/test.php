<?php
	if (isset($_POST['submit'])){
		$uploaddir = '/var/www/prototype/panel/';

		
		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

		echo '<pre>';
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
			echo "Le fichier est valide, et a été téléchargé
				   avec succès. Voici plus d'informations :\n";
		} else {
			echo "Attaque potentielle par téléchargement de fichiers.
				  Voici plus d'informations :\n";
		}

		echo 'Voici quelques informations de débogage :';
		print_r($_FILES);

		echo '</pre>';
	}
?>

<form enctype="multipart/form-data" action="" method="post">
  <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
  <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
  <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
  Envoyez ce fichier : <input name="userfile" type="file" />
  <input type="submit" value="Envoyer le fichier" />
</form>