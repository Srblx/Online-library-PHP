<!DOCTYPE html>
<html lang="en">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recherche de livre</title>
  <link rel="stylesheet" href="style.css">
  <!-- <script src="./js/app.js" defer></script> -->
  <link rel="stylesheet" href="styledark.css">
  <script src="js/dark.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
      table {
        border-collapse: collapse;
        width: 100%;
        background-color: red;
      }
      th, td {
        text-align: left;
        padding: 8px;
        border: 1px solid black;
      }
    th {
      background-color: #ddd;
    }
    </style>
</head>
<body class="light">
  <?php include ('acceuil.php');?>
  <form class="form" action="test.php" method="GET">
    <label for="search">Rechercher un livre :</label>
    <input type="text" id="search" name="search" />
    <input type="submit" value="Rechercher"/>
  </form>
  <div id="result"></div>

  <script>
    const form = document.querySelector('form');
    const resultDiv = document.querySelector('#result');

    form.addEventListener('submit', event => {
      event.preventDefault();

      const searchInput = document.querySelector('#search');
      const isbn = searchInput.value;

      fetch(`https://openlibrary.org/isbn/${isbn}.json`)
        .then(response => response.json())
        .then(book => {
          const coverId = book.cover_i;
          const coverUrl = coverId ? `https://covers.openlibrary.org/b/id/${coverId}-M.jpg` : '';

          const table = document.createElement('table');
          const headerRow = table.insertRow();
          headerRow.innerHTML = `<th>Champ</th><th>Valeur</th>`;
          table.insertRow().innerHTML = `<td>Titre</td><td>${book.title}</td>`;
          table.insertRow().innerHTML = `<td>Auteur</td><td>${book.author_name?.join(', ') || 'Inconnu'}</td>`;
          table.insertRow().innerHTML = `<td>Editeur</td><td>${book.publisher?.[0] || 'Inconnu'}</td>`;
          table.insertRow().innerHTML = `<td>Date de publication</td><td>${book.publish_date?.[0] || 'Inconnue'}</td>`;
          table.insertRow().innerHTML = `<td>Description</td><td>${book.description || 'Aucune description disponible.'}</td>`;
          if (coverUrl) {
            const coverRow = table.insertRow();
            coverRow.innerHTML = `<td>Couverture</td><td><img src="${coverUrl}" alt="Couverture du livre"></td>`;
          }

          resultDiv.innerHTML = '';
          resultDiv.appendChild(table);
        })
        .catch(error => {
          resultDiv.innerHTML = `<p>Erreur : ${error.message}</p>`;
        });
    });
  </script>
</body>
</html>
