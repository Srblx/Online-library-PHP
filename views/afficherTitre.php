<?php require '../config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Par Titre</title>
    <!-- <script src="./js/app.js" defer></script> -->
    <script src="../js/dark.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../Css/styledark.css">
</head>

<body class="light">
    <?php include "acceuil.php" ?>
    <!-- form -->
    <form action="afficherTitre.php" method="post">
        <fieldset class="formDark">
            <legend><b>Recherche d'un livre par titre</b></legend>
            <label for="titre">Titre du livre : </label>
            <select name="titre" id="titre" onchange="validerSelection()">
                <option value="">Sélectionnez un Titre</option>
                <?php
                $request = "SELECT DISTINCT titre FROM `livre`";
                $result = $connect->query($request);

                while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value="' . $donnees->titre . '">' . $donnees->titre . '</option>';
                } ?>
            </select>
        </fieldset>
    </form>
    <?php

    if (isset($_POST['titre'])) {
        // Si la connexion fonctionne
        $searchTitre = $_POST['titre'];
        //&Protège les caractères spéciaux d'une chaîne
        $searchTitre = $connect->quote($searchTitre);

        $request = "SELECT * FROM `livre` WHERE `titre` = $searchTitre";
        //& Exécute la requête sur la base de données
        $result = $connect->query($request);

        //& Retourne le nombre de lignes dans le jeu de résultats
        if ($result->rowCount() > 0) {
            echo '<table border="1" class="styleTab">';
            echo '<tr class="key">';
            echo '<td>' . '<b>' . 'ISBN ' . '</b>' . '</td>';
            echo '<td>' . '<b>' . 'Titre ' . '</b>' . '</td>';
            echo '<td>' . '<b>' . 'Thème ' . '</b>' . '</td>';
            echo '<td>' . '<b>' . 'Nombre Pages' . '</b>' . '</td>';
            echo '<td>' . '<b>' . 'Format' . '</b>' . '</td>';
            echo '<td>' . '<b>' . 'Auteur' . '</b>' . '</td>';
            // echo '<td>' . '<b>' . 'Nom auteur' . '</b>' . '</td>';
            echo '<td>' . '<b>' . 'Editeur' . '</b>' . '</td>';
            echo '<td>' . '<b>' . 'Année d\'édition' . '</b>' . '</td>';
            echo '<td>' . '<b>' . 'Prix' . '</b>' . '</td>';
            echo '<td>' . '<b>' . 'Langue' . '</b>' . '</td>';
            if ($_SESSION['role'] === 1) {
                //~ Si l'utilisateur est un administrateur, afficher les deux dernières colonnes
                echo '<td class="td">' . '<b>' . '' . '</b>' . '</td>';
                echo '<td class="td">' . '<b>' . '' . '</b>' . '</td>';
            }
            echo '</tr>';

            //& Récupère la ligne suivante d'un ensemble de résultats sous forme de tableau associatif, numérique ou les deux
            while ($donnee = $result->fetch(PDO::FETCH_OBJ)) {
               if ($_SESSION['role'] === 1) {       
                //~ Les valeurs que j'affiche dans le tableau
                        echo '<tr class="value">';
                        echo '<td class="td">' . $donnee->isbn . "  " . '</td>';
                        echo '<td class="td">' . $donnee->titre . "  " . '</td>';
                        echo '<td class="td">' . $donnee->theme . " " . '</td>';
                        echo '<td class="td">' . $donnee->nombreDePage . " " . '</td>';
                        echo '<td class="td">' . $donnee->format . " " . '</td>';
                        echo '<td class="td">' . $donnee->nomAuteur . " " . $donnee->prenomAuteur . " " . '</td>';
                        // echo '<td class="td">' . $donnees->prenomAuteur . " " . '</td>';
                        echo '<td class="td">' . $donnee->editeur . " " . '</td>';
                        echo '<td class="td">' . $donnee->anneeEdition . " " . '</td>';
                        echo '<td class="td">' . $donnee->prix . " " . '</td>';
                        echo '<td class="td">' . $donnee->langue . " " . '</td>';
                        echo '<td><a href="modifierLigne.php?id=' . $donnee->id . '"><i class="fa-solid fa-pen"></i></a></td>';
                        echo "<td style='text-align:center;'><a href='javascript:void(0)' onclick='confirmDelete(" . $donnee->id . ")' style='color: red;'><i class='fa fa-trash'></i></a></td>";
                        } else {
                            echo '<tr class="value">';
                        echo '<td class="td">' . $donnee->isbn . "  " . '</td>';
                        echo '<td class="td">' . $donnee->titre . "  " . '</td>';
                        echo '<td class="td">' . $donnee->theme . " " . '</td>';
                        echo '<td class="td">' . $donnee->nombreDePage . " " . '</td>';
                        echo '<td class="td">' . $donnee->format . " " . '</td>';
                        echo '<td class="td">' . $donnee->nomAuteur . " " . $donnee->prenomAuteur . " " . '</td>';
                        // echo '<td class="td">' . $donnees->prenomAuteur . " " . '</td>';
                        echo '<td class="td">' . $donnee->editeur . " " . '</td>';
                        echo '<td class="td">' . $donnee->anneeEdition . " " . '</td>';
                        echo '<td class="td">' . $donnee->prix . " " . '</td>';
                        echo '<td class="td">' . $donnee->langue . " " . '</td>';
                        }
                
                echo '</tr>';
            }
        }
        echo '</table>';
    }
    ?>
    <?php include "../footer.php" ?>
</body>

</html>