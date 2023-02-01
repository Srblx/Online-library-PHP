<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Par Thèmes</title>
    <link rel="stylesheet" href="./Css/styleInput.css">
</head>

<body>
    <?php session_start(); ?>

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