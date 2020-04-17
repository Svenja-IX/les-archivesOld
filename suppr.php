
<?php

if (isset($_POST['del_jedi_prenom'])) {
	try{
		# première étape : je me connecte au serveur
		$sqlInsc = new PDO("mysql:host=localhost;dbname=les_archives", "root");

		// je premare ma requête
		$stmt = $sqlInsc->prepare("DELETE FROM jedi WHERE jedi_prenom = :jedi_prenom");
		
	// je lui donne les paramètres dont elle a besoin sans en oublier
		$stmt->bindValue(":jedi_prenom", $_POST['del_jedi_prenom']);

		// Je l'execute et en fonction de si l'email existe deja ou pas, j'insere ma requete dans la bdd
		$stmt->execute();
		
		// si la requete n'aboutit pas (car le mail n'a pas été rentré car il doit être unique,  
		// alors la requete ne s'effectue pas, si l'email n'est pas dans la bdd la requete se fais sans soucis
		if($stmt->rowCount()==1){
			header("location: index.php?uploadsuccess+insertionsuccess");
		} else {
			header("location: index.php?uploadfail");
		}


		} catch (PDOException $exception){
			echo $exception->getMessage();
	}

}
