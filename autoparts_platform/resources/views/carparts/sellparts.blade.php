@extends('carparts.layouts.app')
@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<section class="seller-account">
    <h1 class="title">Parduoti automoblių dalis</h1>
    <div id="selling">
        <div class="row" style="padding-top: 1cm">
            
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
        <div id="modelDiv" class="row" style="padding-top: 1cm" hidden>
            
            <select id="vehicleModelSell" class="selectpicker form-control" data-live-search="true">
                <option data-tokens="Model1">Model1</option>
                <option data-tokens="Model2">Model2</option>
                <option data-tokens="Model3">Model3</option>
                <option data-tokens="Model4">Model4</option>
                <option data-tokens="Model5">Model5</option>
            </select>
        
        </div>   
            <div id="partForm" class="container" style="max-width: 792px; height: 100%; overflow-y: auto;" hidden>

                <form class="user" enctype="multipart/form-data" id="image-upload-preview" action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user  @error('categoryName') is-invalid @enderror" id="js-text-value" placeholder="Kategorijos pavadinimas" name="categoryName" onkeydown="measure()" maxLength="20" />
                        @error('categoryName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2" style="padding-bottom: 20px;">
                        <div class="col d-flex addphoto" style="padding-bottom: 20px;padding-right: 10px;  padding-left: 10px;">
                            <div class="card align-items-sm-center" style="border-width: 0px;width: 100%;height: 100%;">
                                <div class="card-body d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex flex-column justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="border-radius: 3rem;background: rgb(248,249,252);width: 100%;height: 100%;border: 1px solid #d9d9d9 ;"><i class="fas fa-upload" style="color: var(--dark);font-size: 28px;padding-bottom: 10px;"></i>
                                    <div class="form-row row-cols-1" style="margin-right: 0px;margin-left: 0px;">
                                        <label for="category_image" class="custom-file-upload btn btn-primary text-nowrap d-flex d-sm-flex d-md-flex d-lg-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center">
                                            <i class="fa fa-cloud-upload"></i>Įkelti nuotrauką
                                            </label>
                                            <input id="category_image" name="category_image" type="file" accept="image/*" hidden>
                                            @error('category_image')
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
                            <div class="card align-items-sm-center" style="border-width: 0px;width: 100%;height: 100%;">
                                <div id="preview-image" class="card-body d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex flex-column justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="overflow: hidden;border-radius: 3rem;background: url('assets/img/delicious-thanksgiving-food-flat-lay.jpg') center / cover, rgb(248,249,252);width: 100%;height: 100%;padding: 0px;border: 2px none #d9d9d9 ;">
                                    <img id="preview-image" src="https://www.ekoagros.lt/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png"
                                    alt="preview image" style="max-height: 250px;">
                                </div>
                            </div>
                        </div>
                    </div><button class="btn btn-primary btn-block btn-user" id="Prideti" type="submit" style="background: #7b8586;font-size: 16px;font-style: normal;color: rgb(255,255,255);box-shadow: 0px 0px 1px #ff2351;border-style: none;">Pridėti</button>
                </form>

            </div>
    </div>
    
 </section>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

 @endsection