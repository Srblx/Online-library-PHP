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

<body class="ligth">
  <?php session_start();
  if (!isset($_SESSION['role']) || $_SESSION['role'] != "1") {
    header("Location: ../index.php");
    exit;
  } ?>
  
 <!-- <script>
  // Alerte d'inscription 
  alert('Les fournisseurs non-inscrits doivent s\'inscrire en selectionnant "Ajouter un fournisseur" dans le menu.');
  </script> -->
  
  <h1>Bibliothèque en ligne</h1>
  <div class="btnDark" id="btnDark"><i class="fa-solid fa-moon"></i></div>
  <nav>

    <!-- Mode dark  -->
    </div>
    <div class="infoCoG">

      <a href="deco.php" id="deco" onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">Déconnexion</a>
    </div>
    <div class="infoCoD">
      <?= "Bonjour " . '<br>'; ?>
      <?= $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?>
    </div>
  </nav>
  <!-- </form> -->
  <div class="btn">
    <a href="../slideAcceuil.php" id="test" onclick="alert('Vous allez être rediriger sur la page d\'accueil !');">Accueil</a>
    <i class="fa-brands fa-readme" style="color: #0366d6;"></i>
    <a href="fournisseur/fournisseur.php" id="test">Fournisseur</a>
    <!-- & Pour faire un link vers ajouter un livre ou consultation  -->
    <select name="livre" id="livre">
      <option value="">Sélectionnez une option</option>
      <option value="afficherFournisseur.php">Afficher les fournisseurs</option>
      <option value="afficherRaisonSoc.php" class="option">
        Recherche d'un fournisseur par raison social
      </option>
      <option value="afficherLocalite.php" class="option">
        Recherche d'un fournisseur par localité
      </option>
      <option value="afficherPays.php" class="option">
        Recherche d'un fournisseur par pays
      </option>
      <?php if ($_SESSION['role'] === 1) { ?>
        <option value="ajouterFournisseur.php" class="option">Ajouter un fournisseur</option>
      <?php } ?>
    </select>

    <script>
      // Fonction qui renvoie vers les deux autre fichier php avec un event onchange
      document.getElementById("livre").onchange = function() {
        if (this.value) {
          window.location.href = this.value;
        }
      };
    </script>

  </div>
  <h2 id="title">Bienvenue sur l'acceuil fournisseur</h2>
</body>

</html>