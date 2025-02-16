<?php
include_once './conn.php';

// Récupérer le liste des affectations
$sql = "SELECT occupation.Nom_PE, personnel.Fonction, occupation.Numero_V 
FROM occupation
JOIN personnel ON occupation.Nom_PE = personnel.Nom_PE";

$results = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des affectations</title>
</head>

<body>
    <h2>Liste des affectations</h2>
    <table>
        <tr>
            <th>Nom Personnel</th>
            <th>Fonction</th>
            <th>Numéro du Vol</th>
        </tr>
        <?php foreach ($results as $result): ?>
            <tr>
                <td><?= $result['Nom_PE'] ?></td>
                <td><?= $result['Fonction'] ?></td>
                <td><?= $result['Numero_V'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
<?php
$conn->close();
?>