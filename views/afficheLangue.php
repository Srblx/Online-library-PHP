<?php require '../config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recherche Par Langue</title>
  <script src="../js/dark.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../Css/style.css">
  <link rel="stylesheet" href="../Css/styledark.css">
</head>

<body class="light">
  <?php include "acceuil.php" ?>
  <!-- form -->
  <form action="afficheLangue.php" method="post">
    <fieldset>
      <legend><b>Recherche d'un livre par langue</b></legend>
      <label for="langue">Langue du livre : </label>
      <select name="langue" id="langue" onchange="validerSelection()">
        <option value="">Sélectionnez une langue</option>
        <?php
        $request = "SELECT DISTINCT langue FROM `livre`";
        $result = $connect->query($request);

        while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
          echo '<option value="' . $donnees->langue . '">' . $donnees->langue . '</option>';
        } ?>
      </select>
    </fieldset>
  </form>
  <!-- Affichege du tableau de resultat de recherche -->
  <?php
  if (isset($_POST['langue'])) {
    // Si la connexion fonctionne
    $search = $_POST['langue'];

    $request = " SELECT * FROM `livre` WHERE `langue` = '$search'";
    $result = $connect->query($request);


    echo '<table border=1, class="styleTab" >';
    echo '<tr class="key">';
    echo '<td>' . '<b>' .  'ISBN ' . '</b>' . '</td>';
    echo '<td>' . '<b>' .  'Titre ' . '</b>' . '</td>';
    echo '<td>' . '<b>' .  'Thème ' . '</b>' . '</td>';
    echo '<td>' . '<b>' .  'Nombre Pages' . '</b>' . '</td>';
    echo '<td>' . '<b>' .  'Format' . '</b>' . '</td>';
    echo '<td>' . '<b>' . 'Auteur' . '</b>' . '</td>';
    // echo '<td>' . '<b>' . 'Nom auteur' . '</b>' . '</td>';
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
      if ($_SESSION['role'] === 1) {       
        //~ Les valeurs que j'affiche dans le tableau
                echo '<tr class="value">';
                echo '<td class="td">' . $donnee->isbn . "  " . '</td>';
                echo '<td class="td">' . $donnee->titre . "  " . '</td>';
                echo '<td class="td">' . $donnee->theme . " " . '</td>';
                echo '<td class="td">' . $donnee->nombreDePage . " " . '</td>';
                echo '<td class="td">' . $donnee->format . " " . '</td>';
                echo '<td class="td">' . $donnee->nomAuteur . " " . $donnee->prenomAuteur . " " . '</td>';
                // echo '<td class="td">' . $donnees->prenomAuteur . " " . '</td>';
                echo '<td class="td">' . $donnee->editeur . " " . '</td>';
                echo '<td class="td">' . $donnee->anneeEdition . " " . '</td>';
                echo '<td class="td">' . $donnee->prix . " " . '</td>';
                echo '<td class="td">' . $donnee->langue . " " . '</td>';
                echo '<td><a href="modifierLigne.php?id=' . $donnee->id . '"><i class="fa-solid fa-pen"></i></a></td>';
                echo "<td style='text-align:center;'><a href='javascript:void(0)' onclick='confirmDelete(" . $donnee->id . ")' style='color: red;'><i class='fa fa-trash'></i></a></td>";
                } else {
                    echo '<tr class="value">';
                echo '<td class="td">' . $donnee->isbn . "  " . '</td>';
                echo '<td class="td">' . $donnee->titre . "  " . '</td>';
                echo '<td class="td">' . $donnee->theme . " " . '</td>';
                echo '<td class="td">' . $donnee->nombreDePage . " " . '</td>';
                echo '<td class="td">' . $donnee->format . " " . '</td>';
                echo '<td class="td">' . $donnee->nomAuteur . " " . $donnee->prenomAuteur . " " . '</td>';
                // echo '<td class="td">' . $donnees->prenomAuteur . " " . '</td>';
                echo '<td class="td">' . $donnee->editeur . " " . '</td>';
                echo '<td class="td">' . $donnee->anneeEdition . " " . '</td>';
                echo '<td class="td">' . $donnee->prix . " " . '</td>';
                echo '<td class="td">' . $donnee->langue . " " . '</td>';
                }
        
      echo '</tr>';
    }
  }
  echo '</table>';
  ?>
  <?php
  include "../footer.php";
  ?>
</body>

</html>