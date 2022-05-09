@extends('carparts.layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<section class="seller-account">
    <h1 class="title">Parduoti automoblių dalis</h1>
    <div id="selling">
        <form class="user" enctype="multipart/form-data" id="upload_part" action="{{ route('part.store') }}" method="POST">
            @csrf
        <div class="row" id="brandDiv" style="padding-top: 1cm">

            <div class="form-group">
                <select id='brand_id' name="brand_id" style="width: 40%">
                  <option></option>
                  @foreach ($vehicleBrands as $brand)
                    <option data-tokens="{{ $brand->name }}" value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
                </select>
            </div>
        
        </div>
        <div id="modelDiv" class="row">
            <select id="model_id" name="model_id" style="width: 40%">
                <option></option>
            </select>
        </div>

            <div id="partForm" class="container" style="max-width: 792px; height: 100%; overflow-y: auto;">

                
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user  @error('part_name') is-invalid @enderror" id="part_name" placeholder="Dalies pavadinimas" name="part_name" onkeydown="measure()" maxLength="20" />
                        @error('part_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <select name="part_category" id="part_category" style="width: 70%; padding-top: 1cm">
                            <option></option>
                            @foreach($partsCategories as $category)
                            <option data-tokens="{{ $category->id }}" value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                        @error('part_category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <br><input type="number" style="width: 30%" class="form-control d-inline @error('price') is-invalid @enderror" id="price" placeholder="Dalies kaina (€)" name="price"/> <span>€</span>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <select name="part_wear" id="part_wear" style="width: 70%; padding-top: 1cm">
                            <option></option>
                            <option data-tokens="" value="Patenkinama">Patenkinama būklė</option>
                            <option data-tokens="" value="Gera">Gera būklė</option>
                            <option data-tokens="" value="Puiki">Puiki būklė</option>

                        </select>
                        @error('part_category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <h5>Automobilio pagaminimo metai ir mėnesis</h5>
                        <div class='input-group date' style="width: 50%" id='datetimepicker'>
                            <input class="date form-control" id="make_years" name="make_years" type="text">
                            <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2" style="padding-bottom: 20px;">
                        <div class="col d-flex addphoto" style="padding-bottom: 20px;padding-right: 10px;  padding-left: 10px;">
                            <div class="card align-items-sm-center" style="border-width: 0px;width: 100%;height: 100%;">
                                <div class="card-body d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex flex-column justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="border-radius: 3rem;background: rgb(248,249,252);width: 100%;height: 100%;border: 1px solid #d9d9d9 ;"><i class="fas fa-upload" style="color: var(--dark);font-size: 28px;padding-bottom: 10px;"></i>
                                    <div class="form-row row-cols-1" style="margin-right: 0px;margin-left: 0px;">
                                        <label for="part_image" class="custom-file-upload btn btn-primary text-nowrap d-flex d-sm-flex d-md-flex d-lg-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center">
                                            <i class="fa fa-cloud-upload"></i>Įkelti nuotrauką
                                            </label>
                                            <input id="part_image" name="part_image" type="file" hidden>
                                            @error('part_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                    </div>
                                    <h6 class="text-center text-muted card-subtitle mb-2" style="font-weight: 400; padding-top: 10px;">Rekomenduojamas dydis 1:1</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex addphoto" style="padding-bottom: 20px; padding-right: 10px; padding-left: 10px;">
                            <div class="card" style="border-width: 0px;width: 100%;height: 100%;">
                                <div class="row">

                                    <div class="col-md-12 mb-2">
                                        <img id="preview-image-before-upload" src="https://www.ekoagros.lt/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png"
                                            alt="preview image" style="max-height: 250px;">
                                    </div>
                                    {{-- <div class="images-preview-div" style="object-fit: cover; max-width: 30%; max-height: 30%;">
                                        <img class="w-100" src="https://www.ekoagros.lt/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png">
                                    </div>
                                    <div class="col-4">
                                        <div class="1st card-body d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex flex-column justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="overflow: hidden;border-radius: 3rem;height: 4cm;padding: 0px;border: 2px none #d9d9d9 ;">
                                            <button type="button" class="close AClass">
                                            <span>&times;</span>
                                            </button>
                                            
                                        </div>
                                    </div> --}}

                                  </div>              

                                {{-- <div id="preview-image" class="card-body d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex flex-column justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="overflow: hidden;border-radius: 3rem;background: url('https://www.ekoagros.lt/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png') center / cover, rgb(248,249,252);width: 3cm;height: 3cm;padding: 0px;border: 2px none #d9d9d9 ;">
                                    <button type="button" class="btn-close" style="position:absolute; top:0; right:0;" aria-label="Close"></button>
                                    <img id="preview-image" src="https://www.ekoagros.lt/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png"
                                    alt="preview image" style="max-height: 200px;">
                                </div>  --}}
                            </div>
                        </div>
                    </div><button class="btn btn-primary btn-block btn-user" id="Prideti" type="submit" style="background: #7b8586;font-size: 16px;font-style: normal;color: rgb(255,255,255);box-shadow: 0px 0px 1px #ff2351;border-style: none;">Pridėti</button>
                </form>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif

            </div>
    </div>
    
 </section>

 <script >

$(document).ready(function (e) {
 
   
 $('#part_image').change(function(){
          
  let reader = new FileReader();

  reader.onload = (e) => { 

    $('#preview-image-before-upload').attr('src', e.target.result); 
  }

  reader.readAsDataURL(this.files[0]); 
 
 });
 
});

    $('.date').datepicker({  
        format: "yyyy-mm-01",
        viewMode: "months", 
        minViewMode: "months",
        autoclose: true
     }); 
    </script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 <link rel="stylesheet" href="{{ URL::asset('css/sellparts.css') }}">


 @endsection