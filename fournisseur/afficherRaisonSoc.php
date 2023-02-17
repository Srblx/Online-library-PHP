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
    <form action="afficherRaisonSoc.php" method="post">
        <fieldset class="fieldset">
            <legend><b>Recherche d'un fournisseur par sa raison social</b></legend>
            <table>
                <tr>
                    <td>
                        <label for="raison_social">Nom du fournisseur : </label>
                    </td>
                    <td>
                        <select id="raison_social" name="raison_social">
                            <option value="">Sélectionnez un fournisseur</option>
                            <?php
                            try {
                                $connect = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');
                                $connect->query("SET NAMES 'utf8'");
                                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $request = "SELECT DISTINCT raison_social FROM `fornisseur`";
                                $result = $connect->query($request);

                                while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
                                    echo '<option value="' . $donnees->raison_social . '">' . $donnees->raison_social . '</option>';
                                }

                            } catch (PDOException $e) {
                                die('<p> Echec de connection. Erreur[' . $e->getCode() . '] : [' . $e->getMessage() . '<p>');
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="submit" value="Rechercher" id="submit">
                    </td>
                </tr>

            </table>
        </fieldset>
    </form>
    <?php 

   if (isset($_POST['raison_social'])) {
       // Si la connexion fonctionne
       $search = $_POST['raison_social'];

       $request = " SELECT * FROM `fornisseur` WHERE `raison_social` LIKE :raison_social ";
       $result = $connect->prepare($request);
       $raisonSoc = "%".$_POST['raison_social']."%";
       $result->bindParam(':raison_social', $raisonSoc, PDO::PARAM_STR);
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