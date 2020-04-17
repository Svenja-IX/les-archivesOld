<?php
require_once ('includes/bdd.php');
?>
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
<?php
    include ('includes/header.php');
    include ('includes/inscriptionForm.php');
    include ('includes/connexionForm.php');
    include ('includes/ajoutJedi.php');
?>
    <main>
<?php
    // foreach($allJedi as $jedi){
    
    // // j'afficher chaque ligne dans une card
    // echo '<div class="card">
    //             <img class="card-img-top" src="'.$jedi['jedi_img'].'" alt="image">
    //         <div class="card-body">
    //             <h5 class="card-title">'.$jedi['jedi_prenom']."   ".$jedi['jedi_nom'].'</h5>
    //             <p class="card-text">'.$jedi['rang_nom'].'</p>
    //             <a href="#" class="btn btn-primary">Plus d\'infos</a></div></div>';
    // }
?>
</main>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="scripts/script.js"></script>
</body>
</html>