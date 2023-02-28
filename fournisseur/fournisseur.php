<?php session_start();
if (!isset($_SESSION['role'])) {
  header("Location: ../index.php");
  exit;
} ?>
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
  <a href="../views/slideAcceuil.php" id="test" onclick="alert('Vous allez être rediriger sur la page d\'accueil !');">Accueil</a>
  <i class="fa-brands fa-readme" style="color: #0366d6;"></i>
  <a href="fournisseur.php" id="test">Fournisseur</a>
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