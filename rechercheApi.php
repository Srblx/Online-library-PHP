<!DOCTYPE html>
<html lang="en">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recherche de livre</title>
  <link rel="stylesheet" href="./Css/styleApi.css">
  <link rel="stylesheet" href="styledark.css">
  <script src="./js/api.js" defer></script>
  <script src="js/dark.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
</head>
<body class="light">
  <?php include ('acceuil.php');?>
  <form class="form" action="rechercheApi.php" method="GET">
    <fieldset>
    <label for="search">Rechercher un livre :</label>
    <input type="text" id="search" name="search" />
    <input type="submit" value="Rechercher"/>
    </fieldset>
  </form>
  <div id="result"></div>
</body>
</html>
