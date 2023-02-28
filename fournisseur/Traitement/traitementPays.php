<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Css/style.css">
    <link rel="stylesheet" href="../../Css/styledark.css">
    <script src="../../js/dark.js" defer></script>
    <script src="../../js/slide.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />

</head>

<body>
    <?php session_start();
    if (!isset($_SESSION['role'])) {
        header("Location: ../index.php");
        exit;
    } ?>
    <h1>Bibliothèque en ligne</h1>
    <div class="btnDark" id="btnDark"><i class="fa-solid fa-moon"></i></div>
    <nav>

        <!-- Mode dark  -->
        </div>
        <div class="infoCoG">

            <a href="deco.php" id="deco" onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">Déconnexion</a>
        </div>
        <div class="infoCoD">
            <?= "Bonjour " . '<br>'; ?>
            <?= $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?>
        </div>
    </nav>
    <!-- </form> -->
    <div class="btn">
        <a href="../views/slideAcceuil.php" id="test" onclick="alert('Vous allez être rediriger sur la page d\'accueil !');">Accueil</a>
        <i class="fa-brands fa-readme" style="color: #0366d6;"></i>
        <a href="fournisseur.php" id="test">Fournisseur</a>
    </div>
    <h2 id="title">Bienvenue sur l'acceuil fournisseur</h2>
    <a href="../afficherPays.php" class="backdisplay">Retour sur la page de recherche.</a>
    <?php
    // Connexion à la base de données
    require '../../config.php';

    // Récupération des données de la base de données
    if (isset($_POST['pays'])) {
        $query = 'SELECT * FROM fornisseur WHERE pays = :pays';
        $statement = $connect->prepare($query);
        $statement->bindParam(':pays', $_POST['pays']);
        $statement->execute();
        // $result = $statement->fetchAll(PDO::FETCH_OBJ);

        //~ Pour affiche les données de la bdd dans un tableau
        echo '<table border=1, class="styleTab" >';
        echo '<tr class="key">';
        echo '<td class="td">' . '<b>' . 'Code Fournisseur' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . 'Raison Social' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . 'Adresse Fournisseur' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . 'Code Postal' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . 'Localite' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . 'Pays' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . 'Téléphone' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . 'Site internet' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . 'Mail' . '</b>' . '</td>';
        echo '<td class="td">' . '<b>' . 'Fax' . '</b>' . '</td>';
        echo '</tr>';


        while ($donnees = $statement->fetch(PDO::FETCH_OBJ)) {
            //& $donnees recuperé avec la fonction ci dessus (ATTENTION array pas SENSIBLE a la CASSE)
            //~ Les valeurs que j'affiche dans le tableau
            echo '<tr class="value">';
            echo '<td class="td">' . $donnees->code_fournisseur . "  " . '</td>';
            echo '<td class="td">' . $donnees->raison_social . "  " . '</td>';
            echo '<td class="td">' . $donnees->rue_fournisseur . " " . '</td>';
            echo '<td class="td">' . $donnees->code_postal . " " . '</td>';
            echo '<td class="td">' . $donnees->localite . " " . '</td>';
            echo '<td class="td">' . $donnees->pays . " " . '</td>';
            echo '<td class="td">' . $donnees->tel_fournisseur . " " . '</td>';
            echo '<td class="td">' . $donnees->url_fournisseur . " " . '</td>';
            echo '<td class="td">' . $donnees->mail_fournisseur . " " . '</td>';
            echo '<td class="td">' . $donnees->fax_fournisseur . " " . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        $resultats = null;
    }
    // header('location: ../afficherPays.php');
    ?>
</body>

</html>