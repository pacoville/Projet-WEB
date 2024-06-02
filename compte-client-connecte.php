<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur_id'])) {
    // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: compte-client.php");
    exit();
}
?>
