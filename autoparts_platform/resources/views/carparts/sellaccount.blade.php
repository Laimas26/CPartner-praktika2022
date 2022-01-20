@extends('carparts.layouts.app')
@section('content')

<section class="seller-account">
    <h1 class="title">Sukurti pardavėjo paskyrą</h1>
    <form class="contact-form row" method="POST" action="{{ route('seller.store') }}">
        @csrf
       <div class="form-field col-lg-12">
            <input id="name" name="name" class="input-text js-input @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" required autocomplete="name" autofocus>
            <label class="label" for="name">Kompanijos pavadinimas arba pardavėjo vardas / slapyvardis</label>                    
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
       </div>
        <div class="form-field col-lg-12 ">
            <input id="address" name="address" class="input-text js-input @error('address') is-invalid @enderror" value="{{ old('address') }}" type="text" required autocomplete="address" autofocus>
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <label class="label" for="address">Adresas</label>
        </div>
        <div class="form-field col-lg-6 ">
            <input id="email" name="email" class="input-text js-input @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <label class="label" for="email">El. paštas</label>
        </div>
        <div class="form-field col-lg-6 ">
            <input id="phone" name="phone" class="input-text js-input @error('phone') is-invalid @enderror" value="{{ old('phone') }}" type="text" required autocomplete="phone" autofocus>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <label class="label" for="phone">Telefono numeris</label>
       </div>
       <div class="form-field col-lg-6">
            <input class="submit-btn" type="submit" value="Sukurti">
       </div>
       <div class="alert alert-info col-lg-6" style="display: none;"></div>
    </form>
 </section>

 @endsection