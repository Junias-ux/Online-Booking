<?php
include_once './conn.php';

// Data retrievement
$numeroAeroports = $conn->query("SELECT Numero_A FROM avion");
$aeroports = $conn->query("SELECT Nom_A FROM aeroport");

// Form treatment
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jour = $_POST['jour'];
    $heurDepart = $_POST['heureDepart'];
    $heurArrivee = $_POST['heureArrivee'];
    $placesLibres = $_POST['placesLibres'];
    $numAvion = $_POST['numAvion'];
    $aeroportDepart = $_POST['aeroportD'];
    $aeroportArrive = $_POST['aeroportA'];

    $sql = "INSERT INTO `vol`(`Jour`, `HeureDepart`, `HeureArrivee`, `PlacesLibres`, `Numero_A`, `aeroportDepart`, `aeroportArrive`) VALUES ('$jour', '$heurDepart', '$heurArrivee', '$placesLibres', '$numAvion', '$aeroportDepart', '$aeroportArrive')";

    if ($conn->query($sql)){
        $message = '<div id="alertMessage" class="alert alert-success" role="alert">Vol ajouté avec succès !!!</div>';
        // redirection apres soumission
        header("Location: ajouter_vol.php?success=1");
        exit();
    } else {
        $message = '<div id="alertMessage" class="alert alert-danger" role="alert">Erreur : ' . $conn->error . '</div>';
    }

}
$conn->close();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un vol</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="container mt-5">
    <?php if (isset($_GET['success'])): ?>
        <div id="alertMessage" class="alert alert-success" role="alert">Vol ajouté avec succès !!!</div> 
    <?php endif; ?>
    <form action="ajouter_vol.php" method="post" class="form-group">
        <label for="jour">Jour</label>
        <input type="date" class="form-control" name="jour" required><br>
        <label for="heureDepart">Heure de départ</label>
        <input type="time" class="form-control" name="heureDepart" required><br>
        <label for="heureArrivee">Heure d'arrivée</label>
        <input type="time" class="form-control" name="heureArrivee" required><br>
        <label for="placesLibres">Places Libres</label>
        <input type="number" class="form-control" name="placesLibres" required><br>
        <select name="numAvion" class="form-control">
            <option value="">Sélectionner le numéro de l'avion</option>
            <?php foreach ($numeroAeroports as $avion): ?>
                <option value="<?= $avion['Numero_A'] ?>"><?= $avion['Numero_A'] ?></option>
            <?php endforeach; ?>
        </select> <br>

        <select name="aeroportD" class="form-control">
            <option value="">Sélectionner l'aéroport de départ</option>
            <?php foreach ($aeroports as $aeroport): ?>
                <option value="<?= $aeroport['Nom_A'] ?>"><?= $aeroport['Nom_A'] ?></option>
            <?php endforeach; ?>
        </select> <br>

        <select name="aeroportA" class="form-control">
            <option value="">Sélectionner l'aéroport d'arrivée</option>
            <?php foreach ($aeroports as $aeroport): ?>
                <option value="<?= $aeroport['Nom_A'] ?>"><?= $aeroport['Nom_A'] ?></option>
            <?php endforeach; ?>
        </select> <br>

        <input type="submit" value="Ajouter" class="btn btn-primary">
    </form>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Masquer le message après 5 secondes
        window.onload = function() {
            const alertMessage = document.getElementById('alertMessage');
            if (alertMessage) {
                setTimeout(function() {
                    alertMessage.style.display = 'none';
                }, 5000); // 5000 ms = 5 secondes
            }
        };
    </script>
</body>

</html>