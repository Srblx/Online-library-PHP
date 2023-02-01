<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Par Thèmes</title>
</head>

<body>
    <?php session_start(); ?>
    <style>
        body {
            background: url(./img/9.jpg);
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
            border-radius: 10px;
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

        .styleTab {
            border-radius: 5px;
            border-color: black;
            margin-top: 2%;
            background-color: rgba(0, 0, 0, 0.3);
        }

        legend {
            font-size: 20px;
            font-style: italic;
        }

        td {
            padding: 5px;
        }
    </style>
    <h1>Afficher un livre par thèmes</h1>
    <?php

    echo "Bonjour " . $_SESSION['prenom'];
    echo $_SESSION['nom'];
    ?>
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
                        <option value="affichePage.php">Recherche d'un livre par nombre de page</option>
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
    <form action="afficherTheme.php" method="post">
        <fieldset>
            <legend><b>Recherche d'un livre par thème</b></legend>
            <table>
                <tr>
                    <td>
                        <label for="theme">Thèmes recherché : </label>
                    </td>
                    <td>
                        <input type="text" id="theme" name="theme">
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
</body>

</html>