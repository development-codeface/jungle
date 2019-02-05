//////////////--Form Validations: Midhun B--/////////////////
function checkExtension(upload_logo) 
{

    var match = /\..+$/;
    var ext =  /^(([a-zA-Z]:)|(\\{2}\w+)\$?)(\\(\w[\w].*))+(.jpeg|.JPEG|.gif|.GIF|.png|.jpg|.PNG)$/;
	return ext.test(upload_logo);
}
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
function ValidateEmail(email) 
	{ 
	 var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
	 if (reg.test(email)){
		$('.msg').hide();
	 $('.success').show();
	 return true; 
	}
	 else{
		$('.msg').show();
	 $('.success').hide();
	 return false;
	 } 
	} 
	

$(document).ready(function() {
	  
	//hotel profile validation 
	 $("#edit_hotel_submit").click(function() {	
			
	 var address=CKEDITOR.instances['address'].getData();
	  var description=CKEDITOR.instances['desc'].getData();
	  var error_var = 0;
		
		if(address=='')
		{
			 error_var = 1;
			 alert("Enter address in basic details tab");
			 return false;
		 }
 		
		if($.trim($('#country').val())=='select')
		{
			error_var = 1;
			alert("Select country in basic details tab");
			return false;
		}
		if($.trim($('#state').val())=='select')
		{
			error_var = 1;
			alert("Select state in basic details tab");
			return false;
		}
		if($.trim($('#place').val())=='')
		{
			error_var = 1;
			alert("Enter place in basic details tab");
			$('#place').focus();
			return false;
		}
				
		if($.trim($('#fb').val())=='')
		{
			error_var = 1;
			alert("Enter Facebook link in basic details tab");
			$('#fb').focus();
			return false;
		}
				
		if($.trim($('#email').val())=='')
		{
			error_var = 1;
			alert("Enter email in basic details tab");
			$('#email').focus();
			return false;
		}
				
		if($.trim($('#phone').val())=='')
		{
			error_var = 1;
			alert("Enter phone number in basic details tab");
			$('#phone').focus();
			return false;
		}
		if(description=='')
		{
			 error_var = 1;
			 alert("Enter description in basic details tab");
			 return false;
		 }
		
		
		// if(($("input[name='free_toiletries']:checked").val()!='1') && ($("input[name='hairdryer']:checked").val()!='1') && ($("input[name='bathroom']:checked").val()!='1')&& ($("input[name='toilet']:checked").val()!='1')&& ($("input[name='bath_shower']:checked").val()!='1') && ($("input[name='slippers']:checked").val()!='1') && ($("input[name='towels']:checked").val()!='1') && ($("input[name='linen']:checked").val()!='1') )
		// 	 	 {
		// 	 		error_var = 1;
		// 			alert("Select bathroom facilities in facilities tab");
		// 			 return false;
		// 	 	}
				
				
		// 		if(($("input[name='garden_view']:checked").val()!='1') && ($("input[name='view']:checked").val()!='1'))
		// 	 	 {
		// 	 		error_var = 1;
		// 			alert('Please select view in facilities tab');
		// 			 return false;
		// 	 	}
				
		// 		if(($("input[name='free_outdoor_pool']:checked").val()!='1') && ($("input[name='terrace']:checked").val()!='1') && ($("input[name='garden']:checked").val()!='1'))
		// 	 	 {
		// 	 		error_var = 1;
		// 			alert('Please select outdoors in facilities tab');
		// 			 return false;
		// 	 	}
				
		// 		if(($("input[name='free_fFitness_centre']:checked").val()!='1') && ($("input[name='DJ']:checked").val()!='1') && ($("input[name='evening_entertainment']:checked").val()!='1') && ($("input[name='sauna']:checked").val()!='1') && ($("input[name='spa_wellness_centre']:checked").val()!='1') && ($("input[name='massage']:checked").val()!='1'))
		// 	 	 {
		// 	 		error_var = 1;
		// 			alert('Please select Activities in facilities tab');
		// 			 return false;
		// 	 	}
				
		// 		if(($("input[name='seating_area']:checked").val()!='1') && ($("input[name='desk']:checked").val()!='1') && ($("input[name='sofa']:checked").val()!='1'))
		// 	 	 {
		// 	 		error_var = 1;
		// 			alert('Please select Living Area in facilities tab');
		// 			 return false;
		// 	 	}
				
		// 		if(($("input[name='telephone']:checked").val()!='1') && ($("input[name='satellite_channels']:checked").val()!='1') && ($("input[name='flat_screen_TV']:checked").val()!='1') && ($("input[name='cable_channels']:checked").val()!='1'))
		// 	 	 {
		// 	 		error_var = 1;
		// 			alert('Please select Media & technologies in facilities tab');
		// 			 return false;
		// 	 	}
				
		// 		if(($("input[name='bar']:checked").val()!='1') && ($("input[name='breakfast_in_the_room']:checked").val()!='1') && ($("input[name='restaurant']:checked").val()!='1') && ($("input[name='snack_bar']:checked").val()!='1') && ($("input[name='special_diet_menus']:checked").val()!='1'))
		// 	 	 {
		// 	 		error_var = 1;
		// 			alert('Please select Food and drink in facilities tab');
		// 			 return false;
		// 	 	}
				
		
		/*var chkfood_drink=[];
		   
		   $(".food_drink:checked").each(function(){
			chkfood_drink=chkfood_drink.push($(this).val());
		});
		
		var selectedfood_drink;
		selectedfood_drink=chkfood_drink.join(',')+",";
		if(selectedfood_drink.length < 2)
		{
			error_var = 1;
			alert("select atleast one Food & drink in facilities tab");
			return false;
		}
		*/
		
		var chkservice=[];
		   
		   $(".services:checked").each(function(){
			chkservice=chkservice.push($(this).val());
		});
		
		var selectedservice;
		selectedservice=chkservice.join(',')+",";
		if(selectedservice.length < 2)
		{
			error_var = 1;
			alert("select atleast one service");
			return false;
		}
		
		
		if(error_var==0)
		{
			var phn_com=$("#phone").val().length;
			if(phn_com>0)
			 {
				if((phn_com > 10) || (phn_com <10))
			 {
				alert('Phone number in basic details tab should have 10 numbers');
				return false;
			 }

			}
			
					
		}
		return true;
	
	});
	
	//room add validation
	 $("#add_room_submit").click(function() {
		
		 var error_var = 0;
		var description=CKEDITOR.instances['room_des'].getData();
		
		if($.trim($('#room_title').val())=='')
		{
			error_var = 1;
			alert("Enter Room Title in basic details tab");
			$('#room_title').focus();
			return false;
		}
		if($.trim($('#room_hotel').val())=='select')
		{
			error_var = 1;
			alert("Select Hotel in basic details tab");
			return false;
		}
		
		if(description == "")
		{
			error_var = 1;
			alert("Enter description in basic details tab");
			return false;
		} 
		
		var chkservice=[];
		   
		   $(".room_facilities:checked").each(function(){
			chkservice=chkservice.push($(this).val());
		});
		
		var selectedservice;
		selectedservice=chkservice.join(',')+",";
		if(selectedservice.length < 2)
		{
			error_var = 1;
			alert("select atleast one facility");
			return false;
		}
		
	 });
	
	//room edit validation
	$("#room_sub_edt").click(function() {
		
		 var error_var = 0;
		 var description=CKEDITOR.instances['room_des'].getData();
		if($.trim($('#room_title').val())=='')
		{
			error_var = 1;
			alert("Enter Room Title in basic details tab");
			$('#room_title').focus();
			return false;
		}
		
		
		if(description == "")
		{
			error_var = 1;
			alert("Enter description in basic details tab");
			return false;
		}
		
		var chkservice=[];
		   
		   $(".room_facilities:checked").each(function(){
			chkservice=chkservice.push($(this).val());
		});
		
		var selectedservice;
		selectedservice=chkservice.join(',')+",";
		if(selectedservice.length < 2)
		{
			error_var = 1;
			alert("select atleast one facility");
			return false;
		}
		
	 });
	 
	
	
	 //room combination add validation
	 $("#add_room_comb_submit").click(function() {
	 	
		 var error_var = 0;
		/* if($.trim($('#room_id').val())=='')
		{
			error_var = 1;
			alert("Select room type");
			return false;
		} */
		
		if($.trim($('#room_price').val())=='')
		{
			error_var = 1;
			alert("Enter room basic price");
			$('#room_price').focus();
			return false;
		}
		
		if($.trim($('#no_of_bed').val())!='')
		{
			if($.trim($('#room_adult_rate').val())=='')
			{
				error_var = 1;
				alert("Enter Extra Bed rate");
			$('#room_adult_rate').focus();
				return false;
			}
		}
		
		 if($.trim($('#validity_from').val())=='')
		 {
			 error_var = 1;
			 alert("Enter valid from date");
			$('#validity_from').focus();
			 return false;
		 }
		
		if($.trim($('#validity').val())=='')
		 {
			 error_var = 1;
			 alert("Enter valid to date");
			$('#validity').focus();
			 return false;
		 }
		
		
		if(error_var==0)
		{
			var from_date = $('#sandbox-container input').datepicker('getDate');
			var to_date =$('#sandbox-container4 input').datepicker('getDate');
			if(from_date>to_date)
			{
				alert('The valid from date should be greater than the to valid to date');
				return false;
			}
				
		}
		return true;
	 });
	
	
	//room combination edit validation
	 $("#edit_room_comb_submit").click(function() {
		 var error_var = 0;
		
		
		if($.trim($('#room_price').val())=='')
		{
			error_var = 1;
			alert("Enter room basic price");
			$('#room_price').focus();
			return false;
		}
		
		if($.trim($('#no_of_bed').val())!='')
		{
			if($.trim($('#room_adult_rate').val())=='')
			{
				error_var = 1;
				alert("Enter Extra Bed rate");
			$('#room_adult_rate').focus();
				return false;
			}
		}
	
		
		 if($.trim($('#valid_from').val())=='')
		 {
			 error_var = 1;
			 alert("Enter valid from");
			$('#valid_from').focus();
			 return false;
		 }
		
		if($.trim($('#validity').val())=='')
		 {
			 error_var = 1;
			 alert("Enter valid to");
			$('#validity').focus();
			 return false;
		 }
		
		
		if(error_var==0)
		{
			var from_date = $('#sandbox-container input').datepicker('getDate');
			var to_date =$('#sandbox-container4 input').datepicker('getDate');
			if(from_date>to_date)
			{
				alert('The valid from date should be greater than the to valid to date');
				return false;
			}
		}
		return true;
	 });
	 
	 
	 
	  //Agency validation
	 // $("#agency_sub").click(function() {

	 	// if($.trim($('#agency_pack_date').val())!='' || $.trim($('#agency_room_date').val())!=''){

	 	// if($.trim($('#agency_from').val())==''){
			 // alert("Please enter valid from date");
			 // $('#agency_from')[0].focus();
			 // return false;
	 	// }

	 	// if($.trim($('#agency_to').val())==''){
			 // alert("Please enter valid to date");
			 // $('#agency_to')[0].focus();
			 // return false;
	 	// }

	 // }
	 
	 	// if($.trim($('#agency_from').val())!='' || $.trim($('#agency_to').val())!=''){

	 	// if($.trim($('#agency_pack_date').val())==''){
			 // alert("Please enter package tariff");
			 // $('#agency_pack_date').focus();
			 // return false;
	 	// }

	 	// if($.trim($('#agency_room_date').val())==''){
			 // alert("Please enter room tariff");
			 // $('#agency_room_date').focus();
			 // return false;
	 	// }

	 // }
	 
	 // });
});
	