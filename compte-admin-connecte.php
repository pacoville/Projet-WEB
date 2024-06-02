<?php
session_start();

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piscine";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Fonction pour ajouter un utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['prenom'])) {
    // Récupérer les données du formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['addresse']; // Il semble y avoir une erreur de frappe ici, il devrait s'agir de 'adresse'
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $numero = $_POST['numero'];
    $email = $_POST['email'];
    $mdp_hash = password_hash($_POST['mdp_hash'], PASSWORD_DEFAULT); // Hash du mot de passe
    $role = 'coach'; // Définir le rôle

    // Récupérer les données supplémentaires du formulaire pour la table des coachs
    $specialite = $_POST['specialite'];
    $photo = $_POST['photo'];
    $video = $_POST['video'];
    $cv = $_POST['cv'];

    // Préparer et exécuter la requête SQL pour ajouter l'utilisateur à la base de données
    $sql = "INSERT INTO utilisateur (prenom, nom, adresse, code_postal, ville, numero, email, mdp_hash, role)
            VALUES ('$prenom', '$nom', '$adresse', '$code_postal', '$ville', '$numero', '$email', '$mdp_hash', '$role')";

    if ($conn->query($sql) === TRUE) {
        // Récupérer l'ID de l'utilisateur inséré
        $utilisateur_id = $conn->insert_id;

        // Insérer l'utilisateur dans la table des coachs
        $coach = "INSERT INTO coach (utilisateur_id, specialite, photo, video, cv) VALUES ('$utilisateur_id', '$specialite', '$photo', '$video', '$cv')";
        if ($conn->query($coach) === TRUE) {
            echo "<div class='alert alert-success'>Nouvel utilisateur ajouté avec succès</div>";
        } else {
            echo "<div class='alert alert-danger'>Erreur: " . $coach . "<br>" . $conn->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Erreur: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Fonction pour supprimer un utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_email'])) {
    // Récupérer les données du formulaire de suppression
    $delete_email = $_POST['delete_email'];
    $delete_numero = $_POST['delete_numero'];
    $delete_mdp = $_POST['delete_mdp'];

    // Vérifier l'utilisateur et son mot de passe
    $sql = "SELECT utilisateur_id, mdp_hash FROM utilisateur WHERE email='$delete_email' AND numero='$delete_numero'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($delete_mdp, $row['mdp_hash'])) {
            $utilisateur_id = $row['utilisateur_id'];
            // Supprimer l'utilisateur de la table des coachs
            $delete_coach = "DELETE FROM coach WHERE utilisateur_id='$utilisateur_id'";
            $conn->query($delete_coach);

            // Supprimer l'utilisateur de la table utilisateur
            $delete_user = "DELETE FROM utilisateur WHERE utilisateur_id='$utilisateur_id'";
            if ($conn->query($delete_user) === TRUE) {
                echo "<div class='alert alert-success'>Utilisateur supprimé avec succès</div>";
            } else {
                echo "<div class='alert alert-danger'>Erreur lors de la suppression de l'utilisateur: " . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Mot de passe incorrect</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Utilisateur non trouvé</div>";
    }
}

// Fermer la connexion
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="style.css">
    <link href="images/logo.jpg" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Bibliothèque jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Dernier JavaScript compilé -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>Compte admin</title>
    <style>
        body {
            background-color: #f4f4f4;
        }

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
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .card {
            height: auto;
        }
        
        #navigation {
            position: absolute;
            bottom: -422px;
            width: 100%;
            z-index: 1000;
        }

        #footer {
            position: absolute;
            bottom: -500px;
            width: 100%;
            background-color: black;
            text-align: center;
            padding: 10px 0;
            z-index: 1000;
        }

        .presentation {
            border: 2px solid black;
            margin-top: 15px;
            width: 95%;
            margin-left: 2.5%;
        }

        .presentation h1 {
            text-align: center;
            text-decoration: underline;
        }

        .presentation p {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div id="header">
        <h1>
            <button class="button" data-text="Awesome">
                <span class="actual-text">&nbsp;Administrateur&nbsp;</span>
                <span aria-hidden="true" class="hover-text">&nbsp;Administrateur&nbsp;</span>
            </button>
        </h1>
    </div>
    <div class="presentation">
        <h1>Bienvenue sur votre espace administrateur</h1>
        <p>Prénom: <?php echo htmlspecialchars($_SESSION['user_prenom']); ?></p>
        <p>Nom: <?php echo htmlspecialchars($_SESSION['user_nom']); ?></p>
        <p>Email: <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
        <p>Adresse: <?php echo htmlspecialchars($_SESSION['user_adresse']); ?></p>
    </div>
    <div class="form-container">
        <div class="card">
            <h4 class="title">Créer un compte</h4>
            <form method="POST">
                <div class="field">
                    <input autocomplete="off" id="prenom" placeholder="prenom" class="input-field" name="prenom" type="text">
                </div>
                <div class="field">
                    <input autocomplete="off" id="nom" placeholder="nom" class="input-field" name="nom" type="text">
                </div>
                <div class="field">
                    <input autocomplete="off" id="addresse" placeholder="addresse" class="input-field" name="addresse" type="text">
                </div>
                <div class="field">
                    <input autocomplete="off" id="code_postal" placeholder="code_postal" class="input-field" name="code_postal" type="text">
                </div>
                <div class="field">
                    <input autocomplete="off" id="ville" placeholder="ville" class="input-field" name="ville" type="text">
                </div>
                <div class="field">
                    <input autocomplete="off" id="numero" placeholder="numero" class="input-field" name="numero" type="text">
                </div>
                <div class="field">
                    <input autocomplete="off" id="specialite" placeholder="specialite" class="input-field" name="specialite" type="text">
                </div>
                <div class="field">
                    <input autocomplete="off" id="photo" placeholder="photo" class="input-field" name="photo" type="text">
                </div>
                <div class="field">
                    <input autocomplete="off" id="video" placeholder="video" class="input-field" name="video" type="text">
                </div>
                <div class="field">
                    <input autocomplete="off" id="cv" placeholder="cv" class="input-field" name="cv" type="text">
                </div>
                <div class="field">
                    <input autocomplete="off" id="email" placeholder="email" class="input-field" name="email" type="email">
                </div>
                <div class="field">
                    <input autocomplete="off" id="mdp_hash" placeholder="mot de passe" class="input-field" name="mdp_hash" type="password">
                </div>
                <div class="field">
                    <button class="btn" type="submit">Valider</button>
                </div>
            </form>
        </div>
        <div class="card">
            <h4 class="title">Supprimer un compte</h4>
            <form method="POST">
                <div class="field">
                    <input autocomplete="off" id="delete_email" placeholder="Email" class="input-field" name="delete_email" type="email">
                </div>
                <div class="field">
                    <input autocomplete="off" id="delete_numero" placeholder="Numéro" class="input-field" name="delete_numero" type="text">
                </div>
                <div class="field">
                    <input autocomplete="off" id="delete_mdp" placeholder="Mot de passe" class="input-field" name="delete_mdp" type="password">
                </div>
                <div class="field">
                    <button class="btn" type="submit">Valider</button>
                </div>
            </form>
        </div>
    </div>
    <div id="navigation">
        <div class="logo">
            <a href="compte-coach-connecte.php">
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
