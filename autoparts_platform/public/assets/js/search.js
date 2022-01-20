$(document).ready(function(){

    $('#showsearch').click(function(){ MyFunction(); return false; });

      function MyFunction() {
        $("#searchbymodel").removeAttr('hidden');
        
        $([document.documentElement, document.body]).animate({
        scrollTop: $("#searchbymodel").offset().top
        }, 20);
      }

    $('.select2').on('change', function (){
    closeOnSelect: false
    });

  });

  $("#vehicleBrand").on('change', function() {
    $("#modelDiv").removeAttr('hidden');

    $([document.documentElement, document.body]).animate({
      scrollTop: $("#modelDiv").offset().top
      }, 20);

  })
  $("#vehicleModel").on('change', function() {
    $("#categoriesDiv").removeAttr('hidden');

    $([document.documentElement, document.body]).animate({
      scrollTop: $("#categoriesDiv").offset().top
      }, 20);

  })