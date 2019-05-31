$(function(){
	// hide error messages
	$('.errorMessage').hide();
	// form handler
	$('#calculator').submit(function(){
		// initialize variables
		var quantity, price, tax, total;
		// validate quantity	
		if($('#quantity').val() > 0){
			quantity = $('#quantity').val();
			$('#quantityP').removeClass('error');
			$('#quantityError').hide();
		} else {
			$('#quantityP').addClass('error');
			$('#quantityError').show();
		}
		// validate price
		if($('#price').val() > 0){
			price = $('#price').val();
			$('#priceP').removeClass('error');
			$('#priceError').hide();
		} else {
			$('#priceP').addClass('error');
			$('#priceError').show();
		}
		// validate tax
		if($('#tax').val() > 0){
			tax = $('#tax').val();
			$('#taxP').removeClass('error');
			$('#taxError').hide();
		} else {
			$('#taxP').addClass('error');
			$('#taxError').show();
		}
		// if data is set, perform calculations
		if(quantity && price && tax){
			total = quantity * price;
			total += total * (tax/100);
			// display results
			$('#results').html('The total is <strong>$' + total + '</strong>');
		}
		return false;
	})
})
