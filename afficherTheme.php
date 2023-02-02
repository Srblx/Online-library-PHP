<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat de recherche par thème</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php session_start(); ?>

    <h1>Afficher un livre par thèmes</h1>
    <nav>
        <div class="infoCoG">
            <a href="deconnexion.php" id="deco">Déconnexion</a>
        </div>
        <div class="infoCoD">
            <?= "Bonjour " . '<br>'; ?>
            <?= $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?>
        </div>
    </nav>
    <div class="btn">
        <table>
            <tr>
                <td><a href="acceuil.php">Accueil</a></td>
                <td>
                    <!-- & Pour faire un link vers ajouter un livre ou consultation  -->
                    <select name="livre" id="livre">
                        <option value="">Sélectionnez une option</option>
                        <option value="afficher.php">Afficher les livres</option>
                        <option value="afficherAuteur.php">Recherche d'un livres par auteurs</option>
                        <option value="afficherTitre.php">Recherche d'un livre par titre</option>
                        <option value="afficheTheme.php">Recherche d'un livre par thèmes</option>
                        <option value="afficheEdit.php">Recherche d'un livre par maison d'édition</option>
                        <option value="affichePage.php">Recherche d'un livre par Nb de page</option>
                        <option value="afficheLangue.php">Recherche d'un livre par langue</option>
                        <option value="affichePrix.php">Recherche d'un livre par prix</option>
                        <option value="ajouter.php">Ajouter un livre</option>
                    </select>
                    </form>

                    <script>
                        // Fonction qui renvoie vers les deux autre fichier php avec un event onchange
                        document.getElementById("livre").onchange = function() {
                            if (this.value) {
                                window.location.href = this.value;
                            }
                        };
                    </script>
                </td>
            </tr>
        </table>
    </div>
    <h2>Bienvenue sur le site de consultation de livres</h2>

    </div>
    <?php
    // Me connecter a ma BDD
    $connect = mysqli_connect('localhost', 'root', '', 'bibliotheque');
    if (!$connect) {
        // Si la connexion echoue
        echo "<script type=text/javascript>";
        echo "alert('Connexion impossible a la base de données')</script>";
    } else {
        if (isset($_POST['theme'])) {
            // Si la connexion fonctionne
            $searchTheme = $_POST['theme'];

            $request = " SELECT * FROM `livre` WHERE `theme` = '$searchTheme'";
            $result = mysqli_query($connect, $request);


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
            echo '</tr>';

            while ($donnee = mysqli_fetch_array($result)) {

                //~ Les valeurs que j'affiche dans le tableau
                echo '<tr class="value">';
                echo '<td>' . $donnee[1] . "  " . '</td>';
                echo '<td>' . $donnee[2] . "  " . '</td>';
                echo '<td>' . $donnee[3] . " " . '</td>';
                echo '<td>' . $donnee[4] . " " . '</td>';
                echo '<td>' . $donnee[5] . " " . '</td>';
                echo '<td>' . $donnee[6] . " " . '</td>';
                echo '<td>' . $donnee[7] . " " . '</td>';
                echo '<td>' . $donnee[8] . " " . '</td>';
                echo '<td>' . $donnee[9] . " " . '</td>';
                echo '<td>' . $donnee[10] . " " . '</td>';
                echo '<td>' . $donnee[11] . " " . '</td>';
                echo '</tr>';
            }
        }
        echo '</table>';
    }
    ?>

</body>

</html>