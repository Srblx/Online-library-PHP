<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiche par nombre de page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styledark.css">
    <script src="js/dark.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="light">
    <?php include "acceuil.php"?>

    <form id="Responsive" action="affichePage.php" method="post">
        <fieldset>
            <legend><b>Recherche d'un livre par nombre de page</b></legend>
            <table>
                <tr>
                    <td>
                        <label for="nbPage">Nombre de pages : </label>
                    </td>
                    <td>
                        <input type="text" id="nbPage" name="nbPage">
                    </td>
                    <td>
                        <input type="submit" value="Rechercher" id="submit">
                    </td>
                </tr>

            </table>
        </fieldset>
    </form>

    <?php
    // Me connecter à ma BDD
try {
    $connect = new PDO('mysql:host=localhost;dbname=bibliotheque','root', '');
    $connect->query("SET NAMES 'utf8'");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('<p> Echec de connection. Erreur['.$e->getCode().'] : ['.$e->getMessage().'<p>');
}

    //& isset() Détermine si une variable est déclarée et est différente de null
    if (isset($_POST['nbPage'])) {
        // Si la connexion fonctionne
        $searchPage = $_POST['nbPage'];
        //&Protege les caractere speciaux d'un chaine 
        $searchPage = $connect->quote($searchPage);

        //& < a la place de = Affiche tout les livres avec moins de page que le choix utilisateur 
        $request = "SELECT * FROM `livre` WHERE `nombreDePage` < $searchPage";
        //& execute la requete sur la base de données
        $result = $connect->query($request);

            //& Retourne le nombre de lignes dans le jeu de résultats
            if ($result->rowCount() > 0) {
                echo '<table border=1, class="styleTab">';
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
    <?php 
  include "footer.php"; 
  ?>
</body>
</html>