function aff(id)
{
var li = "<div id=\"wd_id\"><\/div>\r\n<script type=\"text\/javascript\">\r\ndocument.getElementById(\"wd_id\").innerHTML=\'<iframe src=\"http://www.bookingwings.com\/hotel_detail\/widget\/"+id+"\" style=\"position: fixed !important; border: 0px !important; bottom: 0px !important; right: 0px !important; top:32px !important\"><\/iframe>\';\r\n<\/script>";
$('#link').val(li);
}

$(function() {
    $( "#tabs" ).tabs();
	 getsubcat();
	 getcountry();
    $(".hotel_image_add").click(function(e)
    {
    	var html ='<div class="form-group col-lg-12 hotel_img_add_cus"><label class="col-lg-3">Image</label><input class="col-lg-5 form-control " type="file" name="hotel_image[]"><div class="col-lg-2 text-right"><button type="button" class="btn btn-xs btn-danger pull-left hotel_image_remove" onClick="remove_hotel_image(this)"  >Remove</button></div></div>';
        $(".hotel_image_row").append(html);
    });
    $(".room_combination_add").click(function(e)
    {
    	var html = $('.room_combination_row .row').first().html();
		//alert(html);
		var html1 = html.replace('<button type="button" class="btn btn-success room_combination_add">Add</button>','<button type="button" class="btn btn-success " onClick="room_combination_remove(this)">Remove</button>');
		html1 = '<div class="form-group col-lg-12">'+html1+'</div>';
        $(".room_combination_row").append(html1);
    });
	$(".catagory").change(function() {
	  getsubcat();
	});
	$(".country").change(function() {
	  getcountry();
	});
	
	
	$(".states").change(function() {
	  getdistrict();
	});
	
});
  function getcountry()
  {
	$.ajax( {
		  type: "POST",
		  url: base_url+"hotel/select_state/"+$('#state_hidden').val(),
		  data: {cat: $('.country').val()  }
		})
	  .done(function(data) {
		$(".state").html(data);
	  })
	  .fail(function() {
		//alert( "error" );
	  });  
  }
  
  
   function getdistrict()
  {
  	
  	
	$.ajax( {
		  type: "POST",
		  url: base_url+"hotel/select_district/"+$('.states').val(),
		  data: {cat: $('.states').val()  }
		})
	  .done(function(data) {
	  	
		$(".district").html(data);
	  })
	  .fail(function() {
		//alert( "error" );
	  });  
  }
  
  
  function getsubcat()
  {
	$.ajax( {
		  type: "POST",
		  url: base_url+"hotel/select_sub_cat/"+$('#sub_catagory_hidden').val(),
		  data: {cat: $('.catagory').val()  }
		})
	  .done(function(data) {
		$(".subcatagory").html(data);
	  })
	  .fail(function() {
		//alert( "error" );
	  });  
  }
function remove_hotel_image(ele)
{
	$(ele).parent().parent().remove();
}
function room_combination_remove(ele)
{
	$(ele).parent().parent().remove();
}



//validation for add/edit staff form

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#site_users").validate({
            	
            rules: {
                name: {
                	required: true
				},
				
				username: {
					required: true
				},
				
                new_password: {
					required: true
                },
				
                confirm_password: {
					required: true
                },
             },
             messages: {
             	name: "Please enter a name",
             	username: "Please enter username",
             	new_password: "Please enter a password",
             	confirm_password: "Please confirm the password",
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


function user_exist()
{
	var user = $('#username').val();
	$.ajax({
		method : "POST",
		url : baseurl+"settings/user_exist/"+user,
		success : function(data){
			if(data > 0) {
			alert('This username already exists');
			$('#username').val('').focus();
			}
		}
	});
}


//validation for change password form

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#change_pass").validate({
            	
            rules: {
				old_password: {
					required: true
				},
				
                new_password: {
					required: true
                },
				
                confirm_password: {
					required: true
                },
              },
             messages: {
             	old_password: "Please enter current password",
             	new_password: "Please enter new password",
             	confirm_password: "Please confirm new password"
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



(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#list-search").validate({
            	
            rules: {
				keyword: {
					required: function(element) {
        return $("#select_type").val() == 'hotel';
      }
				},
				g_keyword: {
					required: function(element) {
        return $("#select_type").val() == 'group';
      }
				}
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







function select_search_type()
{
	var select_type=$('#select_type').val();
	if(select_type=='hotel')
	{
	$('.group_select').css('display','none');
	$('.hotel_select').css('display','block');
	$('.select_group').val('0');
	}
	
	else
	{
		$('.hotel_select').css('display','none');
		$('.group_select').css('display','block');
		$('.select_hotel').val('0');
		
	}
}
