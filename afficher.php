<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styledark.css">
    <script src="js/dark.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="light">   
    <?php include "acceuil.php";

    //  Affichege du tableau de resultat de recherche 
    //~ Connexion a ma base de données my-db
    //&Fonction de connexion mysqli_connect(4 parametres pour effectuer la connexion )
    $conn = mysqli_connect('localhost', 'root', '', 'bibliotheque');
    if (!$conn) {
        //~ Si la connexion echoue
        echo "<script type=text/javascript>";
        echo "alert('Connexion impossible a la base de données')</script>";
    } else {
        //~ Requete pour la connexion a la table 'connexion'
        $requete = " SELECT * FROM livre";
        //~ fonction pour executer la requete 'mysqli_query' ensemble es enregistrement qui se trouve dans connexion
        $result = mysqli_query($conn, $requete);


        //~ Pour affiche les données de la bdd dans un tableau 
        echo '<table border=1, class="styleTab" >';
        echo '<tr class="key">';
        echo '<td class="td">' . '<b>' .  'ISBN ' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' .  'Titre ' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' .  'Thème ' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' .  'Nombre Pages' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' .  'Format' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . 'Nom auteur' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . 'Prénom auteur' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . 'Editeur' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . 'Année d\'édition' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . 'Prix' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . 'Langue' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . '' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . '' . '</b>' . '</td>';
        echo '</tr>';

        while ($donnees = mysqli_fetch_array($result)) {
            //& $donnees recuperé avec la fonction ci dessus (ATTENTION array pas SENSIBLE a la CASSE)
            //~ Les valeurs que j'affiche dans le tableau
            echo '<tr class="value">';
            echo '<td class="td">' . $donnees[1] . "  " . '</td>';
            echo '<td class="td">' . $donnees[2] . "  " . '</td>';
            echo '<td class="td">' . $donnees[3] . " " . '</td>';
            echo '<td class="td">' . $donnees[4] . " " . '</td>';
            echo '<td class="td">' . $donnees[5] . " " . '</td>';
            echo '<td class="td">' . $donnees[6] . " " . '</td>';
            echo '<td class="td">' . $donnees[7] . " " . '</td>';
            echo '<td class="td">' . $donnees[8] . " " . '</td>';
            echo '<td class="td">' . $donnees[9] . " " . '</td>';
            echo '<td class="td">' . $donnees[10] . " " . '</td>';
            echo '<td class="td">' . $donnees[11] . " " . '</td>';
            echo '<td><a href="modifierLigne.php?id=' . $donnees[0] . '"><i class="fa-solid fa-pen"></i></a></td>';
            echo "<td style='text-align:center;'><a href='javascript:void(0)' onclick='confirmDelete(" . $donnees[0] . ")' style='color: red;'><i class='fa fa-trash'></i></a></td>";


            echo '</tr>';
        }
        echo '</table>';
    }

    //~ Cloture de la connexion a la base de données 
    mysqli_close($conn);
    ?>
    <script>
        function confirmDelete(id) {
            if (confirm("Êtes-vous sûr de vouloir supprimer ce livre ?")) {
                window.location.href = "supprimer.php?id=" + id + "&action=delete";
            }
        }
    </script>
    <?php include "footer.php" ?>
</body>

</html>