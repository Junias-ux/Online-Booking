<?php

$db = 'reservation_vol';
$user = 'root';
$password = "";
$serveur = 'localhost';

$conn = new mysqli($serveur, $user, $password, $db);

if ($conn->connect_error){
    die("Connexion échouée: " . $conn->connect_error);
} 
