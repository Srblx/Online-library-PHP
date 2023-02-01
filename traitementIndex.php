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

    //& Requete 
    $req = "SELECT * FROM user WHERE mail = '$mail' AND mdp = '$mdp' ";
    $result = mysqli_query($connect, $req);

    // Vérifier si la requête a réussi
    if ($result) {
        // Récupérer les données de la requête
        $donnees = mysqli_fetch_array($result);
        print_r($donnees);

        //& Stockage des données nom prenom pour les recuperer sur d'autres page
        $name = $donnees[1];
        $lastname = $donnees[2];
        $_SESSION['nom'] = $name;
        $_SESSION['prenom'] = $lastname;
    } else {
        die("Erreur lors de l'exécution de la requête: " . mysqli_error($connect));
    }

    //& Compteur de ligne ayant rapport a la requete 
    $nbLine = mysqli_num_rows($result);
    if ($nbLine > 0) {
        header('location: acceuil.php');
    } else {
        echo '<style>h3{color:red;}</style><h3>Veuillez vous inscrire <a href="inscription.php">Ici</a></h3>';
    }
}
