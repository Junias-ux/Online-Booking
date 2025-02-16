<?php
include_once './conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomVille = $_POST["nomVille"];
    $sql = "INSERT INTO ville (Nom_V) VALUES ('$nomVille')";

    $result = $conn->query($sql);

    if ($result) {
        echo "Ville ajouté avec succès";
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
    <title>Ajouter une ville</title>
</head>

<body>
    <form action="ajouter_ville.php" method="post">
        <label for="nomPA">Nom de la ville</label>
        <input type="text" name="nomVille" required>
        <input type="submit" value="Ajouter">
    </form>
</body>

</html>