<?php require '../config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/dark.js" defer></script>
    <script src="../js/slide.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../Css/styledark.css">
</head>

<body class="light">
    <?php include('fournisseur.php') ?>
    <form action="Traitement/traitementPays.php" method="post">
        <fieldset class="fieldset">
            <legend><b>Recherche d'un fournisseur par sa raison social</b></legend>
            <label for="pays">Nom du fournisseur : </label>
            <select id="pays" name="pays" onchange="validerSelection()">
                <option value="">Sélectionnez un fournisseur</option>
                <?php
                $request = "SELECT DISTINCT pays FROM `fornisseur`";
                $result = $connect->query($request);

                while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value="' . $donnees->pays . '">' . $donnees->pays . '</option>';
                } ?>
            </select>
        </fieldset>
    </form>
    <?php include "../footer.php" ?>
</body>

</html>