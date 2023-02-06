    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recherche Par Titre</title>
        <link rel="stylesheet" href="style.css">
        <script src="./js/app.js" defer></script>
        <link rel="stylesheet" href="styledark.css">
        <script src="js/dark.js" defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body class="light">
        <?php session_start(); ?>

        <h1>Afficher un livre par titre</h1>
        <div class="btnDark" id="btnDark"><i class="fa-solid fa-moon"></i></div>
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
        <form action="afficherTitre.php" method="post">
            <fieldset class="formDark">
                <legend><b>Recherche d'un livre par titre</b></legend>
                <table>
                    <tr>
                        <td>
                            <label for="titre">Titre du livre : </label>
                        </td>
                        <td>
                            <!-- Champ de saisie avec liste déroulante pour les suggestions -->
                            <input type="text" id="titre" name="titre" list="suggestions">
                            <datalist id="suggestions"></datalist>
                        </td>
                        <td>
                            <!-- Bouton de soumission du formulaire -->
                            <input type="submit" value="Rechercher" id="submit">
                        </td>
                    </tr>
                    <!-- <tr>
                        <td colspan="2">

                        </td>
                    </tr> -->
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
            if (isset($_POST['titre'])) {
                // Si la connexion fonctionne
                $searchTitre = $_POST['titre'];
                //&Protege les caractere speciaux d'un chaine 
                $searchTitre = mysqli_real_escape_string($connect, $searchTitre);

                $request = "SELECT * FROM `livre` WHERE `titre` = '$searchTitre'";
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
        <?php
        // Définition du type de contenu renvoyé
        header("Content-Type: application/json");


        // Récupération du titre depuis la requête HTTP
        $titre = $_POST["titre"];

        // Connexion à la base de données
        $connect = mysqli_connect('localhost', 'root', '', 'bibliotheque');
        // Vérification de la réussite de la connexion
        if (!$connect) {
            // Affichage d'un message d'erreur en cas d'échec
            die("Erreur de connexion : " . mysqli_connect_error());
        }

        // si la connexion s'effectue 
        //requete SQL pour recupere les bonnées de la BDD
        $query = "SELECT titre FROM livre WHERE titre LIKE '%$titre%'";
        $result = mysqli_query($connect, $query);

        // Initialisation un tableau vide pour stocker les titres trouvés
        $titres = [];
        while ($row = mysqli_fetch_assoc($result)) {
            // On ajoute le titre trouvé dans le tableau
            $titres[] = $row["titre"];
        }

        // Cette ligne encode les titres en JSON et les renvoie pour pouvoir être utilisés par JavaScript.
        echo json_encode($titres);
        ?>
        <footer>
            <p>Alexis SERBELLONI</p>
        </footer>

    </body>

    </html>