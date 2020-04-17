
<?php

if (!empty($_POST['jedi_prenom']) && isset($_POST['jedi_nom'])) {
	try{
		# première étape : je me connecte au serveur
		$sqlInsc = new PDO("mysql:host=localhost;dbname=les_archives", "root");

		// je premare ma requête
		$stmt = $sqlInsc->prepare("INSERT INTO `jedi` (`jedi_id`, `jedi_prenom`, `jedi_nom`, `jedi_img`, `jedi_rang`, `jedi_race`, `jedi_sexe`) VALUES (NULL, :jedi_prenom, :jedi_nom, :jedi_img, :jedi_rang, :jedi_race, :jedi_sexe)");
		
		$file = $_FILES['jedi_img'];

		$fileName = $_FILES['jedi_img']['name'];
		$fileTmpName = $_FILES['jedi_img']['tmp_name'];
		$fileSize = $_FILES['jedi_img']['size'];
		$fileError = $_FILES['jedi_img']['error'];
		$fileType = $_FILES['jedi_img']['type'];
	
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
	
		$allowed = array('jpg', 'jpeg', 'png');

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 1000000) {
					$fileNameNew = uniqid('', true).".".$fileActualExt;
					$fileDestination = 'uploads/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
					header("location: index.php?uploadsuccess");
				} else {
					echo "Fichier trop gros.";
				}
			} else {
				echo "Il y a une erreur.";
			}
		} else {
			echo "Vous ne pouvez pas envoyer un fichier de ce type.";
		}

	// je lui donne les paramètres dont elle a besoin sans en oublier
		$stmt->bindValue(":jedi_prenom", $_POST['jedi_prenom']);
		$stmt->bindValue(":jedi_nom", $_POST['jedi_nom']);
		$stmt->bindValue(":jedi_img", $fileDestination);
		$stmt->bindValue(":jedi_rang", $_POST['jedi_rang']);
		$stmt->bindValue(":jedi_race", $_POST['jedi_race']);
		$stmt->bindValue(":jedi_sexe", $_POST['jedi_sexe']);

		// Je l'execute et en fonction de si l'email existe deja ou pas, j'insere ma requete dans la bdd
		$stmt->execute();
		
		// si la requete n'aboutit pas (car le mail n'a pas été rentré car il doit être unique,  
		// alors la requete ne s'effectue pas, si l'email n'est pas dans la bdd la requete se fais sans soucis
		if($stmt->rowCount()==1){
			echo "<main id='insertMessage'>insertion réussie !";
		} else {
			echo "<main id='insertMessage'>insertion foirée !</main>";
		}


		} catch (PDOException $exception){
			echo $exception->getMessage();
	}

}


	// $file = $_FILES['jedi_img'];

	// $fileName = $_FILES['jedi_img']['name'];
	// $fileTmpName = $_FILES['jedi_img']['tmp_name'];
	// $fileSize = $_FILES['jedi_img']['size'];
	// $fileError = $_FILES['jedi_img']['error'];
	// $fileType = $_FILES['jedi_img']['type'];

	// $fileExt = explode('.', $fileName);
	// $fileActualExt = strtolower(end($fileExt));

	// $allowed = array('jpg', 'jpeg', 'png');

	// if (in_array($fileActualExt, $allowed)) {
	// 	if ($fileError === 0) {
	// 		if ($fileSize < 1000000) {
	// 			$fileNameNew = uniqid('', true).".".$fileActualExt;
	// 			$fileDestination = 'upload/'.$fileNameNew;
	// 			move_uploaded_file($fileTmpName, $fileDestination);
	// 			header("location: index.php?uploadsuccess");
	// 		} else {
	// 			echo "Fichier trop gros.";
	// 		}
	// 	} else {
	// 		echo "Il y a une erreur.";
	// 	}
	// } else {
	// 	echo "Vous ne pouvez pas envoyer un fichier de ce type.";
	// }