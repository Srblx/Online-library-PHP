<?php
require_once 'C:\Users\Serbe\OneDrive\Bureau\SimplonFormation\03_DevWeb\06_Formateurs\Samy\07_ExerciceMySQLBDD_Bibliotheque\composer\afficherPays.php';
Twig_Autoloader::register();


$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader);

// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');
    $pdo->query("SET NAMES 'utf8'");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('<p> Echec de connection. Erreur[' . $e->getCode() . '] : [' . $e->getMessage() . '<p>');
}