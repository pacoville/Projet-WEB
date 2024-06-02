<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variables de connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pisc";
    
    // Connexion à la base de données
    try {
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configuration du mode d'erreur PDO pour afficher les erreurs
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
    
    // Récupération du terme de recherche du formulaire
    $search_etablissement = trim($_POST["search_etablissement"]);
    // Préparation et exécution de la requête SQL pour rechercher l'établissement par nom (insensible à la casse)
    $requete = $dbh->prepare("SELECT * FROM établissement WHERE LOWER(nom) = LOWER(?)");
    $requete->bindParam(1, $search_etablissement, PDO::PARAM_STR);
    $requete->execute();

    
    // Récupération des résultats de la recherche
    $etablissements = $requete->fetchAll(PDO::FETCH_ASSOC);
      // Vérification s'il y a des résultats de recherche
    if ($etablissements) {
        // Affichage des résultats de la recherche
        echo "<h2>Résultats de la recherche pour l'établissement '" . htmlspecialchars($search_etablissement) . "' :</h2>";
        foreach ($etablissements as $etablissement) {
            echo "<p>Nom : " . htmlspecialchars($etablissement['nom']) . "</p>";
            echo "<p>Adresse : " . htmlspecialchars($etablissement['adresse']) . "</p>";
            echo "<hr>";
        }
    

  

    



