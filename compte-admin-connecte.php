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
