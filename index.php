<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="./Css/styleIndex.css">
</head>

<body>
    <div class="bandeau">📖</div>
    <H1>Consulter notre bibliothèque </H1>
    <div class="form">

        <form action="traitementIndex.php" method="post">
            <!--  -->
            <table>
                <tr>
                    <td>
                        <h4>Entrez vos identifiants pour vous connectez : </h4>
                    </td>
                </tr>
                <tr>
                    <td><label for="mail">Adresse mail <sup>*</sup>:</label></td>
                    <td><input type="mail" name="mail" id="mail" placeholder="*****@mail.fr"></td>
                </tr>
                <tr>
                    <td><label for="mdp">Mot de passe <sup>*</sup>:</label></td>
                    <td><input type="password" name="mdp" id="mdp" placeholder="***************"></td>
                </tr>
                <tr>
                    <td>
                        <label for="connect"><input type="submit" value="Se connecter"></label>
                    </td>
                    <td>
                        <a href="inscription.php">Inscrivez-vous</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>