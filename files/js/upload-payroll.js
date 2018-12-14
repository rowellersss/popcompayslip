var br = "\r\n";
var dt = new Date();
var year = dt.getFullYear();
var month = String('0' + (dt.getMonth()+1)).slice(-2);
var monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"];

$(function(){
	$('#upload-payroll').submit(function(e){
		e.preventDefault();
		
		$('#fade').show();
	
		var formData = new FormData($(this)[0]);     

		$.ajax({
		    type: 'POST',
		    data: formData,
		    url: 'upload_payroll.php',
		    cache: false,
		    contentType: false,
		    processData: false,
		    success: function(result){

		    var dateResult = result.split('-');
		    var getYear	= dateResult[0];
		    
			    if(result == 'date not matched')
			    {
					$('#fade').hide();
					swal("Please check!!!", "Date covered and Cut-off don't match", "error");
			    }
			    else if(result == 'cutoff not matched')
			    {
			    	$('#fade').hide();
					swal("Please check!!!", "1st cut-off should be within 1st day to 15th day of the month only. "+br+" 2nd cut-off should be within 16th day to 31st day of the month only.", "error");
			    }
			    else if(result == 'uploaded')
			    {
			    	$('#fade').hide();
					swal("Oops...", "Month covered is already uploaded!", "warning");
			    }
			    else if(result == 'invalid file')
			    {
			    	$('#fade').hide();
			    	swal("Oops...", "Please upload csv file!", "error");
			    }
			    else if(result == 'empty file')
			    {
			    	$('#fade').hide();
			    	swal("Oops...", "Please choose a file!", "error");
			    }
			    else
			    {
			    	$('#fade').hide();
			    	swal({   
				         title: "Successful!",   
				         text: ""+getMonthName(result)+" "+getYear+" Payroll uploaded!",   
				         imageUrl: "../images/popcomlogo3.jpg" 
				    });
			    }
		    }
		});
	});

	$('#upload-benefits').submit(function(e){
		e.preventDefault();

		// $('#fade').show();
		var formData = new FormData($(this)[0]);

		$.ajax({
			type: 'POST',
			data: formData,
			url: 'upload_benefits.php',
			cache: false,
		    contentType: false,
		    processData: false,
		    success: function(result){
		    	alert(result);return false;

				if(result == 'invalid file')
				{
					$('#fade').hide();
					swal("Oops...", "Please upload csv file!", "error");
				}
				else if(result == 'empty file')
				{
					$('#fade').hide();
					swal("Oops...", "Please choose a file!", "error");
				}
				else if(result == 'date not matched')
				{
					$('#fade').hide();
					swal("Please check!!!", "Date covered and Cut-off don't match", "error");
				}
				else if(result == 'wrong file')
				{
					$('#fade').hide();
					swal("Wrong file!!!", "Please check your file", "warning");
				}
				else if(result == 'no emp no')
				{
					$('#fade').hide();
					swal("Oops...", "No Employee ID found in Excel!", "error");
				}
				else
				{
					$('#fade').hide();
					if(result == 'lon'){
						benefit = 'Longevity Pay';
						swal({   
					         title: "Successful!",   
					         text: ""+benefit+" uploaded!",   
					         imageUrl: "../images/popcomlogo3.jpg" 
				    	});
					}else if(result == 'haz'){
						benefit = 'Hazard Pay';
						swal({   
					         title: "Successful!",   
					         text: ""+benefit+" uploaded!",   
					         imageUrl: "../images/popcomlogo3.jpg" 
				    	});
					}else{
						benefit = 'Subsistence and Laundry Allowance';
						swal({   
					         title: "Successful!",   
					         text: ""+benefit+" uploaded!",   
					         imageUrl: "../images/popcomlogo3.jpg" 
				    	});
					}
				}
		    	
		    }
		});
	});

	$('#upload-special').submit(function(e){
		e.preventDefault();

		$('#fade').show();
		var formData = new FormData($(this)[0]);
		
		$.ajax({
			type: 'POST',
			data: formData,
			url: 'upload_special.php',
			cache: false,
		    contentType: false,
		    processData: false,
		    success: function(result){

		    var dateResult = result.split('-');
		    var getYear	= dateResult[0];
		    	
		    	if(result == 'empty file')
		    	{
		    		$('#fade').hide();
					swal("Oops...", "Please choose a file!", "error");
		    	}
		    	else if(result == 'invalid file')
		    	{
		    		$('#fade').hide();
					swal("Oops...", "Please upload csv file!", "error");
		    	}
		    	else if(result == 'date not matched')
		    	{
		    		$('#fade').hide();
					swal("Please check!!!", "Date covered and Cut-off don't match", "error");
		    	}
		    	else
		    	{
		    		$('#fade').hide();
			    	swal({   
				         title: "Successful!",   
				         text: ""+getMonthName(result)+" "+getYear+" Payroll uploaded!",   
				         imageUrl: "../images/popcomlogo3.jpg" 
				    });
		    	}
		    }

		})
	});
})

function getMonthName(monthInt)
{
	var dateResult = monthInt.split("-");
	var monthInt = dateResult[1];

	if(monthInt == '01'){
		monthInt = 'January';
		return monthInt;
	}else if(monthInt == '02'){
		monthInt = 'February';
		return monthInt;
	}else if(monthInt == '03'){
		monthInt = 'March';
		return monthInt;
	}else if(monthInt == '04'){
		monthInt = 'April';
		return monthInt;
	}else if(monthInt == '05'){
		monthInt = 'May';
		return monthInt;
	}else if(monthInt == '06'){
		monthInt = 'June';
		return monthInt;
	}else if(monthInt == '07'){
		monthInt = 'July';
		return monthInt;
	}else if(monthInt == '08'){
		monthInt = 'August';
		return monthInt;
	}else if(monthInt == '09'){
		monthInt = 'September';
		return monthInt;
	}else if(monthInt == '10'){
		monthInt = 'October';
		return monthInt;
	}else if(monthInt == '11'){
		monthInt = 'November';
		return monthInt;
	}else{
		monthInt = 'December';
		return monthInt;
	}

}