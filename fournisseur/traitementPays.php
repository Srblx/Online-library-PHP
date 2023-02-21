<?php
require_once 'vendor/autoload.php';
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

// Récupération des données de la base de données
if (isset($_POST['pays'])) {
    $query = 'SELECT * FROM fournisseurs WHERE pays = :pays';
    $statement = $pdo->prepare($query);
    $statement->bindParam(':pays', $_POST['pays']);
    $statement->execute();
    $resultats = $statement->fetchAll(PDO::FETCH_ASSOC);
} else {
    $resultats = null;
}

var_dump(class_exists('Twig_Autoloader'));
// Affichage du template
echo $twig->render('fournisseur.twig', ['resultats' => $resultats]);