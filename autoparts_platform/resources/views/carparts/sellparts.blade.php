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
        <div class="row" style="padding-top: 1cm">
            
            Labas
        
        </div>
        <div class="row" style="padding-top: 1cm">
            
            Labas

        </div>
    </div>
    
 </section>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

 @endsection