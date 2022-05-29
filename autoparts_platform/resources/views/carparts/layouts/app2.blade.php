<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/checkout.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/myapp.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ URL::asset('css/sellparts.css') }}"> --}}
    <link href="{{ asset('assets/css/search.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/sell.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/checkout.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>


    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/css/bootstrap-select.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    @yield('styles')
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    
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

</head>
<body>
    <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        {{-- <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">info@example.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> +1 5589 55488 55 --}}
      </div>
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
</section>

    <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      {{-- <h1 class="logo me-auto"><a href="{{ route('index') }}">AutoDalys</a></h1> --}}
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{ route('index') }}" class="logo me-auto"><img src="{{ url('assets/img/carMain.png') }}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
                            
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else

            @include('carparts.layouts.navbar')
            <li style="padding-right: 1cm">
              <button class="btn btn-link" id="cart_link" class="nav-link scrollto">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                {{-- <i class="fa" style="font-size:24px">&#xf07a;</i> --}}
                @if ($cartCount != null || $cartCount != 0)
                <span class='badge badge-warning' id='lblCartCount'> {{ $cartCount }} </span>
                @endif
              </button>
              
            </li>

            <div class="modal fade cart_modal" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Jūsų pirkinių krepšelis
                    </h5>
                    <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table class="table table-image">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Prekė</th>
                          <th scope="col">Kaina</th>
                          <th scope="col">Viso</th>
                          {{-- <th scope="col">Actions</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $totalPrice = 0;
                        ?>
                        {{-- <h1>{{ $cart->part_id }}</h1> --}}
                        {{-- @foreach($cart as $cart)
                        @foreach($vehicleParts->where('id', $cart->part_id) as $part)
                        <?php
                          $totalPrice += $part->price;
                        ?>
                        <tr>
                          <td class="w-25">
                            <img src="{{ asset('storage/images/'.$part->image_path) }}" class="img-fluid img-thumbnail" alt="Sheep">
                          </td>
                          <td>{{ $part->name }}</td>
                          <td>{{ $part->price }} €</td>
                          <td>{{ $part->price }} €</td>
                          <td>
                            <button id="removeFromCart" value="{{ $cart->id }}" class="btn btn-danger btn-sm">
                              <i class="fa fa-times"></i>
                            </button>
                          </td>
                        </tr>
                        @endforeach
                        @endforeach --}}
                      </tbody>
                    </table> 
                    <div class="d-flex justify-content-end">
                      <h5>Iš viso: <span class="price text-success">{{ $totalPrice }} €</span></h5>
                    </div>
                  </div>
                  <div class="modal-footer border-top-0 d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Uždaryti</button>
                    <a href="{{ route('checkout')}}"><button type="button" class="btn btn-success">Pirkti</button></a>
                  </div>
                </div>
              </div>
            </div>
            
                <li class="nav-item dropdown">
                    <div>
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                </li>
            @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('assets/js/search.js') }}"></script>
<script src="{{ asset('assets/js/seller.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
  $('#brand_id').select2({
    placeholder: "Pasirinkite markę",
    allowClear: true
  });

  $('#part_wear').select2({
    placeholder: "Pasirinkite nusidėvėjimo tipą",
    allowClear: true
  });
  $('#part_category').select2({
    placeholder: "Pasirinkite dalių kategoriją",
    allowClear: true
  });
  $('#model_id').select2({
    placeholder: "Pasirinkite modelį",
    allowClear: true
  });

  $('#vehicle_brand').select2({
    placeholder: "Pasirinkite markę",
    allowClear: true,
  });
  $('#vehicle_model').select2({
    placeholder: "Pasirinkite modelį",
    allowClear: true
  });

  $('#brand_id').on('select2:select', function (e) {
    var data = e.params.data;
    console.log(data);
    getModels(data.id);
});

  $('#vehicle_brand').on('select2:select', function (e) {
    var data = e.params.data;
    $('#modelDiv').attr('hidden', false);
    console.log(data);
    getModelsSearch(data.id);
});
  $('#vehicle_model').on('select2:select', function (e) {
    var data = e.params.data;
    $('#categoriesDiv').attr('hidden', false);
    // console.log(data);
    // getModelsSearch(data.id);
});



function getModels(modelId)
{
  $.ajax({
             type:'GET',
             url:'/getmodels',
             contentType: "application/json; charset=utf-8",
             data: { id: modelId },
             success: function(response) {
                console.log(response.models);
                $('#model_id').empty();
                $.each(response.models, function (key, item) {
                  $('#model_id').append('<option data-tokens="'+item.id+'" value="'+item.id+'">'+item.name+'</option>')
                })
             },
             error: function(e) {
                 console.log(e);
             }
          });
}
function getModelsSearch(modelId)
{
  $.ajax({
             type:'GET',
             url:'/getmodels2',
             contentType: "application/json; charset=utf-8",
             data: { id: modelId },
             success: function(response) {
                console.log(response.models);
                $('#search_id').empty();
                $.each(response.models, function (key, item) {
                  $('#search_id').append('<option data-tokens="'+item.id+'" value="'+item.id+'">'+item.name+'</option>')
                })
             },
             error: function(e) {
                 console.log(e);
             }
          });
}

function getParts(modelId)
{
  $.ajax({
             type:'GET',
             url:'/getparts',
             contentType: "application/json; charset=utf-8",
             data: { id: modelId },
             success: function(response) {
                console.log(response.parts);
                $('#parts_search').empty();
                $.each(response.parts, function (key, part) {
                  var name = part.image_path;
                  var fullpath = "{!! asset('storage/images/"+name+"') !!}"
                  // console.log(source);
                  $('#parts_search').append('<tr data-categoryid="'+part.category_id+'" data-userid="'+part.user_id+'" data-modelid="'+part.model_id+'" data-id="'+part.id+'" class="table-row"><td><img style="height: 4cm" src="'+fullpath+'" alt=""></td>'+
                    '<td><span>'+part.name+'</span></td>'+
                    '<td><span>'+part.make_years+'</span></td>'+
                    '<td><span>'+part.price+' €</span></td>'+
                    '<td><span>'+part.part_wear+'</span></td></tr>'
                    )
                })
             },
             error: function(e) {
                 console.log(e);
             }
          });
}

$(document).ready(function($) {
  $("#cart_link").on("click", function(event) {
    event.preventDefault();
    jQuery.noConflict();
    $('#cartModal').modal('show');
  });

  $('.closeModal').on('click', function () {
    $('#cartModal').modal('hide')
  })


  $('#removeFromCart').on('click', function () {
    var cartId = $(this).attr("value");

    $.ajax({
             type:'GET',
             url:'/removecart',
             contentType: "application/json; charset=utf-8",
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             data: { id: cartId},
             success: function(response) {
               console.log(response);
               window.location.reload();

             },
             error: function(e) {
                 console.log(e);
             }
          });

  })
});

</script>

@yield('scripts')
</body>

<script>
  const phoneInputField = document.querySelector("#phone");
  const phoneInput = window.intlTelInput(phoneInputField, {
    preferredCountries: ["lt", "lv", "pl", "ee"],
    utilsScript:
      "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
  });
</script>
</html>
<script src="https://js.stripe.com/v3/"></script>
 
<script>
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
        {{ $intent->client_secret }},
        {
          stripe
              .confirmCardSetup('{! $intent->client_secret !}', {
                payment_method: {
                  card: cardElement,
                  billing_details: {
                    name: 'Jenny Rosen',
                  },
                },
              })
              .then(function(result) {
                // Handle result.error or result.setupIntent
              });
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
</script>