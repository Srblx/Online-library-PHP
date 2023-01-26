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
        .btn {
            display: grid;
            justify-content: center;
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


        .key {
            font-style: italic;
            font-size: 22px;
            background-color: rgba(0, 0, 0, 0.2);
            text-align: center;
            font-weight: bold;
        }

        .value {
            background-color: rgba(0, 0, 0, 0.2);
            font-weight: bold;
        }

        td {
            padding: 4px;
        }

        .styleTab {
            border-radius: 5px;
            border-color: black;
            margin-top: 1%;
        }

        footer {
            position: absolute;
            bottom: 0;
            left: 43%;
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
                        <option value="afficherAuteur.php">Recherche d'un livre par auteurs</option>
                        <option value="afficherTitre.php">Recherche d'un livre par titre</option>
                        <option value="afficheTheme.html">Recherche d'un livre par thèmes</option>
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
    <?php
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

        while ($donnees = mysqli_fetch_array($result)) {
            //& $donnees recuperé avec la fonction ci dessus (ATTENTION array pas SENSIBLE a la CASSE)
            //~ Les valeurs que j'affiche dans le tableau
            echo '<tr class="value">';
            echo '<td>' . $donnees[1] . "  " . '</td>';
            echo '<td>' . $donnees[2] . "  " . '</td>';
            echo '<td>' . $donnees[3] . " " . '</td>';
            echo '<td>' . $donnees[4] . " " . '</td>';
            echo '<td>' . $donnees[5] . " " . '</td>';
            echo '<td>' . $donnees[6] . " " . '</td>';
            echo '<td>' . $donnees[7] . " " . '</td>';
            echo '<td>' . $donnees[8] . " " . '</td>';
            echo '<td>' . $donnees[9] . " " . '</td>';
            echo '<td>' . $donnees[10] . " " . '</td>';
            echo '<td>' . $donnees[11] . " " . '</td>';

            echo '</tr>';
        }
        echo '</table>';
    }

    //~ Cloture de la connexion a la base de données 
    mysqli_close($conn);
    ?>
    <footer>
        <p>Alexis SERBELLONI</p>
    </footer>
</body>

</html>