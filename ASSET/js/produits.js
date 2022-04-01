document.addEventListener('DOMContentLoaded', () => {
    var filtre = document.querySelector('#filtre');
    var choix = document.querySelector('#choix')
    choix.addEventListener('click', (e) => {
        e.preventDefault();
        window.location.href="http://localhost/boutique_en_ligne/produits/"+filtre.value
    })
})
