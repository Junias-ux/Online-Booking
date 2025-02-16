<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de Vol</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Style général */
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Image de fond */
        .hero {
            background: url('https://source.unsplash.com/1600x900/?airplane,travel') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 20px;
        }

        /* Ombre pour améliorer la lisibilité du texte */
        .hero h1, .hero p {
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
        }

        /* Navbar transparente */
        .navbar {
            background: rgba(0, 0, 0, 0.6) !important;
        }

        .navbar-brand, .nav-link {
            color: white !important;
        }

        .nav-link:hover {
            color: #f8d210 !important;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">FlightBooking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="./index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="./reserver_vol.php">Réservations</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Vols</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Section Hero -->
    <div class="hero">
        <div>
            <h1>Bienvenue sur FlightBooking</h1>
            <p>Réservez vos vols en toute simplicité et au meilleur prix !</p>
            <a href="./reserver_vol.php" class="btn btn-warning btn-lg">Réserver un vol</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
