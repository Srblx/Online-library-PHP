<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        body {
            background: url(./img/livre-tourner-pages_1150-146.webp);
            font-family: Arial, Helvetica, sans-serif;
        }

        h1,
        .btn,
        form {
            display: grid;
            justify-content: center;
        }

        form {
            font-size: large;
        }

        input {
            width: 450px;
            height: 20px;
            margin: 5px;
            border-radius: 5px;
        }

        #submit {
            width: 100px;

        }

        fieldset {
            border-radius: 3px;
            background-color: rgba(0, 0, 0, 0.4);
        }

        h2 {
            background-color: grey;
            color: white;
            text-decoration: underline;
            padding-left: 10px;
            font-style: italic;
        }

        select,
        a,
        .btn {
            text-decoration: none;
            border: none;
            color: rgb(0, 102, 255);
            font-size: 15px;
            font-weight: bold;
        }

        footer {
            position: absolute;
            bottom: 0;
            left: 45%;
        }
    </style>
    <h1>Afficher un livre de la base de données</h1>
    <div class="btn">
        <table>
            <tr>
                <td><a href="acceuil.html">Accueil</a></td>
                <td>
                    <!-- & Pour faire un link vers ajouter un livre ou consultation  -->
                    <select name="livre" id="livre">
                        <option value="">Sélectionnez une option</option>
                        <option value="afficher.php">Afficher les livres</option>
                        <option value="afficherAuteur.php">Afficher les livres par auteurs</option>
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
    <form action="afficherAuteur.php" method="post">
        <fieldset>
            <legend>Recherche d'un livre par nom d'auteur</legend>
            <table>
                <tr>
                    <td>
                        <label for="auteur">Nom de l'auteur : </label>
                    </td>
                    <td>
                        <input type="text" id="searchAutor" name="searchAutor">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Rechercher" id="submit">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
    <?php
    //~ Me connecter a ma BDD
    $connect = mysqli_connect('localhost', 'root', '', 'bibliotheque');
    if (!$connect) {
        //~ Si la connexion echoue
        echo "<script type=text/javascript>";
        echo "alert('Connexion impossible a la base de données')</script>";
    } else {
        if (isset($_POST['searchAutor'])) {
            //~ Si la connexion fonctionne
            //! methode non securiser (injection de SQL possible)
            //* $search = $_POST['searchAutor'];
            //* $request = " SELECT * FROM `livre` WHERE `nomAuteur` = '$search'";

            //! Methode securisé
            //~ Récupération de la valeur de la recherche à partir du formulaire
            $search = $_POST['searchAutor'];

            //~ Préparation de la requête avec des marqueurs de paramètres
            $request = "SELECT * FROM livre WHERE nomAuteur = ?";

            //~ Préparation de la requête à l'aide de la fonction mysqli_prepare()
            $stmt = mysqli_prepare($connect, $request);

            //~ Liaison des valeurs à utiliser avec les marqueurs de paramètres
            mysqli_stmt_bind_param($stmt, "s", $search);

            //~ Exécution de la requête préparée
            mysqli_stmt_execute($stmt);

            //~ Stockage du résultat de la requête
            $result = mysqli_stmt_get_result($stmt);
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
    <footer>
        <p>Alexis SERBELLONI</p>
    </footer>
</body>

</html>