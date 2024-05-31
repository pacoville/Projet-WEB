<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Compte client</title>
    <link href="logo.jpg" rel="icon" type="image/x-icon" />
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Bibliothèque jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Dernier JavaScript compilé -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .nav-item {
            position: relative; 
            border: 1.5px solid black;
            background-color: black;
            padding: 10px;
            margin: auto;
            color: #FE7000;
            text-align: center;
            border-radius: 10px;
            height: 75px;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: -175%; 
            left: -1%; 
            transform: translateX(0%); 
            background-color: #333; 
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .card {
            height: auto;
        }

        #navigation {
            position: fixed;
            bottom: 78px;
            width: 100%;
            z-index: 1000;
        }

        #footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: black; 
            text-align: center;
            padding: 10px 0;
            z-index: 1000;
        }
    </style>
</head>
