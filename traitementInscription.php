<?php
//~ Connexion a ma base de données bibliothèque
//&Fonction de connexion mysqli_connect(4 parametres pour effectuer la connexion )
$conect = mysqli_connect('localhost', 'root', '', 'bibliotheque');

if (!$conect) {
    //~ Si la connexion echoue
    echo "<script type=text/javascript>";
    echo "alert('Connexion impossible a la base de données')</script>";
}

// //& Vérifier que toutes les données requises sont entrées correctement
// if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['mail']) || empty($_POST['mdp'])) {
//     echo "<script type=text/javascript>";
//     echo "alert('Veuillez entrer toutes les données requises')</script>";;
//     header('location : inscription.php');
//     exit();
// }

// Préparer la requête
$stmt = mysqli_prepare($conect, "INSERT INTO user (nom,prenom,mail,mdp) VALUES (?,?,?,?)");

// Vérifier si la préparation de la requête a réussi
if (!$stmt) {
    die("Erreur lors de la préparation de la requête: " . mysqli_error($conect));
}

// Lier les variables aux marqueurs
$firstName = validate_input($_POST['firstName']);
$lastName = validate_input($_POST['lastName']);
$mail = validate_input($_POST['mail']);
$mdp = validate_input($_POST['mdp']);
mysqli_stmt_bind_param($stmt, "ssss", $firstName, $lastName, $mail, $mdp);

// Vérifier si la liaison des variables a réussi
if (!mysqli_stmt_bind_param($stmt, "ssss", $firstName, $lastName, $mail, $mdp)) {
    die("Erreur lors de la liaison des variables: " . mysqli_stmt_error($stmt));
}
//~ Exécuter la requête
$result;




if (mysqli_stmt_execute($stmt)) {
    //& fonction header(location:) permet de renvoyer vers la page voulue apres submit du form
    header('location: index.php');
} else {
    echo "Insertion  impossible veuiller réessayer ! <br>";
    echo ' <a href="ajouter.php">Retourner au formulaire</a>';
}


function validate_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
mysqli_close($conn);
header('location : index.php');
