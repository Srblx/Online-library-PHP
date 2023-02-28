<?php require '../config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recherche Par Auteur</title>
  <script src="../js/dark.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../Css/style.css">
  <link rel="stylesheet" href="../Css/styledark.css">
</head>

<body class="light">
  <?php include "acceuil.php" ?>
  <!-- form -->
  <form action="afficherAuteur.php" method="post">
    <fieldset class="fieldset">
      <legend><b>Recherche d'un livre par nom d'auteur</b></legend>
      <label for="nomAuteur">Nom de l'auteur : </label>
      <select name="nomAuteur" id="nomAuteur" onchange="validerSelection()">
        <option value="">Sélectionnez un Auteur</option>
        <?php
        $request = "SELECT DISTINCT nomAuteur FROM `livre`";
        $result = $connect->query($request);

        while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
          echo '<option value="' . $donnees->nomAuteur . '">' . $donnees->nomAuteur . '</option>';
        } ?>
      </select>
    </fieldset>
  </form>
  <!-- Affichege du tableau de resultat de recherche -->
  <?php
  if (isset($_POST['nomAuteur'])) {
    // Si la connexion fonctionne
    $search = $_POST['nomAuteur'];

    $request = " SELECT * FROM `livre` WHERE `nomAuteur` = '$search'";
    $result = $connect->query($request);


    echo '<table border=1, class="styleTab" >';
    echo '<tr class="key">';
    echo '<td>' . '<b>' .  'ISBN ' . '</b>' . '</td>';
    echo '<td>' . '<b>' .  'Titre ' . '</b>' . '</td>';
    echo '<td>' . '<b>' .  'Thème ' . '</b>' . '</td>';
    echo '<td>' . '<b>' .  'Nombre Pages' . '</b>' . '</td>';
    echo '<td>' . '<b>' .  'Format' . '</b>' . '</td>';
    echo '<td>' . '<b>' . 'Nom auteur' . '</b>' . '</td>';
    echo '<td>' . '<b>' . 'Prénom auteur' . '</b>' . '</td>';
    echo '<td>' . '<b>' . 'Editeur' . '</b>' . '</td>';
    echo '<td>' . '<b>' . 'Année d\'édition' . '</b>' . '</td>';
    echo '<td>' . '<b>' . 'Prix' . '</b>' . '</td>';
    echo '<td>' . '<b>' . 'Langue' . '</b>' . '</td>';
    if ($_SESSION['role'] === 1) {
      //~ Si l'utilisateur est un administrateur, afficher les deux dernières colonnes
      echo '<td class="td">' . '<b>' . '' . '</b>' . '</td>';
      echo '<td class="td">' . '<b>' . '' . '</b>' . '</td>';
    }
    echo '</tr>';

    while ($donnee = $result->fetch(PDO::FETCH_OBJ)) {

      //~ Les valeurs que j'affiche dans le tableau
      echo '<tr class="value">';
      echo '<td>' . $donnee->isbn . "  " . '</td>';
      echo '<td>' . $donnee->titre . "  " . '</td>';
      echo '<td>' . $donnee->theme . " " . '</td>';
      echo '<td>' . $donnee->nombreDePage . " " . '</td>';
      echo '<td>' . $donnee->format . " " . '</td>';
      echo '<td>' . $donnee->nomAuteur . " " . '</td>';
      echo '<td>' . $donnee->prenomAuteur . " " . '</td>';
      echo '<td>' . $donnee->editeur . " " . '</td>';
      echo '<td>' . $donnee->anneeEdition . " " . '</td>';
      echo '<td>' . $donnee->prix . " " . '</td>';
      echo '<td>' . $donnee->langue . " " . '</td>';

      if ($_SESSION['role'] === 1) {
        //~ Si l'utilisateur est un administrateur, afficher les deux dernières colonnes
        echo '<td><a href="modifierLigne.php?id=' . $donnee->id . '"><i class="fa-solid fa-pen"></i></a></td>';
        echo "<td style='text-align:center;'><a href='javascript:void(0)' onclick='confirmDelete(" . $donnee->id . ")' style='color: red;'><i class='fa fa-trash'></i></a></td>";
      }
      echo '</tr>';
    }
  }
  echo '</table>';
  ?>
  <?php include "../footer.php" ?>
</body>

</html>