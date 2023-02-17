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
    <?php include('fournisseur.php');?>
    <form action="traitementAjoutFour.php" method="post">
    <fieldset>
        <legend id="legend"><b>Ajouter un fournisseur</b></legend>
        <table>
            <tr>
                <td>
                    <label for="code_fournisseur">Code Fournisseur :<sup>*</sup></label>
                </td>
                <td>
                    <input type="text" name="code_fournisseur" id="code_fournisseur">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="raison_social">Raison Sociale :<sup>*</sup></label>
                </td>
                <td>
                    <input type="text" name="raison_sociale" id="raison_sociale" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="rue_fournisseur">Adresse Fournisseur :</label>
                </td>
                <td>
                    <input type="text" name="rue_fournisseur" id="rue_fournisseur">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="code_postal">Code Postal :</label>
                </td>
                <td>
                    <input type="text" name="code_postal" id="code_postal">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="localite">Localité :</label>
                </td>
                <td>
                    <input type="text" name="localite" id="localite">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pays">Pays :<sup>*</sup></label>
                </td>
                <td>
                    <input type="text" name="pays" id="pays" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tel_fournisseur">Téléphone :<sup>*</sup></label>
                </td>
                <td>
                    <input type="text" name="tel_fournisseur" id="tel_fournisseur" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="url_internet">Site Internet :</label>
                </td>
                <td>
                    <input type="text" name="url_internet" id="url_internet">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="mail_fournisseur">E-mail :<sup>*</sup></label>
                </td>
                <td>
                    <input type="text" name="mail_fournisseur" id="mail_fournisseur">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fax_fournisseur">Fax :</label>
                </td>
                <td>
                    <input type="text" name="fax_fournisseur" id="fax_fournisseur">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Ajouter" id="submit">
                </td>
            </tr>
        </table>
    </fieldset>
</form>
     <?php include "../footer.php" ?>
</body>
</html>