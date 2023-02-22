<?php
session_start();
if (isset($_POST['mail']) && isset($_POST['mdp'])) {

    //& Connection a la bdd
    try {
        $connect = new PDO('mysql:host=localhost;dbname=bibliotheque','root', '');
        $connect->query("SET NAMES 'utf8'");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('<p> Echec de connection. Erreur['.$e->getCode().'] : ['.$e->getMessage().'<p>');
    }

    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    
    // Requete 
    $req = "SELECT * FROM user WHERE mail = :mail";
    $stmt = $connect->prepare($req);
    $stmt->bindParam(':mail', $mail);
    $stmt->execute();
    $donnees = $stmt->fetch();
    // Vérifier si la requête a réussi
    if ($donnees) {
        // Vérifier si le mot de passe entré correspond au mot de passe stocké
        if (password_verify($mdp, $donnees['mdp'])) {
            // Stockage des données nom prenom pour les récupérer sur d'autres pages
            $name = $donnees[1];
            $lastname = $donnees[2];
            $admin = $donnees[5];
            $_SESSION['nom'] = $name;
            $_SESSION['prenom'] = $lastname;
            $_SESSION['role'] = $admin;
            header('location: acceuil.php');
        } else {
            header('location: loginFail.php');
        }
    } else {
        die("Erreur lors de l'exécution de la requête: " . $stmt->errorInfo()[2]);
    }
} else {
    header('location: loginFail.php');
}