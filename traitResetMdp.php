<?php

// Connexion à la base de données
$db = mysqli_connect("localhost", "root", "", "bibliotheque");

// Récupération des données envoyées via le formulaire
$email = $_POST["mail"];
$newPassword = $_POST["newMdp"];
$confirmPassword = $_POST["ConfNewMdp"];

// Vérification que les mots de passe sont identiques
if ($newPassword !== $confirmPassword) {
    // Redirection vers la page d'erreur de réinitialisation du mot de passe
    die('Les mot de passe ne corresponde pas !');
}

// Préparation de la requête SQL pour récupérer l'utilisateur correspondant à l'adresse e-mail
$stmt = $db->prepare("SELECT * FROM user WHERE mail = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Vérification que l'utilisateur existe
if ($result->num_rows > 0) {
    // Récupération de l'utilisateur correspondant à l'adresse e-mail
    $user = $result->fetch_assoc();

    // Préparation de la requête SQL pour mettre à jour le mot de passe de l'utilisateur
    $stmt = $db->prepare("UPDATE user SET mdp = ? WHERE id = ?");
    $stmt->bind_param("si", $newPassword, $user["id"]);
    $stmt->execute();
    // Redirection vers la page index.php
    header("Location: index.php?passwordUpdated=1");
    exit;
}
