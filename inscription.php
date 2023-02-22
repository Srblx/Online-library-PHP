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
    <script src="js/app.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styleInscrip.css">
</head>

<body class="light">
<?php include "bandeau.php" ?>
    <h1>Incription notre bibliothèque</h1>
<!-- form -->
    <form action="traitementInscription.php" method="post">
        <fieldset class="fieldsetBg">
            <legend>Inscription</legend>
            <label for="role" class="label">Rôle <sup>*</sup> : </label>
                    <select name="role" id="role">
                    <option value="user">Utilisateur</option>
                    <option value="admin">Administrateur</option>
                    </select>
                    <label for="firstName" class="label">Nom <sup>*</sup>: </label>
                    <input type="text" name="firstName" id="firstName" minlength="2" maxlength="30" required>
                    <label for="lastName" class="label">Prénom <sup>*</sup>: </label>
                    <input type="text" name="lastName" id="lastName" minlength="2" maxlength="30" required>
                    <label for="mail" class="label">E-mail <sup>*</sup> : </label>
                    <input type="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="mail" id="mail">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label for="mdp" class="label">Mot de passe <sup>*</sup> : </label>
                    <input type="password" name="mdp" required minlength="8">
                    >
                    <label for="mdp2" class="label">Confirmer <sup>*</sup> : </label>
                    <input type="password" name="mdp2" required>
                    <span class="error">
                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $password = $_POST["mdp"];
                            $confirmPassword = $_POST["mdp2"];
                        
                            if ($password !== $confirmPassword) {
                                $erreur = "Les mots de passe ne correspondent pas.";
                                echo $erreur;
                            }}?>
                    </span>
                    <input type="submit" value="Submit" id="send">
                    <a href="index.php">Retour à l'accueil</a>
                    <label for="reset"></label><input type="reset" value="Reset" id="reset">
</form>
        </fieldset>
    </form>
    <?php include "footer.php" ?>
</body>

</html>