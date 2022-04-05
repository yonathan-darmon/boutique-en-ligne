document.addEventListener('DOMContentLoaded', () => {
    function Message() {
        alert("Merci pour votre achat ! \n Vous allez recevoir un mail de confirmation.");
    }
    document.querySelector('#card-button').addEventListener('click',()=>{

        var vide=document.querySelector('#vide')
        if(!vide){
            Message();
        }
    })
})