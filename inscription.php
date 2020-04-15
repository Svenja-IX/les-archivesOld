<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les archives</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" href="images/holocron-icon.png">
</head>
<body>
<main>
<?php 
include ('includes/header.php');

if (!empty($_POST['user_prenom']) && !empty($_POST['info_password']) && !empty($_POST['user_email']) && !empty($_POST['user_password'])) {
user
	try{
		# première étape : je me connecte au serveur
		$sqlInsc = new PDO("mysql:host=localhost;dbname=entrainementphpbdd", "root");

		// je premare ma requête
		$stmt = $sqlInsc->prepare("INSERT INTO `info` (`info_id`, `info_prenom`, `info_nom`, `info_mail`, `info_password`) VALUES (NULL, :info_prenom, :info_nom, :info_email, :info_password);");
		
	// je lui donne les paramètres dont elle a besoin sans en oublier
		$stmt->bindValue(":user_prenom", $_POST['user_prenom']);
		$stmt->bindValue(":user_nom", $_POST['user_nom']);
		$stmt->bindValue(":user_email", $_POST['user_email']);
		$stmt->bindValue(":user_password", password_hash($_POST['user_password'], PASSWORD_DEFAULT));

		// Je l'execute et en fonction de si l'email existe deja ou pas, j'insere ma requete dans la bdd
		$stmt->execute();
		
		// si la requete n'aboutit pas (car le mail n'a pas été rentré car il doit être unique,  
		// alors la requete ne s'effectue pas, si l'email n'est pas dans la bdd la requete se fais sans soucis
		if($stmt->rowCount()==1){
			echo "<main id='insertMessage'>insertion réussie !</main>";
		} else {
			echo "<main id='insertMessage' style='background:black'>insertion foirée !</main>";
		}


		} catch (PDOException $exception){
			echo $exception->getMessage();
	}
}
?>
</main>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="scripts/script.js"></script>
</body>
</html>