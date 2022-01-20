@extends('carparts.layouts.app')
@section('content')

<!-- ======= Services Section ======= -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<section id="services" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Auto Dalių paieška</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box iconbox-blue">
            <div class="icon">
              <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
              </svg>
              <i class="bx bxl-dribbble"></i>
            </div>
            <h4><a class="showsearch" id="showsearch" href="#searchbymodel">Pagal markę</a></h4>
            <p>Automobilių dalių paieška pagal markę, modelį</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box iconbox-orange ">
            <div class="icon">
              <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
              </svg>
              <i class="bx bx-file"></i>
            </div>
            <h4><a href="">Pagal kategoriją</a></h4>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
          </div>
        </div>


    </div>
  </section><!-- End Services Section -->

  <section id="searchbymodel" class="searchbyModel">
    <div class="container">
      <div class="row form-group">
          <div class="col-5">
            <label for="vehicleBrand">Mašinos markė</label>
            {{-- <select id="vehicleBrand" class="selectpicker form-control" onchange="enableSelect()" data-live-search="true"> --}}
            <select id="vehicleBrand" class="selectpicker form-control" data-live-search="true">
              <option data-tokens="Pasirinkite modeli" disabled selected>Pasirinkite modeli</option>
              <option data-tokens="car" value="car">car</option>
              <option data-tokens="BMW">BMW</option>
              <option data-tokens="Mercedes-Benz">Mercedes-Benz</option>
              <option data-tokens="Audi">Audi</option>
              <option data-tokens="Volkswagen">Volkswagen</option>
              <option data-tokens="Subaru">Subaru</option>
            </select>            
          </div>
      </div>
      <div class="row form-group" id="modelDiv" style="padding-top: 10px" hidden>
        <div class="col-5">
          <label for="">Mašinos modelis</label>
          <select id="vehicleModel" class="selectpicker form-control" data-live-search="true">
            <option data-tokens="Model1">Model1</option>
            <option data-tokens="Model2">Model2</option>
            <option data-tokens="Model3">Model3</option>
            <option data-tokens="Model4">Model4</option>
            <option data-tokens="Model5">Model5</option>
          </select>
        </div>
      </div>
    </div>

    <div class="row list-group" id="categoriesDiv" style="padding-top: 10px; padding-left: 5cm" hidden>
        <div class="col-5">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle list-group-item list-group-item-action list-group-item-primary list-group-item-light" data-toggle="dropdown">Apšvietimas</a>
            <ul class="dropdown-menu columns-3">
              <div class="row">
                <div class="col-sm-4">
                  <ul class="multi-column-dropdown">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </div>
                <div class="col-sm-4">
                  <ul class="multi-column-dropdown">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </div>
                <div class="col-sm-4">
                  <ul class="multi-column-dropdown">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </div>
              </div>
            </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle list-group-item list-group-item-action list-group-item-primary list-group-item-light" data-toggle="dropdown">Kebulo dalys</a>
          <ul class="dropdown-menu columns-3">
            <div class="row">
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
            </div>
          </ul>
      </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle list-group-item list-group-item-action list-group-item-primary list-group-item-light" data-toggle="dropdown">Pavarų dėžės dalys</a>
          <ul class="dropdown-menu columns-3">
            <div class="row">
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
            </div>
          </ul>
      </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle list-group-item list-group-item-action list-group-item-primary list-group-item-light" data-toggle="dropdown">Salono dalys</a>
          <ul class="dropdown-menu columns-3">
            <div class="row">
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
            </div>
          </ul>
      </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle list-group-item list-group-item-action list-group-item-primary list-group-item-light" data-toggle="dropdown">Išmetimas</a>
          <ul class="dropdown-menu columns-3">
            <div class="row">
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
            </div>
          </ul>
      </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle list-group-item list-group-item-action list-group-item-primary list-group-item-light" data-toggle="dropdown">Stiklai, apiplovimo sistemos</a>
          <ul class="dropdown-menu columns-3">
            <div class="row">
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
            </div>
          </ul>
      </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle list-group-item list-group-item-action list-group-item-primary list-group-item-light" data-toggle="dropdown">Stabdžių sistemos dalys</a>
          <ul class="dropdown-menu columns-3">
            <div class="row">
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
            </div>
          </ul>
      </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle list-group-item list-group-item-action list-group-item-primary list-group-item-light" data-toggle="dropdown">Važiuoklės dalys</a>
          <ul class="dropdown-menu columns-3">
            <div class="row">
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
            </div>
          </ul>
      </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle list-group-item list-group-item-action list-group-item-primary list-group-item-light" data-toggle="dropdown">Variklio dalys</a>
          <ul class="dropdown-menu columns-3">
            <div class="row">
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
            </div>
          </ul>
      </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle list-group-item list-group-item-action list-group-item-primary list-group-item-light" data-toggle="dropdown">Šildymo sistemos, radiatoriai</a>
          <ul class="dropdown-menu columns-3">
            <div class="row">
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
            </div>
          </ul>
      </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle list-group-item list-group-item-action list-group-item-primary list-group-item-light" data-toggle="dropdown">Elektronikos dalys</a>
          <ul class="dropdown-menu columns-3">
            <div class="row">
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
            </div>
          </ul>
      </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle list-group-item list-group-item-action list-group-item-primary list-group-item-light" data-toggle="dropdown">Kuro sistemos dalys</a>
          <ul class="dropdown-menu columns-3">
            <div class="row">
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="multi-column-dropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </div>
            </div>
          </ul>
      </li>
        </div>
      </div>
    </div>

  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>




  
  {{-- <select class="selectpicker disable-example" tabindex="-98">
    <option data-tokens="Model1">Model1</option>
    <option data-tokens="Model2">Model2</option>
    <option data-tokens="Model3">Model3</option>
  </select>
  <button class="btn btn-default ex-enable">Enable</button>
  <button class="btn btn-default ex-disable">Disable</button> --}}

  {{-- <script>

$('.ex-disable').click(function () {
  $('.disable-example').prop('disabled', true);
  $('.disable-example').selectpicker('refresh');
});

$('.ex-enable').click(function () {
  $('.disable-example').prop('disabled', false);
  $('.disable-example').selectpicker('refresh');
});

  </script> --}}

@endsection