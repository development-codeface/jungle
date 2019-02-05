$('#property').change(function()
{
	var hotel_id = this.value;
	

	if(hotel_id)
	{
	 $.ajax({
		  url: baseurl + "transaction/get_rooms_amount/"+hotel_id,
		  type:"POST",
	  	  success:function(result){
	  	  	
	  	  	//alert(result);
		 $("#room_price").html(result);
	
	  	}});
	  }
	  else
	  {
	  	var result='';
	  	 $("#room_price").html(result);
	  }
	
});


function list_commision()
{
	var hotel_id = $('#hotels').val();


	if(hotel_id)
	{
		 $.ajax({
			  url: baseurl + "transaction/ajax_commsion_list/"+hotel_id,
			  type:"POST",
		  	  success:function(res){
		  	  	
		  	  	var result = res.split("|");
			 $("#commision_list").html(result[0]);
			 $('#page').html(result[1]);
			ChangeUrl('Page1', baseurl+'transaction/list_commision/'+hotel_id); 
		
		  	}});
	  }
	  else
	  {
		     var result='';
		  	 $("#room_price").html(result);
	  }

}



function ChangeUrl(title, url) {
		    if (typeof (history.pushState) != "undefined") {
		        var obj = { Title: title, Url: url };
		        history.pushState(obj, obj.Title, obj.Url);
		    } else {
		        alert("Browser does not support HTML5.");
		    }
		
		}


var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var from = $('#sandbox-container-tr1 input').datepicker({
	format: 'dd-mm-yyyy',autoclose: true ,
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > to.viewDate.valueOf()){
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        to.setDate(newDate);		
    }
    else {
        to.setDate();
    }
    
    from.hide();
    $('#sandbox-container-tr2 input')[0].focus();
}).data('datepicker');

var to = $('#sandbox-container-tr2 input').datepicker({
	format: 'dd-mm-yyyy',autoclose: true ,
    beforeShowDay: function(date) {
        return date.valueOf() <= from.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    to.hide();
}).data('datepicker');


function get_commision()
{
	var hotel=$('#hotelid').val();
	var from=$('#from_date').val();
	var to=$('#to_date').val();
	
	if(hotel&&from&&to)
	{
	$.ajax({
		type: "POST",
		url: base_url+"transaction/get_commision/"+from+"/"+to+"/"+hotel,
		success: function(data) {
		$('#page-wrap').html(data);

var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var from = $('#sandbox-container-tr1 input').datepicker({
	format: 'dd-mm-yyyy',autoclose: true ,
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > to.viewDate.valueOf()){
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        to.setDate(newDate);		
    }
    else {
        to.setDate();
    }
    
    from.hide();
    $('#sandbox-container-tr2 input')[0].focus();
}).data('datepicker');

var to = $('#sandbox-container-tr2 input').datepicker({
	format: 'dd-mm-yyyy',autoclose: true ,
    beforeShowDay: function(date) {
        return date.valueOf() <= from.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    to.hide();
}).data('datepicker');
		}
	});
	}
	 
	 // if(month && hotel)
	 // {
	// $.ajax({
		// type: "POST",
		// url: base_url+"transaction/get_commision/"+m+"/"+hotel,
		// success: function(data) {
		// $("#commision").html(data);
	  // }
	// });
	// }
}
