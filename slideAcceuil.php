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
  <?php include "acceuil.php";?>
  <!-- Conteneur principal du diaporama -->
  <div id="slideshow">
    <a href="afficher.php">
      <img src="./Css/img/1.jpg" alt="Image 1" class="zoom">
      <img src="./Css/img/2.jpg" alt="Image 2" class="zoom">
      <img src="./Css/img/3.jpg" alt="Image 3" class="zoom">
      <img src="./Css/img/4.jpg" alt="Image 4" class="zoom">
      <img src="./Css/img/5.jpg" alt="Image 5" class="zoom">
      <img src="./Css/img/6.jpg" alt="Image 6" class="zoom">
      <img src="./Css/img/7.jpg" alt="Image 7" class="zoom">
    </a>
  </div>
  <?php include "footer.php";?>
</body>
</html>