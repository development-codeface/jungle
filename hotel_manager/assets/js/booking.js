function cancelConfirm() {
	var con = confirm('Are you sure ?');
	return con;
}

function aff(id)
{
var li = "<div id=\"wd_id\"><\/div><script type=\"text\/javascript\">document.getElementById(\"wd_id\").innerHTML=\'<iframe src=\"http:\/\/www.bookingwings.com\/hotel_detail\/widget\/15\" style=\"position: fixed !important; border: 0px !important; bottom: 0px !important; right: 0px !important; top:32px !important\"><\/iframe>\';<\/script>";
$('#link').val(li);
}

function img_del(val) {
	var c = confirm("Are you sure? Click OK to continue");
	if (c == true) {
	var h = $("[name='id']").val();
	$.ajax({
		url : baseurl + "profile/img_del/" + h + "/" + val,
		type : "post",
	});
	}
}

function amend_num()
{
	var b_num = $('#b_num').val();
	if(b_num) {
		$.ajax({
			url : baseurl + "booking/amendments_num/" + b_num,
			type : "post",
			success : function(res) {
				$('#page-wrapper').html(res);
				ChangeUrl('Page1', baseurl + "booking/amendments_num/" + b_num);
				$('#b_num').val('').blur().focus().val(b_num);
			}
		});
	} else {
		$.ajax({
			url : baseurl + "booking/amendments/",
			type : "post",
			success : function(res) {
				$('#page-wrapper').html(res);
				ChangeUrl('Page1', baseurl + "booking/amendments/");
				$('#b_num').focus();
			}
		});		
	}
}

function cancel_num()
{
setTimeout(function() {
	var b_num = $('#b_num').val();
	//alert(b_num);
	if(b_num) {
		$.ajax({
			url : baseurl + "booking/cancelled_num/" + b_num,
			type : "post",
			success : function(res) {
				$('#page-wrapper').html(res);
				ChangeUrl('Page1', baseurl + "booking/cancelled_num/" + b_num);
				$('#b_num').val('').blur().focus().val(b_num);
			}
		});
	} else {
		$.ajax({
			url : baseurl + "booking/cancelled/",
			type : "post",
			success : function(res) {
				$('#page-wrapper').html(res);
				ChangeUrl('Page1', baseurl + "booking/cancelled/");
				$('#b_num').focus();
			}
		});		
	}
	}, 1000);
}


function checkin_num()
{
	var b_num = $('#b_num').val();
	//alert(b_num);
	if(b_num) {
		$.ajax({
			url : baseurl + "booking/checkin_list_num/" + b_num,
			type : "post",
			success : function(res) {
				$('#page-wrapper').html(res);
				ChangeUrl('Page1', baseurl + "booking/checkin_list_num/" + b_num);
				$('#b_num').val('').blur().focus().val(b_num);
			}
		});
	} else {
		$.ajax({
			url : baseurl + "booking/checkin_list/",
			type : "post",
			success : function(res) {
				$('#page-wrapper').html(res);
				ChangeUrl('Page1', baseurl + "booking/checkin_list/");
				$('#b_num').focus();
			}
		});		
	}
}

function checkout_num()
{
	var b_num = $('#b_num').val();
	if(b_num) {
		$.ajax({
			url : baseurl + "booking/checkout_list_num/" + b_num,
			type : "post",
			success : function(res) {
				$('#page-wrapper').html(res);
				ChangeUrl('Page1', baseurl + "booking/checkout_list_num/" + b_num);
				$('#b_num').val('').blur().focus().val(b_num);
			}
		});
	} else {
		$.ajax({
			url : baseurl + "booking/checkout_list/",
			type : "post",
			success : function(res) {
				$('#page-wrapper').html(res);
				ChangeUrl('Page1', baseurl + "booking/checkout_list/");
				$('#b_num').focus();
			}
		});		
	}
}

function getArrival() {
	var b_num = $('#b_num').val();
	if(b_num) {
		$.ajax({
			url : baseurl + "booking/arrival_num/" + b_num,
			type : "post",
			success : function(res) {
				$('#page-wrapper').html(res);
				ChangeUrl('Page1', baseurl + "booking/arrival_num/" + b_num);
				$('#b_num').val('').blur().focus().val(b_num);

			}
		});
	} else {
		$.ajax({
			url : baseurl + "booking/arrival/",
			type : "post",
			success : function(res) {
				$('#page-wrapper').html(res);
				ChangeUrl('Page1', baseurl + "booking/arrival/");
				$('#b_num').focus();
			}
		});		
	}
}

function get_booking_list() {
	var cat = $('#category').val();
	var cin = $('#check_in').val();
	var cout = $('#check_out').val();
	var b_num = $('#b_num').val();
	var from_date = $('#sandbox-container-cin input').datepicker('getDate');
	var to_date = $('#sandbox-container-cout input').datepicker('getDate');
	if (!cat) {
		cat = 'both';
	}
	
	if(!b_num) {
		b_num = 'undefined';
	}
	if (cat && cin && cout) {
		if (to_date > from_date) {
			$('#date_error').css("display", "none");
			$.ajax({
				url : baseurl + "booking/get_booking/" + cat + "/" + cin + "/" + cout + "/" + b_num,
				type : "POST",
				success : function(result) {
					//alert(result);
					$('#page-wrapper').html(result);
						if(b_num != 'undefined') {
$('#b_num').val('').blur().focus().val(b_num);
	} else {
$('#b_num').focus();
	}
					ChangeUrl('Page1', baseurl + "booking/get_booking/" + cat + "/" + cin + "/" + cout + "/" + b_num);
				}
			});
		} else {
			$('#date_error').css("display", "block");
		}
	}
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

function room_checkin(book_room_id, booking_id) {
	var c = confirm("Are you sure? Click OK to continue");
	if (c == true) {
		var name = $('#name' + book_room_id).val();
		var email = $('#email_id' + book_room_id).val();
		var phone = $('#phone' + book_room_id).val();

		if (name && email && phone) {
			$.ajax({
				url : baseurl + "booking/checkin/",
				type : "POST",
				data : {
					name : name,
					email : email,
					phone : phone,
					book_room_id : book_room_id,
					booking_id : booking_id
				},
				success : function(result) {

					if (result == 1) {
						alert('Check-in Success');
						$('#checkin' + book_room_id).prop('disabled', true);
					} else {
						alert('Error! Please try again..');
					}
				}
			});

		} else {
			alert('Please enter the details');
		}
	}

}

function room_checkout(book_room_id, booking_id) {
	var c = confirm("Are you sure? Click OK to continue");
	if (c == true) {
		$.ajax({
			url : baseurl + "booking/checkout/",
			type : "POST",
			data : {
				book_room_id : book_room_id,
				booking_id : booking_id
			},
			success : function(result) {
				//alert(result);
				if (result == 1) {
					alert('Check-out Success');
					$('#checkin' + book_room_id).prop('disabled', true);

				} else {
					alert('Error! Please try again..');
				}
			}
		});
	}

}

function advance_amount() {
	var amount = $('#advance').val();
	var booking_number = $('#booking_number').val();
	var voucher = $('#voucher').val();

	$.ajax({
		url : baseurl + "booking/advance/",
		type : "POST",
		data : {
			amount : amount,
			booking_number : booking_number,
			voucher : voucher
		},
		success : function(result) {

			if (result >= 1) {

				alert('Advance amount payed');
				location.reload();

			} else {
				alert('some Problem affected');
			}
		}
	});

}


$('#checkin_user_details').click(function() {
	var name = $('.username').val();
	var email = $('.useremail').val();
	var phone = $('.userphone').val();

	$('.username').val(name);
	$('.useremail').val(email);
	$('.userphone').val(phone);

});

function interchange_room() {

	var check_in = $('#check_in').val();
	var check_out = $('#check_out').val();
	var room = $('#room_type').val();

	$.ajax({

		url : baseurl + 'booking/avail_interchange_rooms',
		type : 'POST',
		data : {
			check_in : check_in,
			check_out : check_out,
			room : room
		},
		success : function(res) {

			$('#rooms').html(res);
		}
	});
}




function booking_date_change()
{
	var check_in = $('#check_in').val();
	var check_out = $('#check_out').val();
	var booking_num = $('#book_num').val();
	var offline_user = $('#offline_user').val();
	var category = $('#cat').val();
	
	$.ajax({

		url : baseurl + 'booking/edit_booking_date',
		type : 'POST',
		data : {
			check_in : check_in,
			check_out : check_out,
			booking_num : booking_num,
			offline_user : offline_user,
			category : category
		},
		success : function(res) {
			//alert(res);
			if(res==1)
			{
				$('#msg_div').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Booking Date changed successfully</div>');
				location.reload();
			}
			else if(res==0)
			{
				$('#msg_div').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>No Rooms Available</div>');
			}
			
		}
	});
	
}

$('.g_update').click(function(){
	var g_name = $('#g_name').val();
	var g_phone = $('#g_phone').val();
	var g_mail = $('#g_mail').val();
	var g_id = $('#g_id').val();
	//alert(g_id); exit;
	if(g_name && g_phone && g_mail && g_id) {
	$.ajax({
		url : baseurl + 'booking/guest_update',
		type : 'POST',
		data : {
			g_name : g_name,
			g_phone : g_phone,
			g_mail : g_mail,
			g_id : g_id
		},
		success : function(res) {
			//alert(res);
			if(res==1) {
				$('#msg_div').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Guest details updated.</div>');
			} else if(res==0) {
				$('#msg_div').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ERROR : Please try again.</div>');
			}
		}
	});
	}
});

function extrakid(id){
	
	var kid = $('#ex_kid_hid'+id).val();
	var x = $('#ex_kid'+id).val();
	if(Number(kid) < x) {
	$('#ex_kid'+id).val(kid);
	}
	
}

function extrabed(id){
	var bed = $('#ex_bed_hid'+id).val();
	var x = $('#ex_bed'+id).val();
	if(Number(bed) < x) {
	$('#ex_bed'+id).val(bed);
	}
	
}
/* $('#ex_bed').keyup(function(){
	var bed = $('#ex_bed_hid').val();
	
	if(Number(bed) < this.value) {
	$('#ex_bed').val(bed);
	}
}); */ 
/* 
$('#ex_kid').keyup(function(){
	var kid = $('#ex_kid_hid').val();
	
	if(Number(kid) < this.value) {
	$('#ex_kid').val(kid);
	}
}); */

function booking(bookid){
	var bed = $('#ex_bed'+bookid).val();
	var kid = $('#ex_kid'+bookid).val();
	var b_id = bookid;
	//alert(bed);
   // alert(kid); 
	if(bed || kid) {
	$.ajax({
		url : baseurl + 'booking/extra_update',
		type : 'POST',
		data : {
			bed : bed,
			kid : kid,
			b_id : b_id
		},
		success : function(res) {
			//alert(res);
		if(res == 1) {
		location.reload();
		}
		}
	});
	}
}
