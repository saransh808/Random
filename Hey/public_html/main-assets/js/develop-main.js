$(document).ready(function(){


    $('[data-toggle="tooltip"]').tooltip(); 


	$('#country').change( function(){
		var country_id = $(this).val();
		//console.log(country_id);
		
		$('#state').html('<option value="">Select State</option>');
		
		$.getJSON( baseurl+"ajax/getstatelistbybycountryid/"+country_id, function( data ) {
		  
		 $.each( data, function( key, value ) {
  			
  			$('#state').append('<option value="'+value.id+'">'+value.state+'</option>');
		});
		});


	});
	$('#state').change( function(){
		var state_id = $(this).val();
		$('#location').html('<option value="">select Location</option>');
		
		$.getJSON( baseurl+"ajax/getcitylistbystateid/"+state_id, function( data ) {
		  
		 $.each( data, function( key, value ) {
  			
  			$('#location').append('<option value="'+value.id+'">'+value.location+'</option>');
		});
		});

	});

	//sorting by price
	$('#pricesort').change( function(){
		//alert($(this).val());
		var url=window.location;
		location.replace(url+"&pricesort="+$(this).val());

	});
	//sorting by days
	$('#daysort').change( function(){
		//alert($(this).val());
		var url=window.location;
		location.replace(url+"&daysort="+$(this).val());

	});




	


	$('.tour-view-details').click(function(){

		
		console.log($(this).parent().parent().parent().siblings('.detail').toggleClass( "hide"));
		console.log($(this).parent().parent().parent().siblings('.image').addClass( "hide"));
		console.log($(this).parent().parent().parent().parent().parent().siblings().find('.detail').addClass( "hide"));
		//.toggleClass( "newClass", 1000 );
		
		
	});

	$('.list-img').click(function(){

		console.log($(this).parent().parent().parent().parent().siblings('.image').toggleClass( "hide"));
		console.log($(this).parent().parent().parent().parent().siblings('.detail').addClass( "hide"));
		console.log($(this).parent().parent().parent().parent().parent().siblings().find('.image').addClass( "hide"));
		console.log($(this).parent().parent().parent().parent().parent().siblings().find('.detail').addClass( "hide"));
		//console.log($(this).parent().parent().parent().siblings('.detail').toggleClass( "hide"));
		//console.log($(this).parent().parent().parent().parent().parent().siblings().find('.detail').addClass( "hide"));
		//.toggleClass( "newClass", 1000 );
		
		
	});

	


	$('#pricesubmit').click(function(){
		var minprice = $('#amount-min').val();
		var maxprice = $('#amount-max').val();
		var url=window.location;
		location.replace(url+"&minprice="+minprice+"&maxprice="+maxprice);
	});
	

	
    
    	

    
});