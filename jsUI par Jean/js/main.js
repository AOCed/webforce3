$(document).ready(function(){
	var formItems = $("#test input[type='text']");
	var conteneurListeVol = $("#listeBillets");
	var sliderItem = $( "#slider-range" );
	//var formItems = $("#test input".filter(function(){ return $(this).attr("type") == "text";});
	//alert(formItems.length)
	formItems.eq(0).autocomplete({
		source: villes,
		minLength: 3
	});
	formItems.eq(1).autocomplete({
		source: villes,
		minLength: 3
	});
	$.datepicker.setDefaults($.datepicker.regional['fr']);
	formItems.eq(2).datepicker();
	formItems.eq(3).datepicker();

	conteneurListeVol.sortable();

	sliderItem.slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "€" + ui.values[ 0 ] + " - €" + ui.values[ 1 ] );
      }
    });



});