<?php

// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "academix_base";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Définir le mode d'erreur de PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connexion à la base de données réussie";
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}?>