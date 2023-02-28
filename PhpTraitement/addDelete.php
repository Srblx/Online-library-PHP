<?php

try {
    $connect = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');
    $connect->query("SET NAMES 'utf8'");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('<p> Echec de connection. Erreur[' . $e->getCode() . '] : [' . $e->getMessage() . '<p>');
}

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
    $result = $connect->query($sql);
    if ($result) {

        header('location: ../views/afficher.php');
    } else {
        echo "Erreur lors de la mise à jour des informations : " . $stmt->errorInfo()[2];
    }
}
//~ Cloture de la connexion a la base de données 
// mysqli_close($connect);
