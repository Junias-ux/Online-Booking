<?php
include_once './conn.php';

$compagnies = $conn->query("SELECT Nom_C FROM compagnie");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $constructeur = $_POST['constructeur'];
    $modele = $_POST['modele'];
    $compagnie = $_POST['compagnie'];

    $sql = "INSERT INTO `avion`(`Constructeur`, `Modele`, `Nom_C`) VALUES ('$constructeur', '$modele', '$compagnie')";

    $result = $conn->query($sql);

    if ($result) {
        echo "Avion ajouté avec succès !!!";
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
    <title>Ajouter un avion</title>
</head>

<body>
    <form action="ajouter_avion.php" method="post">
        <label for="constructeur">Constructeur: </label>
        <input type="text" name="constructeur" required>

        <label for="modele">Modèle</label>
        <input type="text" name="modele" required>

        <select name="compagnie" required>
            <option value="">Selectionner une compagnie</option>
            <?php foreach ($compagnies as $compagnie): ?>
                <option value="<?= $compagnie['Nom_C'] ?>"><?= $compagnie['Nom_C'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Ajouter">
    </form>
</body>

</html>