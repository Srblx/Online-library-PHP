<?php
//~ Connexion a ma base de données bibliothèque
//&Fonction de connexion mysqli_connect(4 parametres pour effectuer la connexion )
$conn = mysqli_connect('localhost', 'root', '', 'bibliotheque');

if (!$conn) {
    //~ Si la connexion echoue
    echo "<script type=text/javascript>";
    echo "alert('Connexion impossible a la base de données')</script>";
} else {
    //~ Si la connexion fonctionne
    echo "<script type=text/javascript>";
    echo "alert('Connexon a la base de données reussi')</script>";

    //~ Variable qui contienne les valeurs a inserer dans la base de données
    $isbn = $_POST['isbn'];
    $titre = $_POST['titre'];
    $theme = $_POST['theme'];
    $nbPage = $_POST['nbPage'];
    $format = $_POST['format'];
    $nomAuteur = $_POST['nomAuteur'];
    $prenomAuteur = $_POST['prenomAuteur'];
    $editeur = $_POST['editeur'];
    $anneeEdition = $_POST['anneeEdition'];
    $prix = $_POST['prix'];
    $langue = $_POST['langue'];

    //~ Insertion de la requete sql replie par les valiable etablie plus haut
    $requete = "INSERT INTO livre (isbn,titre,theme,nombreDePage,format,nomAuteur,PrenomAuteur,editeur,anneeEdition,prix,langue) 
        VALUES('$isbn','$titre','$theme','$nbPage','$format','$nomAuteur','$prenomAuteur','$editeur','$anneeEdition','$prix','$langue')";
    //~ Fonction permetant de 
    $result = mysqli_query($conn, $requete);
    if ($result) {
        // echo "Votre livre a été ajouter a notre bibliothèque pour consulter notre liste de livre : <br>";
        // echo ' <a href="afficher.php">C\'est par ici</a>';
        echo header('location: acceuil.html');
    } else {
        echo "Insertion  impposible veuiller réessayer ! <br>";
        echo ' <a href="ajouter.php">Retourner au formulaire</a>';
    }
}
mysqli_close($conn);
