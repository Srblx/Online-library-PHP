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

<body class="dark">
    <?php include('fournisseur.php');
    // require_once 'vendor/autoload.php';
    // Twig_Autoloader::register();
    ?>
    <!-- <form action="traitementPays.php" method="post">
    <fieldset class="fieldset">
        <legend><b>Recherche d'un fournisseur par pays</b></legend>
        <table>
            <tr>
                <td>
                    <label for="pays">Nom du fournisseur : </label>
                </td>
                <td>
                    <select id="pays" name="pays">
                        <option value="">Sélectionnez un fournisseur</option>
                        {% for fournisseur in fournisseurs %}
                        <option value="{{ fournisseur.pays }}">{{ fournisseur.pays }}</option>
                        {% endfor %}
                    </select>
                </td>
                <td>
                    <input type="submit" value="Rechercher" id="submit">
                </td>
            </tr>
        </table>
    </fieldset>
</form>

{% if resultats %}
    <table border=1, class="styleTab" >
        <tr class="key">
            <td class="td"><b>Code Fournisseur</b></td>
            <td class="td"><b>Raison Social</b></td>
            <td class="td"><b>Adresse Fournisseur</b></td>
            <td class="td"><b>Code Postal</b></td>
            <td class="td"><b>Localite</b></td>
            <td class="td"><b>Pays</b></td>
            <td class="td"><b>Téléphone</b></td>
            <td class="td"><b>Site internet</b></td>
            <td class="td"><b>Mail</b></td>
            <td class="td"><b>Fax</b></td>
        </tr>
        {% for donnee in resultats %}
            <tr class="value">
                <td class="td">{{ donnee.code_fournisseur }}  </td>
                <td class="td">{{ donnee.raison_social }} </td>
                <td class="td">{{ donnee.rue_fournisseur }} </td>
                <td class="td">{{ donnee.code_postal }} </td>
                <td class="td">{{ donnee.localite }} </td>
                <td class="td">{{ donnee.pays }} </td>
                <td class="td">{{ donnee.tel_fournisseur }} </td>
                <td class="td">{{ donnee.url_fournisseur }} </td>
                <td class="td">{{ donnee.mail_fournisseur }} </td>
                <td class="td">{{ donnee.fax_fournisseur }} </td>
            </tr>
        {% endfor %}
    </table>
{% endif %}

{% include "../footer.php" %} -->
    <?php include "../footer.php" ?>
</body>
</html>