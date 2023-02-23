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