<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="./Css/titreBarre.css">
</head>

<body><?php session_start(); ?>
  <style>
    body {
      background: url(./img/9.jpg);
      font-family: Arial, Helvetica, sans-serif;
    }

    h1,
    .btn {
      display: grid;
      justify-content: center;
    }

    h2 {
      background-color: grey;
      color: white;
      text-decoration: underline;
      padding-left: 10px;
      font-style: italic;
    }

    select,
    a,
    .btn {
      text-decoration: none;
      border: none;
      color: rgb(0, 102, 255);
      font-size: 15px;
      font-weight: bold;
    }

    footer {
      position: absolute;
      bottom: 0;
      left: 45%;
    }
  </style>
  <h1>Bibliothèque en ligne</h1>
  <?php

  echo "Bonjour " . $_SESSION['prenom'];
  echo $_SESSION['nom'];
  ?>
  <div class="btn">
    <table>
      <tr>
        <td><a href="acceuil.html">Accueil</a></td>
        <td>
          <!-- & Pour faire un link vers ajouter un livre ou consultation  -->
          <select name="livre" id="livre">
            <option value="">Sélectionnez une option</option>
            <option value="afficher.php">Afficher les livres</option>
            <option value="afficherAuteur.php">
              Recherche d'un livre par auteurs
            </option>
            <option value="afficherTitre.php">
              Recherche d'un livre par titre
            </option>
            <option value="afficheTheme.php">
              Recherche d'un livre par thèmes
            </option>
            <option value="affichePage.php">
              Recherche d'un livre par Nb de page
            </option>
            <option value="afficheEdit.php">
              Recherche d'un livre par maison d'édition
            </option>
            <option value="afficheLangue.php">
              Recherche d'un livre par langue
            </option>
            <option value="affichePrix.php">
              Recherche d'un livre par prix
            </option>
            <option value="ajouter.php">Ajouter un livre</option>
          </select>
          <!-- </form> -->

          <script>
            // Fonction qui renvoie vers les deux autre fichier php avec un event onchange
            document.getElementById("livre").onchange = function() {
              if (this.value) {
                window.location.href = this.value;
              }
            };
          </script>
        </td>
      </tr>
    </table>
  </div>
  <h2>Bienvenue sur le site de consultation de livres</h2>

  <footer>
    <p>Alexis SERBELLONI</p>
  </footer>
</body>

</html>