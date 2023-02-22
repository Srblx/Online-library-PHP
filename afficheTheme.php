<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Par Thèmes</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styledark.css">
    <script src="js/dark.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="light">
    <?php include "acceuil.php"?>
<!-- form -->
    <form action="afficheTheme.php" method="post">
        <fieldset>
            <legend><b>Recherche d'un livre par thème</b></legend>
            <label for="theme">Thèmes recherché : </label>
            <select id="theme" name="theme">
                <option value="">Thèmes</option>
                 <?php
                    try {
                      $connect = new PDO('mysql:host=localhost;dbname=bibliotheque','root', '');
                      $connect->query("SET NAMES 'utf8'");
                      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                      $request = "SELECT DISTINCT theme FROM `livre`";
                      $result = $connect->query($request);
                    
                      while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
                        echo '<option value="' . $donnees->theme . '">' . $donnees->theme . '</option>';
                      }}catch (PDOException $e) {
                      die('<p> Echec de connection. Erreur['.$e->getCode().'] : ['.$e->getMessage().'<p>');
                    }
                    ?>
                </select>
                        <input type="submit" value="Rechercher" id="submit">
        </fieldset>
    </form>
    <?php
    // Me connecter a ma BDD
    try {
        $connect = new PDO('mysql:host=localhost;dbname=bibliotheque','root', '');
        $connect->query("SET NAMES 'utf8'");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('<p> Echec de connection. Erreur['.$e->getCode().'] : ['.$e->getMessage().'<p>');
    }
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
        echo '<td>' . '<b>' . 'Nom auteur' . '</b>' . '</td>';
        echo '<td>' . '<b>' . 'Prénom auteur' . '</b>' . '</td>';
        echo '<td>' . '<b>' . 'Editeur' . '</b>' . '</td>';
        echo '<td>' . '<b>' . 'Année d\'édition' . '</b>' . '</td>';
        echo '<td>' . '<b>' . 'Prix' . '</b>' . '</td>';
        echo '<td>' . '<b>' . 'Langue' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . '' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . '' . '</b>' . '</td>';
        echo '</tr>';
     while ($donnee = $result->fetch(PDO::FETCH_OBJ)) {
         //~ Les valeurs que j'affiche dans le tableau
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
    echo '</table>';?>
    <?php include "footer.php" ?>
</body>
</html>