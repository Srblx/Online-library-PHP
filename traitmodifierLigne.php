<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bibliotheque";
// Créer une connexion
$connect = mysqli_connect($servername, $username, $password, $dbname);
// Vérifier la connexion
if (!$connect) {
    die("Connexion échouée : " . mysqli_connect_error());
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


// // Mettre à jour les données dans la base de données
// $sql = "UPDATE livre SET isbn='$isbn', titre='$titre', theme='$theme', nombreDePage='$nbPage', format='$format', nomAuteur='$nomAuteur', prenomAuteur='$prenomAuteur', editeur='$editeur', anneeEdition='$anneeEdition', prix='$prix', langue='$langue' WHERE id=$id";
// $stmt = mysqli_prepare($connect, $sql);
// mysqli_stmt_bind_param($stmt, 'ssssssssiss', $isbn, $titre, $theme, $nbPage, $format, $nomAuteur, $prenomAuteur, $editeur, $anneeEdition, $prix, $langue);
// $result = mysqli_stmt_execute($stmt);

// if ($result) {
//     echo "Les informations du livre ont été mises à jour avec succès.";
// } else {
//     echo "Erreur lors de la mise à jour des informations : " . mysqli_error($connect);
// }
// if (mysqli_stmt_execute($stmt)) {
//     //& fonction header(location:) permet de renvoyer vers la page voulue apres submit du form
//     header('location: afficher.php');
// } else {
//     echo "Insertion  impossible veuiller réessayer ! <br>";
//     echo ' <a href="ajouter.php">Retourner au formulaire</a>';
// }
// Mettre à jour les données dans la base de données
$sql = "UPDATE livre SET isbn='$isbn', titre='$titre', theme='$theme', nombreDePage='$nbPage', format='$format', nomAuteur='$nomAuteur', prenomAuteur='$prenomAuteur', editeur='$editeur', anneeEdition='$anneeEdition', prix='$prix', langue='$langue' WHERE id=$id";
$result = mysqli_query($connect, $sql);

if ($result) {
    header('location: afficher.php');
} else {
    echo "Erreur lors de la mise à jour des informations : " . mysqli_error($connect);
}

// Fermer la connexion
mysqli_close($connect);
