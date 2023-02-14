<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styledark.css">
    <script src="js/dark.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="light">
    <h1>Bibliothèque en ligne</h1>
<?php include "acceuil.php"; 
        $connex = mysqli_connect('localhost', 'root', '', 'bibliotheque');
        $id = $_GET['id'];
        $query = "SELECT * FROM livre WHERE id = '$id'";
        $result = mysqli_query($connex, $query);
        $row = mysqli_fetch_array($result);
        mysqli_close($connex);

        ?>
 <!-- form -->
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
<?php include "footer.php" ?>
</body>

</html>