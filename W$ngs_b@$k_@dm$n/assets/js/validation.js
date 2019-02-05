//news letter validation 

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#travels").validate({
                rules: {
                	 name: {
					required: true,
					
				},
				
				 address: {
					required: true,
					
				},
				
                    email: {
					required: true,
					email: true
				},
				 contact: {
					required: true,
					
				},
				 password: {
					required: true,
					minlength: 5
					
				},
				
                },
                messages: {
                	name: "Please enter travels name",
                	address: "Please enter address",
                    email: "Please enter an email address",
                    contact: "Please enter contact number",
                    
                    password: {
					required: "Please provide password",
					minlength: "Your password must be at least 5 characters long"
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






//validation for groups

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#groups").validate({
                rules: {
                	 name: {
					required: true,
					
				},
				
                    username: {
					required: true,
				},
				 
				 password: {
					required: true,
					minlength: 5
					
				},
				
                },
                messages: {
                	name: "Please enter group name",
                	
                    username: "Please enter username ",
                   
                    password: {
					required: "Please provide password",
					minlength: "Your password must be at least 5 characters long"
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



