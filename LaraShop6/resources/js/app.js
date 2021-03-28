var stripe = Stripe(
    "pk_test_51Ia0u4BhbfReWz8o2pWwu1QVkClYmux8iJ428U0UHYmULfcXXbs9aGdIso4myzfq12bbuNA42AdEuknhrHjuDhO500lwNB8SNl"
);
var elements = stripe.elements();

var style = {
    base: {
        color: "#32325d",
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
            color: "#aab7c4",
        },
    },
    invalid: {
        color: "#fa755a",
        iconColor: "#fa755a",
    },
};

var card = elements.create("card", { style: style });
card.mount("#card-element");

card.on("change", function (event) {
    var displayError = document.getElementById("card-errors");
    if (event.error) {
        displayError.classList.add("alert", "alert-warning");
        displayError.textContent = event.error.message;
    } else {
        displayError.classList.remove("alert", "alert-warning");
        displayError.textContent = "";
    }
});
