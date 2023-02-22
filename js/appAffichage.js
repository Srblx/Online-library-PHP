//! Non fonctionelle ? 

// Récupérer tous les éléments select
const selects = document.querySelector("select");

// Ajouter un écouteur d'événements "change" à chaque select
for (let i = 0; i < selects.length; i++) {
  selects[i].addEventListener("change", function() {
    // Envoyer le formulaire parent lorsque l'utilisateur sélectionne une option
    this.parentNode.submit();

    // Désactiver tous les boutons de soumission dans le formulaire parent
    const form = this.parentNode;
    const buttons = form.getElementsByTagName("input");
    for (let j = 0; j < buttons.length; j++) {
      if (buttons[j].type === "submit") {
        buttons[j].disabled = true;
      }
    }
  });
}