$(function() {

		var date = new Date();
	var i = 0;
	 
	 getcountry();
    $(".add_more").click(function(e)
    {
	i++;
	var html = '<div><div class="form-group col-lg-6"><label class="col-lg-12">Valid From</label><span id="sandbox-containera'+i+'"><input class="col-lg-12 form-control " name="validity_from[]" id="validity_from"></span></div>   <div class="form-group col-lg-6"><label class="col-lg-12">Valid Upto</label><span id="sandbox-containerb'+i+'"><input class="col-lg-12 form-control " name="validity[]" id="validity"></span></div><div class="form-group col-lg-12"><button type="button" class="btn btn-xs btn-danger" onclick="remove_hotel_image(this)">Remove</button></div><div>';
	$(".add_date").append(html);

	var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var checkin = $('#sandbox-containera'+i+' input').datepicker({
	format: 'dd-mm-yyyy',autoclose: true ,
    beforeShowDay: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > checkout.viewDate.valueOf()){
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout.setDate(newDate);		
    }
    else {
        checkout.setDate();
    }
    
    checkin.hide();
    $('#sandbox-containerb'+i+' input')[0].focus();
}).data('datepicker');

var checkout = $('#sandbox-containerb'+i+' input').datepicker({
	format: 'dd-mm-yyyy', autoclose: true ,
    beforeShowDay: function(date) {
        return date.valueOf() <= checkin.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    checkout.hide();
}).data('datepicker');
    });	 
	
	
	
	
    $(".hotel_image_add").click(function(e)
    {

    	var html ='<div class="form-group col-lg-12"><input class="col-lg-11  " type="file" name="hotel_image[]"><div class="pull-left" style="margin-top: 5px;"><button type="button" class="btn btn-xs btn-danger pull-left hotel_image_remove" onClick="remove_hotel_image(this)"  >Remove</button></div></div>';
        $(".hotel_image_row").append(html);
    });
    $(".room_combination_add").click(function(e)
    {
    	var html = $('.room_combination_row .row').first().html();
		//alert(html);
		var html1 = html.replace('<button type="button" class="btn btn-success room_combination_add">Add</button>','<button type="button" class="btn btn-success " onClick="room_combination_remove(this)">Remove</button>');
		html1 = '<div class="form-group row">'+html1+'</div>';
        $(".room_combination_row").append(html1);
    });
	$(".catagory").change(function() {
	  //getsubcat();
	});
	$("#country").change(function() {
	  getcountry();
	});
	
	$(".states").change(function() {
	  getdistrict();
	});
	
	$('#source').change(function(){
	if(this.value == 'agency') {
$('#agency').show();
$('#agency').attr("required", true);
	} else {
$('#agency').val('').hide();
$('#agency').attr("required", false);
	}
});

$('#from,#to').change(function(){
	var from_date = $('#sandbox-container-cin input').datepicker('getDate');
	var to_date =$('#sandbox-container-cout input').datepicker('getDate');
	if((from_date)&&(to_date)) {
		if(to_date > from_date) {
			$('#date_error').css("display", "none");
			$('#submit').attr("disabled", false);
		} else {
			$('#date_error').css("display", "block");
			$('#submit').attr("disabled", true);
		}
	}
});
	
	
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
	
	
});
  function getcountry()
  {
	$.ajax( {
		  type: "POST",
		  url: base_url+"profile/select_state/"+$('#state_hidden').val(),
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
		  url: base_url+"profile/select_district/"+$('.states').val(),
		  data: {cat: $('.states').val()  }
		})
	  .done(function(data) {
	  	
		$(".district").html(data);
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



//date picker
/*var date = new Date();

$('#sandbox-container input').datepicker({
    format: 'dd-mm-yyyy',
	startDate : date,
	autoclose: true,
	
});

$('#sandbox-container4 input').datepicker({
	format: 'dd-mm-yyyy',
	startDate : date,
    autoclose: true
});*/



var date = new Date();
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var checkin = $('#sandbox-container input').datepicker({
	format: 'dd-mm-yyyy', orientation: "top auto", autoclose: true ,
    beforeShowDay: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > checkout.viewDate.valueOf()){
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout.setDate(newDate);		
    }
    else {
        checkout.setDate();
    }
    
    checkin.hide();
    $('#sandbox-container4 input')[0].focus();
}).data('datepicker');

var checkout = $('#sandbox-container4 input').datepicker({
	format: 'dd-mm-yyyy', orientation: "top auto", autoclose: true ,
    beforeShowDay: function(date) {
        return date.valueOf() <= checkin.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    checkout.hide();
}).data('datepicker');


$('#sandbox-container5 input').datepicker({
	format: "yyyy-mm", 
    minViewMode: 1,
    autoclose: true,
	orientation: "top auto",
	startDate: date
});

	
$('#sandbox-container2 input').datepicker({
	format: "yyyy-mm", 
    minViewMode: 1,
    autoclose: true,
	orientation: "top auto",
	
});

$('#sandbox-container3 input').datepicker({
	format: 'dd-mm-yyyy',
    autoclose: true
});

function noshow_month()
{
	var d = $('#month').val();
	$.ajax({
		type: "POST",
		url: base_url+"report/noshow/"+d,
		success: function(data) {
		$('#page-wrap').html(data);
		$('#month').val(d);
		ChangeUrl('Page1', baseurl + "report/noshow/"+d);
	  }
	});
}


function room_settings(id)
{
	$.ajax({
		type: "POST",
		url: base_url+"booking/checkout/"+id,
		success: function(data) {
		//$("#monthly").html(data);
	  }
	});
}	


function room_settings(id)
{
	var date = new Date();
	$.ajax({
		type: "POST",
		url: base_url+"booking/checkout/"+id,
		success: function(data) {
			$("#myModal").html(data);
			$('#sandbox-container input').datepicker({ format: 'yyyy-mm-dd', startDate: date });
	  }
	});
}	



function get_month()
{
	var m = $('#month').val()+'-';
	$.ajax({
		type: "POST",
		url: base_url+"report/day_names/"+m,
		success: function(data) {
		$("#monthly").html(data);
	  }
	});
}


function get_month1()
{
	var m = $('#month').val()+'-';
	$.ajax({
		type: "POST",
		url: base_url+"report/day_names1/"+m,
		success: function(data) {
		$("#monthly").html(data);
	  }
	});
}


function get_checkin()
{
	var m = $('#month').val()+'-';
	$.ajax({
		type: "POST",
		url: base_url+"report/checkin/"+m,
		success: function(data) {
		$("#monthly").html(data);
	  }
	});
}

function get_checkout()
{
	var m = $('#month').val()+'-';
	$.ajax({
		type: "POST",
		url: base_url+"report/checkout/"+m,
		success: function(data) {
		$("#monthly").html(data);
	  }
	});
}

function get_dates()
{
	var frm = $('#from').val();
	var to = $('#to').val();
	var agn = $('#agency').val();
	var from_date = $('#sandbox-container-cin input').datepicker('getDate');
	var to_date =$('#sandbox-container-cout input').datepicker('getDate');
	if((frm)&&(to)&&(agn)) {
	if(to_date > from_date)
	{
		$('#date_error').css("display", "none");
	$.ajax({
		type: "POST",
		url: base_url+"report/agency/"+frm+"/"+to+"/"+agn,
		success: function(data) {
		$('#page-wrap').html(data);
			ChangeUrl('Page1', baseurl + "report/agency/"+frm+"/"+to+"/"+agn);
		}
	});
	} else { $('#date_error').css("display", "block"); } }
}


function get_dates_direct()
{
	var frm = $('#from').val();
	var to = $('#to').val();
	var from_date = $('#sandbox-container-cin input').datepicker('getDate');
	var to_date =$('#sandbox-container-cout input').datepicker('getDate');
	if(frm&&to) {
	if(to_date > from_date)
	{
	$('#date_error').css("display", "none");
	$.ajax({
		type: "POST",
		url: base_url+"report/direct/"+frm+"/"+to,
		success: function(data) {
		$('#page-wrap').html(data);
			ChangeUrl('Page1', baseurl + "report/direct/"+frm+"/"+to);
		}
	});
	} else { $('#date_error').css("display", "block"); } }
}


function get_dates_online()
{
	var frm = $('#from').val();
	var to = $('#to').val();
	var from_date = $('#sandbox-container-cin input').datepicker('getDate');
	var to_date =$('#sandbox-container-cout input').datepicker('getDate');
	if(frm&&to) {
	if(to_date > from_date)
	{
	$('#date_error').css("display", "none");
	$.ajax({
		type: "POST",
		url: base_url+"report/online/"+frm+"/"+to,
		success: function(data) {
		$('#page-wrap').html(data);
			ChangeUrl('Page1', baseurl + "report/online/"+frm+"/"+to);
		}
	});
	} else { $('#date_error').css("display", "block"); } }
}


function coupon_search()
{
	var key = $('#search').val();
	if(key)
	{
	$.ajax({
		type: "POST",
		url: base_url+"coupon/search/"+key,
		success: function(data) {
		$("#result").html(data);
	  }
	});
	}
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
		success : function(data)
		{
			if(data > 0)
			{
			alert('This username already exists');
			$('#username').val('').focus(); }
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


	//room combination package
	 $("#pack_room_submit").click(function() {
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
	
		
		 if($.trim($('#validity_from').val())=='')
		 {
			 error_var = 1;
			 alert("Enter valid from");
			$('#validity_from').focus();
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
	 
	 
	
	
	
	 $("#edit_room_submit").click(function() {
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
	 
	
	
function noshow_month()
{
	var d = $('#month').val();
	$.ajax({
		type: "POST",
		url: base_url+"report/noshow/"+d,
		success: function(data) {
		$('#page-wrap').html(data);
		$('#month').val(d);
		ChangeUrl('Page1', baseurl + "report/noshow/"+d);
	  }
	});
}