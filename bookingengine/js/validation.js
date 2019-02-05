
//contact mail validation

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#contact_mail").validate({
                rules: {
                    name: {
					required: true,
				},
				
				mail: {
					required: true,
					email: true
				},
				
				phone: {
					required: true,
					number: true
				},
				
				busi_name: {
					required: true,
				},
				// term: {
					// required: true,
				// },
                },
                messages: {
                    name: {
					required: "Please enter your name",
				},
				
				mail: {
					required: "Please enter your email",
					email: "Please enter a valid email address"
				},
				
				 phone: {
					required: "Please enter your phonenumber",
					number: "Please enter numbers"
				},
				
				busi_name: {
					required: "Please enter your business name",
				},
				// term: {
					// required: "Please accept our terms and conditions to proceed",
				// },
				
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





