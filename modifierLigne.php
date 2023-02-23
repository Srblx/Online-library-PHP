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
<?php 
    include "acceuil.php"; 
    $dsn = "mysql:host=localhost;dbname=bibliotheque;charset=utf8";
    $username = "root";
    $password = "";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    try {
        $pdo = new PDO($dsn, $username, $password, $options);
        $id = $_GET['id'];
        $query = "SELECT * FROM livre WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        $pdo = null;
    } catch (PDOException $e) {
        die('<p> Echec de connection. Erreur['.$e->getCode().'] : ['.$e->getMessage().'<p>');
    }
?>
 <!-- form -->
    <form action="traitmodifierLigne.php?id=<?= $id; ?>" method="post">
        <fieldset>
            <legend id="legend"><b>Modifier les informations d'un livre</b></legend>
            <label for="isbn">ISBN :</label>
            <input type="text" name="isbn" id="isbn" value="<?= $row['isbn'] ?>">
            <label for="titre">Titre :<sup>*</sup></label>
            <input type="text" name="titre" id="titre" value="<?= $row['titre'] ?>">
            <label for="theme">Theme :</label>
            <input type="text" name="theme" id="theme" value="<?= $row['theme'] ?>">
            <label for="nbPage">Nombre de pages :</label>
            <input type="text" name="nbPage" id="nbPage" value="<?= $row['nombreDePage'] ?>">
            <label for="format">Format :</label>
            <input type="text" name="format" id="format" value="<?= $row['format'] ?>">
            <label for="nomAuteur">Nom de l'auteur :<sup>*</sup></label>
            <input type="text" name="nomAuteur" id="nomAuteur" value="<?= $row['nomAuteur'] ?>">
            <label for="prenomAuteur">Prénom de l'auteur :<sup>*</sup></label>
            <input type="text" name="prenomAuteur" id="prenomAuteur" value="<?= $row['prenomAuteur'] ?>">
            <label for="editeur">Editeur :</label>
            <input type="text" name="editeur" id="editeur" value="<?= $row['editeur'] ?>">
            <label for="anneeEdition">Année d'édition :</label>
            <input type="text" name="anneeEdition" id="anneeEdition" value="<?= $row['anneeEdition'] ?>">
            <label for="prix">Prix :</label>
            <input type="text" name="prix" id="prix" value="<?= $row['prix'] ?>">
            <label for="langue">Langue : </label>
            <input type="text" name="langue" id="langue" value="<?= $row['langue'] ?>">
            <input type="submit" value="Modifier" id="submit">
        </fieldset>
    </form>
<?php include "footer.php" ?>
</body>

</html>