<?php require '../config.php' ?>

    <?php include('fournisseur.php') ?>
    <form action="afficherRaisonSoc.php" method="post">
        <fieldset class="fieldset">
            <legend><b>Recherche d'un fournisseur par sa raison social</b></legend>
            <label for="raison_social">Nom du fournisseur : </label>
            <select id="raison_social" name="raison_social" onchange="validerSelection()">
                <option value="">Sélectionnez un fournisseur</option>
                <?php
                $request = "SELECT DISTINCT raison_social FROM `fornisseur`";
                $result = $connect->query($request);
                while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value="' . $donnees->raison_social . '">' . $donnees->raison_social . '</option>';
                } ?>
            </select>
        </fieldset>
    </form>
    <?php

    if (isset($_POST['raison_social'])) {
        // Si la connexion fonctionne
        $search = $_POST['raison_social'];
        // Récupérer la valeur de recherche à partir de la méthode POST
        $search = $_POST['raison_social'];
        // Préparer la requête SQL pour sélectionner tous les enregistrements de la table "fornisseur" qui correspondent à la recherche
        $request = "SELECT * FROM `fornisseur` WHERE `raison_social` LIKE :raison_social";
        // Préparer la requête SQL avec PDO
        $result = $connect->prepare($request);
        // Ajouter des caractères génériques à la valeur de recherche pour rechercher des enregistrements avec des valeurs partielles qui correspondent
        $raisonSoc = "%" . $_POST['raison_social'] . "%";
        // Lier la valeur de recherche à la requête SQL préparée
        $result->bindParam(':raison_social', $raisonSoc, PDO::PARAM_STR);
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