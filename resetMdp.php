<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/dark.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styleIndex.css">
    <link rel="stylesheet" href="Css/styledark.css">
</head>

<body class="light">
    <?php include "bandeau.php" ?>
    <div class="form">
        <form action="PhpTraitement/traitResetMdp.php" method="post">
            <h4>Mot de passe oublié : </h4>
            <label for="mail" class="label">Adresse mail<sup>*</sup>:</label>
            <input type="email" name="mail" id="mail" placeholder="******@mail.fr">
            <label for="newMdp" class="label">Mot de passe<sup>*</sup>:</label></td>
            <input type="password" name="newMdp" id="newMdp" placeholder="Nouveau mot de passe">
            <label for="ConfNewMdp" class="label">Confirme mot de passe <sup>*</sup>:</label></td>
            <input type="password" name="ConfNewMdp" id="ConfNewMdp" placeholder="Confirme mot de passe">
            <label for="connect"><input type="submit" value="Changer Mot De Passe" id="send"></label>
            <a href="index.php" class="link" id="retour">Retour à l'accueil</a>
        </form>
        <?php include "footer.php" ?>
    </div>
</body>

</html>