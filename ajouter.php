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
    <h1>Ajouter un livre a la base de données</h1>
    <div class="btn">
        <table id="tabAjout">
            <tr>
                <td><a href="acceuil.html">Accueil</a></td>
                <td>
                    <!-- & Pour faire un link vers ajouter un livre ou consultation  -->
                    <select name="livre" id="livre">
                        <option value="">Sélectionnez une option</option>
                        <option value="afficher.php">Afficher les livres</option>
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
    <form action="baseDeDonnee.php" method="post">
        <fieldset>
            <legend id="legend"><b>Ajouter un livre</b></legend>
            <table>
                <tr>
                    <td>
                        <label for="isbn">ISBN :</label>
                    </td>
                    <td>
                        <input type="text" name="isbn" id="isbn">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="titre">Titre :</label>
                    </td>
                    <td>
                        <input type="text" name="titre" id="titre" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="theme">Theme :</label>
                    </td>
                    <td>
                        <input type="text" name="theme" id="theme" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nbPage">Nombre de pages :</label>
                    </td>
                    <td>
                        <input type="text" name="nbPage" id="nbPage">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="format">Format
                    </td>
                    <td>
                        <input type="text" name="format" id="format">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nomAuteur">Nom de l'auteur :</label>
                    </td>
                    <td>
                        <input type="text" name="nomAuteur" id="nomAuteur" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="prenomAuteur">Prénom de l'auteur :</label>
                    </td>
                    <td>
                        <input type="text" name="prenomAuteur" id="prenomAuteur" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="editeur">Editeur :</label>
                    </td>
                    <td>
                        <input type="text" name="editeur" id="editeur" required>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>
                        <label for="anneeEdition">Année d'édition :</label>
                    </td>
                    <td>
                        <input type="text" name="anneeEdition" id="anneeEdition">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">Prix :</label>
                    </td>
                    <td>
                        <input type="text" name="prix" id="prix">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="langue">Langue :</label>
                    </td>
                    <td>
                        <input type="text" name="langue" id="langue" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Ajouter" id="submit">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
    <footer>
        <p>Alexis SERBELLONI</p>
    </footer>
</body>

</html>