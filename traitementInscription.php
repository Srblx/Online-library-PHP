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
$mdp2 = validate_input($_POST['mdp2']);


// Comparer les mots de passe
if ($mdp == $mdp2) {
    // echo "Les mot de passe sont identique";
} else {
    die("les mot de passe ne corresponde pas ");
}

// Hash du mot de passe
$mdp = password_hash($mdp, PASSWORD_DEFAULT);

// Vérifier si l'adresse e-mail existe déjà dans la base de données
$query = "SELECT * FROM user WHERE mail='$mail'";
$resultat = mysqli_query($conect, $query);

if (mysqli_num_rows($resultat) > 0) {
    die("<h1 >Cette adresse e-mail est déjà utilisée.<h1> " . "<br>" . '<a href="index.php">RETOUR A L\'ACCUEIL</a>');
}
// 


// Lier des variables à une déclaration préparée en tant que paramètres
mysqli_stmt_bind_param($stmt, "ssss", $firstName, $lastName, $mail, $mdp);

// Vérifier si la liaison des variables a réussi
if (!mysqli_stmt_bind_param($stmt, "ssss", $firstName, $lastName, $mail, $mdp)) {
    die("Erreur lors de la liaison des variables: " . mysqli_stmt_error($stmt));
}

//~ Exécuter la requête
$result;





if (mysqli_stmt_execute($stmt)) {
    //& fonction header(location:) permet de renvoyer vers la page voulue apres submit du form
    header('location: loginSucces.php');
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
