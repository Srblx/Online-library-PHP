<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="styledark.css">
  <script src="js/dark.js" defer></script>
  <script src="js/slide.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
</head>

<body class="light">
  <?php session_start();  ?>
 
  <?php
?>
  
  <h1>Bibliothèque en ligne</h1>
  <div class="btnDark" id="btnDark"><i class="fa-solid fa-moon"></i></div>
  <nav>

    <!-- Mode dark  -->
    </div>
    <div class="infoCoG">

      <a href="deconnexion.php" id="deco" onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">Déconnexion</a>
    </div>
    <div class="infoCoD">
      <?= "Bonjour " . '<br>'; ?>
      <?= $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?>
    </div>
  </nav>
<!-- </form> -->
  <div class="btn">
    <table>
      <tr>
        <td><a href="slideAcceuil.php" id="test" onclick="alert('Vous allez être rediriger sur la page d\'accueil !');">Accueil</a></td>
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
  <h2 id="title">Bienvenue sur le site de consultation de livres</h2>
  
</body>
</html>