<?php

require 'config.php';

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        echo "Er is een verbinding met de mysql-server";
    } else {
        echo "Er is een interne server-error, neem contact op met de beheerder";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = "INSERT INTO achtbaan (Id, NaamAchtbaan, NaamPretpark, Land, Topsnelheid, Hoogte, Datum, Cijfer) 
        VALUES (NULL, :naamAchtbaan, :naamPretpark, :land, :topsnelheid, :hoogte, :datum, :cijfer);";

$statement = $pdo->prepare($sql);
$statement->bindValue(':naamAchtbaan', $_POST['coasterName'], PDO::PARAM_STR);
$statement->bindvalue(':naamPretpark', $_POST['amusementName'], PDO::PARAM_STR);
$statement->bindValue(':land', $_POST['countryName'], PDO::PARAM_STR);
$statement->bindValue(':topsnelheid', $_POST['topSpeed'], PDO::PARAM_STR);
$statement->bindValue(':hoogte', $_POST['height'], PDO::PARAM_STR);
$statement->bindValue(':datum', $_POST['openingDate'], PDO::PARAM_STR);
$statement->bindValue(':cijfer', $_POST['rating'], PDO::PARAM_STR);

$result = $statement->execute();

if ($result) {
    echo "Er is een nieuw record gemaakt in de database.";
    header('Refresh:2; url=read.php');
} else {
    echo "Er is geen nieuw record gemaakt.";
    header('Refresh:2; url=read.php');
}
