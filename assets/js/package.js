	function set_value(id)
	{
		$.ajax({
			 type : "post",
			 url : baseurl+"hotel_detail/set_currency/"+id,
			 success:function(data) {
			 location.reload();
			 }
		 });
	}

function onlyNumbers(event) {
        var charCode = (event.which) ? event.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
        return true;
    }
    
    
    function onlyNumbersDots(event) {
        var charCode = (event.which) ? event.which : event.keyCode
       if (charCode > 31 && (charCode < 46 || charCode > 57))
            return false;
 
        return true;
    }
    

//date picker 
// var date = new Date();

// $('#sandbox-container input').datepicker({ format: 'yyyy-mm-dd', startDate : date });
// $('#sandbox-container2 input').datepicker({	format: 'yyyy-mm-dd', startDate : date});



//var date = new Date();

//$('#sandbox-container input').datepicker({ format: 'dd-mm-yyyy', startDate : date, autoclose : true });

//date.setDate(date.getDate()+1); 
//$('#valid_to').datepicker({	format: 'dd-mm-yyyy', startDate : date, autoclose : true}).datepicker("setDate",date);


//$('#sandbox-container4 input').datepicker({ format: 'dd-mm-yyyy', startDate : date, autoclose : true }).datepicker("setDate",date);


//$('#sandbox-container4 input').datepicker({ format: 'dd-mm-yyyy', startDate : date, autoclose : true }).datepicker("setDate","date");



 
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var checkin = $('#sandbox-container input').datepicker({
	format: 'dd-mm-yyyy',autoclose : true,
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
	format: 'dd-mm-yyyy',autoclose : true,
    beforeShowDay: function(date) {
        return date.valueOf() <= checkin.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    checkout.hide();
}).data('datepicker');




function openfileDialog() {
    $("#fileLoader").click();
}


function package_refine()
{
	var search_text = $('#holiday_search').val();
	var values = [];
	var dest = [];
	
	$("input:checkbox[class=holiday_destination_search]:checked").each(function () {
	dest.push($(this).val());
   });
   
   $("input:checkbox[class=holiday_night_search]:checked").each(function () {
	values.push($(this).val());
   });
   
  
    var values_length=values.length;
	 var c=0;
	var d="";
	
	var dest_length=dest.length;
	 var e=0;
	var f="";
   
   for (c = 0; c < values_length; c++) 
   {
   	   d +="&nights[]="+values[c];
   }
   for (e = 0; e < dest_length; e++) 
   {
   	   f +="&dest[]="+dest[e];
   }
   
   
   $.ajax({
		type: "get",
		url: baseurl+"packages/refine_search/",
		data:{nights : values, search_text: search_text, dest :dest},
		success:function(res)
		{
			$('#search_refine_result').html(res);
		}
	});
	
	ChangeUrl('Page1', baseurl + "holiday/search_list?hidden-search="+search_text+d+f);
	
	//window.location = baseurl + 'holiday/search_list?hidden-search='+search_text+d+f;
	
}

$(document).ready(function(){

$('#holiday_search').on('keypress keyup',function()
{
	$('#holiday_button').prop('disabled',false);
	if($('#holiday_search').val()=='')
	{
			$('#holiday_button').prop('disabled',true);
	}
});



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






function holiday_package()
{
	var package_id=$('#package_id').val();
	var hotel_star=[];
	var vehicle_name=[];
	var  vehicle=0;
	var tot;
	var veh='';
	var hot;
	var persons = $('#no_of_person').val();
	var checkin = $('#valid_from').val();
	var checkout = $('#valid_to').val();
	
	
	$('input:radio.hotel:checked').each(function () {
     hotel_star.push($(this).val());
    });
	
	for(var j=0;j<hotel_star.length;j++)
	{
		hot = hotel_star[j].split("|");
		 hotel= Number(hot[0]);
		 var hotel_status=hot[1];
	}
	
	
	$('input:checkbox.vehicles:checked').each(function () {
	 vehicle_name.push($(this).val());
	});
	
	for(var i=0;i<vehicle_name.length;i++)
	{
		tot = vehicle_name[i].split("|");
		 vehicle+= Number(tot[0]);
		  veh+='&veh[]='+tot[3];
	}
	
	
	var total = persons * hotel ; 
	var grand_total= Number(total)+Number(vehicle);
	
	
	$('.each_person').text(hotel);
	$('.person').text(persons);
	$('#total').text(total);
	$('#grand_total').text(grand_total);
	
	ChangeUrl('Page1', baseurl + "packages/checkout?package="+package_id+"&person="+persons+"&checkin="+checkin+"&checkout="+checkout+"&hotel="+hotel_status+veh);
	
	var pageURL = $(location).attr("href");
	var url = pageURL.split('?')
	
	var button ="<p class='col-md-4 login_deals_chk page_url'><a href='payment?"+url[1]+"'>Continue</a></p>";
	$('#payment_url').html(button);
}



function holiday_package_vehicle(id)
{
	
	var package_id=$('#package_id').val();
	var veh_id = $('#'+id).val();
	var vehicle_name=[];
	var hotel_star=[];
	var  vehicle=0;
	var tot;
	var veh='';
	var hot;
	
	var hotel=[];
	var persons = $('#no_of_person').val();
	var checkin = $('#valid_from').val();
	var checkout = $('#valid_to').val();
	
	$('input:radio.hotel:checked').each(function () {
     hotel_star.push($(this).val());
    });
	
	for(var j=0;j<hotel_star.length;j++)
	{
		hot = hotel_star[j].split("|");
		 hotel= Number(hot[0]);
		var  hotel_status=hot[1];
	}
	
	$('input:checkbox.vehicles:checked').each(function () {
     vehicle_name.push($(this).val());
	});
	
	if(vehicle_name.length==0)
	{
		  $('#veh'+id).remove();
	}
	 var x='';
	for(var i=0;i<vehicle_name.length;i++)
	{
		tot = vehicle_name[i].split("|");
		 vehicle+= Number(tot[0]);
		 
		 if(veh_id==id)
		 {
			 
			  $('#veh'+id).remove();
		    //var html= "<div id='veh"+id+"'><input type='text' name='veh_id' id='"+id+"' value='"+id+"' /><div class='col-md-3'>"+tot[1]+"</div><div class='col-md-2'></div><div class='col-md-2'>1</div><div class='col-md-2'></div><div class='col-md-1'></div><div class='col-md-2'><i class='fa fa-rupee'></i> "+tot[0]+"</div></div>";
		 }
		 else
		 {
			
		 var html= "<div id='veh"+id+"'><input type='hidden' name='veh_id' id='"+id+"' value='"+id+"' /><div class='col-md-3'>"+tot[1]+"</div><div class='col-md-2'>&nbsp;</div><div class='col-md-2'>"+tot[2]+"</div><div class='col-md-2'>&nbsp;</div><div class='col-md-1'>&nbsp;</div><div class='col-md-2'><i class='fa fa-rupee'></i> "+tot[0]+"</div></div>";
		
		 }
		
		 x+= html;
		 veh+='&veh[]='+tot[3];
	}
	$('#selected_vehicle').html(x);
	
	if(vehicle)
	{
	$('#avail_vehicles').css('display','block');
	}
	else
	{
	$('#avail_vehicles').css('display','none');
	}
	
	var total = persons * hotel ; 
	var grand_total= Number(total)+Number(vehicle);
	$('#vehicle_total').val(vehicle);
	$('#grand_total').text(grand_total);
	
	
	ChangeUrl('Page1', baseurl + "packages/checkout?package="+package_id+"&person="+persons+"&checkin="+checkin+"&checkout="+checkout+"&hotel="+hotel_status+veh);
	
	var pageURL = $(location).attr("href");
	var url = pageURL.split('?')
	
	var button ="<p class='col-md-4 login_deals_chk page_url'><a href='payment?"+url[1]+"'>Continue</a></p>";
	$('#payment_url').html(button);
}