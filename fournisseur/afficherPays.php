<?php require '../config.php'; ?>

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