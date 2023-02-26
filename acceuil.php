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
  <script src="js/appNav.js" defer></script>
  <script src="js/slide.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
</head>

<body class="light" id="accueil">
<?php
session_start();

// Vérifier si le temps de début de session est enregistré dans la variable $_SESSION
if (!isset($_SESSION['start_time'])) {
  $_SESSION['start_time'] = date('Y-m-d H:i:s');
}

if (!isset($_SESSION['role'])) {
  header("Location: index.php");
  exit();
}
?>
 <script>
    // Récupération de l'heure de départ en JavaScript
    let startTimestamp = Date.parse('<?php echo $_SESSION['start_time'] ?>');

    // Vérification que startTimestamp est un nombre valide
    if (isNaN(startTimestamp)) {
      console.error('Invalid start time:', '<?php echo $_SESSION['start_time'] ?>');
      startTimestamp = Date.now(); // Utiliser l'heure actuelle si startTime est invalide
    }
  </script>

  <h1>Bibliothèque en ligne</h1>
  <div class="btnDark" id="btnDark"><i class="fa-solid fa-moon"></i> </div>
  <nav>
    </div>
    <div class="infoCoG">

      <a href="deconnexion.php" id="deco" onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">Déconnexion</a>
    </div>
    <div class="infoCoD">
      <?= "Bonjour " . '<br>'; ?>
      <?= $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' ' . $_SESSION['role']; ?>
    </div>
  </nav>
  <div class="btn">
    <a href="slideAcceuil.php" id="test" onclick="alert('Vous allez être rediriger sur la page d\'accueil !');">Accueil</a>
    <i class="fa-brands fa-readme" style="color: #0366d6;"></i>
    <a href="fournisseur/fournisseur.php" id="test">Fournisseur</a>
    <select name="livre" id="livre">
      <option value="">Sélectionnez une option</option>
      <option value="afficher.php">Afficher les livres</option>
      <option value="afficherAuteur.php" class="option">Recherche d'un livre par auteurs</option>
      <option value="afficherTitre.php" class="option">Recherche d'un livre par titre</option>
      <option value="afficheTheme.php" class="option">Recherche d'un livre par thèmes</option>
      <option value="affichePage.php" class="option">Recherche d'un livre par Nb de page</option>
      <option value="afficheEdit.php" class="option">Recherche d'un livre par maison éditeur</option>
      <option value="afficheLangue.php" class="option">Recherche d'un livre par langue</option>
      <option value="affichePrix.php" class="option">Recherche d'un livre par prix</option>
      <?php if ($_SESSION['role'] === 1) { ?>
        <option value="ajouter.php" class="option">Ajouter un livre</option>
      <?php } ?>
      <option value="rechercheApi.php">Recherche par ISBN</option>
    </select>
    <span id="timer"></span>
  </div>
  <h2 id="title">Bienvenue sur le site de consultation de livres</h2>
  <script>// Récupération de l'heure de départ
// Récupération de l'heure de départ
let startTime = Date.parse('<?php echo $_SESSION['start_time'] ?>');
// let startTimestamp = Date.parse(startTime);

// Vérification que startTime est une date valide
if (isNaN(startTimestamp)) {
  console.error('Invalid start time:', startTime);
  startTimestamp = Date.now(); // Utiliser l'heure actuelle si startTime est invalide
}

// Fonction pour mettre à jour le compteur de temps
function updateTimer() {
   // Récupération du timestamp actuel en millisecondes
  let now = Date.now();
  // Calcul du temps écoulé depuis le début de la session en millisecondes
  let elapsedTime = now - startTimestamp
  // Calcul des heures écoulées
  let hours = Math.floor(elapsedTime / 3600000); 
   // Calcul des minutes écoulées
  let minutes = Math.floor((elapsedTime % 3600000) / 60000);
   // Calcul des secondes écoulées
  let seconds = Math.floor((elapsedTime % 60000) / 1000);
   // Récupération de l'élément HTML pour afficher le timer
  let timer = document.getElementById("timer");
  // Formatage de l'affichage du timer
  timer.innerHTML = hours + "H " + minutes + "M " + seconds + "s";
   // Mise à jour du timer toutes les secondes
  setTimeout(updateTimer, 1000);
}

 // Lancement de la mise à jour du timer
updateTimer();
</script>

</body>

</html>