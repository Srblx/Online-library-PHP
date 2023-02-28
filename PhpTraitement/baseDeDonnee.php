<?php
//~ Connexion a ma base de données bibliothèque
//&Fonction de connexion mysqli_connect(4 parametres pour effectuer la connexion )
// $conn = mysqli_connect('localhost', 'root', '', 'bibliotheque');
try {
    $conn = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');
    $conn->query("SET NAMES 'utf8'");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('<p> Echec de connection. Erreur[' . $e->getCode() . '] : [' . $e->getMessage() . '<p>');
}

//! Methode securise face a l'injection de SQL dans le form
//& Préparer la requête
$stmt = $conn->prepare("INSERT INTO livre (isbn,titre,theme,nombreDePage,format,nomAuteur,PrenomAuteur,editeur,anneeEdition,prix,langue) 
VALUES (?,?,?,?,?,?,?,?,?,?,?)");

// Lier les variables aux marqueurs
$stmt->bindParam(1, $isbn);
$stmt->bindParam(2, $titre);
$stmt->bindParam(3, $theme);
$stmt->bindParam(4, $nbPage);
$stmt->bindParam(5, $format);
$stmt->bindParam(6, $nomAuteur);
$stmt->bindParam(7, $prenomAuteur);
$stmt->bindParam(8, $editeur);
$stmt->bindParam(9, $anneeEdition);
$stmt->bindParam(10, $prix);
$stmt->bindParam(11, $langue);

// Vérifier que toutes les données requises sont entrées correctement
if (empty($_POST['titre']) || empty($_POST['nomAuteur']) || empty($_POST['prenomAuteur'])) {
    echo "<script type=text/javascript>";
    echo "alert('Veuillez entrer toutes les données requises')</script>";
    exit();
}


if (empty($_POST['isbn']) || empty($_POST['theme']) || empty($_POST['nbPage']) || empty($_POST['format']) || empty($_POST['editeur']) || empty($_POST['anneeEdition']) || empty($_POST['prix']) || empty($_POST['langue'])) {
    $_POST['isbn'] = 'uninformed';
    $_POST['theme'] = 'uninformed';
    $_POST['nbPage'] = 'uninformed';
    $_POST['format'] = 'uninformed';
    $_POST['editeur'] = 'uninformed';
    $_POST['anneeEdition'] = 'uninformed';
    $_POST['prix'] = 'uninformed';
    $_POST['langue'] = 'uninformed';
}
// Valider les données entrées par l'utilisateur
$isbn = validate_input($_POST['isbn']);
$titre = validate_input($_POST['titre']);
$theme = validate_input($_POST['theme']);
$nbPage = validate_input($_POST['nbPage']);
$format = validate_input($_POST['format']);
$nomAuteur = validate_input($_POST['nomAuteur']);
$prenomAuteur = validate_input($_POST['prenomAuteur']);
$editeur = validate_input($_POST['editeur']);
$anneeEdition = validate_input($_POST['anneeEdition']);
$prix = validate_input($_POST['prix']);
$langue = validate_input($_POST['langue']);

//~ Exécuter la requête
$result;




if ($stmt->execute()) {
    //& fonction header(location:) permet de renvoyer vers la page voulue apres submit du form
    header('location: ../views/afficher.php');
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
// mysqli_close($conn);
