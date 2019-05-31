$(function(){
	// form handler
	$('#calculator').submit(function(){
		// initialize variables
		var quantity, price, tax, total;
		// validate quantity	
		if($('#quantity').val() > 0){
			quantity = $('#quantity').val();
		} else {
			alert('Plase enter a valid quantity');
		}
		// validate price
		if($('#price').val() > 0){
			price = $('#price').val();
		} else {
			alert('Please enter a valid price');
		}
		// validate tax
		if($('#tax').val() > 0){
			tax = $('#tax').val();
		} else {
			alert('Please enter a valid tax');
		}
		// if data is set, perform calculations
		if(quantity && price && tax){
			total = quantity * price;
			total += total * (tax/100);
			// display results
			alert('The total is $' + total);
		}
		return false;
	})
})
