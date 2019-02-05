	

	


$('#login_data').click(function(data)
{
	$('.page').val('main');
});

$('#login_checkout').click(function(data)
{
	$('.page').val('checkout');
});

$('#login_holiday').click(function(data)
{
	$('.page').val('holiday');
}); 

$('#login_checkout_ajax').click(function(data)
{
	
	$('.page').val('checkout');
});

$('#login_reservation').click(function(data)
{
	
	$('.page').val('reserve');
});

$('#log_reserve').click(function(data)
{
	
	$('.page').val('log_reserve');
});

$('#register_form').submit(function(event) {
	dataString = $("#register_form").serialize();
	var page = $('.page').val();
	var pageURL = $(location).attr("href");
	var url = pageURL.split('?')
	
	$.ajax({
		type : "POST",
		url : baseurl + "registration/register",
		data : dataString,
		async : false,
		success : function(data) {
			if (data == 'error') {
				$('#sign_in_error').html('<div class="alert alert-danger">Sorry, please try again</div>');
			} else {
				if(page=='checkout')
				{
				window.location = baseurl + 'checkout/payment?'+url[1];
				}
				if(page=='holiday')
				{
				window.location = baseurl + 'packages/payment?'+url[1];
				}
				else if(page=='reserve')
				{
				window.location = baseurl + 'reservation_checkout/payment?'+url[1];
				} 
				else if(page=='log_reserve')
				{
				window.location = pageURL ;
				}
				else
				{
					window.location = baseurl + 'user';
				}
			}
		}
	});
	event.preventDefault();
});

function group_booking()
{
	dataString = $("#gp_booking").serialize();
	var email = $('#email').val();
	//var message = $('#message').val();
	
	var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	if (filter.test(email)) {
		
		
					$.ajax({
						type: "post",
						url: baseurl+"login/group_booking",
						//data:{email : email,message:message },
						data : dataString,
						success:function(res)
						{
							//alert(res);
							$('#email').val('');
							$('#message').val('');
							$('#name').val('');
							$('#check_in').val('');
							$('#check_out').val('');
							$('#no_room').val('');
							$('#sing_room').val('');
							$('#dob_room').val('');
							$('#ext_bed').val('');
							$('#bookig_sent').html('<div class="alert alert-success">Contact you soon</div>'); 
							
						}
					});
					
	}
	else
	{
		$('#bookig_sent').html('<div class="alert alert-danger">Please enter valid email</div>');
	}
	
}

function forgot_pass() {
	
	
	var email = $('#forgot_email').val();

	var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	if (filter.test(email)) {
		$.ajax({
			type : "post",
			url : baseurl + "registration/exists_usernames/" + email,
			success : function(res) {
				if (res) {
					$.ajax({
						type : "post",
						url : baseurl + "registration/forgot_pass/"+ email,
						success : function(res) {
							
							//alert(res);
							$('#email_err').hide();
							$('#email_sent').show().delay(8000).fadeOut();
							$('#forgot_email').val('');
							$('#email_sent').html('<div class="alert alert-success">Details sent to ' + email + '</div>');
							
						},
					});
				} else {
					$('#email_err').show().delay(8000).fadeOut();
					$('#forgot_email').val('');
					$('#email_err').html('<span class="err">No match found.</span>');
					$('#email_sent').hide();
				}
			},
		});
	}
}



function agent_forgot_pass() {
	
	var email = $('#agent_forgot_email').val();

	var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	if (filter.test(email)) {
		$.ajax({
			type : "post",
			url : baseurl + "travel_agent/exists_email/" + email,
			success : function(res) {
				if (res==1) {
					$.ajax({
						type : "post",
						url : baseurl + "travel_agent/forgot_pass/"+ email,
						success : function(res) {

							$('#agent_email_err').hide();
							$('#agent_email_sent').show().delay(8000).fadeOut();
							$('#agent_forgot_email').val('');
							$('#agent_email_sent').html('<div class="alert alert-success">Details sent to ' + email + '</div>');
						},
					});
				} else {
					$('#agent_email_err').show().delay(8000).fadeOut();
					$('#agent_forgot_email').val('');
					$('#agent_email_err').html('<span class="err">No match found.</span>');
					$('#agent_email_sent').hide();
				}
			},
		});
	}
}



function email_exists() {

	var email = $('#register_email').val();

	var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	if (filter.test(email)) {

		$.ajax({
			type : "post",
			url : baseurl + "registration/exists_usernames/" + email,
			success : function(res) {

				if (res != '') {

					$('#email_exist').html('<span class="err">' + res + '</span>');

				} else {
					$('#email_exist').html('');
				}

			}
		});

	} else {
		$('#email_exist').html('');
		return false;
	}

}





function login() {

	var email = $('#login_email').val();
	var password = $('#login_password').val();
	var page = $('.page').val();
	var pageURL = $(location).attr("href");
	var url = pageURL.split('?');
	//alert(url);
	//return;
	$.ajax({
		type : "post",
		url : baseurl + "login/login_check",
		data : {
			email : email,
			password : password
		},
		success : function(res) {
			if (res == 0) {
				$('#login_error').html('<span class="err">username/password incorrect</span>');

			} else {
				
				if(page=='checkout')
				{
				window.location = baseurl + 'checkout/payment?'+url[1];
				}
				else if(page=='holiday')
				{
				window.location = baseurl + 'packages/payment?'+url[1];
				} 
				else if(page=='reserve')
				{
				window.location = baseurl + 'reservation_checkout/payment?'+url[1];
				} 
				else if(page=='log_reserve')
				{
				window.location = pageURL ;
				}
				else
				{
					window.location = baseurl + 'user';
				}
			}

		}
	});

}





function agent_login() {

	var email = $('#agent_login_email').val();
	var password = $('#agent_login_password').val();

	$.ajax({
		type : "post",
		url : baseurl + "travel_agent/login",
		data : {
			email : email,
			password : password
		},
		success : function(res) {
			if (res) {
				window.location = baseurl + 'travel_agent/profile';
			} else {
				$('#agent_login_error').html('<span class="err">Incorrect username/password. Please try again.</span>').show().delay(8000).fadeOut();
			}
		}
	});

}



function check_password() {

	var password = $('#current_password').val();

	$.ajax({
		type : "post",
		url : baseurl + "user/current_password",
		data : {
			password : password
		},
		success : function(res) {
			if (res == 0) {
				$('#error').html('<span class="err">Current password incorrect</span>').show().delay(4000).fadeOut();
				$('#current_password').val('').focus();
			} else {
				$('#error').html('');
			}

		}
	});

}





function check_password_agent() {

	var password = $('#current_password').val();
	$.ajax({
		type : "post",
		url : baseurl + "travel_agent/current_password",
		data : {
			password : password
		},
		success : function(res) {
			if (res == 0) {
				$('#error').html('<span class="err">Current password incorrect</span>').show().delay(4000).fadeOut();
				$('#current_password').val('').focus();

			} else {
				$('#error').html('');
			}

		}
	});

}




function news_letter()
{
	var news_email = $("#news_email").val();
	
	var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	
	if (filter.test(news_email)) {
	$.ajax({
		type : "post",
		url : baseurl + "registration/newsletter/"+news_email,
		success : function(res)
		{
			if(res == 1)
			{
				$("#news_email").val('');
				$('#news_ltr').text('You have already subscribed').show().delay(8000).fadeOut();
			}
			else
			{
				$("#news_email").val('');
				$('#news_ltr').text('Thank you for subscribing our newsletter').show().delay(8000).fadeOut();
			}
		},
	});
	}
}


//Review submit

$('#comments_submit').click(function(event) {
	dataString = $("#review_form").serialize();
	$.ajax({
		type : "POST",
		url : baseurl + "user/addReview",
		data : dataString,
		success : function(data) {
			if(data) 
			{
				$("#alert").addClass("alert alert-danger");
				$("#alert").html('ERROR!.. Please try again');
			}
			else 
			{
				 $("#alert").addClass("alert alert-success");
				 $("#alert").html('Thank you for the review!');
				document.getElementById("review_form").reset();
				location.reload();
			}
		}
	});
});

//Review edit

$('#comments_edit').click(function(event) {
	dataString = $("#review_form").serialize();
	$.ajax({
		type : "POST",
		url : baseurl + "user/editReview",
		data : dataString,
		success : function(data) {
			// if(data) 
			// {
				// $("#alert").addClass("alert alert-danger");
				// $("#alert").html('ERROR!.. Please try again');
			// }
			// else 
			// {
				 // $("#alert").addClass("alert alert-success");
				 // $("#alert").html('Thank you for the review!');
				// document.getElementById("review_form").reset();
			// }
			window.location = baseurl+'user/review';
		}
	});
});




$( ".sign_in" ).click(function() {
	{
		var fb = '';
		var go = '';
			var pageURL = $(location).attr("href");
	 //alert(url);
		if(!fb)
		{
		$.ajax({
			type: "POST",
			url: baseurl + "home/login_fb",
			data : {
				current : pageURL
			},
			success: function(data)
			{
				//alert(data);
				$("a.btn-facebook").attr("href", data);
			}
		});
		}
		
		if(!go)
		{
		$.ajax({
			type: "POST",
			url: baseurl + "home/login_google",
			data : {
				current2 : pageURL
			},
			success: function(data)
			{
				//alert(data);
				$("a.btn-google").attr("href", data);
			}
		});
		}
	}
});

function cancel_booking(){
	
	dataString = $("#cancel_form").serialize();
	//var messsage = $("#message").val();
	//var book_no = $("#bookno").val();
		
		
					$.ajax({
						type: "post",
						url: baseurl+"user/cancel_booking",
						//data:{message:message, book_no:book_no },
						data : dataString,
						success:function(res)
						{
							//alert(res);
							$('#message').val('');
							//$('#bookno').val('');
							$('#cancel_sent').html('<div class="alert alert-success">Contact you soon</div>'); 
							
						}
					});
					
	
}


function amend_booking() {
	dataString = $("#amend_form").serialize();

	$.ajax({
		type : "post",
		url : baseurl + "user/amend_booking",
		data : dataString,
		success : function() {
			$('#amend_sent').html('<div class="alert alert-success">We have received your request, will contact you soon</div>');
			$('#amend_form').hide();
		}
	});

}