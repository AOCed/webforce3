 
              // FONCTION POUR LE SLIDER DES PRIX
 $( function() {
    $( "#slider" ).slider({
      value:100,
      min: 0,
      max: 1000,
      step: 50,
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.value );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider" ).slider( "value" ) );
  } );


             // FONCTION POUR LA CAPACITEs
$(function(){
    var $select = $(".capacite");
    for (i=1;i<=999;i++){
        $select.append($('<option></option>').val(i).html(i))
    }
});



 
// FONCTION POUR LE CHOIX DES DATES DE DEPARTS ET ARRIVEES
/*
$( function() {
      $(".datepicker").datepicker({dateFormat: "yy-mm-dd"}).on("click focus", function() {
        $(this).next($('.hourpicker')).fadeIn(600);
      });

    });

*/

