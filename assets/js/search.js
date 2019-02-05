
 
 
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var checkin = $('#sandbox-container input').datepicker({
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
    $('#sandbox-container4 input')[0].focus();
}).data('datepicker');

var checkout = $('#sandbox-container4 input').datepicker({
	format: 'dd-mm-yyyy', autoclose: true ,
    beforeShowDay: function(date) {
        return date.valueOf() <= checkin.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    checkout.hide();
}).data('datepicker');



function openfileDialog() {
    $("#fileLoader").click();
}




function room_amount(id)
	{
		
		var ck_id=$('#'+id).val();
		var category = $('#category').val();
		var rooms = $('#no_of_rooms_'+id).val();
		var room_price = $('#room_price_'+id).text();
		var each_room_price= $('#each_room_price_'+id).val();
		var total= $("#total").text();
		var total_amout= $("#total_amount").val();
		var room_id =   $("#room_id_"+id).val();	
		var num_room = $("#num_rooms_"+id).val();
		var tot_rooms= $("#selected_rooms").text();
		var room_type_id = $("#room_type_id_"+id).val();
		
		
		if(rooms!='0')
		{
			 $("#room_id_"+id).val(id);	
		}
		else
		{
			 $("#room_id_"+id).val();	
		}
		
		if(total=='')
		{		
	
			
			  var each_price=rooms*room_price;
			  $('#each_room_price_'+id).val(Math.round(each_price));
			  $('#num_rooms_'+id).val(rooms);	
			  if(category=='hotel')
			  {
			  $("#total").html('<span class="fa fa-'+cur+'"></span> '+each_price);	
			  }
			  else
			  {
			  $("#total").html('<span class="fa fa-'+cur+'"></span> '+each_price);	
			  }
			  $("#total_amount").val(Math.round(each_price));	
			  $("#room_checkout").prop('disabled',false);
			  $("#selected_rooms").text(rooms);
			  $('#room_text').html('&nbsp;Room(s)');
			  if(ck_id==id)
				{
					 $('#'+id).remove();
					$('#ck_num_room_'+id).remove();
					 var data = rooms+"|"+id+"|"+room_type_id;
					var html= "<input type='hidden' id='ck_num_room_"+id+"' value='"+data+"' name='ck_data[]'/><input type='hidden' id='"+id+"' value='"+id+"'  disabled=''/>";
					$("#checkout_data").append(html);
				 }
				 else
				 {
					 var data = rooms+"|"+id+"|"+room_type_id;
					var html= "<input type='hidden' id='ck_num_room_"+id+"' value='"+data+"' name='ck_data[]'/><input type='hidden' id='"+id+"' value='"+id+"'  disabled=''/>";
					$("#checkout_data").append(html);
				 }
				
		 }
		 else
		 {
			
			$("#room_checkout").prop('disabled',false);
			
		 	 if(each_room_price=='')
		 	 { 
				  
				  var each_price=rooms*room_price; 
				  $('#each_room_price_'+id).val(Math.round(each_price));
				  $('#num_rooms_'+id).val(rooms);
				  
				  var room_count = rooms;
				  var tot = Number(total) + Number(each_price);
				  var room_count=Number(tot_rooms) + Number(rooms);
				  $("#total_amount").val(tot);
				  
					  if(Number(room_count)>0)
					  {	
						  if(category=='hotel'){
						  $("#total").html('<span class="fa fa-'+cur+'"></span> '+tot);
						  }
						  else
						  {
							 $("#total").html('<span class="fa fa-'+cur+'"></span> '+tot); 
						  }
						   $("#selected_rooms").text(room_count);
						   $('#room_text').html('&nbsp;Room(s)');
						   if(ck_id==id)
						   {
							   $('#'+id).remove();
							   $('#ck_num_room_'+id).remove();
							   var data = rooms+"|"+id+"|"+room_type_id;
							 var html= "<input type='hidden' id='ck_num_room_"+id+"' value='"+data+"' name='ck_data[]'/><input type='hidden' id='"+id+"' value='"+id+"'  disabled=''/>";
							$("#checkout_data").append(html);
						   }
						   else
						   {
							   var data = rooms+"|"+id+"|"+room_type_id;
							 var html= "<input type='hidden' id='ck_num_room_"+id+"' value='"+data+"' name='ck_data[]'/><input type='hidden' id='"+id+"' value='"+id+"'  disabled=''/>";
							$("#checkout_data").append(html);
						   }
							
						  
					  }	
					  else
					  {
							   
						 $("#total").text('');
						 $("#selected_rooms").text('');
						 $('#room_text').text('');
						 
					  }	
			 }
			 else
			 {
				  
					
					var amount = Number(total) - Number(each_room_price);
					var rooms_num = Number(tot_rooms) - Number(num_room);
					
					var each_price=rooms*room_price;
					$('#each_room_price_'+id).val(Math.round(each_price));
					$('#num_rooms_'+id).val(rooms);
					
					var tot = Number(amount) + Number(each_price);
					var room_count=Number(rooms_num) + Number(rooms);
					$("#total_amount").val(tot);	
					
						if(Number(room_count) > 0)
						{
							
							  if(category=='hotel'){
							  $("#total").html('<span class="fa fa-'+cur+'"></span> '+tot);
							  }
							  else
							  {
								 $("#total").html('<span class="fa fa-'+cur+'"></span> '+tot); 
							  }
							$("#selected_rooms").text(room_count);
							$('#room_text').html('&nbsp;Room(s)');
							
							
							   if(ck_id==id)
							   {
								   
								   $('#'+id).remove();
								   $('#ck_num_room_'+id).remove();
								    var data = rooms+"|"+id+"|"+room_type_id;
								   var html= "<input type='hidden' id='ck_num_room_"+id+"' value='"+data+"' name='ck_data[]'/><input type='hidden' id='"+id+"' value='"+id+"' disabled=''/>";
									$("#checkout_data").append(html);
								   
							   }
							   else
							   {
								   var data = rooms+"|"+id+"|"+room_type_id;
								 var html= "<input type='hidden' id='ck_num_room_"+id+"' value='"+data+"' name='ck_data[]'/><input type='hidden' id='"+id+"' value='"+id+"'  disabled=''/>";
								$("#checkout_data").append(html);
							   }
						}
						else
						{
							  
							$("#total").text('');
							$("#selected_rooms").text('');
							$('#room_text').text('');
						}	
					 
					 
					if(tot=='0')
					{
					$("#room_checkout").prop('disabled',true);
					}
					else
					{
					$("#room_checkout").prop('disabled',false);
					}
			 }
			 	 
		 }
		 
		 
		 if(rooms=='0')
		 {
				 $('#'+id).remove();
				 $('#ck_num_room_'+id).remove();
		   }
			
	}
	
	



$(document).ready(function($){
	
	//for rooms
    $('select[name=mem_type]').change(function () {

		
        
     $("select[name=mem_type] option:selected").each(function () {
		 
		 
        var value = $(this).val();
         var prev_room =  $('#selected_room_type').val();
   	 	 $('#selected_room_type').val(value);
       var select_room =  $( "select[name=mem_type] option:selected" ).text();
	  var search_room = 	 $('#search_rooms').val();
	 
		if(select_room=='More')
		{
			 $('#group_room').modal('show'); 
			 var text1=1;
			 $('#reg_mem_type').val('1');
			 $("#reg_mem_type option[text=" + text1 + "]").attr('selected', 'selected');
			 $('#selected_room').val('1');
			 
		} 
		
         // $('#selected_room_type').val(value);
        if(prev_room < value)
        {
        	
        	if(prev_room == 1)
        	{
        		
        	var mode ='new';   
        	 $.ajax({
			 type : "post",
			 url : baseurl+"reservation_checkout/select_option/"+value+"/"+mode+"/"+prev_room+"/"+search_room,	
			 data : {value : value, mode: mode},	
			 success:function(res) {
				 
			 	if(res!='')
			 	{
				  $('#new_rooms').html(res);
				
			    }
			    
		 	}
		 	
		 });
		 }
		 else
		 {
		 	var mode ='prev';     	
        	 $.ajax({
			 type : "post",
			 url : baseurl+"reservation_checkout/select_option/"+value+"/"+mode+"/"+prev_room+"/"+search_room,	
			 data : {value : value, mode: mode, prev_room : prev_room},	
			 success:function(res) {
			 	if(res!='')
			 	{
				  $("#new_rooms").append(res);
					
			    }
			    
		 	}
		 	
		 });
		 
		 }
		  
		 
		 }
		 
		 if(prev_room > value)
		 {
		 	for(var i=prev_room; i>value; i--)
		 	{
		 		$('#room-'+i).remove();
		 	}
		 	
		 }
		  
	   
       
    }); 
}); 

});

$(document).ready(function(){
	/* $('#search_hotels').prop('disabled',true);
	$("#display-search").hide();
	$(".date_alert").css("display", "none");
 */

	//main index search button
		$(".hotel_search_engine").click(function(){ //when the search link is clicked...
		
			
		
		var StartDate= document.getElementById('valid_from').value;
		 var EndDate= document.getElementById('valid_to').value;
			 
		if(StartDate!='' && EndDate!='')
					{
						var pack =document.getElementById('package_eng_id').value;
						
							if(pack!='')
							{
								$(".error_pacakge").hide(); 
								return true; 
								
							}
							else
							{
								 $(".error_pacakge").show(); 
								  return false; 
							}
								 
						
					}
					else
					{
						 $(".date_alert").show(); 
						 return false; 
					} 
		

		
	});
	
	});

