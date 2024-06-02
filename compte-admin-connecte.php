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
