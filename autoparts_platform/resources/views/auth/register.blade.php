@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

<section class="vh-100" style="background-image: url({{ url('assets/img/partsbg.jpg') }})">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">

        <form method="POST" action="{{ route('register') }}">
            @csrf
            {{-- <div class="row align-items-center" style="background-color: darkgrey; border-radius: 15px;">
                <div class="d-flex justify-content-center">
                    <h1> Registracija </h1>
                </div>
            </div> --}}
            {{-- <h1 class="text-white mb-4">Registracija</h1> --}}

            <div class="card" style="border-radius: 15px;">
                <div class="d-flex justify-content-center" style="background-color: darkgrey; border-top-left-radius: 15px; border-top-right-radius: 15px">
                    <h1> Registracija </h1>
                </div>
              <div class="card-body">
                
    
                <div class="row align-items-center pt-4 pb-3">
                  <div class="col-md-3 ps-5">
    
                    <h6 class="mb-0">Vardas</h6>
    
                  </div>
                  <div class="col-md-9 pe-5">
    
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
                  </div>
                </div>
    
                <hr class="mx-n3">
    
                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">
    
                    <h6 class="mb-0">El. paštas</h6>
    
                  </div>
                  <div class="col-md-9 pe-5">
    
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
                  </div>
                </div>
    
                <hr class="mx-n3">
    
                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">
    
                    <h6 class="mb-0">Slaptažodis</h6>
    
                  </div>
                  <div class="col-md-9 pe-5">
    
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
                  </div>
                </div>
    
                <hr class="mx-n3">
    
                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">
    
                    <h6 class="mb-0">Pakartoti slaptažodį</h6>
    
                  </div>
                  <div class="col-md-9 pe-5">
    
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    
                  </div>
                </div>
    
                <hr class="mx-n3">
    
                <div class="px-5 py-4">
                    <button type="submit" class="btn btn-primary btn-lg">
                        {{ __('Registruotis') }}
                    </button>
                </div>
    
              </div>
            </div>

        </form>

      </div>
    </div>
  </div>
</section>
                {{-- <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
