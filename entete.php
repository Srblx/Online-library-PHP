<?php
//~ Connexion a ma base de données my-db
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
    echo "Connect with succes ! <br>";

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
        echo "Insertion réussie !<br>";
    } else {
        echo "Insertion  impposible ! <br>";
    }
}
mysqli_close($conn);
