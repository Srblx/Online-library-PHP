<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="styleIndex.css">
    <link rel="stylesheet" href="styledark.css">
    <script src="js/dark.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        fieldset {
            background-color: white;
        }

        legend {
            color: rgba(73, 73, 253, 0.899);
            ;
            font-size: larger;
        }

        body.dark .fieldsetBg {
            background-color: #333;
        }

        body.dark .fa-solid {
            color: #333;

        }

        body.dark .bandeau {
            background-color: #fff;
        }

        .btnDark {
            background-color: #24292E;
            border: 2px solid #fff;
        }

        body.dark .btnDark {
            border: 2px solid #333;
        }
    </style>
</head>

<body class="light">
    <div class="bandeau">
        <i class="fa-solid fa-bookmark"></i>
        <div class="btnDark" id="btnDark"><i class="fa-solid fa-moon"></i></div>
        <i class="fa-sharp fa-solid fa-book"></i>
    </div>
    <h1>Incription a notre bibliothèque</h1>

    <form action="traitementInscription.php" method="post">
        <fieldset class="fieldsetBg">
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
                    <!-- <td><label for="mdp">Mot de passe <sup>*</sup> : </label></td>
                    <td><input type="password" name="mdp" id="mdp"></td>
                </tr>
                <tr>
                    <td><label for="mdp2">Confirmer <sup>*</sup> : </label></td>
                    <td><input type="password" name="mdp2" id="mdp2"></td>
                </tr> -->
                    <form action="<?php //! LES MOT DE PASSE NE CORRESPONDE PAS MAIS JE PEUT SOUMETTRE §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§
                                    echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <!-- autres champs -->
                        <!-- <table> -->
                <tr>
                    <td><label for="mdp">Mot de passe <sup>*</sup> : </label></td>
                    <td> <input type="password" name="mdp"></td>
                </tr>
                <tr>
                    <td><label for="mdp2">Confirmer <sup>*</sup> : </label></td>
                    <td><input type="password" name="mdp2"></td>
                </tr>
                <span class="error">
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $password = $_POST["password"];
                        $confirmPassword = $_POST["confirmPassword"];

                        if ($password !== $confirmPassword) {
                            $erreur = "Les mots de passe ne correspondent pas.";
                            echo $erreur;
                        }
                    }
                    ?></span>
                <tr>
                    <td><label for="reset"></label><input type="reset" value="Reset" id="reset"></td>
                    <td><input type="submit" value="Submit" id="send"></td>
                    <td><a href="index.php">Retour à l'accueil</a></td>
                </tr>
                <!-- </table> -->
    </form>

    </table>
    </fieldset>
    </form>

</body>

</html>