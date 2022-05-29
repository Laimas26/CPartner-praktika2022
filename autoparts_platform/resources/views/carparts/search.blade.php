@extends('carparts.layouts.app')
@section('content')

<!-- ======= Services Section ======= -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<section id="services" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Auto Dalių paieška</h2>
        <p></p>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box iconbox-blue">
            <div class="icon">
              <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
              </svg>
              <i class='bx bx-car'></i>
            </div>
            <h4><a class="showsearch" id="showsearch" href="#searchbymodel">Pagal gamintoją</a></h4>
            <p>Automobilių dalių paieška pagal markę, modelį</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box iconbox-orange ">
            <div class="icon">
              <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
              </svg>
              <i class='bx bx-wrench' ></i>
            </div>
            <h4><a href="">Pagal kategoriją</a></h4>
            <p>Pagal automobilių dalių kategoriją (pvz.: žibintai, kebulas, greičiu dėžė ir pnš.).</p>
          </div>
        </div>


    </div>
  </section><!-- End Services Section -->

  <section id="searchbymodel" class="searchbyModel">
    <div class="container">
      <div class="row form-group">
          <div class="col-5">
            <label for="vehicleBrand">Mašinos gamintojas</label>
            <select id="vehicle_brand" style="width: 40%" data-live-search="true">
              <option></option>
                @foreach ($vehicleBrands as $brand)
                    <option data-tokens="{{ $brand->name }}" value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>            
          </div>
      </div>
      <div class="row form-group" id="modelDiv" style="padding-top: 10px" hidden="true">
        <div class="col-5">
          <label for="">Mašinos modelis</label>
          <select id="search_id" style="width: 40%" data-live-search="true">
            <option></option>
          </select>
        </div>
      </div>
    </div>

    <div class="row" id="categoriesDiv" style="padding-top: 10px; padding-left: 5cm">
          <div class="col-4 border border-dark">
            <h6>Pasirinkite filtravimą</h6>
            <select id="wear_filter" style="width: 60%" data-live-search="true">
              <option></option>categoryid
              <option data-tokens="" value="Patenkinama">Patenkinama būklė</option>
              <option data-tokens="" value="Gera">Gera būklė</option>
              <option data-tokens="" value="Puiki">Puiki būklė</option>
            </select>   
            <h6>Pasirinkite kategoriją</h6>
            <select id="category_filter" style="width: 60%" data-live-search="true">
              <option></option>
              @foreach($partsCategories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>   
          </div>
          <div class="col-4 border border-dark">
            <span style="padding-left: 80px">Pagaminimo metai</span><br>

            <span>nuo</span>
            <div class="input-group date insertInfo" data-provide="datepicker">
              <input type="text" id="from_date" class="form-control">
              <div class="input-group-addon close-button">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>

            <span>iki</span>
            <div class="input-group date insertInfo" data-provide="datepicker">
              <input type="text" id="to_date" class="form-control">
              <div class="input-group-addon close-button">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>

            <button onclick="filterOptions()" class="btn btn-dark">Filtruoti</button>
          </div>

          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nuotrauka</th>
                <th scope="col">Pavadinimas</th>
                <th scope="col">Pagaminimo metai</th>
                <th scope="col">Kaina</th>
                <th scope="col">Nusidėvėjimas</th>
              </tr>
            </thead>
            <tbody id="parts_search" name="parts_search">
            </tbody>
          </table>
      </div>
    </div>

    <div class="modal fade bd-example-modal-lg product_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="row">
            <div class="col-lg-4 order-lg-2 order-1 ml-3">
                <div class="image_selected_div"><img class="image_selected h-100 mx-auto" src="https://i.imgur.com/qEwct2O.jpg" alt=""></div>
            </div>
            <div class="col-lg-6 order-3">
                <div class="product_description">
                    <div class="product_name"></div>
                    <div> 
                      <span class="product_price"></span>
                    </div>
                    <hr class="singleline">
                    <div class="product_description"> 
                      <span class="product_info"><span>
                    </div>
                    <div>
                      <input type="text" name="hidden_partid" id="hidden_partid" hidden>
                        <div class="row pt-3">
                              <div class="seller_info_div">
                                <span class="font-weight-bold">Pardavėjas: </span>
                                <span class="seller_name"></span><br>
                                <span class="font-weight-bold">Pardavėjo adresas: </span>
                                <span class="seller_address"></span><br>
                                <span class="font-weight-bold">Pardavėjo el. paštas: </span>
                                <span class="seller_email"></span><br>
                                <span class="font-weight-bold">Pardavėjo numeris: </span>
                                <span class="seller_number"></span>
                              </div>
                            <div class="col-md-7"> </div>
                        </div>
                    </div>
                    <hr class="singleline">
                    <div class="order_info d-flex flex-row">
                        <form action="#">
                    </div>
                    <d iv class="row">
                        <div class="col-xs-6" style="margin-left: 13px;">
                        </div>
                        <div class="col-xs-6">
                          <button type="button" id="addto_cart" class="btn btn-primary shop-button">Pridėti į krepšelį</button>
                          <button type="button" id="buy_now" class="btn btn-success shop-button">Pirkti dabar</button>
                            {{-- <div class="product_fav"><i class="fas fa-heart"></i></div> --}}
                        </div>
                    </d>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>

  <script>

$('.date').datepicker({  
        format: "yyyy-mm-01",
        viewMode: "months", 
        minViewMode: "months",
        autoclose: true
     });

     $('.close-button').unbind();

$('.close-button').click(function() {
  if ($('.datepicker').is(":visible")) {
    $('.date').datepicker('hide');
  } else {
    $('.date').datepicker('show');
  }
});

function filterOptions()
{
  var modelId = $('#search_id').val();
  var fromDate = $('#from_date').val();
  var toDate = $('#to_date').val();
  var wearFilter = $('#wear_filter').val();
  var partsCategory = $('#category_filter').val();

  console.log(modelId);
  console.log(fromDate);
  console.log(toDate);
  console.log(wearFilter);
  console.log(partsCategory);

  $.ajax({
             type:'GET',
             url:'/filterparts',
             contentType: "application/json; charset=utf-8",
             data: { id: modelId, fromDate: fromDate, toDate: toDate, wearFilter: wearFilter, partsCategory: partsCategory },
             success: function(response) {
                console.log(response.parts);
                $('#parts_search').empty();
                $.each(response.parts, function (key, part) {
                  var name = part.image_path;
                  console.log(part.name);
                  var fullpath = "{!! asset('storage/images/"+name+"') !!}"
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

$('#search_id').select2({
    placeholder: "Pasirinkite markę",
    allowClear: true
  });
$('#wear_filter').select2({
    placeholder: "Nusidėvėjimas",
    allowClear: true
  });
$('#category_filter').select2({
    placeholder: "Kategorija",
    allowClear: true
  });

  $('#search_id').on('select2:select', function (e) {
    var data = e.params.data;
    console.log(data);
    getParts(data.id);
});

$(document).ready(function($) {

  $("#parts_search").on('click', 'tr.table-row', function () {
    var id = $(this).data('id');
    var userId = $(this).data('userid');
    var modelId = $(this).data('modelid');
    var categoryId = $(this).data('categoryid');

    $.ajax({
             type:'GET',
             url:'/getonepart',
             contentType: "application/json; charset=utf-8",
             data: { id: id, user_id: userId, model_id: modelId, category_id: categoryId },
             success: function(response) {
               var part = response.part;
               var user = response.user;
               var model = response.model;
               var category = response.category;
               var imgName = part[0].image_path;
               var fullpath = "{!! asset('storage/images/"+imgName+"') !!}";

               $('.image_selected').attr('src', fullpath);
               $('#hidden_partid').val(part[0].id);
               $('.product_price').html(part[0].price + '<i class="bi bi-currency-euro"></i>');
               $('.product_info').html(part[0].name + '<br><span class="product_category"> Kategorija: ' + category[0].name + '</span>');
               $('.seller_name').html(user[0].name);
               $('.seller_address').html(user[0].address);
               $('.seller_email').html(user[0].email);
               $('.seller_number').html(user[0].phone);

               $('.product_modal').modal('show');
             },
             error: function(e) {
                 console.log(e);
             }
          });
  })

  $('#addto_cart').on('click', function () {
    var partId = $('#hidden_partid').val();
    $.ajax({
             type:'GET',
             url:'/addcart',
             contentType: "application/json; charset=utf-8",
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             data: { id: partId},
             success: function(response) {
               console.log(response);

             },
             error: function(e) {
                 console.log(e);
             }
          });
  })
});

  </script>

<link rel="stylesheet" href="{{ URL::asset('css/search.css') }}">


@endsection