<?php require '../config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Par Thèmes</title>
    <script src="../js/dark.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../Css/styledark.css">
</head>

<body class="light">
    <?php include "acceuil.php" ?>
    <!-- form -->
    <form action="afficheTheme.php" method="post">
        <fieldset>
            <legend><b>Recherche d'un livre par thème</b></legend>
            <label for="theme">Thèmes recherché : </label>
            <select id="theme" name="theme" onchange="validerSelection()">
                <option value="">Thèmes</option>
                <?php
                $request = "SELECT DISTINCT theme FROM `livre`";
                $result = $connect->query($request);

                while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value="' . $donnees->theme . '">' . $donnees->theme . '</option>';
                } ?>
            </select>
        </fieldset>
    </form>
    <?php
    // Me connecter a ma BDD

    if (isset($_POST['theme'])) {
        // Si la connexion fonctionne
        $searchTheme = $_POST['theme'];
        $request = " SELECT * FROM `livre` WHERE `theme` = '$searchTheme'";
        $result = $connect->query($request);
        echo '<table border=1, class="styleTab" >';
        echo '<tr class="key">';
        echo '<td>' . '<b>' .  'ISBN ' . '</b>' . '</td>';
        echo '<td>' . '<b>' .  'Titre ' . '</b>' . '</td>';
        echo '<td>' . '<b>' .  'Thème ' . '</b>' . '</td>';
        echo '<td>' . '<b>' .  'Nombre Pages' . '</b>' . '</td>';
        echo '<td>' . '<b>' .  'Format' . '</b>' . '</td>';
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
    echo '</table>'; ?>
    <?php include "../footer.php" ?>
</body>

</html>