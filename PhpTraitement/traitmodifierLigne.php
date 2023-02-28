<?php
session_start();

// Créer une connexion
try {
    $connect = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');
    $connect->query("SET NAMES 'utf8'");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('<p> Echec de connection. Erreur[' . $e->getCode() . '] : [' . $e->getMessage() . '<p>');
}

// Récupérer les données du formulaire
$id = $_GET['id'];
$isbn = $_POST['isbn'];
$titre = $_POST['titre'];
$theme = $_POST['theme'];
$nbPage = $_POST['nbPage'];
$format = $_POST['format'];
$nomAuteur = $_POST['nomAuteur'];
$prenomAuteur = $_POST['prenomAuteur'];
$editeur = $_POST['editeur'];
$anneeEdition = $_POST['anneeEdition'];
$prix = $_POST['prix'];
$langue = $_POST['langue'];

// Mettre à jour les données dans la base de données
$sql = "UPDATE livre SET isbn=:isbn, titre=:titre, theme=:theme, nombreDePage=:nbPage, format=:format, nomAuteur=:nomAuteur, prenomAuteur=:prenomAuteur, editeur=:editeur, anneeEdition=:anneeEdition, prix=:prix, langue=:langue WHERE id=:id";
$stmt = $connect->prepare($sql);
$stmt->bindParam(':isbn', $isbn);
$stmt->bindParam(':titre', $titre);
$stmt->bindParam(':theme', $theme);
$stmt->bindParam(':nbPage', $nbPage);
$stmt->bindParam(':format', $format);
$stmt->bindParam(':nomAuteur', $nomAuteur);
$stmt->bindParam(':prenomAuteur', $prenomAuteur);
$stmt->bindParam(':editeur', $editeur);
$stmt->bindParam(':anneeEdition', $anneeEdition);
$stmt->bindParam(':prix', $prix);
$stmt->bindParam(':langue', $langue);
$stmt->bindParam(':id', $id);
$result = $stmt->execute();

if ($result) {
    echo "<script type=text/javascript>";
    echo "alert('Etes vous sur de vouloir modifier cette ligne ? ')</script>";
    header('location: ../views/afficher.php');
} else {
    echo "Erreur lors de la mise à jour des informations : " . $stmt->errorInfo()[2];
}
