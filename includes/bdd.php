<?php

require_once("config.php");

try {

    $pdo = new PDO("mysql:host=".$host.";dbname=".$dbname, $dbuser, $dbpass);
    $allJedi = $pdo->query("SELECT * FROM jedi;");
    $allJedi->setFetchMode(PDO::FETCH_ASSOC);

} catch (Exception $exception) {

    $messageError = $exception->getMessage();

}

?>