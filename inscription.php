<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="./Css/styleIndex.css">
    <style>
        fieldset {
            background-color: white;
        }

        legend {
            color: rgba(73, 73, 253, 0.899);
            ;
            font-size: larger;
        }
    </style>
</head>

<body>
    <div class="bandeau">📖</div>
    <h1>Incription a notre bibliothèque</h1>

    <form action="traitementInscription.php" method="post">
        <fieldset>
            <legend>Inscription</legend>
            <table>
                <tr>
                    <td>
                        <label for="firstName">Nom <sup>*</sup>: </label>
                    </td>
                    <td><input type="text" name="firstName" id="firstName"></td>
                </tr>
                <tr>
                    <td><label for="lastName">Prénom <sup>*</sup>: </label></td>
                    <td><input type="text" name="lastName" id="lastName"></td>
                </tr>
                <tr>
                    <td><label for="mail">E-mail <sup>*</sup> : </label></td>
                    <td><input type="mail" name="mail" id="mail"></td>
                </tr>
                <tr>
                    <td><label for="mdp">Mot De Passe <sup>*</sup> : </label></td>
                    <td><input type="password" name="mdp" id="mdp"></td>
                </tr>
                <tr>
                    <td><input type="submit" id="submit" value="S'enregistrer"></td>
                </tr>
            </table>
        </fieldset>
    </form>

</body>

</html>