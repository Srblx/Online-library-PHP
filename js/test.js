const img = new Image();
img.src = coverUrl;
img.alt = 'Couverture du livre';
img.addEventListener('load', () => {
  const row = table.insertRow();
  row.innerHTML = '<td>Couverture</td>';
  const cell = row.insertCell();
  cell.appendChild(img);
});

