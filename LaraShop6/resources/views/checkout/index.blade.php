@extends('layouts.master')


@section('extra-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection



@section('content')

<div class="col-md-12 text-center">
        <h1>Paiement</h1>
    <br>
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('paiementStore')}}" method="POST" id="payment-form" class="my-4">
                @csrf
                <div class="card py-4 px-4" id="card-element">

                </div>

                <div id="card-errors" class="mt-4" role="alert">

                </div>
                
                <button class="btn btn-success mt-4" id="submit">Payer {{getPrice(Cart::total())}}</button>
            </form>
        </div>
    </div>
</div>
@endsection


@section('paiement')
    <script>
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
            color: "#aab7c4"
        }
    },
    invalid: {
        color: "#fa755a",
        iconColor: "#fa755a"
    }
};

var card = elements.create("card", { style: style });
card.mount("#card-element");

card.on("change", function(event) {
    var displayError = document.getElementById("card-errors");
    if (event.error) {
        displayError.classList.add("alert", "alert-warning");
        displayError.textContent = event.error.message;
    } else {
        displayError.classList.remove("alert", "alert-warning");
        displayError.textContent = "";
    }
});



        var form = document.getElementById("submit");
        form.addEventListener("click", function (ev) {
        ev.preventDefault();
        form.disable = true;
        stripe.confirmCardPayment("{{ $clientSecret }}", {
                payment_method: {
                    card: card,
                },
            })
            .then(function (result) {
                if (result.error) {
                    form.disable = false;
                    // Show error to your customer (e.g., insufficient funds)
                    console.log(result.error.message);
                } else {
                    // The payment has been processed!
                    if (result.paymentIntent.status === "succeeded") {
                        var paymentIntent = result.paymentIntent;
                        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');                       
                        var form = document.getElementById("payment-form");
                        var url = form.action;
                        

                        fetch(
                        url,
                            {
                                headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token
                                },
                                method: 'post',
                                body: JSON.stringify({
                                    paymentIntent: paymentIntent
                                })
                            }
                        ).then((data) => {
                            if(data.status === 400) {
                                var redirect = 'shop';
                            } else {
                                var redirect = 'merci';
                            }
                            window.location.href = redirect;

                        }).catch((error) => {
                            console.log(error)
                        })
                    }
                }
            });
    });
    </script>
@endsection


@section('extra-script')
    <script src="https://js.stripe.com/v3/"></script>
@endsection