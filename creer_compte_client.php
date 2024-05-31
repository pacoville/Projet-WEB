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
<body>
    <div id="header">
        <h1>
            <button class="button" data-text="Awesome">
                <span class="actual-text">&nbsp;Compte&nbsp;</span>
                <span aria-hidden="true" class="hover-text">&nbsp;Compte&nbsp;</span>  
            </button>
        </h1>
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
                    <input autocomplete="off" id="num_etudiant" placeholder="Numéro étudiant" class="input-field" name="num_etudiant" type="text">
                </div>
                <div class="field">
                    <svg class="input-icon" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                        <path d="M207.8 20.73c-93.45 18.32-168.7 93.66-187 187.1c-27.64 140.9 68.65 266.2 199.1 285.1c19.01 2.888 36.17-12.26 36.17-31.49l.0001-.6631c0-15.74-11.44-28.88-26.84-31.24c-84.35-12.98-149.2-86.13-149.2-174.2c0-102.9 88.61-185.5 193.4-175.4c91.54 8.869 158.6 91.25 158.6 183.2l0 16.16c0 22.09-17.94 40.05-40 40.05s-40.01-17.96-40.01-40.05v-120.1c0-8.847-7.161-16.02-16.01-16.02l-31.98 .0036c-7.299 0-13.2 4.992-15.12 11.68c-24.85-12.15-54.24-16.38-86.06-5.106c-38.75 13.73-68.12 48.91-73.72 89.64c-9.483 69.01 43.81 128 110.9 128c26.44 0 50.43-9.544 69.59-24.88c24 31.3 65.23 48.69 109.4 37.49C465.2 369.3 496 324.1 495.1 272.5c-1.399-139.3-127.3-243.8-271.3-222.2zM352.1 288.4c0 13.26-10.84 24.1-24.11 24.1c-13.27 0-24.11-10.84-24.11-24.1l0-15.1c0-13.26 10.84-24.1 24.11-24.1s24.11 10.84 24.11 24.1V288.4z"></path>
                    </svg>
                    <input autocomplete="off" id="email" placeholder="email" class="input-field" name="email" type="text">
                </div>
                <div class="field">
                    <svg class="input-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 11v-1c0-3.3-2.7-6-6-6S5 6.7 5 10v1H4v10h16V11h-3zm-8 0v-1c0-2.2 1.8-4 4-4s4 1.8 4 4v1H9zm9 9H6V12h12v8z"></path>
                    </svg>
                    <input autocomplete="off" id="mdp_hash" placeholder="Mot de passe" class="input-field" name="mdp_hash" type="password">
                </div>
                <div class="btn">
                    <button class="button2">
                        <span class="actual-text">&nbsp;Connexion&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Connexion&nbsp;</span>
                    </button>
                </div>
            </form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Récupérer les données du formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['addresse'];
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $numero = $_POST['numero'];
    $email = $_POST['email'];
    $mdp_hash = password_hash($_POST['mdp_hash'], PASSWORD_DEFAULT); // Hash du mot de passe
    $role = 'client'; // Définir le rôle
    // Récupérer les données du formulaire
    $num_etudiant = $_POST['num_etudiant'];

    // Préparer et exécuter la requête SQL pour ajouter l'utilisateur à la base de données
    $sql = "INSERT INTO utilisateur (prenom, nom, adresse, code_postal, ville, numero, email, mdp_hash, role)
            VALUES ('$prenom', '$nom', '$adresse', '$code_postal', '$ville', '$numero', '$email', '$mdp_hash', '$role')";

    if ($conn->query($sql) === TRUE) {
        // Récupérer l'ID de l'utilisateur inséré
        $utilisateur_id = $conn->insert_id;

        // Insérer l'utilisateur dans la table client
        $sql_client = "INSERT INTO client (utilisateur_id, num_etudiant) VALUES ('$utilisateur_id', '$num_etudiant')";
        if ($conn->query($sql_client) === TRUE) {
            echo "<div class='alert alert-success'>Nouvel utilisateur ajouté avec succès</div>";
        } else {
            echo "<div class='alert alert-danger'>Erreur: " . $sql_client . "<br>" . $conn->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Erreur: " . $sql . "<br>" . $conn->error . "</div>";
    }

    // Fermer la connexion
    $conn->close();
}
?>

        </div>
    </div>
</body>
</html>
