//Bouton dark 
const btnDark = document.querySelector('#btnDark')
const body = document.body

// Vérifie si l'utilisateur a déjà défini une préférence de couleur
if (getCookie('colorMode') === 'dark') {
  body.classList.add('dark')
  btnDark.innerHTML = '<i class="fa-solid fa-sun"></i>'
} else {
  body.classList.add('light')
  btnDark.innerHTML = '<i class="fa-solid fa-moon"></i>'
}

// Ecouteur d'evenement 
btnDark.addEventListener('click', () => {
  if (body.classList.contains('dark')) {
    // Si il est en dark
    body.classList.add('light')
    body.classList.remove('dark')
    btnDark.innerHTML = '<i class="fa-solid fa-moon"></i>'
    // Stocke la préférence utilisateur dans un cookie
    setCookie('colorMode', 'light', 365)
  } else if (body.classList.contains('light')) {
    // Si il est en light
    body.classList.add('dark')
    body.classList.remove('light')
    btnDark.innerHTML = '<i class="fa-solid fa-sun"></i>'
    // Stocke la préférence utilisateur dans un cookie
    setCookie('colorMode', 'dark', 365)
  }
})

// Fonction pour stocker un cookie
function setCookie(name, value, days) {
  let expires = ""
  if (days) {
    var date = new Date()
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000))
    expires = "; expires=" + date.toUTCString()
  }
  document.cookie = name + "=" + (value || "") + expires + "; path=/"
}

// Fonction pour récupérer un cookie
function getCookie(name) {
  let nameEQ = name + "="
  let ca = document.cookie.split(';')
  for (let i = 0; i < ca.length; i++) {
    var c = ca[i]
    while (c.charAt(0) == ' ') c = c.substring(1, c.length)
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length)
  }
  return null
}

// Pour gerer le submit sur un click option 
function validerSelection() {
    document.querySelector('form').submit();
  }










  
// //* POur les mot de passe 
// document.querySelector('form').addEventListener('submit', function(event) {
//     var mdp = document.getElementById('mdp').value;
//     var mdp2 = document.getElementById('mdp2').value;
//     if (mdp !== mdp2) {
//         event.preventDefault();
//         alert('Les mots de passe ne correspondent pas.');
//     }
// });

