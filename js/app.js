
// Ajout d'un écouteur d'événement sur l'élément HTML avec l'identifiant "titre"
document.getElementById("titre").addEventListener("input", function() {
  // Récupération de la valeur actuelle du champ "titre"
  const titre = this.value;
  
  // Vérification que la longueur de la valeur est supérieure à zéro
  if (titre.length > 0) {
    // Requête fetch pour récupérer les titres correspondants depuis l'API
    fetch(`http://localhost/bibliotheque/api/titres.php?titre=${titre}`)
      .then(response => response.json())
      .then(data => {
        // Récupération de l'élément HTML avec l'identifiant "suggestions"
        const suggestions = document.getElementById("suggestions");
        // Suppression du contenu actuel de l'élément "suggestions"
        suggestions.innerHTML = "";
        // Boucle sur les données reçues de l'API
        data.forEach(titre => {
          // Création d'un nouvel élément "option"
          const option = document.createElement("option");
          // Définition de la valeur de l'élément "option"
          option.value = titre;
          // Ajout de l'élément "option" dans l'élément "suggestions"
          suggestions.appendChild(option);
        });
      });
  }
});
