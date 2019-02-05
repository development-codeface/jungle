
function cancel_book(booking_number) {

	$("#bookno").val(booking_number);

}

function amend_book(booking_number) {

	$("#bookamend_no").val(booking_number);

}





//registration validation

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#register_form").validate({
                rules: {
                    register_password: {
					required: true,
					minlength: 5
				},
				
				register_email: {
					required: true,
					email: true
				},
				
				confirm_password: {
					required: true,
					equalTo: "#register_password"
				},
                },
                messages: {
                    register_password: {
					required: "Please provide password",
					minlength: "Your password must be at least 5 characters long"
				},
				
				register_email: "Please enter a valid email address",
				
				 confirm_password: {
					required: "Please provide confirm password",
					equalTo: "Please enter the same password as above"
				},
                },
                
                
                submitHandler: function(form) {
                    //form.submit();
                    register();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);





//login validation

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#login_form").validate({
                rules: {
                    login_password: {
					required: true,
					minlength: 5
				},
				
				login_email: {
					required: true,
					email: true
				},
				
				
                },
                messages: {
                    login_password: {
					required: "Please provide password",
					minlength: "Your password must be at least 5 characters long"
				},
				
				login_email: "Please enter a valid email address",
				
				 
                },
                
                
                submitHandler: function(form) {
                    //form.submit();
                    login();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);




//agent login validation

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#agent_login_form").validate({
                rules: {
                    agent_login_password: {
					required: true,
					minlength: 5
				},
				
				agent_login_email: {
					required: true,
					email: true
				},
				
				
                },
                messages: {
                    agent_login_password: {
					required: "Please provide password",
					minlength: "Your password must be at least 5 characters long"
				},
				
				agent_login_email: "Please enter a valid email address",
				
				 
                },
                
                
                submitHandler: function(form) {
                    //form.submit();
                    agent_login();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);




//forgot validation 

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#forgot_form").validate({
                rules: {
                    forgot_email: {
					required: true,
					email: true
				},
				
                },
                messages: {
                    forgot_email: "Please enter a email address",
                },
                
                submitHandler: function(form) {
                	forgot_pass();
                     //form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);




//agent forgot validation 

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#agent_forgot_form").validate({
                rules: {
                    agent_forgot_email: {
					required: true,
					email: true
				},
				
                },
                messages: {
                    agent_forgot_email: "Please enter a email address",
                },
                
                submitHandler: function(form) {
                	agent_forgot_pass();
                     //form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);




//registration validation

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#change_password_form").validate({
                rules: {
                    current_password: {
					required: true,
					minlength: 5
				},
				
				new_password: {
					required: true,
					minlength: 5
				},
				
				confirm_password: {
					required: true,
					equalTo: "#new_password"
				},
                },
                messages: {
                    current_password: {
					required: "Please provide password",
					minlength: "Your password must be at least 5 characters long"
				},
				
				new_password: {
					required: "Please provide password",
					minlength: "Your password must be at least 5 characters long"
				},
				
				 confirm_password: {
					required: "Please provide confirm password",
					equalTo: "Please enter the same password as above"
				},
                },
                
                
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);






//news letter validation 

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#newsletter").validate({
                rules: {
                    news_email: {
					required: true,
					email: true
				},
				
                },
                messages: {
                    news_email: "Please enter an email address",
                },
                
                submitHandler: function(form) {
                     news_letter();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);







//payment validation 

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#payment_form").validate({
                rules: {
					    first_name: {
					required: true,
				},
				
				phone: {
					required: true,
					
				},
				confirm: {
					required: true,
					
				},
				
                    email: {
					required: true,
					email: true
				},
				
                },
                messages: {
					first_name: "Please enter your first name",
					phone: "Please enter your contact number",
					confirm: "Please accept the terms & conditions",
                    email: "Please enter an email address",
                },
                
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);









//property validation 

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#property_form").validate({
                rules: {
                    
				 hotel_name: {
					required: true,					
				},
				address: {
					required: true,					
				},
				state_name: {
					required: true,					
				},
				place: {
					required: true,					
				},
				phone: {
					required: true,					
				},
				mailid: {
					required: true,
					email: true					
				},
				star_rating: {
					required: true,					
				},
				state: {
					required: true,					
				},
				sub_category: {
					required: true,					
				},
				logo_img: {
					required: true,					
				},
                },
                messages: {
                     mailid: "Please enter an email address",
					 hotel_name:"Please enter hotel name",
					 address:"Please enter hotel address",
					 state_name: "Select district name",
					 place : "Please enter place",
					 phone : "Please enter phone number",
					 star_rating: "Select star rating",
					 state: "Select state name",
					 sub_category: "Select category",
					  logo_img: "Select logo",
                },
                
                submitHandler: function(form) {
                     form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);


 //group booking validation
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#gp_booking").validate({
                rules: {
                    name: {
					required: true
				},
				
				check_in: {
					required: true
				},
				check_out: {
					required: true
				},
				no_room: {
					required: true
				},
				sing_room: {
					required: true
				},
				dob_room: {
					required: true
				},
				ext_bed: {
					required: true
				},
				
				message: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
                },
                messages: {
                    name: {
					required: "Please enter your name"
				},
				
				check_in: {
					required: "Please enter check in date"
				}, 
				check_out: {
					required: "Please enter check out date"
				},
				no_room: {
					required: "Please enter no. of rooms required"
				},
				sing_room: {
					required: "Please enter no. of single rooms"
				},
				dob_room: {
					required: "Please enter no. of double rooms"
				},
				ext_bed: {
					required: "Please enter no. of extra bed required"
				},
				
				message: {
					required: "Please enter your message"
				},
				email: {
					required: "Please enter your email id",
					email: "Please provide a valid email aid"
				},
				
				 
                },
                
                
                submitHandler: function(form) {
                    //form.submit();
                    group_booking();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);







//amend booking validation
(function($, W, D) {
	var JQUERY4U = {};

	JQUERY4U.UTIL = {
		setupFormValidation : function() {
			//form validation rules
			$("#amend_form").validate({
				rules : {
					amend_message : {
						required : true
					}
				},
				submitHandler : function(form) {
					amend_booking();
				}
			});
		}
	}

	//when the dom has loaded setup form validation rules
	$(D).ready(function($) {
		JQUERY4U.UTIL.setupFormValidation();
	});

})(jQuery, window, document);

//cancel booking validation
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#cancel_form").validate({
                rules: {
				message: {
					required: true
				},
                },
                messages: {
                    
				message: {
					required: "Please enter your message"
				},
				
                },
                
                
                submitHandler: function(form) {
                    //form.submit();
                    cancel_booking();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);




