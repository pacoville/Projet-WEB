<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Sportify : Consultation Sportive</title>
    <link href="logo.jpg" rel="icon" type="image/x-icon" />
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- Bibliothèque jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<!-- Dernier JavaScript compilé -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .carousel {
            max-width: 800px;
            height: 450px;
            margin: 20px auto;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 0;
        }

        .carousel img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .carousel img.active {
            display: block;
            opacity: 1;
        }

        .carousel-controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .carousel-controls button {
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            outline: none;
            transition: background-color 0.3s ease;
        }

        .carousel-controls button:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .carousel-indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(0%);
            display: flex;
            justify-content: center;
        }

        .carousel-indicators span {
            display: block;
            width: 10px;
            height: 10px;
            margin: 0 5px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .carousel-indicators span.active {
            background-color: white;
        }

        #footer {
            height: auto;
        }
    </style>
</head>
