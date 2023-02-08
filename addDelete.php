<?php

$connect = mysqli_connect('localhost', 'root', '', 'bibliotheque');

// $req = "UPDATE `livre` SET isbn , titre, theme, nombreDePage, format, nomAuteur, prenomAuteur, editeur , anneeEdition, prix, langue WHERE
// id 12";
// $result = mysqli_query($connect, $req);
$id = $_GET['id'];
if (!$connect) {
    //~ Si la connexion echoue
    echo "<script type=text/javascript>";
    echo "alert('Connexion impossible a la base de données')</script>";
} else {
    //& Ajouter les requêtes SQL pour modifier et supprimer
    // Récupérer l'ID de la ligne à partir du paramètre d'URL

    $sql = "DELETE FROM livre WHERE  id = $id";
    //$result = mysqli_query($connect, $sql);
    $result = mysqli_query($connect, $sql);
    if ($result) {

        header('location: afficher.php');
    } else {
        echo "Erreur lors de la suppression : " . mysqli_error($conn);
    }
}
//~ Cloture de la connexion a la base de données 
mysqli_close($connect);
