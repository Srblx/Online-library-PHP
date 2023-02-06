<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styledark.css">
    <link rel="stylesheet" href="styledark.css">
    <script src="js/dark.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="light">
    <?php session_start(); ?>

    <h1>Ajouter un livre a la base de données</h1>
    <div class="btnDark" id="btnDark"><i class="fa-solid fa-moon"></i></div>
    <nav>
        <div class="infoCoG">
            <a href="deconnexion.php" id="deco">Déconnexion</a>
        </div>
        <div class="infoCoD">
            <?= "Bonjour " . '<br>'; ?>
            <?= $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?>
        </div>
    </nav>
    <div class="btn">
        <table id="tabAjout">
            <tr>
                <td><a href="acceuil.php" id="test">Accueil</a></td>
                <td>
                    <!-- & Pour faire un link vers ajouter un livre ou consultation  -->
                    <select name="livre" id="livre">
                        <option value="">Sélectionnez une option</option>
                        <option value="afficher.php">Afficher les livres</option>
                        <option value="afficherAuteur.php">Recherche d'un livre par auteurs</option>
                        <option value="afficherTitre.php">Recherche d'un livre par titre</option>
                        <option value="afficheTheme.php">Recherche d'un livre par thèmes</option>
                        <option value="afficheEdit.php">Recherche d'un livre par maison d'édition</option>
                        <option value="affichePage.php">Recherche d'un livre par Nb de page</option>
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
                        <label for="titre">Titre :<sup>*</sup></label>
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
                        <input type="text" name="theme" id="theme">
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
                        <label for="nomAuteur">Nom de l'auteur :<sup>*</sup></label>
                    </td>
                    <td>
                        <input type="text" name="nomAuteur" id="nomAuteur" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="prenomAuteur">Prénom de l'auteur :<sup>*</sup></label>
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
                        <input type="text" name="editeur" id="editeur">
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
                        <label for="langue">Langue : </label>
                    </td>
                    <td>
                        <input type="text" name="langue" id="langue">
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