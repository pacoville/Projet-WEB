<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variables de connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "piscine";

    // Connexion à la base de données
    try {
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configuration du mode d'erreur PDO pour afficher les erreurs
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
    
    // Récupération des données du formulaire
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Préparation et exécution de la requête SQL pour récupérer l'utilisateur
    $requete = $dbh->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $requete->bindParam(1, $email, PDO::PARAM_STR);
    $requete->execute();

    // Récupération de l'utilisateur depuis la base de données
    $user = $requete->fetch(PDO::FETCH_ASSOC);

    // Vérification du mot de passe et du rôle
    if ($user && password_verify($password, $user['mdp_hash']) && $user['role'] == 'admin') {
        // Redirection vers la page d'accueil
        $_SESSION['utilisateur_id'] = $user['utilisateur_id'];
        $_SESSION['user_nom'] = $user['nom'];
        $_SESSION['user_prenom'] = $user['prenom'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_adresse'] = $user['adresse'];
        header("Location: compte-admin-connecte.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        // Identifiants incorrects ou rôle non autorisé : redirection vers la page de connexion avec un indicateur d'erreur
        header("Location: connexion.php?error=1");
        exit(); // Arrêt de l'exécution du script après la redirection
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>compte coach</title>
    <link href="images/logo.jpg" rel="icon" type="image/x-icon" />
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Bibliothèque jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Dernier JavaScript compilé -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .nav-item {
            position: relative; /* Ajouté pour permettre le positionnement absolu du menu déroulant */
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
            top: -175%; /* Positionné juste en dessous de l'élément parent */
            left: -1%; /* Positionné au milieu horizontalement */
            transform: translateX(0%); /* Centré horizontalement */
            background-color: #333; /* Mise à jour de la couleur de fond */
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .card {
            height: auto;
        }

        #navigation {
            position: absolute;
            bottom: 79px; /* Vous pouvez ajuster cette valeur selon vos besoins */
            width: 100%;
            /*désirée */
            z-index: 1000;
        }

        #footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: black; /* Mettez la couleur de fond désirée */
            text-align: center;
            padding: 10px 0;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <div id="header">
        <h1>
            <button class="button" data-text="Awesome">
                <span class="actual-text">&nbsp;Compte&nbsp;</span>
                <span aria-hidden="true" class="hover-text">&nbsp;Compte&nbsp;</span>  
            </button>
        </h1> 
    </div><br><br>
    <div class="form-container">  
        <div class="card">
            <h4 class="title">Connection to admin session</h4>
            <form method="POST">
                <div class="field">
                    <svg class="input-icon" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                        <path d="M207.8 20.73c-93.45 18.32-168.7 93.66-187 187.1c-27.64 140.9 68.65 266.2 199.1 285.1c19.01 2.888 36.17-12.26 36.17-31.49l.0001-.6631c0-15.74-11.44-28.88-26.84-31.24c-84.35-12.98-149.2-86.13-149.2-174.2c0-102.9 88.61-185.5 193.4-175.4c91.54 8.869 158.6 91.25 158.6 183.2l0 16.16c0 22.09-17.94 40.05-40 40.05s-40.01-17.96-40.01-40.05v-120.1c0-8.847-7.161-16.02-16.01-16.02l-31.98 .0036c-7.299 0-13.2 4.992-15.12 11.68c-24.85-12.15-54.24-16.38-86.06-5.106c-38.75 13.73-68.12 48.91-73.72 89.64c-9.483 69.01 43.81 128 110.9 128c26.44 0 50.43-9.544 69.59-24.88c24 31.3 65.23 48.69 109.4 37.49C465.2 369.3 496 324.1 495.1 277.2V256.3C495.1 107.1 361.2-9.332 207.8 20.73zM239.1 304.3c-26.47 0-48-21.56-48-48.05s21.53-48.05 48-48.05s48 21.56 48 48.05S266.5 304.3 239.1 304.3z"></path>
                    </svg>
                    <input autocomplete="off" id="email" placeholder="email" class="input-field" name="email" type="email">
                </div>
                <div class="field">
                    <svg class="input-icon" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                        <path d="M80 192V144C80 64.47 144.5 0 224 0C303.5 0 368 64.47 368 144V192H384C419.3 192 448 220.7 448 256V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V256C0 220.7 28.65 192 64 192H80zM144 192H304V144C304 99.82 268.2 64 224 64C179.8 64 144 99.82 144 144V192z"></path>
                    </svg>
                    <input autocomplete="off" id="password" placeholder="password" class="input-field" name="password" type="password">
                </div>
                <button class="btn" type="submit">Login</button>
            </form>
        </div>      
    </div><br><br>
    <div id="navigation">
        <div class="logo">
            <a href="compte-admin.php">
                <img src="images/logo.jpg" alt="Sportify Logo" width="75" height="75">
            </a>
        </div>
        <div class="nav-item">
            <a href="accueil.html">
                <h3>
                    <button class="button" data-text="Awesome">
                        <span class="actual-text">&nbsp;Accueil&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Accueil&nbsp;</span>  
                    </button>
                </h3>
            </a>
        </div> 
        <div class="nav-item">
            <a href="compte-admin.php">
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
            <a href="compte-admin.php">
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
