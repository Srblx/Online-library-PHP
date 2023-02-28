<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <script src="js/dark.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./Css/styleIndex.css">
    <link rel="stylesheet" href="./Css/styledark.css">
</head>

<body class="light">
    <?php include "bandeau.php" ?>
    <div class="form">
        <!-- form -->
        <form action="PhpTraitement/traitementIndex.php" method="post">
            <h4>Entrez vos identifiants pour vous connectez : </h4>
            <label for="mail" class="label">Adresse mail <sup>*</sup>:</label>
            <input type="email" name="mail" id="mail" placeholder="*****@mail.fr" required>
            <label for="mdp" class="label">Mot de passe <sup>*</sup>:</label>
            <input type="password" name="mdp" id="mdp" placeholder="***************" required>
            <label for="connect"><input type="submit" value="Se connecter" id="send" name="connect"></label>
            <a href="resetMdp.php" class="link" id="mdpOublie">Mot de passe oublié</a>
            <br>
            <a href="inscription.php" class="link" id="inscrip">Inscrivez-vous</a>
        </form>
    </div>
    <script>
        // Vérification de la présence de la variable $_GET["passwordUpdated"]
        if (window.location.search.indexOf("passwordUpdated=1") !== -1) {
            // Affichage d'un message de confirmation
            alert("Le mot de passe a été mis à jour avec succès !");
        }
    </script>
    <?php include "footer.php" ?>
</body>

</html>