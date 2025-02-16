<?php
include_once './conn.php';

$villes = $conn->query("SELECT Nom_V FROM ville"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomAeroport = $_POST["nomAeroport"];
    $ville  = $_POST['ville'];
    $sql = "INSERT INTO aeroport (Nom_A, Nom_V) VALUES ('$nomAeroport','$ville')";

    $result = $conn->query($sql);

    if ($result) {
        echo "Aéroport ajouté avec succès";
    } else {
        echo "Erreur: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un aéroport</title>
</head>

<body>
    <form action="ajouter_aeroport.php" method="post">
        <label for="nomPA">Nom Aeroport</label>
        <input type="text" name="nomAeroport" required><br>

        <label for="ville">Ville</label>
        <select name="ville" required>
            <option value="">Selectionner une ville</option>
            <?php foreach ($villes as $ville): ?>
                <option value="<?= $ville['Nom_V'] ?>"><?= $ville['Nom_V'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Ajouter">
    </form>
</body>

</html>