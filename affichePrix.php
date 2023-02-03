<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche par prix</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php session_start(); ?>

    <h1>Afficher un livre en fonction de son prix</h1>
    <nav>
        <div class="infoCoG">
            <a href="deconnexion.php">Déconnexion</a>
        </div>
        <div class="infoCoD">
            <?= "Bonjour " . '<br>'; ?>
            <?= $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?>
        </div>
    </nav>
    <div class="btn">
        <table>
            <tr>
                <td><a href="acceuil.php" id="test">Accueil</a></td>
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
    <form action="affichePrix.php" method="post">
        <fieldset>
            <legend><b>Recherche d'un livre par prix</b></legend>
            <table>
                <tr>
                    <td>
                        <label for="prix">Budget maximum : </label>
                    </td>
                    <td>
                        <input type="text" id="prix" name="prix">
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
    $connect = mysqli_connect('localhost', 'root', '', 'bibliotheque');
    if (!$connect) {
        echo "<script type=text/javascript>";
        echo "alert('Connexion impossible à la base de données')";
    } else {
        //& isset() Détermine si une variable est déclarée et est différente de null
        if (isset($_POST['prix'])) {
            // Si la connexion fonctionne
            $searchPage = $_POST['prix'];
            //&Protege les caractere speciaux d'un chaine 
            $searchPage = mysqli_real_escape_string($connect, $searchPage);

            //& < a la place de = Affiche tout les livres avec moins de page que le choix utilisateur 
            $request = "SELECT * FROM `livre` WHERE `prix` < '$searchPage'";
            //& execute la requete sur la base de données
            $result = mysqli_query($connect, $request);


            //& Retourne le nombre de lignes dans le jeu de résultats
            if (mysqli_num_rows($result) > 0) {
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
                while ($donnee = mysqli_fetch_array($result)) {
                    // Les valeurs que j'affiche dans le tableau
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
                    echo '<td><a href="modifierLigne.php?id=' . $donnee[0] . '"><i class="fa-solid fa-pen"></i></a></td>';
                    echo '<td><a href="addDelete.php?id=' . $donnee[0] . '""><i class="fa-solid fa-trash"></i></a></td>';
                    echo '</tr>';
                }
            }
            echo '</table>';
        }
    }
    ?>
    <footer>
        <p>Alexis SERBELLONI</p>
    </footer>
</body>

</html>