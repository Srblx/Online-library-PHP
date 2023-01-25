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

        td {
            padding-right: 50px;
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
            left: 41%;
        }
    </style>
    <h1>Consultation</h1>
    <div class="btn">
        <table>
            <tr>
                <td><a href="acceuil.html">Accueil</a></td>
                <td><select name="livre" id="livre">
                        <option value="display">Afficher les livres</option>
                        <option value="add">Ajouter un livre</option>
                    </select></td>
            </tr>
        </table>
    </div>
    <h2>Bienvenue sur le site de consultation de livres</h2>
    <form action="entete.php" method="post">
        <fieldset>
            <legend id="legend"><b>Ajouter un livre</b></legend>
            <table>
                <tr>
                    <td>
                        <label for="isbn">ISBN :
                    </td>
                    <td>
                        <input type="text" name="isbn" id="isbn"></lable>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="titre">Titre :
                    <td>
                        <input type="text" name="titre" id="titre"></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="theme">Theme :
                    <td>
                        <input type="text" name="theme" id="theme"></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nbPage">Nombre de pages :
                    </td>
                    <td>
                        <input type="text" name="nbPage" id="nbPage" value="" placeholder="">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td><label for="format">Format : </td>
                    <td><input type="text" name="format" id="format"></label></td>
                </tr>
                <tr>
                    <td>
                        <label for="nomAuteur">Nom de l'auteur :
                    </td>
                    <td>
                        <input type="text" name="nomAuteur" id="nomAuteur" value="" placeholder="">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td><label for="prenomAuteur">Prénom de l'auteur : </td>
                    <td><input type="text" name="prenomAuteur" id="prenomAuteur"></label></td>
                </tr>
                <tr>
                    <td>
                        <label for="editeur">Editeur :
                    </td>
                    <td>
                        <input type="text" name="editeur" id="editeur" value="" placeholder="">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td><label for="anneeEdition">Année d'édition : </td>
                    <td><input type="text" name="anneeEdition" id="anneeEdition"></label></td>
                </tr>
                <tr>
                    <td><label for="prix">Prix : </td>
                    <td><input type="text" name="prix" id="prix"></label></td>
                </tr>
                <tr>
                    <td><label for="langue">Langue : </td>
                    <td><input type="text" name="langue" id="langue"></label></td>
                </tr>
                <tr>
                    <td> </td>
                    <td><input type="submit" value="Sign in" id="submit"></td>
                </tr>
            </table>
        </fieldset>
    </form>

    <footer>Alexis SERBELLONI</footer>
</body>

</html>