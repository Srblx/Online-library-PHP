<?php
session_start();

// Créer une connexion
try {
    $connect = new PDO('mysql:host=localhost;dbname=bibliotheque','root', '');
    $connect->query("SET NAMES 'utf8'");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('<p> Echec de connection. Erreur['.$e->getCode().'] : ['.$e->getMessage().'<p>');
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
$sql = "UPDATE livre SET isbn='$isbn', titre='$titre', theme='$theme', nombreDePage='$nbPage', format='$format', nomAuteur='$nomAuteur', prenomAuteur='$prenomAuteur', editeur='$editeur', anneeEdition='$anneeEdition', prix='$prix', langue='$langue' WHERE id=$id";
$result = $connect->query($sql);

if ($result) {
    echo "<script type=text/javascript>";
    echo "alert('Etes vous sur de vouloir supprimer cette ligne ? ')</script>";
    header('location: afficher.php');
} else {
    echo "Erreur lors de la mise à jour des informations : " . $stmt->errorInfo()[2];
}

// Fermer la connexion
// mysqli_close($connect);
