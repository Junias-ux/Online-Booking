<?php
include_once './conn.php';

$personnels = $conn->query("SELECT Nom_PE FROM personnel");
$vols = $conn->query("SELECT Numero_V FROM vol");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomPE = $_POST['nomPE'];
    $numVol = $_POST['numVol'];

    $sql = "INSERT INTO `occupation`(`Numero_V`, `Nom_PE`) VALUES ('$numVol', '$nomPE')";

    $result = $conn->query($sql);

    if ($result) {
        echo "Affectation réussi";
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
    <title>Affecter un personnel</title>
</head>

<body>
    <form action="affecter_personnel.php" method="post">
        <label for="">Personnel</label>
        <select name="nomPE">
            <option value="">Selectionner un personnel</option>
            <?php foreach ($personnels as $personnel): ?>
                <option value="<?= $personnel['Nom_PE'] ?>"><?= $personnel['Nom_PE'] ?></option>
            <?php endforeach; ?>
        </select> <br>

        <label for="">Vol</label>
        <select name="numVol">
            <option value="">Selectionner un vol</option>
            <?php foreach ($vols as $vol): ?>
                <option value="<?= $vol['Numero_V'] ?>"><?= $vol['Numero_V'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" value="Affecter">
    </form>

</body>

</html>