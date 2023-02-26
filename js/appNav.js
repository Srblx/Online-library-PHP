   // Fonction qui renvoie vers les deux autre fichier php avec un event onchange pour le select 
   document.getElementById("livre").onchange = function() {
    if (this.value) {
      window.location.href = this.value;
    }
  };

  