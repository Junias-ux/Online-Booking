<?php
    include_once './conn.php';

    // Récupérer les vols disponibles
    $vols = $conn->query("SELECT Numero_V FROM vol");

    // Récupération de la liste des passagers
    $passagers = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numVol = $_POST["numVol"];
        $sql = "SELECT passager.Nom_PA FROM reservation JOIN passager ON reservation.Nom_PA = passager.Nom_PA WHERE reservation.Numero_V = '$numVol'";
        
        $results = $conn->query($sql);

        foreach ($results as $result) {
            $passagers[] = $result['Nom_PA'];
        }

    }

    $conn->close();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des passagers</title>
</head>

<body>
    <h2>Afficher les passagers d'un vol</h2>
    <form action="./liste_passagers.php" method="post">
        <select name="numVol">
            <option value="">Selectionner un vol</option>
            <?php foreach ($vols as $vol): ?>
                <option value="<?=$vol['Numero_V'] ?>"><?=$vol['Numero_V'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Afficher">
    </form>

    <?php if (!empty($passagers)): ?>
        <h3>Passager du vol Selectionner</h3>
        <ul>
            <?php foreach ($passagers as $passager): ?>
                <li><?= $passager ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</body>

</html>