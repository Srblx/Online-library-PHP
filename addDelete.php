<?php

$connect = mysqli_connect('localhost', 'root', '', 'bibliotheque');

// $req = "UPDATE `livre` SET isbn , titre, theme, nombreDePage, format, nomAuteur, prenomAuteur, editeur , anneeEdition, prix, langue WHERE
// id 12";
// $result = mysqli_query($connect, $req);

if (!$connect) {
    //~ Si la connexion echoue
    echo "<script type=text/javascript>";
    echo "alert('Connexion impossible a la base de données')</script>";
} else {
    //~ Requete pour la connexion a la table 'connexion'
    $requete = " SELECT * FROM livre";
    //~ fonction pour executer la requete 'mysqli_query' ensemble es enregistrement qui se trouve dans connexion
    $result = mysqli_query($connect, $requete);


    //~ Pour affiche les données de la bdd dans un tableau 
    echo '<table border=1, class="styleTab" >';
    echo '<tr class="key">';
    echo '<td>' . '<b>' .  'ISBN ' . '</b>' . '</td>';
    echo '<td>' . '<b>' .  'Titre ' . '</b>' . '</td>';
    echo '<td>' . '<b>' .  'Thème ' . '</b>' . '</td>';
    echo '<td>' . '<b>' .  'Nombre Pages' . '</b>' . '</td>';
    echo '<td>' . '<b>' .  'Format' . '</b>' . '</td>';
    echo '<td>' . '<b>' . 'Nom auteur' . '</b>' . '</td>';
    echo '<td>' . '<b>' . 'Prénom auteur' . '</b>' . '</td>';
    echo '<td>' . '<b>' . 'Editeur' . '</b>' . '</td>';
    echo '<td>' . '<b>' . 'Année d\'édition' . '</b>' . '</td>';
    echo '<td>' . '<b>' . 'Prix' . '</b>' . '</td>';
    echo '<td>' . '<b>' . 'Langue' . '</b>' . '</td>';
    echo '<td>' . '<b>' . 'Modifier' . '</b>' . '</td>';
    echo '<td>' . '<b>' . 'Supprimer' . '</b>' . '</td>';
    echo '</tr>';

    while ($donnees = mysqli_fetch_array($result)) {
        //& $donnees recuperé avec la fonction ci dessus (ATTENTION array pas SENSIBLE a la CASSE)
        //~ Les valeurs que j'affiche dans le tableau
        echo '<tr class="value">';
        echo '<td>' . $donnees[1] . "  " . '</td>';
        echo '<td>' . $donnees[2] . "  " . '</td>';
        echo '<td>' . $donnees[3] . " " . '</td>';
        echo '<td>' . $donnees[4] . " " . '</td>';
        echo '<td>' . $donnees[5] . " " . '</td>';
        echo '<td>' . $donnees[6] . " " . '</td>';
        echo '<td>' . $donnees[7] . " " . '</td>';
        echo '<td>' . $donnees[8] . " " . '</td>';
        echo '<td>' . $donnees[9] . " " . '</td>';
        echo '<td>' . $donnees[10] . " " . '</td>';
        echo '<td>' . $donnees[11] . " " . '</td>';
        //& Ajouter les colonnes de modification et de suppression
        echo '<td><a href="modifierLigne.php?id=' . $donnees[0] . '">Modifier</a></td>';
        echo '<td><a href="supprimerLigne.php?id=?id=' . $donnees[0] . '"">Supprimer</a></td>';

        echo '</tr>';
    }
    echo '</table>';

    //& Ajouter les requêtes SQL pour modifier et supprimer

    $delete = "DELETE FROM user WHERE id";
}
//~ Cloture de la connexion a la base de données 
mysqli_close($connect);
