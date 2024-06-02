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

    // Récupération du terme de recherche du formulaire
    $search_term = $_POST["search_term"] ?? '';
     // Préparation et exécution de la requête SQL pour rechercher le coach par nom ou spécialité
    $requete = $dbh->prepare("SELECT * FROM Coach 
                              INNER JOIN Utilisateur ON Coach.utilisateur_id = Utilisateur.utilisateur_id 
                              WHERE Utilisateur.prenom = ? OR Coach.specialite = ?");
    $requete->bindParam(1, $search_term, PDO::PARAM_STR);
    $requete->bindParam(2, $search_term, PDO::PARAM_STR);
    $requete->execute();

    // Récupération des résultats de la recherche
    $coaches = $requete->fetchAll(PDO::FETCH_ASSOC);

    // Vérification s'il y a des résultats de recherche pour les coachs
    if ($coaches) {
        // Affichage des résultats de la recherche pour les coachs
        echo "<h2>Résultats de la recherche pour '" . htmlspecialchars($search_term) . "' :</h2>";
        foreach ($coaches as $coach) {
            echo "<p>Nom : " . htmlspecialchars($coach['nom']) . "</p>";
            echo "<p>Prénom : " . htmlspecialchars($coach['prenom']) . "</p>";
            echo "<p>Spécialité : " . htmlspecialchars($coach['specialite']) . "</p>";
            echo "<hr>";
        }
    } else {
        // Aucun résultat trouvé pour les coachs
        echo "<h2>Aucun coach trouvé pour la recherche'" . htmlspecialchars($search_term) . "'</h2>";
    }
    // Préparation et exécution de la requête SQL pour rechercher l'établissement par nom
    $requete = $dbh->prepare("SELECT * FROM établissement WHERE nom = ?");
    $requete->bindParam(1, $search_term, PDO::PARAM_STR);
    $requete->execute();

    // Récupération des résultats de la recherche pour les établissements
    $etablissements = $requete->fetchAll(PDO::FETCH_ASSOC);

    // Vérification s'il y a des résultats de recherche pour les établissements
    if ($etablissements) {
        // Affichage des résultats de la recherche pour les établissements
        echo "<h2>Résultats de la recherche pour l'établissement '" . htmlspecialchars($search_term) . "' :</h2>";
        foreach ($etablissements as $etablissement) {
            echo "<p>Nom : " . htmlspecialchars($etablissement['nom']) . "</p>";
            echo "<p>Adresse : " . htmlspecialchars($etablissement['adresse']) . "</p>";
            echo "<hr>";
        }
         } else {
        // Aucun résultat trouvé pour les établissements
        echo "<h2>Aucun résultat trouvé pour l'établissement '" . htmlspecialchars($search_term) . "'</h2>";
    }
}
?>

   

   


    
