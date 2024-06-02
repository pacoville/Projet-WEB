<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information sur le coach</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .cv-content {
            display: none;
        }
    </style>
</head>
<body>
    <?php
    // Informations de connexion à la base de données
    $servername = "localhost"; // Remplacez par votre serveur de base de données
    $username = "root"; // Remplacez par votre nom d'utilisateur de base de données
    $password = ""; // Remplacez par votre mot de passe de base de données
    $dbname = "piscine"; // Remplacez par le nom de votre base de données

    // Création de la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion: " . $conn->connect_error);
    }

    // Spécialité recherchée
    $specialite = "Football";

    // Préparation de la requête SQL pour récupérer les informations du coach
    $sql = "SELECT u.prenom, u.nom, u.numero, u.email, c.photo, c.cv 
            FROM coach c 
            JOIN utilisateur u ON c.utilisateur_id = u.utilisateur_id 
            WHERE c.specialite = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $specialite);
    $stmt->execute();
    $result = $stmt->get_result();
