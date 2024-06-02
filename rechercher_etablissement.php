<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variables de connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pisc";
