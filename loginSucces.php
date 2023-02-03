<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="styleIndex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="bandeau"> <i class="fa-solid fa-bookmark"></i>
        <i class="fa-sharp fa-solid fa-book"></i>
    </div>
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
            <h3 style="color:#00c073;">Vous etes inscrit ! Connectez vous pour acceder a notre bibilothèque </h3>
        </form>
    </div>

</body>

</html>