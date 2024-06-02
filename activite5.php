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
    $specialite = "Cours Collectif";

    // Préparation de la requête SQL pour récupérer les informations du coach
    $sql = "SELECT u.prenom, u.nom, u.numero, u.email, c.photo, c.cv 
            FROM coach c 
            JOIN utilisateur u ON c.utilisateur_id = u.utilisateur_id 
            WHERE c.specialite = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $specialite);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $prenom = $row["prenom"];
        $nom = $row["nom"];
        $numero = $row["numero"];
        $email = $row["email"];
        $photo = $row["photo"];
        $cv = $row["cv"];

        // Affichage des informations
        echo "<div class='coach-info'>";
        echo "<div class='coach-header'>";
        echo "<img src='$photo' alt='Photo du coach' class='coach-photo'>";
        echo "<h2 class='coach-name'>$prenom $nom</h2>";
        echo "<p class='coach-contact'>Numéro: $numero</p>";
        echo "<p class='coach-contact'>Email: $email</p>";
        echo "<p class='coach-speciality'>Spécialité: $specialite</p>";
        echo "</div>";
        echo "<div class='coach-actions'>";
        echo "<a href='#' class='action-button green'>Prendre un RDV</a>";
        echo "<a href='#' class='action-button'>Communiquer avec le coach</a>";
        echo "<button id='show-cv' class='action-button'>Voir son CV</button>";
        echo "</div>";
        echo "</div>";

        // Affichage conditionnel du CV
        echo "<div id='cv-content' class='cv-content'>";
        if (file_exists($cv)) {
            $xml = simplexml_load_file($cv);
            echo "<h3>Curriculum Vitae</h3>";

            // Afficher les informations du CV
            echo "<p><strong>Prénom:</strong> " . $xml->prenom . "</p>";
            echo "<p><strong>Nom:</strong> " . $xml->nom . "</p>";
            echo "<p><strong>Email:</strong> " . $xml->email . "</p>";
            echo "<p><strong>Téléphone:</strong> " . $xml->telephone . "</p>";

            // Expérience
            echo "<h4>Expérience</h4>";
            foreach ($xml->experience->poste as $poste) {
                echo "<p><strong>Poste:</strong> " . $poste->titre . "</p>";
                echo "<p><strong>Club:</strong> " . $poste->club . "</p>";
                echo "<p><strong>Durée:</strong> " . $poste->duree . "</p>";
                echo "<hr>";
            }

            // Compétences
            echo "<h4>Compétences</h4>";
            foreach ($xml->competences->competence as $competence) {
                echo "<p>" . $competence . "</p>";
            }

            // Formation
            echo "<h4>Formation</h4>";
            echo "<p><strong>Diplôme:</strong> " . $xml->formation->diplome . "</p>";
            echo "<p><strong>Établissement:</strong> " . $xml->formation->etablissement . "</p>";
            echo "<p><strong>Année:</strong> " . $xml->formation->annee . "</p>";

            echo "</div>";
        } else {
            echo "<p>Le fichier CV n'a pas pu être trouvé.</p>";
        }
        echo "</div>";
    } else {
        echo "Aucun coach trouvé pour cette spécialité.";
    }
    $stmt->close();

    // Fermeture de la connexion
    $conn->close();
    ?>
    <script>
        document.getElementById('show-cv').addEventListener('click', function() {
            var cvContent = document.getElementById('cv-content');
            if (cvContent.style.display === 'none' || cvContent.style.display === '') {
                cvContent.style.display = 'block';
            } else {
                cvContent.style.display = 'none';
            }
        });
    </script>
</body>
</html>
