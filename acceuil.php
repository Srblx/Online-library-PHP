<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body><?php session_start(); ?>

  <h1>Bibliothèque en ligne</h1>
  <nav>
    <div class="infoCoG">
      <a href="deconnexion.php" id="deco">Déconnexion</a>
    </div>
    <div class="infoCoD">
      <?= "Bonjour " . '<br>'; ?>
      <?= $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?>
    </div>
  </nav>

  <div class="btn">
    <table>
      <tr>
        <td><a href="acceuil.php" id="test">Accueil</a></td>
        <td>
          <!-- & Pour faire un link vers ajouter un livre ou consultation  -->
          <select name="livre" id="livre">
            <option value="">Sélectionnez une option</option>
            <option value="afficher.php">Afficher les livres</option>
            <option value="afficherAuteur.php" class="option">
              Recherche d'un livre par auteurs
            </option>
            <option value="afficherTitre.php" class="option">
              Recherche d'un livre par titre
            </option>
            <option value="afficheTheme.php" class="option">
              Recherche d'un livre par thèmes
            </option>
            <option value="affichePage.php" class="option">
              Recherche d'un livre par Nb de page
            </option>
            <option value="afficheEdit.php" class="option">
              Recherche d'un livre par maison éditeur
            </option>
            <option value="afficheLangue.php" class="option">
              Recherche d'un livre par langue
            </option>
            <option value="affichePrix.php" class="option">
              Recherche d'un livre par prix
            </option>
            <option value="ajouter.php" class="option">Ajouter un livre</option>
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