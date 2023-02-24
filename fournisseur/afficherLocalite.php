<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../styledark.css">
  <script src="../js/dark.js" defer></script>
  <script src="../js/slide.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
</head>

<body class="light">
    <?php include('fournisseur.php')?>
    <form action="afficherLocalite.php" method="post">
        <fieldset class="fieldset">
            <legend><b>Recherche d'un fournisseur par sa localité</b></legend>
                <label for="localite">Nom du fournisseur : </label>
                <select id="localite" name="localite" onchange="validerSelection()">
                    <option value="">Sélectionnez un fournisseur</option>
                    <?php
                    try {
                        $connect = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');
                        $connect->query("SET NAMES 'utf8'");
                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $request = "SELECT DISTINCT localite FROM `fornisseur`";
                        $result = $connect->query($request);
                        while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
                            echo '<option value="' . $donnees->localite . '">' . $donnees->localite . '</option>';
                        }
                    } catch (PDOException $e) {
                        die('<p> Echec de connection. Erreur[' . $e->getCode() . '] : [' . $e->getMessage() . '<p>');
                    }
                    ?>
                </select>
        </fieldset>
    </form>
    <?php 

   if (isset($_POST['localite'])) {
    //* Si la connexion fonctionne
      // Récupérer la valeur de recherche à partir de la méthode POST
      $search = $_POST['localite'];
      // Préparer la requête SQL pour sélectionner tous les enregistrements de la table "fornisseur" qui correspondent à la recherche
      $request = "SELECT * FROM `fornisseur` WHERE `localite` LIKE :localite";
      // Préparer la requête SQL avec PDO
      $result = $connect->prepare($request);
      // Ajouter des caractères génériques à la valeur de recherche pour rechercher des enregistrements avec des valeurs partielles qui correspondent
      $localite = "%".$_POST['localite']."%";
      // Lier la valeur de recherche à la requête SQL préparée
      $result->bindParam(':localite', $localite, PDO::PARAM_STR);
      // Exécuter la requête SQL préparée pour sélectionner les enregistrements qui correspondent à la recherche
      $result->execute();

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

 
        while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
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
    }
?>
  <?php include "../footer.php" ?>

</body>
</html>