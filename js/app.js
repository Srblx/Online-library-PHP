function validateFormInscrip() {
  let firstName = document.querySelector("#firstName").value;
  let lastName = document.querySelector("#lastName").value;
  let password = document.querySelector("#password").value;

  if (firstName.length < 2 || firstName.length > 30) {
      alert("Le nom doit contenir entre 2 et 30 caractères.");
      return false;
  }

  if (lastName.length < 2 || lastName.length > 30) {
      alert("Le prénom doit contenir entre 2 et 30 caractères.");
      return false;
  }

  if (password.length < 8 || password.length > 20) {
      alert("Le mot de passe doit contenir entre 8 et 20 caractères.");
      return false
  }

  return true;
}

document.getElementById("formAdd").addEventListener("submit", function(event) {
  let titreInput = document.getElementById('titre');
  let nomAuteurInput = document.getElementById('nomAuteur');
  let prenomAuteurInput = document.getElementById('prenomAuteur');

  if (titreInput.value.length < 2 || titreInput.value.length > 30) {
    alert("Le titre doit contenir entre 2 et 30 caractères.");
    event.preventDefault();
  }

  if (nomAuteurInput.value.length < 2 || nomAuteurInput.value.length > 30) {
    alert("Le nom de l'auteur doit contenir entre 2 et 30 caractères.");
    event.preventDefault();
  }

  if (prenomAuteurInput.value.length < 2 || prenomAuteurInput.value.length > 30) {
    alert("Le prénom de l'auteur doit contenir entre 2 et 30 caractères.");
    event.preventDefault();
  }
});

   





































// // Ajout d'un écouteur d'événement sur l'élément HTML avec l'identifiant "titre"
// document.getElementById("titre").addEventListener("input", function() {
//   // Récupération de la valeur actuelle du champ "titre"
//   const titre = this.value;
  
//   // Vérification que la longueur de la valeur est supérieure à zéro
//   if (titre.length > 0) {

// //! Deuxieme methode avec l'utilisation d'ajax pour la suggestion sans reload de la page 
// //Creation d'un instance de XMLHttpRequest 
// //& XMLHttpRequest => Utilisez les objets XMLHttpRequest (XHR) pour interagir avec les serveurs. Vous pouvez récupérer des données à partir d'une URL sans avoir à rafraîchir toute la page. Cela permet à une page Web de mettre à jour une partie seulement de la page sans perturber l'activité de l'utilisateur.
// const xhr = new XMLHttpRequest();

// // Configuration de la requête //!AJAX 
// xhr.open("GET", `http://localhost/Samy/07_ExerciceMySQLBDD:afficheTitre.php?titre=${titre}`);

// // Envoi de la requête AJAx
// xhr.send(); 

// // Ajout d'un écouteur d'événement pour gérer la réponse de la requête AJAX
// xhr.addEventListener("readystatechange", function() {

//     // Vérification que la requête est terminée et que la réponse est valide
//     if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
//       // Récupération de la réponse de la requête AJAX
//       const data = JSON.parse(this.responseText);

//       // Récupération de l'élément HTML avec l'identifiant "suggestions"
//       const suggestions = document.getElementById("suggestions");

//       // Suppression du contenu actuel de l'élément "suggestions"
//       suggestions.innerHTML = "";

//       // Boucle sur les données reçues de l'API
//       data.forEach(titre => {
//         // Création d'un nouvel élément "option"
//         const option = document.createElement("option");

//         // Définition de la valeur de l'élément "option"
//         option.value = titre;

//         // Ajout de l'élément "option" dans l'élément "suggestions"
//         suggestions.appendChild(option);
//       });
//     }
//   });
// }
// });

// // Ajout d'un écouteur d'événement sur l'élément HTML avec l'identifiant "titre"
// document.getElementById("editeur").addEventListener("input", function() {
//   // Récupération de la valeur actuelle du champ "titre"
//   const editeur = this.value;
  
//   // Vérification que la longueur de la valeur est supérieure à zéro
//   if (editeur.length > 0) {

// //Creation d'un instance de XMLHttpRequest 
// //& XMLHttpRequest => Utilisez les objets XMLHttpRequest (XHR) pour interagir avec les serveurs. Vous pouvez récupérer des données à partir d'une URL sans avoir à rafraîchir toute la page. Cela permet à une page Web de mettre à jour une partie seulement de la page sans perturber l'activité de l'utilisateur.
// const xhr = new XMLHttpRequest();

// // Configuration de la requête //!AJAX 
// xhr.open("GET", `http://localhost/Samy/07_ExerciceMySQLBDD:afficheEdit.php?editeur=${editeur}`);

// // Envoi de la requête AJAx
// xhr.send(); 

// // Ajout d'un écouteur d'événement pour gérer la réponse de la requête AJAX
// xhr.addEventListener("readystatechange", function() {

//     // Vérification que la requête est terminée et que la réponse est valide
//     if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
//       // Récupération de la réponse de la requête AJAX
//       const data = JSON.parse(this.responseText);

//       // Récupération de l'élément HTML avec l'identifiant "suggestions"
//       const suggestions = document.getElementById("suggestions");

//       // Suppression du contenu actuel de l'élément "suggestions"
//       suggestions.innerHTML = "";

//       // Boucle sur les données reçues de l'API
//       data.forEach(editeur => {
//         // Création d'un nouvel élément "option"
//         const option = document.createElement("option");

//         // Définition de la valeur de l'élément "option"
//         option.value = editeur;

//         // Ajout de l'élément "option" dans l'élément "suggestions"
//         suggestions.appendChild(option);
//       });
//     }
//   });
// }
// });