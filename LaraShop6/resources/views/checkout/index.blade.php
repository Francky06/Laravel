@extends('layouts.master')

@section('extra-script')
    <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('paiement')
    <script>
        var form = document.getElementById("submit");
        form.addEventListener("click", function (ev) {
        ev.preventDefault();
        stripe
            .confirmCardPayment("{{ $clientSecret }}", {
                payment_method: {
                    card: card,
                },
            })
            .then(function (result) {
                if (result.error) {
                    // Show error to your customer (e.g., insufficient funds)
                    console.log(result.error.message);
                } else {
                    // The payment has been processed!
                    if (result.paymentIntent.status === "succeeded") {
                        // Show a success message to your customer
                        // There's a risk of the customer closing the window before callback
                        // execution. Set up a webhook or plugin to listen for the
                        // payment_intent.succeeded event that handles any business critical
                        // post-payment actions.
                        console.log(result.paymentIntent);
                    }
                }
            });
    });
    </script>
@endsection

@section('content')

<div class="col-md-12 text-center">
        <h1>Paiement</h1>
    <br>
    <div class="row">
        <div class="col-md-6">
            <form action="#" class="my-4">
                <div id="card-element">

                </div>

                <div id="card-errors" class="mt-4" role="alert">

                </div>
                
                <button class="btn btn-success mt-4" id="submit">Payer</button>
            </form>
        </div>
    </div>
</div>
@endsection