<?php
include_once './conn.php';

$compagnies = $conn->query("SELECT Nom_C FROM compagnie");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomPE = $_POST["nomPE"];
    $fonction = $_POST["fonction"];
    $compagnie = $_POST["nomCompagnie"];
    $sql = "INSERT INTO `personnel`(`Nom_PE`, `Fonction`, `Nom_C`) VALUES ('$nomPE', '$fonction', '$compagnie')";

    $result = $conn->query($sql);

    if ($result) {
        echo "Personnel ajouté avec succès";
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
    <title>Ajouter un personnel</title>
</head>

<body>
    <form action="ajouter_personnel.php" method="post">
        <label for="nomPA">Nom du Personnel</label>
        <input type="text" name="nomPE" required><br>

        <label for="fonction">Fonction du Personnel</label>
        <input type="text" name="fonction" required><br>

        <label for="">Compagnie</label>
        <select name="nomCompagnie">
            <option value="">Selectionner une compagnie</option>
            <?php foreach ($compagnies as $compagnie): ?>
                <option value="<?= $compagnie['Nom_C'] ?>"><?= $compagnie['Nom_C'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Ajouter">
    </form>
</body>

</html>