<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Salles de Sport</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
        }
        .etablissement {
            border: 1px solid #ccc;
            background-color: #fff;
            margin: 10px auto;
            padding: 20px;
            border-radius: 5px;
            width: 80%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .etablissement h3 {
            margin: 0;
            color: #333;
        }
        .etablissement p {
            margin: 5px 0;
            color: #666;
        }
        .etablissement .services-button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .etablissement .services-button:hover {
            background-color: #0056b3;
        }
        .etablissement img {
            max-width: 150px;
            max-height: 150px;
            border-radius: 5px;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <h1>Liste des Salles de Sport</h1>
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

    // Préparation de la requête SQL pour récupérer les informations des salles de sport
    $sql = "SELECT nom, adresse, ville, email, numéros, image FROM établissement";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Affichage des informations de chaque salle de sport
        while ($row = $result->fetch_assoc()) {
            echo "<div class='etablissement'>";
            echo "<div>";
            echo "<h3>" . $row["nom"] . "</h3>";
            echo "<p><strong>Adresse:</strong> " . $row["adresse"] . "</p>";
            echo "<p><strong>Ville:</strong> " . $row["ville"] . "</p>";
            echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
            echo "<p><strong>Téléphone:</strong> " . $row["numéros"] . "</p>";
            echo "<a href='index3.php?salle=" . $row["nom"] . "' class='services-button'>Nos services</a>";
            echo "</div>";
            if (!empty($row["image"])) {
                echo "<img src='" . $row["image"] . "' alt='Image de " . $row["nom"] . "'>";
            }
            echo "</div>";
        }
    } else {
        echo "<p>Aucun établissement trouvé.</p>";
    }

    // Fermeture de la connexion
    $conn->close();
    ?>
</body>
</html>
