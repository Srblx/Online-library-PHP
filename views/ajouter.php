<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/dark.js" defer></script>
    <script src="../js/app.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../Css/styledark.css">
</head>

<body class="light">
    <?php include "acceuil.php" ?>
    <!-- form -->
    <form action="../PhpTraitement/baseDeDonnee.php" method="post" id="formAdd">
        <fieldset>
            <legend id="legend"><b>Ajouter un livre</b></legend>
            <label for="isbn">ISBN :</label>
            <input type="text" name="isbn" id="isbn">
            <label for="titre">Titre :<sup>*</sup></label>
            <input type="text" name="titre" id="titre" required>
            <label for="theme">Theme :</label>
            <input type="text" name="theme" id="theme">
            <label for="nbPage">Nombre de pages :</label>
            <input type="text" name="nbPage" id="nbPage">
            <label for="format">Format </label>
            <input type="text" name="format" id="format">
            <label for="nomAuteur">Nom de l'auteur :<sup>*</sup></label>
            <input type="text" name="nomAuteur" id="nomAuteur" required>
            <label for="prenomAuteur">Prénom de l'auteur :<sup>*</sup></label>
            <input type="text" name="prenomAuteur" id="prenomAuteur" required>
            <label for="editeur">Editeur :</label>
            <input type="text" name="editeur" id="editeur">
            <label for="anneeEdition">Année d'édition :</label>
            <input type="text" name="anneeEdition" id="anneeEdition">
            <label for="prix">Prix :</label>
            <input type="text" name="prix" id="prix">
            <label for="langue">Langue : </label>
            <input type="text" name="langue" id="langue">
            <input type="submit" value="Ajouter" id="submit">
        </fieldset>
    </form>
    <?php include "../footer.php" ?>
</body>

</html>