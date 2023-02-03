<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body><?php session_start(); ?>
    <h1>Bibliothèque en ligne</h1>
    <div class="infoCo">
        <a href="deconnexion.php">Déconnexion</a>
        <?php

        echo "Bonjour " . $_SESSION['prenom'];
        echo $_SESSION['nom'];
        ?>
    </div>
    <div class="btn">
        <table>
            <tr>
                <td><a href="acceuil.html">Accueil</a></td>
                <td>
                    <!-- & Pour faire un link vers ajouter un livre ou consultation  -->
                    <select name="livre" id="livre">
                        <option value="">Sélectionnez une option</option>
                        <option value="afficher.php">Afficher les livres</option>
                        <option value="afficherAuteur.php">
                            Recherche d'un livre par auteurs
                        </option>
                        <option value="afficherTitre.php">
                            Recherche d'un livre par titre
                        </option>
                        <option value="afficheTheme.php">
                            Recherche d'un livre par thèmes
                        </option>
                        <option value="affichePage.php">
                            Recherche d'un livre par Nb de page
                        </option>
                        <option value="afficheEdit.php">
                            Recherche d'un livre par maison d'édition
                        </option>
                        <option value="afficheLangue.php">
                            Recherche d'un livre par langue
                        </option>
                        <option value="affichePrix.php">
                            Recherche d'un livre par prix
                        </option>
                        <option value="ajouter.php">Ajouter un livre</option>
                    </select>
                    <!-- </form> -->

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
    <?php
    // UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :id
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bibliotheque";
    // Récupérer l'ID de la ligne à partir du formulaire ou du paramètre d'URL
    $id = $_GET['id'];

    // Créer une connexion
    $connect = mysqli_connect($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if (!$connect) {
        die("Connexion échouée : " . mysqli_connect_error());
    }

    // $new_value = $_POST['titre'];
    // Récupérer les données de la base de données pour cette entrée
    $sql = "SELECT * FROM livre WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    // Fermer la connexion
    mysqli_close($connect);

    ?>
    <form action="traitmodifierLigne.php?id=<?= $id; ?>" method="post">
        <fieldset>
            <legend id="legend"><b>Modifier les informations d'un livre</b></legend>
            <table>
                <tr>
                    <td>
                        <label for="isbn">ISBN :</label>
                    </td>
                    <td>
                        <input type="text" name="isbn" id="isbn" value="<?= $row['isbn'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="titre">Titre :<sup>*</sup></label>
                    </td>
                    <td>
                        <input type="text" name="titre" id="titre" value="<?= $row['titre'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="theme">Theme :</label>
                    </td>
                    <td>
                        <input type="text" name="theme" id="theme" value="<?= $row['theme'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nbPage">Nombre de pages :</label>
                    </td>
                    <td>
                        <input type="text" name="nbPage" id="nbPage" <?= $row['nombreDePage'] ?>>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="format">Format
                    </td>
                    <td>
                        <input type="text" name="format" id="format" value="<?= $row['format'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nomAuteur">Nom de l'auteur :<sup>*</sup></label>
                    </td>
                    <td>
                        <input type="text" name="nomAuteur" id="nomAuteur" value="<?= $row['nomAuteur'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="prenomAuteur">Prénom de l'auteur :<sup>*</sup></label>
                    </td>
                    <td>
                        <input type="text" name="prenomAuteur" id="prenomAuteur" value="<?= $row['prenomAuteur'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="editeur">Editeur :</label>
                    </td>
                    <td>
                        <input type="text" name="editeur" id="editeur" value="<?= $row['editeur'] ?>">
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>
                        <label for="anneeEdition">Année d'édition :</label>
                    </td>
                    <td>
                        <input type="text" name="anneeEdition" id="anneeEdition" <?= $row['anneeEdition'] ?>>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">Prix :</label>
                    </td>
                    <td>
                        <input type="text" name="prix" id="prix" <?= $row['prix'] ?>>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="langue">Langue : </label>
                    </td>
                    <td>
                        <input type="text" name="langue" id="langue" value="<?= $row['langue'] ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Modifier" id="submit">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>


</body>

</html>