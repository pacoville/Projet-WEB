<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil - Salle de Sport</title>
    <link rel="stylesheet" href="index3.css">
    <link href="logo.jpg" rel="icon" type="image/x-icon" />
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Bibliothèque jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Dernier JavaScript compilé -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .dropdown-menu {
            display: none;
            position: absolute;
            top: -170%; /* Positionné juste en dessous de l'élément parent */
            left: -1%; /* Positionné au milieu horizontalement */
            transform: translateX(0%); /* Centré horizontalement */
            background-color: #333; /* Mise à jour de la couleur de fond */
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }

        body{
            background-color: #f4f4f4;
;
        }
    </style>
</head>
<body>
    <div id ="header">
        <h1>
            <button class="button" data-text="Awesome">
                <span class="actual-text">&nbsp;Salle&nbsp;</span>
                <span aria-hidden="true" class="hover-text">&nbsp;Salle&nbsp;</span>  
            </button>
        </h1>
    </div>
    <nav>
        <ul>
            <li><a href="#services">Services Disponibles</a></li>
            <li><a href="#contacts">Coordonnées</a></li>
        </ul>
    </nav>
    <section id="services">
        <h2>Services Disponibles</h2>
        <div class="service">
            <h3>Règles sur l'utilisation des machines</h3>
            <p>Découvrez les règles essentielles à respecter lors de l'utilisation des machines dans notre salle de sport.</p>
            <a href="reglement.html" class="btn">En savoir plus</a>
        </div>
        <div class="service">
            <h3>Horaire de la gym</h3>
            <p>Consultez nos horaires d'ouverture et planifiez votre séance d'entraînement.</p>
            <a href="horaires_gym.html" class="btn">Consulter</a>
        </div>
        <div class="service">
            <h3>Questionnaires pour nouveaux utilisateurs</h3>
            <p>Accédez aux questionnaires pour les nouveaux utilisateurs de notre salle de sport.</p>
            <a href="questionnaires.html" class="btn">Répondre</a>
        </div>
        <!-- Ajoutez d'autres services disponibles selon vos besoins -->
    </section>
    <section id="contacts">
        <h2>Coordonnées</h2>
        <div class="contact-info">
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

    // Récupérer le nom de la salle à partir de l'URL
    if(isset($_GET['salle'])) {
        $salle = $_GET['salle'];
        
        // Préparation de la requête SQL pour récupérer les informations de la salle spécifique
        $sql = "SELECT responsable, email, numéros FROM établissement WHERE nom = '$salle'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Affichage des informations de la salle spécifique
            $row = $result->fetch_assoc();
            echo "<div class='salle-info'>";
            echo "<h2>" . $row["responsable"] . "</h2>";
            echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
            echo "<p><strong>Téléphone:</strong> " . $row["numéros"] . "</p>";
            echo "</div>";
        } else {
            echo "<p>Aucune information trouvée pour cette salle.</p>";
        }
    } else {
        echo "<p>Aucune salle sélectionnée.</p>";
    }

    // Fermeture de la connexion
    $conn->close();
    ?>
        </div>
        <!-- Ajoutez d'autres coordonnées de responsables selon vos besoins -->
    </section>
    <div id="navigation">
        <div class="logo">
            <a href="index3.html">
                <img src="logo.jpg" alt="Sportify Logo" width="75" height="75">
            </a>
        </div>
        <div class="nav-item">
            <a href="accueil.php">
                <h3>
                    <button class="button" data-text="Awesome">
                        <span class="actual-text">&nbsp;Accueil&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Accueil&nbsp;</span>  
                    </button>
                </h3>
            </a>
        </div> 
        <div class="nav-item">
            <a href="index2.html">
                <h3>
                    <button class="button" data-text="Awesome">
                        <span class="actual-text">&nbsp;Parcourir&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Parcourir&nbsp;</span>  
                    </button>
                </h3>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="index.html"> Les Activités sportives</a>
                <a class="dropdown-item" href="index2.html"> Les Sports de compétition</a>
                <a class="dropdown-item" href="salle_de_sport.php">Salle de sport Omnes</a>
            </div>
        </div> 
        <div class="nav-item">
            <a href="rechercher.html">
                <h3>
                    <button class="button" data-text="Awesome">
                        <span class="actual-text">&nbsp;Recherche&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Recherche&nbsp;</span>  
                    </button>
                </h3>
            </a>
        </div> 
        <div class="nav-item">
            <a href="#">
                <h3>
                    <button class="button" data-text="Awesome">
                        <span class="actual-text">&nbsp;Réservation&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Réservation&nbsp;</span>  
                    </button>
                </h3>
            </a>
        </div> 
        <div class="nav-item">
            <a href="index2.html">
                <h3>
                    <button class="button" data-text="Awesome">
                        <span class="actual-text">&nbsp;Compte&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Compte&nbsp;</span>  
                    </button>
                </h3>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="compte-client.php"> Compte client</a>
                <a class="dropdown-item" href="compte-coach.php"> Compte coach</a>
                <a class="dropdown-item" href="compte-admin.php"> Compte administrateur</a>

            </div>
        </div> 
    </div>
    <div id="footer">
        <table>
            <tr>
                <td>
                    <p>Copyright &copy; 2024 Sportify</p>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="mailto:sportify@gmail.com">sportify@gmail.com</a>
                    <p>0139287600</p>
                    <a href="https://www.google.fr/maps/place/15+Rue+de+Grenelle,+75007+Paris/@48.8531959,2.3259779,17z/data=!3m1!4b1!4m6!3m5!1s0x47e671d6973ba029:0xa5580f220b251923!8m2!3d48.8531924!4d2.3285528!16s%2Fg%2F11csmgr_yq?entry=ttu">15 Rue de Grenelle 75015 PARIS</p>
                </td>
            </tr>
        </table> 
    </div>
</body>
</html>
