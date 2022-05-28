@extends('carparts.layouts.app2')
@section('content')

<script src="https://js.stripe.com/v3/"></script>
 
{{-- <script>

    let stripe = Stripe("{{ env('STRIPE_KEY') }}")
    let elements = stripe.elements()
    let style = {
    base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
}
let card = elements.create('card', {style: style})
card.mount('#card-element')
let paymentMethod = null
$('.card-form').on('submit', function (e) {
    $('button.pay').attr('disabled', true)
    if (paymentMethod) {
        return true
    }
    stripe.confirmCardSetup(
        "{{ $intent->client_secret }}",
        {
            payment_method: {
                card: card,
                billing_details: {name: $('.card_holder_name').val()}
            }
        }
    ).then(function (result) {
        if (result.error) {
            $('#card-errors').text(result.error.message)
            $('button.pay').removeAttr('disabled')
        } else {
            paymentMethod = result.setupIntent.payment_method
            $('.payment-method').val(paymentMethod)
            $('.card-form').submit()
        }
    })
    return false
})
    const stripe = Stripe('STRIPE_KEY');
 
    const elements = stripe.elements();
    const cardElement = elements.create('card');
 
    cardElement.mount('#card-element');



    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
 
    cardButton.addEventListener('click', async (e) => {
    const { paymentMethod, error } = await stripe.createPaymentMethod(
        'card', cardElement, {
            billing_details: { name: cardHolderName.value }
        }
    );
 
    if (error) {
        // Display "error.message" to the user...
    } else {
        // The card has been verified successfully...
    }
});
</script> --}}

<style>
    .StripeElement {
  box-sizing: border-box;
  height: 40px;
  padding: 10px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>

<section>
    <div class="py-5 text-center">
        <h2>Pirkimo forma</h2>
    </div>
    <div class="row g-5 ml-2">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Jūsų pirkinių krepšelis</span>
                <span class="badge bg-primary rounded-pill">{{ $cartCount }}</span>
            </h4>

            <?php
                $totalPrice = 0;
            ?>
            <ul class="list-group mb-3">
                @foreach($cart as $cart)
                @foreach($vehicleParts->where('id', $cart->part_id) as $part)
                <?php
                          $totalPrice += $part->price;
                ?>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">{{ $part->name }}</h6>
                        <small class="text-muted">{{ $part->category->name }}</small>
                    </div>
                    <span class="text-muted">{{ $part->price }} €</span>
                </li>
                @endforeach
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>Iš viso (€)</span>
                    <strong>{{ $totalPrice }} €</strong>
                </li>
            </ul>
        </div>
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Pristatymo adresas</h4>
            {{-- <form method="POST" action="{{ route('checkout.purchase', $totalPrice) }}" class="card-form mt-3 mb-3">
                @csrf --}}
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Vardas</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Pavardė</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>


                    <div class="col-12">
                        <label for="email" class="form-label">El. paštas <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Adresas</label>
                        <input type="text" class="form-control" id="address" placeholder="Plaza street" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="address2" class="form-label">Adresas 2 <span class="text-muted">(Nebūtinas)</span></label>
                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div>

                    <div class="col-md-5">
                        <label for="country" class="form-label">Miestas</label>
                        <select class="form-select" id="country" required>
                            <option value="">Choose...</option>
                            <option>India</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="state" class="form-label">Rajonas/Apylinkė</label>
                        <select class="form-select" id="state" required>
                            <option value="">Choose...</option>
                            <option>Delhi</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="zip" class="form-label">Pašto kodas</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required>
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="same-address">
                    <label class="form-check-label" for="same-address">Pristatymo adresas toks pat kaip mokėtojo adresas</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="save-info">
                    <label class="form-check-label" for="save-info">Išsaugoti duomenis sekančiam pirkimui</label>
                </div>

                <hr class="my-4">

                <h4 class="mb-3">Apmokėjimas</h4>

                {{-- <div class="my-3">
                    <div class="form-check">
                        <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                        <label class="form-check-label" for="credit">Kreditinė kortelė (MasterCard)</label>
                    </div>
                    <div class="form-check">
                        <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="debit">Debeto kortelė</label>
                    </div>
                    <div class="form-check">
                        <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="paypal">Paypal</label>
                    </div>
                    <div class="form-check">
                        <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="paypal">Elektroninė bankininkystė</label>
                    </div>
                </div> --}}

                <div class="row gy-3">

                    <form method="POST" action="{{ route('checkout.purchase') }}" class="card-form mt-3 mb-3">
                        @csrf
                        <input type="hidden" name="payment_method" class="payment-method">
                        <input class="StripeElement mb-3" name="card_holder_name" placeholder="Vardas pavardė" required>
                        <div class="col-lg-6 col-md-6">
                            <div id="card-element"></div>
                        </div>
                        <div id="card-errors" role="alert"></div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary pay">
                                Pirkti
                            </button>
                        </div>
                    </form>

                            @if(session('message'))
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                            @endif
                </div>
            {{-- </form> --}}
        </div>
    </div>
</section>

@endsection

