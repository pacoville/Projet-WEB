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
<body>
    <div id ="header">
        <h1>
            <button class="button" data-text="Awesome">
                <span class="actual-text">&nbsp;Client&nbsp;</span>
                <span aria-hidden="true" class="hover-text">&nbsp;Client&nbsp;</span>  
            </button>
        </h1>
    </div> 
    <div class="presentation">
        <h1>Bienvenue sur votre espace client</h1>
        <p>Prénom: <?php echo htmlspecialchars($_SESSION['user_prenom']); ?></p>
        <p>Nom: <?php echo htmlspecialchars($_SESSION['user_nom']); ?></p>
        <p>Email: <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
        <p>Adresse: <?php echo htmlspecialchars($_SESSION['user_adresse']); ?></p>
    </div>
    <div id="navigation">
        <div class="logo">
            <a href="compte-client-connecte.php">
                <img src="images/logo.jpg" alt="Sportify Logo" width="75" height="75">
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
            <a href="index.html">
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
                <a class="dropdown-item" href="index3.html">Salle de sport Omnes</a>
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
            <a href="index.html">
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
