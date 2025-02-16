<?php
include_once './conn.php';

$passagers = $conn->query("SELECT Nom_PA FROM passager");
$vols = $conn->query("SELECT Numero_V FROM vol");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomPA = $_POST['nomPA'];
    $numVol = $_POST['numVol'];
    $dateReservation = date("Y-m-d");

    $sql = "INSERT INTO `reservation`(`Numero_V`, `Nom_PA`, `dateReservation`) VALUES ('$numVol', '$nomPA', '$dateReservation')";

    $result = $conn->query($sql);

    if ($result) {
        echo "Réservation réussi";
    } else {
        echo "Erreur: " . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver un vol</title>
</head>

<body>
    <form action="reserver_vol.php" method="post">
        <label for="">Passager</label>
        <select name="nomPA" required>
            <option value="">Selectionner un passager</option>
            <?php foreach ($passagers as $passager): ?>
                <option value="<?= $passager['Nom_PA'] ?>"><?= $passager['Nom_PA'] ?></option>
            <?php endforeach; ?>
        </select> <br>

        <label for="">Vol</label>
        <select name="numVol" required>
            <option value="">Selectionner un vol</option>
            <?php foreach ($vols as $vol): ?>
                <option value="<?= $vol['Numero_V'] ?>"><?= $vol['Numero_V'] ?></option>
            <?php endforeach; ?>
        </select> <br>

        <input type="submit" value="Réserver">
    </form>

</body>

</html>