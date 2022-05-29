@extends('carparts.layouts.app2')
@section('content')


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
            <form method="POST" action="{{ route('checkout.purchase') }}" class="card-form mt-3 mb-3">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Vardas</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Pavardė</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>


                    <div class="col-12">
                        <label for="email" class="form-label">El. paštas <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="vardas.pavarde@gmail.com" required>
                        <div class="invalid-feedback">
                            Prašome įvesti teisingą el. pašto adresą.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Adresas</label>
                        <input type="text" class="form-control" id="address" name="address"  placeholder="Plaza street" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="col-md-5">
                        <label for="country" class="form-label">Miestas</label>
                        <select class="form-select" id="city" name="city" required>
                            <option value="">Choose...</option>
                            @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="state" class="form-label">Rajonas/Apylinkė</label>
                        <select class="form-select" id="region" name="region" required>
                            <option value="">Choose...</option>
                            @foreach($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="zip" class="form-label">Pašto kodas</label>
                        <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
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
        </div>
    </div>
</section>

@endsection

