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
        <h2>Auto Dalis</h2>
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
              <option></option>
              <option data-tokens="" value="Patenkinama">Patenkinama būklė</option>
              <option data-tokens="" value="Gera">Gera būklė</option>
              <option data-tokens="" value="Puiki">Puiki būklė</option>
            </select>   
            {{-- <input type="checkbox" name="" id=""><br>
            <input type="checkbox" name="" id=""> --}}
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

  alert('sadasd');

  // console.log(modelId);
  // console.log(fromDate);
  // console.log(toDate);
  // console.log(wearFilter);

  $.ajax({
             type:'GET',
             url:'/filterparts',
             contentType: "application/json; charset=utf-8",
             data: { id: modelId, fromDate: fromDate, toDate: toDate, wearFilter: wearFilter },
             success: function(response) {
                console.log(response.parts);
                $('#parts_search').empty();
                $.each(response.parts, function (key, part) {
                  console.log('HEYHEYE');
                  alert('hahha');
                  // var name = part.image_path;
                  // var fullpath = "{!! asset('storage/images/"+name+"') !!}"
                  // // console.log(source);
                  // $('#parts_search').append('<tr><a><td><img style="height: 4cm" src="'+fullpath+'" alt=""></td>'+
                  //   '<td><span>'+part.name+'</span></td>'+
                  //   '<td><span>'+part.make_years+'</span></td>'+
                  //   '<td><span>'+part.price+' €</span></td>'+
                  //   '<td><span>'+part.part_wear+'</span></td></a></tr>'
                  //   )
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

  $('#search_id').on('select2:select', function (e) {
    var data = e.params.data;
    console.log(data);
    getParts(data.id);
});

(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
  </script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


@endsection