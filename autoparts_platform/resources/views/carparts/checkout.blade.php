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
            
{{-- 
            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <button type="submit" class="btn btn-danger">Redeem</button>
                </div>
            </form> --}}
        </div>
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" novalidate>
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
                    <label class="form-check-label" for="same-address">Pristatymo adresas toks pats kaip, mokėtojo adresas</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="save-info">
                    <label class="form-check-label" for="save-info">Išsaugoti duomenis sekančiam pirkimui</label>
                </div>

                <hr class="my-4">

                <h4 class="mb-3">Apmokėjimas</h4>

                <div class="my-3">
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
                </div>

                <div class="row gy-3">
                    <div class="col-md-6">
                        <label for="cc-name" class="form-label">Vardas</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="" required>
                        <small class="text-muted">Vardas Pavardė kaip ant kortelės</small>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="cc-number" class="form-label">Kreditinės kortelės numeris</label>
                        <input type="text" class="form-control" id="cc-number" placeholder="" required>
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="cc-expiration" class="form-label">Galiojimo data</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                        <div class="invalid-feedback">
                            Expiration date required
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="cc-cvv" class="form-label">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-danger btn-lg" type="submit">Tęsti pirkimą</button>
            </form>
        </div>
    </div>
</section>

@endsection