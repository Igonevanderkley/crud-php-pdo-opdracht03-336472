<?php
require 'config.php';

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        // echo "Jeeejjj!!";
    } else {
        echo "Neeeeee!!";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    var_dump($_POST);

    try {
        $sql = "UPDATE achtbaan SET 
                NaamAchtbaan = :naamAchtbaan,
                NaamPretpark = :naamPretpark,
                Land = :land,
                Topsnelheid = :topsnelheid,
                Hoogte = :hoogte,
                Datum = :datum,
                Cijfer = :cijfer
            WHERE Id = :id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':naamAchtbaan', $_POST['coasterName'], PDO::PARAM_STR);
        $statement->bindValue(':naamPretpark', $_POST['amusementName'], PDO::PARAM_STR);
        $statement->bindValue(':land', $_POST['countryName'], PDO::PARAM_STR);
        $statement->bindValue(':topsnelheid', $_POST['topSpeed'], PDO::PARAM_STR);
        $statement->bindValue(':hoogte', $_POST['height'], PDO::PARAM_STR);
        $statement->bindValue(':datum', $_POST['openingDate'], PDO::PARAM_STR);
        $statement->bindValue(':cijfer', $_POST['rating'], PDO::PARAM_STR);
        $statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $statement->execute();

        //stuur gebruiker door naar read.php met een header(Refresh) functie;
        echo 'update voltooid';
        header('Refresh:3; url=read.php');

    } catch (PDOException $e) {
        echo 'Update niet voltooid';
        header('Refresh:3; url=read.php');
        echo $e->getMessage();
    }

    exit();
}

$sql = "SELECT Id, NaamAchtbaan, NaamPretpark, Land, Topsnelheid, Hoogte, Datum, Cijfer FROM achtbaan WHERE Id = :Id";

$statement = $pdo->prepare($sql);
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);
$statement->execute();

$result = $statement->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/style.css">

    <title>PHP PDO CRUD</title>
</head>

<body>
    <h1>PHP PDO CRUD</h1>

    <form action="update.php" method="post">

        <label for="coasterName">Naam Achtbaan:</label><br>
        <input type="text" name="coasterName" id="coasterName" value="<?= $result->NaamAchtbaan; ?>"><br>
        <br>
        <label for="amusementName">Naam Pretpark:</label><br>
        <input type="text" name="amusementName" id="amusementName" value="<?= $result->NaamPretpark; ?>"><br>
        <br>
        <label for="countryName">Naam Land:</label><br>
        <input type="text" name="countryName" id="countryName" value="<?= $result->Land; ?>"><br>
        <br>
        <label for="topSpeed">Topsnelheid (km/u):</label><br>
        <input type="text" name="topSpeed" id="topSpeed" value="<?= $result->Topsnelheid; ?>"><br>
        <br>
        <label for="height">Hoogte (m):</label><br>
        <input type="number" name="height" id="height" value="<?= $result->Hoogte; ?>"><br>
        <br>
        <label for="openingDate">Datum eerste opening:</label><br>
        <input type="date" name="openingDate" id="openingDate" value="<?= $result->Datum; ?>"><br>
        <br>
        <label for="rating">Cijfer voor achtbaan:</label><br>
        <input type="range" name="rating" id="rating" min="0" max="10" step="0.1" value="<?= $result->Cijfer; ?>"><br>
        <br>
        <input type="hidden" name="id" value="<?= $result->Id;?>">
        <br>
        <input type="submit" value="Send!">
    </form>

    <a href="read.php">read</a>



</body>
