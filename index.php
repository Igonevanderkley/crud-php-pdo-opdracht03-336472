<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>snelste achtbanen</title>
</head>
<body>
    <h1>De 5 snelste achtbanen van europa</h1>

    <h4>Invoer Achtbaan</h4>
    <form action="create.php" method="post">

    <label for="coasterName">Naam Achtbaan:</label><br>
    <input type="text" name="coasterName" id="coasterName"><br>
    <br>
    <label for="amusementName">Naam Pretpark:</label><br>
    <input type="text" name="amusementName" id="amusementName"><br>
    <br>
    <label for="countryName">Naam Land:</label><br>
    <input type="text" name="countryName" id="countryName"><br>
    <br>
    <label for="topSpeed">Topsnelheid (km/u):</label><br>
    <input type="number" name="topSpeed" id="topSpeed"><br>
    <br>
    <label for="height">Hoogte (m):</label><br>
    <input type="number" name="height" id="height"><br>
    <br>
    <label for="openingDate">Datum eerste opening:</label><br>
    <input type="date" name="openingDate" id="openingDate"><br>
    <br>
    <label for="rating">Cijfer voor achtbaan: </label><br>
    <input type="range" name="rating" id="rating"
            min="0" max="10" step="0.1"><br>
    <br>
    <input type="submit" value="Sla op">

</form>
</body>
</html>