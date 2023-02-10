<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Par Thèmes</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styledark.css">
    <script src="js/dark.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="light">
    <?php include "acceuil.php"?>
<!-- form -->
    <form action="afficherTheme.php" method="post">
        <fieldset>
            <legend><b>Recherche d'un livre par thème</b></legend>
            <table>
                <tr>
                    <td>
                        <label for="theme">Thèmes recherché : </label>
                    </td>
                    <td>
                        <input type="text" id="theme" name="theme">
                    </td>
                    <td>
                        <input type="submit" value="Rechercher" id="submit">
                    </td>
                </tr>

            </table>
        </fieldset>
    </form>
    <?php include "footer.php" ?>
</body>
</html>