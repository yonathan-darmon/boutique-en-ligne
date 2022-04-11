document.addEventListener('DOMContentLoaded', () => {
    var filtre = document.querySelector('#filtre');
    var choix = document.querySelector('#choix')
    choix.addEventListener('click', (e) => {
        e.preventDefault();
        window.location.href="http://localhost/boutique_en_ligne/produits/"+filtre.value
    })

    // var search = document.querySelector('.btnSearch');
    // var titre = document.getElementsByClassName('.titre');
    // var titre2 = document.getElementsByClassName('.hidden');
    // search.addEventListener('click', (e) => {
    //     titre.toggle('hidden');
    //     titre2.toggle('hidden');
    // })
})
