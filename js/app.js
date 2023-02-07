
// Ajout d'un écouteur d'événement sur l'élément HTML avec l'identifiant "titre"
document.getElementById("titre").addEventListener("input", function() {
  // Récupération de la valeur actuelle du champ "titre"
  const titre = this.value;
  
  // Vérification que la longueur de la valeur est supérieure à zéro
  if (titre.length > 0) {
//! Premiere methode sans l'utilisation d'ajax pour la suggestion avec reload de page lors de la submission du form
//     // Requête fetch pour récupérer les titres correspondants depuis l'API
//     fetch(`http://localhost/Samy/07_ExerciceMySQLBDD_Bibliotheque/afficherTitre.php?titre=${titre}`)
//       .then(response => response.json())
//       .then(data => {
//         // Récupération de l'élément HTML avec l'identifiant "suggestions"
//         const suggestions = document.getElementById("suggestions");
//         // Suppression du contenu actuel de l'élément "suggestions"
//         suggestions.innerHTML = "";
//         // Boucle sur les données reçues de l'API
//         data.forEach(titre => {
//           // Création d'un nouvel élément "option"
//           const option = document.createElement("option");
//           // Définition de la valeur de l'élément "option"
//           option.value = titre;
//           // Ajout de l'élément "option" dans l'élément "suggestions"
//           suggestions.appendChild(option);
//         });
//       });
//   }
// });

//! Deuxieme methode avec l'utilisation d'ajax pour la suggestion sans reload de la page 
//Creation d'un instance de XMLHttpRequest 
//& XMLHttpRequest => Utilisez les objets XMLHttpRequest (XHR) pour interagir avec les serveurs. Vous pouvez récupérer des données à partir d'une URL sans avoir à rafraîchir toute la page. Cela permet à une page Web de mettre à jour une partie seulement de la page sans perturber l'activité de l'utilisateur.
const xhr = new XMLHttpRequest();

// Configuration de la requête //!AJAX 
xhr.open("GET", `http://localhost/Samy/07_ExerciceMySQLBDD:afficheTitre.php?titre=${titre}`);

// Envoi de la requête AJAx
xhr.send(); 

// Ajout d'un écouteur d'événement pour gérer la réponse de la requête AJAX
xhr.addEventListener("readystatechange", function() {

    // Vérification que la requête est terminée et que la réponse est valide
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      // Récupération de la réponse de la requête AJAX
      const data = JSON.parse(this.responseText);

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
    }
  });
}
});

// Ajout d'un écouteur d'événement sur l'élément HTML avec l'identifiant "titre"
document.getElementById("editeur").addEventListener("input", function() {
  // Récupération de la valeur actuelle du champ "titre"
  const editeur = this.value;
  
  // Vérification que la longueur de la valeur est supérieure à zéro
  if (editeur.length > 0) {

//Creation d'un instance de XMLHttpRequest 
//& XMLHttpRequest => Utilisez les objets XMLHttpRequest (XHR) pour interagir avec les serveurs. Vous pouvez récupérer des données à partir d'une URL sans avoir à rafraîchir toute la page. Cela permet à une page Web de mettre à jour une partie seulement de la page sans perturber l'activité de l'utilisateur.
const xhr = new XMLHttpRequest();

// Configuration de la requête //!AJAX 
xhr.open("GET", `http://localhost/Samy/07_ExerciceMySQLBDD:afficheEdit.php?editeur=${editeur}`);

// Envoi de la requête AJAx
xhr.send(); 

// Ajout d'un écouteur d'événement pour gérer la réponse de la requête AJAX
xhr.addEventListener("readystatechange", function() {

    // Vérification que la requête est terminée et que la réponse est valide
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      // Récupération de la réponse de la requête AJAX
      const data = JSON.parse(this.responseText);

      // Récupération de l'élément HTML avec l'identifiant "suggestions"
      const suggestions = document.getElementById("suggestions");

      // Suppression du contenu actuel de l'élément "suggestions"
      suggestions.innerHTML = "";

      // Boucle sur les données reçues de l'API
      data.forEach(editeur => {
        // Création d'un nouvel élément "option"
        const option = document.createElement("option");

        // Définition de la valeur de l'élément "option"
        option.value = editeur;

        // Ajout de l'élément "option" dans l'élément "suggestions"
        suggestions.appendChild(option);
      });
    }
  });
}
});