<?php
include_once './conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomCompagnie = $_POST['nomCompagnie'];

    $sql = "INSERT INTO `compagnie`(`Nom_C`) VALUES ('$nomCompagnie')";

    $result = $conn->query($sql);

    if ($result) {
        echo "Compagnie ajouté avec succès !!!";
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
    <title>Ajouter une Compagnie</title>
</head>

<body>
    <form action="ajouter_compagnie.php" method="post">
        <label for="nomCompagnie">Nom Compagnie</label>
        <input type="text" name="nomCompagnie" required>
        <input type="submit" value="Ajouter">
    </form>
</body>

</html>