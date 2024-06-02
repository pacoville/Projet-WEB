<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variables de connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pisc";
    
    // Connexion à la base de données
    try {
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configuration du mode d'erreur PDO pour afficher les erreurs
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }

