<?php
include_once './conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomPA = $_POST["nomPA"];
    $sql = "INSERT INTO passager (Nom_PA) VALUES ('$nomPA')";

    $result = $conn->query($sql);

    if ($result) {
        echo "Passager ajouté avec succès";
    } else {
        echo "Erreur: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un passager</title>
</head>

<body>
    <form action="ajouter_passager.php" method="post">
        <label for="nomPA">Nom du Passager</label>
        <input type="text" name="nomPA" required>
        <input type="submit" value="Ajouter">
    </form>
</body>

</html>