<?php
// Connexion à la base de données
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'academix_base';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
     ?>   