    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recherche Par Titre</title>
        <link rel="stylesheet" href="style.css">
        <!-- <script src="./js/app.js" defer></script> -->
        <link rel="stylesheet" href="styledark.css">
        <script src="js/dark.js" defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body class="light">
        <?php include "acceuil.php"?>
        <!-- form -->
        <form action="afficherTitre.php" method="post">
            <fieldset class="formDark">
                <legend><b>Recherche d'un livre par titre</b></legend>
                <label for="titre">Titre du livre : </label>
                <select name="titre" id="titre">
                <option value="">Sélectionnez un Titre</option>
                <?php
                  try {
                    $connect = new PDO('mysql:host=localhost;dbname=bibliotheque','root', '');
                    $connect->query("SET NAMES 'utf8'");
                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    $request = "SELECT DISTINCT titre FROM `livre`";
                    $result = $connect->query($request);
                
                    while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
                      echo '<option value="' . $donnees->titre . '">' . $donnees->titre . '</option>';
                    }
                  } catch (PDOException $e) {
                    die('<p> Echec de connection. Erreur['.$e->getCode().'] : ['.$e->getMessage().'<p>');
                  }
                  ?>
            </select>
            <input type="submit" value="Rechercher" id="submit">
            </fieldset>
        </form>
        <?php
        // Me connecter à ma BDD
try {
    $connect = new PDO('mysql:host=localhost;dbname=bibliotheque','root', '');
    $connect->query("SET NAMES 'utf8'");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('<p> Echec de connection. Erreur['.$e->getCode().'] : ['.$e->getMessage().']</p>');
}

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
            echo '<td>' . '<b>' . 'Nom auteur' . '</b>' . '</td>';
            echo '<td>' . '<b>' . 'Prénom auteur' . '</b>' . '</td>';
            echo '<td>' . '<b>' . 'Editeur' . '</b>' . '</td>';
            echo '<td>' . '<b>' . 'Année d\'édition' . '</b>' . '</td>';
            echo '<td>' . '<b>' . 'Prix' . '</b>' . '</td>';
            echo '<td>' . '<b>' . 'Langue' . '</b>' . '</td>';
            echo '<td class="td">' . '<b>' . '' . '</b>' . '</td>';
            echo '<td class="td">' . '<b>' . '' . '</b>' . '</td>';
            echo '</tr>';

            //& Récupère la ligne suivante d'un ensemble de résultats sous forme de tableau associatif, numérique ou les deux
            while ($donnee = $result->fetch(PDO::FETCH_OBJ)) {
                    // Les valeurs que j'affiche dans le tableau
                    echo '<tr class="value">';
                    echo '<td>' . $donnee->isbn . "  " . '</td>';
                    echo '<td>' . $donnee->titre . "  " . '</td>';
                    echo '<td>' . $donnee->theme . " " . '</td>';
                    echo '<td>' . $donnee->nombreDePage . " " . '</td>';
                    echo '<td>' . $donnee->format . " " . '</td>';
                    echo '<td>' . $donnee->nomAuteur . " " . '</td>';
                    echo '<td>' . $donnee->prenomAuteur . " " . '</td>';
                    echo '<td>' . $donnee->editeur . " " . '</td>';
                    echo '<td>' . $donnee->anneeEdition . " " . '</td>';
                    echo '<td>' . $donnee->prix . " " . '</td>';
                    echo '<td>' . $donnee->langue . " " . '</td>';
                    echo '<td><a href="modifierLigne.php?id=' . $donnee->id . '"><i class="fa-solid fa-pen"></i></a></td>';
                    echo '<td><a href="addDelete.php?id=' . $donnee->id . '""><i class="fa-solid fa-trash"></i></a></td>';
                    echo '</tr>';
                }
            }
            echo '</table>';
        }
        ?>
<?php include "footer.php" ?>
</body>
</html>