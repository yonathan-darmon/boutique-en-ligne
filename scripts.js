window.onload = () => {
    //variables
    let stripe = Stripe('pk_test_51Kb39iC5Di6WbNI4KyJXYbtRGgFR2awKHWcNfxoqvkHPH31upAieodnGDDRkLFnfFUmOE1Q8mcgIofbC0dkiLFxa008oIzQOo6')
    let elements = stripe.elements()
    let redirect = "./index.php"

    //objets de la page
    let cardHolderName = document.getElementById("cardholder-name")
    let cardButton = document.getElementById("card-button")
    let clientSecret = cardButton.dataset.secret;

    //creer les elements du formulaire de la carte
    let card = elements.create("card")
    card.mount("#card-elements")

    //on gere les saisies (messages d'erreurs lié à la carte)
    card.addEventListener("change", (event) => {
        let displayError = document.getElementById("card-errors")
        if(event.error){
            displayError.textContent = event.error.message;
        }else{
            displayError.textContent = "";
        }
    })

    //verification du paiement
    cardButton.addEventListener("click", () => {
        stripe.handleCardPayment(
            clientSecret, card, {
                payment_method_data: {
                    billing_details: {name: cardHolderName.value}
                }
            }
        ).then((result) => {
            if(result.error){
                document.getElementById("errors").innerText = result.error.message
            }else{
                document.location.href = redirect
            }
        })
    })
}