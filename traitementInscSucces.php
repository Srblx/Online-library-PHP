<?php
session_start();
if (isset($_POST['mail']) && isset($_POST['mdp'])) {

    // Connexion à la base de données
    try {
        $connect = new PDO('mysql:host=localhost;dbname=bibliotheque','root', '');
        $connect->query("SET NAMES 'utf8'");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('<p> Echec de connection. Erreur['.$e->getCode().'] : ['.$e->getMessage().'<p>');
    }

    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    // Requête
    $req = "SELECT * FROM user WHERE mail = :mail";
    $stmt = $connect->prepare($req);
    $stmt->bindParam(':mail', $mail);
    $stmt->execute();
    $donnees = $stmt->fetch();

    // Vérification de la requête
    if ($donnees) {
        // Vérification du mot de passe
        if (password_verify($mdp, $donnees['mdp'])) {
            // Stockage des données nom prenom pour les récupérer sur d'autres pages
            $name = $donnees[1];
            $lastname = $donnees[2];
            $admin = $donnees[5];
            $_SESSION['nom'] = $name;
            $_SESSION['prenom'] = $lastname;
            $_SESSION['role'] = $admin;
            header('location: slideAcceuil.php');
        } else {
            header('location: loginFail.php');
        }
    } else {
        echo "Erreur lors de l'exécution de la requête: ";
        print_r($stmt->errorInfo());
    }
} else {
    header('location: loginFail.php');
}
?>