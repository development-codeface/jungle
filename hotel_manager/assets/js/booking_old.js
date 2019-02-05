function cancelConfirm() {
var con = confirm('Are you sure ?');
return con;
}



function get_booking_list() {
	var cat = $('#category').val();
	var cin = $('#check_in').val();
	var cout = $('#check_out').val();
	var from_date = $('#sandbox-container-cin input').datepicker('getDate');
	var to_date =$('#sandbox-container-cout input').datepicker('getDate');
	if(!cat) { cat = 'both'; }
	if(cat && cin && cout) {
	if(to_date > from_date)
	{
	$('#date_error').css("display", "none");
	$.ajax({
		url : baseurl + "booking/get_booking/"+cat+"/"+cin+"/"+cout,
		type : "POST",
		success : function(result) {
			//alert(result);
			$('#page-wrapper').html(result);
			ChangeUrl('Page1', baseurl + "booking/get_booking/"+cat+"/"+cin+"/"+cout);
		}
	});
	} else { $('#date_error').css("display", "block"); }}
}



function ChangeUrl(title, url) {
	if ( typeof (history.pushState) != "undefined") {
		var obj = {
			Title : title,
			Url : url
		};
		history.pushState(obj, obj.Title, obj.Url);
	} else {
		alert("Browser does not support HTML5.");
	}
}


function checkin_date() {
	var date = $('#check_in').val();
	$.ajax({
		url : baseurl + "booking/checkin_list_date/" + date,
		type : "POST",
		success : function(result) {
			$('#page-wrapper').html(result);
			ChangeUrl('Page1', baseurl + 'booking/checkin_list_date/' + date);
		}
	});
}


function room_checkin(book_room_id,booking_id)
{
	var c = confirm("Are you sure? Click OK to continue");
	if(c == true) {
		var name=$('#name'+book_room_id).val();
		var email=$('#email_id'+book_room_id).val();
		var phone=$('#phone'+book_room_id).val();
		
		if(name && email && phone)
		{
			$.ajax({
			url : baseurl + "booking/checkin/",
			type : "POST",
			data :{ name : name, email : email, phone : phone, book_room_id:book_room_id, booking_id : booking_id},
			success : function(result) {
				if(result==1)
				{
					alert('Check-in Success');
					$('#checkin'+book_room_id).prop('disabled',true);
				}
				else
				{
					alert('Error! Please try again..');
				}			
			}
			});
	
	}
	else
	{
		alert('Please enter the details');
	}
	}
	

}

function room_checkout(book_room_id,booking_id)
{
	var c = confirm("Are you sure? Click OK to continue");
	if(c == true) {		
			$.ajax({
			url : baseurl + "booking/checkout/",
			type : "POST",
			data :{ book_room_id:book_room_id, booking_id : booking_id},
			success : function(result) {
				
				if(result==1)
				{
					alert('Check-out Success');
					$('#checkin'+book_room_id).prop('disabled',true);
					
				}
				else
				{
					alert('Error! Please try again..');
				}
			}
			});
	}

}



function advance_amount()
{
	var amount=$('#advance').val();
	var booking_number=$('#booking_number').val();
	var voucher = $('#voucher').val();
	
	
	$.ajax({
			url : baseurl + "booking/advance/",
			type : "POST",
			data :{ amount:amount, booking_number : booking_number, voucher : voucher},
			success : function(result) {
				
				
				if(result>=1)
				{
					
					alert('Advance amount payed');
					location.reload();
					
				}
				else
				{
					alert('some Problem affected');
				}			
			}
			});
			
	
}


$('#checkin_user_details').click(function()
{
	var name = $('.username').val();
	var email = $('.useremail').val();
	var phone = $('.userphone').val();
	
	$('.username').val(name);
	$('.useremail').val(email);
	$('.userphone').val(phone);
	
	
});

function interchange_room()
{
	
	var check_in = $('#check_in').val();
	var check_out = $('#check_out').val();
	var room = $('#room_type').val();
	
	$.ajax({
		
		url: baseurl + 'booking/avail_interchange_rooms',
		type:'POST',
		data : {check_in : check_in, check_out:check_out, room: room},
		success: function(res)
		{
			
			$('#rooms').html(res);
		}
		
	});
}


