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
	   $("#add_hotel_submit").click(function() {
		   var upload_logo =  document.getElementById("upload_logo").value;
		   var hotel_image =  document.getElementById("hotel_image").value;
		   var error_var = 0;
		if($.trim($('#title').val())=='')
		{
			error_var = 1;
			alert("Fill Hotel Name in basic details tab");
			return false;
		}
		
		if(upload_logo=='')
		{
			error_var = 1;
			alert("Add a logo in basic details tab");
			return false;
			
		}
		
		/*if(upload_logo !='')
		{
		if(!checkExtension(upload_logo)) 
					{
       				error_var = 1;
					alert("Logo is not valid type of Image");
					return false;
            		}
		}*/
		// if($.trim($('#address').val())=='')
		// {
			// error_var = 1;
			// alert("Fill address in basic details tab");
			// return false;
		// }
		
		// if($.trim($('#desc').val())=='')
		// {
			// error_var = 1;
			// alert("Fill description in basic details tab");
			// return false;
		// }
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
			alert("Fill place in basic details tab");
			return false;
		}
		if($.trim($('#catagory').val())=='select')
		{
			error_var = 1;
			alert("Select catagory in basic details tab");
			return false;
		}
		if($.trim($('#sub_catagory').val())=='select')
		{
			error_var = 1;
			alert("Select subcatagory in basic details tab");
			return false;
		}
		
		if($.trim($('#fb').val())=='')
		{
			error_var = 1;
			alert("Fill Facebook link in basic details tab");
			return false;
		}
				
		if($.trim($('#email').val())=='')
		{
			error_var = 1;
			alert("Fill email in basic details tab");
			return false;
		}
				
		if($.trim($('#phone').val())=='')
		{
			error_var = 1;
			alert("Fill phone number in basic details tab");
			return false;
		}
		
		if($.trim($('#star_rating').val())=='')
		{
			error_var = 1;
			alert("Fill Star Rating in in basic details tab");
			return false;
		}

		
		if(hotel_image=='')
		{
			error_var = 1;
			alert("Add a Images in Images tab");
			return false;
			
		}
		
		// if($.trim($('#room_com_room').val())=='select')
		// {
		// 	error_var = 1;
		// 	alert("select combination in Room tab");
		// 	return false;
		// }
		
		// if($.trim($('#room_com_count').val())=='select')
		// {
		// 	error_var = 1;
		// 	alert("select number of room in Room tab");
		// 	return false;
		// }
		
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
		//alert(selectedservice);
		if(selectedservice.length < 2)
		{
			error_var = 1;
			alert("select atleast one service");
			return false;
		}
		
		
		if(error_var==0)
		{
			//var phn_com=$("#phone").val().length;
			//if(phn_com>0)
			// {
				//if((phn_com > 10) || (phn_com <12))
			 //{
				//alert('Phone number in basic details tab should have 10 numbers');
				//return false;
			// }

			//}
			
				if(($.trim($('#checkin').val()))>($.trim($('#checkout').val())))
				{
					
					alert('The checkin date should be greater than the checkout date');
					
					return false;
				}
					
					
		}
		return true;
   	});
	
	 $("#edit_hotel_submit").click(function() {		   
	  var error_var = 0;
		if($.trim($('#title').val())=='')
		{
			error_var = 1;
			alert("Fill Hotel Name in basic details tab");
			return false;
		}
		
		// if($.trim($('#address').val())=='')
		// {
			// error_var = 1;
			// alert("Fill address in basic details tab");
			// return false;
		// }
// 		
		// if($.trim($('#desc').val())=='')
		// {
			// error_var = 1;
			// alert("Fill description in basic details tab");
			// return false;
		// }
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
			alert("Fill place in basic details tab");
			return false;
		}
		if($.trim($('#catagory').val())=='select')
		{
			error_var = 1;
			alert("Select catagory in basic details tab");
			return false;
		}
		if($.trim($('#sub_catagory').val())=='select')
		{
			error_var = 1;
			alert("Select subcatagory in basic details tab");
			return false;
		}
		
		if($.trim($('#fb').val())=='')
		{
			error_var = 1;
			alert("Fill Facebook link in basic details tab");
			return false;
		}
				
		if($.trim($('#email').val())=='')
		{
			error_var = 1;
			alert("Fill email in basic details tab");
			return false;
		}
				
		if($.trim($('#phone').val())=='')
		{
			error_var = 1;
			alert("Fill phone number in basic details tab");
			return false;
		}
		
		// if($.trim($('#checkin').val())=='')
		// {
			// error_var = 1;
			// alert("Fill checkin date in basic details tab");
			// return false;
		// }
// 		
		// if($.trim($('#checkout').val())=='')
		// {
			// error_var = 1;
			// alert("Fill checkout date in basic details tab");
			// return false;
		// }
// 		
		
		
		// if($.trim($('#room_com_room').val())=='select')
		// {
		// 	error_var = 1;
		// 	alert("select combination in Room tab");
		// 	return false;
		// }
		
		// if($.trim($('#room_com_count').val())=='select')
		// {
		// 	error_var = 1;
		// 	alert("select number of room in Room tab");
		// 	return false;
		// }
		
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
		
		var chkservice=[];
		   
		   $(".services:checked").each(function(){
			chkservice=chkservice.push($(this).val());
		});
		
		var selectedservice;
		selectedservice=chkservice.join(',')+",";
		//alert(selectedservice);
		if(selectedservice.length < 2)
		{
			error_var = 1;
			alert("select atleast one service");
			return false;
		}
		*/
		
		if(error_var==0)
		{
			//var phn_com=$("#phone").val().length;
			//if(phn_com>0)
			// {
				//if((phn_com > 10) || (phn_com <12))
			// {
				//alert('Phone number in basic details tab should have 10 numbers');
				//return false;
			 //}

			//}
			
				// if(($.trim($('#checkin').val()))>($.trim($('#checkout').val())))
				// {
// 					
					// alert('The checkin date should be greater than the checkout date');
// 					
					// return false;
				// }
// 					
					
		}
		return true;
	
	});
	
	 $("#add_room_submit").click(function() {
		 var room_image =  document.getElementById("room_image").value;
		 var error_var = 0;
		if($.trim($('#room_title').val())=='')
		{
			error_var = 1;
			alert("Fill Room Title in basic details tab");
			return false;
		}
		if($.trim($('#room_hotel').val())=='select')
		{
			error_var = 1;
			alert("Select Hotel in basic details tab");
			return false;
		}
		
		
		if($.trim($('#room_des').val())=='')
		{
			error_var = 1;
			alert("Fill description in basic details tab");
			return false;
		}
		
		if($.trim($('#room_size').val())=='')
		{
			error_var = 1;
			alert("Fill Room size in basic details tab");
			return false;
		}
		
		if($.trim($('#room_beds').val())=='select')
		{
			error_var = 1;
			alert("Select No Of rooms in basic details tab");
			return false;
		}
		
		// if($.trim($('#room_price').val())=='')
		// {
		// 	error_var = 1;
		// 	alert("Fill Room Price in basic details tab");
		// 	return false;
		// }
		
		// if($.trim($('#room_offer_price').val())=='')
		// {
		// 	error_var = 1;
		// 	alert("Fill Offer Price in basic details tab");
		// 	return false;
		// }
		
		if($.trim($('#room_bed_size').val())=='')
		{
			error_var = 1;
			alert("Fill Bed Size in basic details tab");
			return false;
		}
		
		if($.trim($('#room_tax').val())=='')
		{
			error_var = 1;
			alert("Fill Tax in basic details tab");
			return false;
		}
		
		if($.trim($('#room_tax_des').val())=='')
		{
			error_var = 1;
			alert("Fill Tax Description in basic details tab");
			return false;
		}
		if(room_image=='')
		{
			error_var = 1;
			alert("Upload images in Images tab");
			return false;
			
		}
		
		var chkservice=[];
		   
		   $(".room_facilities:checked").each(function(){
			chkservice=chkservice.push($(this).val());
		});
		
		var selectedservice;
		selectedservice=chkservice.join(',')+",";
		//alert(selectedservice);
		if(selectedservice.length < 2)
		{
			error_var = 1;
			alert("select atleast one facility");
			return false;
		}
		
	 });
	
	$("#room_sub_edt").click(function() {
		// var room_image =  document.getElementById("room_image").value;
		 var error_var = 0;
		if($.trim($('#room_title').val())=='')
		{
			error_var = 1;
			alert("Fill Room Title in basic details tab");
			return false;
		}
		
		// if($.trim($('#room_hotel').val())=='select')
		// {
			// error_var = 1;
			// alert("Select Hotel in basic details tab");
			// return false;
		// }
		
		if($.trim($('#room_des').val())=='')
		{
			error_var = 1;
			alert("Fill description in basic details tab");
			return false;
		}
		
		if($.trim($('#room_size').val())=='')
		{
			error_var = 1;
			alert("Fill Room size in basic details tab");
			return false;
		}
		
		if($.trim($('#room_beds').val())=='select')
		{
			error_var = 1;
			alert("Select No Of rooms in basic details tab");
			return false;
		}
		
		// if($.trim($('#room_price').val())=='')
		// {
		// 	error_var = 1;
		// 	alert("Fill Room Price in basic details tab");
		// 	return false;
		// }
		
		// if($.trim($('#room_offer_price').val())=='')
		// {
		// 	error_var = 1;
		// 	alert("Fill Offer Price in basic details tab");
		// 	return false;
		// }
		
		if($.trim($('#room_bed_size').val())=='')
		{
			error_var = 1;
			alert("Fill Bed Size in basic details tab");
			return false;
		}
		
		if($.trim($('#room_tax').val())=='')
		{
			error_var = 1;
			alert("Fill Tax in basic details tab");
			return false;
		}
		
		if($.trim($('#room_tax_des').val())=='')
		{
			error_var = 1;
			alert("Fill Tax Description in basic details tab");
			return false;
		}
		// if(room_image=='')
		// {
			// error_var = 1;
			// alert("Upload images in Images tab");
			// return false;
// 			
		// }
		
		var chkservice=[];
		   
		   $(".room_facilities:checked").each(function(){
			chkservice=chkservice.push($(this).val());
		});
		
		var selectedservice;
		selectedservice=chkservice.join(',')+",";
		//alert(selectedservice);
		if(selectedservice.length < 2)
		{
			error_var = 1;
			alert("select atleast one facility");
			return false;
		}
		
	 });
	 
	 $("#add_room_comb_submit").click(function() {
	 	
	 	
		 var error_var = 0;
		if($.trim($('#room_hotel').val())=='0')
		{
			error_var = 1;
			alert("Select Hotel");
			return false;
		}
		
		if($.trim($('#room_attached').val())=='0')
		{
			error_var = 1;
			alert("Select room type");
			return false;
		}
		
		
		if($.trim($('#room_price').val())=='')
		{
			error_var = 1;
			alert("Fill price");
			return false;
		}
		
		
		if($.trim($('#room_ofr_price').val())=='')
		{
			error_var = 1;
			alert("Fill offer price");
			return false;
		}
		
		if($.trim($('#room_adult_rate').val())=='')
		{
			error_var = 1;
			alert("Fill Extra Adult rate");
			return false;
		}
		
		if($.trim($('#room_child_rate').val())=='')
		{
			error_var = 1;
			alert("Fill Extra Child rate");
			return false;
		}
		
		// if($.trim($('#valid_from').val())=='')
		// {
			// error_var = 1;
			// alert("Fill validity from");
			// return false;
		// }
// 		
		// if($.trim($('#validity').val())=='')
		// {
			// error_var = 1;
			// alert("Fill validity to");
			// return false;
		// }
		
		if($.trim($('#conditions').val())=='')
		{
			error_var = 1;
			alert("Fill conditions");
			return false;
		}
		
		if($.trim($('#allowed_persons').val())=='select')
		{
			error_var = 1;
			alert("Select allowed number of persons");
			return false;
		}
		
		if($.trim($('#num_rooms').val())=='select')
		{
			error_var = 1;
			alert("Select number of rooms");
			return false;
		}
		
		if($.trim($('#tax_applicable').val())=='select')
		{
			error_var = 1;
			alert("Is tax applicable?");
			return false;
		}
		
		
		
		if(error_var==0)
		{
					
				if(($.trim($('#validity_from').val()))>($.trim($('#validity').val())))
				{
					
					alert('The from date should be greater than the to date');
					
					return false;
				}
					
					
		}
		return true;
	 });
	
	 $("#edit_room_comb_submit").click(function() {
		 var error_var = 0;
		if($.trim($('#room_hotel').val())=='Select')
		{
			error_var = 1;
			alert("Select Hotel");
			return false;
		}
		
		if($.trim($('#room_id').val())=='Select')
		{
			error_var = 1;
			alert("Select room type");
			return false;
		}
		
		if($.trim($('#num_rooms').val())=='select')
		{
			error_var = 1;
			alert("Select number of rooms");
			return false;
		}
		
		if($.trim($('#room_price').val())=='')
		{
			error_var = 1;
			alert("Fill price");
			return false;
		}
		
		
		if($.trim($('#room_ofr_price').val())=='')
		{
			error_var = 1;
			alert("Fill offer price");
			return false;
		}
		
		if($.trim($('#room_adult_rate').val())=='')
		{
			error_var = 1;
			alert("Fill Extra Adult rate");
			return false;
		}
		
		if($.trim($('#room_child_rate').val())=='')
		{
			error_var = 1;
			alert("Fill Extra Child rate");
			return false;
		}
		
		if($.trim($('#valid_from').val())=='')
		{
			error_var = 1;
			alert("Fill validity from");
			return false;
		}
		
		if($.trim($('#validity').val())=='')
		{
			error_var = 1;
			alert("Fill validity to");
			return false;
		}
		
		if($.trim($('#conditions').val())=='')
		{
			error_var = 1;
			alert("Fill conditions");
			return false;
		}
		
		if($.trim($('#allowed_persons').val())=='select')
		{
			error_var = 1;
			alert("Select allowed number of persons");
			return false;
		}
		
		
		
		if($.trim($('#tax_applicable').val())=='select')
		{
			error_var = 1;
			alert("Is tax applicable?");
			return false;
		}
				
		
		if(error_var==0)
		{
					
				if(($.trim($('#validity_from').val()))>($.trim($('#validity').val())))
				{
					
					alert('The from date should be greater than the to date');
					
					return false;
				}					
					
		}
		return true;
	 });
});
	