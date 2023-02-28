<?php
session_start();
//& Connection a la bdd
require '../config.php';

//& Vérifier que toutes les données requises sont entrées correctement
if (empty($_POST['mail']) || empty($_POST['mdp'])) {
    echo "<script type=text/javascript>";
    echo "alert('Veuillez entrer toutes les données requises')</script>";;
    header('location : inscription.php');
    exit();
}

// Préparer la requête
$stmt = $connect->prepare("INSERT INTO user (nom, prenom, mail, mdp, est_administrateur) VALUES (?, ?, ?, ?, ?)");

// Vérifier si la préparation de la requête a réussi
if (!$stmt) {
    echo "Erreur lors de la mise à jour des informations : " . $stmt->errorInfo()[2];
}

// Lier les variables aux marqueurs
$role = validate_input($_POST['role']);
$firstName = validate_input($_POST['firstName']);
$lastName = validate_input($_POST['lastName']);
$mail = validate_input($_POST['mail']);
$mdp = validate_input($_POST['mdp']);
$mdp2 = validate_input($_POST['mdp2']);

// Déterminer la valeur de $est_administrateur en fonction de la valeur de $role
switch ($role) {
    case 'user':
        $est_administrateur = 0;
        break;
    case 'admin':
        $est_administrateur = 1;
        break;
    default:
        die("Valeur de rôle invalide");
}

// Comparer les mots de passe
if ($mdp == $mdp2) {
    // echo "Les mot de passe sont identique";
} else {
    die("les mot de passe ne corresponde pas ");
}

// hachage d'un nouveau mot de passe pour un nouvel utilisateur
$hashed_password = password_hash($mdp, PASSWORD_DEFAULT);

// plus tard, lorsque l'utilisateur voudra se connecter
$entered_password = validate_input($_POST['mdp']);

// vérifie si le mot de passe saisi correspond au hachage stocké
if (password_verify($entered_password, $hashed_password)) {
    echo 'Password is correct!';
} else {
    echo 'Le mot de passe est incorrect!';
}

// vérifie si le hachage stocké a besoin d'être rehaussé
if (password_needs_rehash($hashed_password, PASSWORD_DEFAULT)) {
    $new_hashed_password = password_hash($mdp, PASSWORD_DEFAULT);
    // mise à jour du hash dans la base de données
}

// Vérifier si l'adresse e-mail existe déjà dans la base de données
$request = "SELECT * FROM user WHERE mail='$mail'";
$resultat = $connect->query($request);

if ($resultat->rowCount() > 0) {
    die("<h1 >Cette adresse e-mail est déjà utilisée.<h1> " . "<br>" . '<a href="index.php">RETOUR A L\'ACCUEIL</a>');
}
// 


// Lier des variables à une déclaration préparée en tant que paramètres
$stmt->bindParam(1, $firstName);
$stmt->bindParam(2, $lastName);
$stmt->bindParam(3, $mail);
$stmt->bindParam(4, $hashed_password);
$stmt->bindParam(5, $est_administrateur);

//~ Exécuter la requête
if ($stmt->execute()) {
    //& fonction header(location:) permet de renvoyer vers la page voulue apres submit du form
    header('location: ../loginSucces.php');
} else {
    echo "Insertion impossible veuillez réessayer ! <br>";
    echo '<a href="ajouter.php">Retourner au formulaire</a>';
}


function validate_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
