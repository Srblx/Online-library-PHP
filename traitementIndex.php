<?php
session_start();
if (isset($_POST['mail']) && isset($_POST['mdp'])) {

    //& Connection a la bdd
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $dbName = 'bibliotheque';
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];


    $connect = mysqli_connect($server, $user, $password, $dbName);

    // Requete 
    $req = "SELECT * FROM user WHERE mail = '$mail'";
    $result = mysqli_query($connect, $req);

    // Vérifier si la requête a réussi
    if ($result) {
        // Récupérer les données de la requête
        $donnees = mysqli_fetch_array($result);

        // Vérifier si le mot de passe entré correspond au mot de passe stocké
        if (password_verify($mdp, $donnees['mdp'])) {

            // Stockage des données nom prenom pour les récupérer sur d'autres pages
            $name = $donnees[1];
            $lastname = $donnees[2];
            $_SESSION['nom'] = $name;
            $_SESSION['prenom'] = $lastname;
            header('location: acceuil.php');
        } else {
            header('location: loginFail.php');
        }
    } else {
        die("Erreur lors de l'exécution de la requête: " . mysqli_error($connect));
    }
}