//Bouton dark 
const btnDark = document.querySelector('#btnDark')

//& Ecouteur d'evenement 
btnDark.addEventListener('click', () => {
    //& Variable raccourcis 
    const body = document.body
    
    //
    if (body.classList.contains('dark')){
        
        //& Si il est en dark
        body.classList.add('light')
        body.classList.remove('dark')
        btnDark.innerHTML = '<i class="fa-solid fa-moon"></i>'
        
    } else if(body.classList.contains('light')){
        
        //& Si il est en light
        body.classList.add('dark')
        body.classList.remove('light')
        btnDark.innerHTML = '<i class="fa-solid fa-sun"></i>'
    } 
})


// //* POur les mot de passe 
// document.querySelector('form').addEventListener('submit', function(event) {
//     var mdp = document.getElementById('mdp').value;
//     var mdp2 = document.getElementById('mdp2').value;
//     if (mdp !== mdp2) {
//         event.preventDefault();
//         alert('Les mots de passe ne correspondent pas.');
//     }
// });


