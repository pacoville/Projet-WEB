<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur_id'])) {
    // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: compte-client.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href="images/logo.jpg" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Bibliothèque jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Dernier JavaScript compilé -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>Compte Client</title>
    <style>body{
            background-color: #f4f4f4;
        }

        .presentation {
            border: 2px solid black;
            margin-top: 8%;
            width: 95%;
            margin-left: 2.5%;
        }

        .presentation h1{
            text-align: center;
            text-decoration: underline;
        }
        .presentation p{
            margin-left: 10px;
        }

        #navigation {
            position: absolute;
            bottom: 79px;
            width: 100%;
            z-index: 1000;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: -185%; /* Positionné juste en dessous de l'élément parent */
            left: -1%; /* Positionné au milieu horizontalement */
            transform: translateX(0%); /* Centré horizontalement */
            background-color: #333; /* Mise à jour de la couleur de fond */
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-item {
            padding: 10px 10px;
            border-bottom: 1px solid #ddd;
            display: block;
            text-decoration: none;
            color: black;
        }
            
        .dropdown-item:hover {
            background-color: #f1f1f1;
            color: black;
        }

        .nav-item:hover .dropdown-menu {
            display: block; /* Affiche le menu déroulant au survol */
        }

        #footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: black; 
            text-align: center;
            padding: 10px 0;
            z-index: 1000;
        }
    </style>
</head>
