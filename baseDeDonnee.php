<?php
//~ Connexion a ma base de données bibliothèque
//&Fonction de connexion mysqli_connect(4 parametres pour effectuer la connexion )
$conn = mysqli_connect('localhost', 'root', '', 'bibliotheque');

//! Methode NON securise face a l'injection de SQL dans le form
// if (!$conn) {
//~ Si la connexion echoue
//     echo "<script type=text/javascript>";
//     echo "alert('Connexion impossible a la base de données')</script>";
// } else {
//~ Si la connexion fonctionne
//     echo "<script type=text/javascript>";
//     echo "alert('Connexon a la base de données reussi')</script>";

//~ Variable qui contienne les valeurs a inserer dans la base de données
//     $isbn = $_POST['isbn'];
//     $titre = $_POST['titre'];
//     $theme = $_POST['theme'];
//     $nbPage = $_POST['nbPage'];
//     $format = $_POST['format'];
//     $nomAuteur = $_POST['nomAuteur'];
//     $prenomAuteur = $_POST['prenomAuteur'];
//     $editeur = $_POST['editeur'];
//     $anneeEdition = $_POST['anneeEdition'];
//     $prix = $_POST['prix'];
//     $langue = $_POST['langue'];
//~Préparer la requête


//~ Insertion de la requete sql replie par les valiable etablie plus haut
//     $requete = "INSERT INTO livre (isbn,titre,theme,nombreDePage,format,nomAuteur,PrenomAuteur,editeur,anneeEdition,prix,langue) 
//         VALUES('$isbn','$titre','$theme','$nbPage','$format','$nomAuteur','$prenomAuteur','$editeur','$anneeEdition','$prix','$langue')";
//~ Fonction permetant de 
//     $result = mysqli_query($conn, $requete);
//     if ($result) {
//         echo "Votre livre a été ajouter a notre bibliothèque pour consulter notre liste de livre : <br>";
//         echo ' <a href="afficher.php">C\'est par ici</a>';
//~ fonction header(location:) permet de renvoyer vers la page voulue apres submit du form
//         echo header('location: acceuil.html');
//     } else {
//         echo "Insertion  impposible veuiller réessayer ! <br>";
//         echo ' <a href="ajouter.php">Retourner au formulaire</a>';
//     }
// }

//! Methode securise face a l'injection de SQL dans le form
if (!$conn) {
    //~ Si la connexion echoue
    echo "<script type=text/javascript>";
    echo "alert('Connexion impossible a la base de données')</script>";
} else {
    //~ Si la connexion fonctionne
    echo "<script type=text/javascript>";
    echo "alert('Connexon a la base de données reussi')</script>";

    //& Préparer la requête
    $stmt = mysqli_prepare($conn, "INSERT INTO livre (isbn,titre,theme,nombreDePage,format,nomAuteur,PrenomAuteur,editeur,anneeEdition,prix,langue) VALUES (?,?,?,?,?,?,?,?,?,?,?)");

    //& Lier les variables aux marqueurs
    mysqli_stmt_bind_param($stmt, "sssissssids", $isbn, $titre, $theme, $nbPage, $format, $nomAuteur, $prenomAuteur, $editeur, $anneeEdition, $prix, $langue);

    //& Vérifier que toutes les données requises sont entrées correctement
    if (empty($_POST['titre']) || empty($_POST['nomAuteur']) || empty($_POST['prenomAuteur'])) {
        echo "<script type=text/javascript>";
        echo "alert('Veuillez entrer toutes les données requises')</script>";
        exit();
    }
    //& Valider les données entrées par l'utilisateur
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




    if (mysqli_stmt_execute($stmt)) {
        //& fonction header(location:) permet de renvoyer vers la page voulue apres submit du form
        header('location: acceuil.html');
    } else {
        echo "Insertion  impossible veuiller réessayer ! <br>";
        echo ' <a href="ajouter.php">Retourner au formulaire</a>';
    }
}

function validate_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
mysqli_close($conn);
