$(document).ready(function($){

	//for rooms
    $('select[name=mem_type]').change(function () {

    $("select[name=mem_type] option:selected").each(function () {
        var value = $(this).val();
        var prev_room =  $('#selected_room').val();
   	 	$('#selected_room').val(value);
   	 	
        if(prev_room < value)
        {
        	if(prev_room == 1)
        	{
        		
        	var mode ='new';     	
        	 $.ajax({
			 type : "post",
			 url : baseurl+"hotel_detail/rooms/"+value+"/"+mode+"/"+prev_room,	
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
			 url : baseurl+"hotel_detail/rooms/"+value+"/"+mode+"/"+prev_room,	
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


	function childs(count)
	{
		
		
		var value = $('#childrens-'+count).val();
		var prev_child=$('#prev-childs-'+count).val();
		

		 $('#prev-childs-'+count).val(value);
		
		if(prev_child < value)
		{
				
		if(prev_child == 0)
		{
				var mode = 'new';
		
		 $.ajax({
			 type : "post",
			 url : baseurl+"hotel_detail/age/"+value+"/"+mode+"/"+count+"/"+prev_child,	
			 data : {value : value, count : count, mode : mode},	
			 success:function(res) {
			 	if(res!='')
			 	{
	
			 		$("#age-"+count).append(res);			  			  				
			    }	    
		 	} 	
		 });
		}
		 else
		{
			var mode ='prev';
			$.ajax({
			 type : "post",
			 url : baseurl+"hotel_detail/age/"+value+"/"+mode+"/"+count+"/"+prev_child,	
			  data : {value : value, count : count, mode : mode, prev_child :prev_child},	
			  success:function(res) {
			 	if(res!='')
			 	{
	 		
			 		$("#age-"+count).append(res);
			  
			  
				
			     }
		    
		 	 }
	 	
		 });
		}
	 
		}
		
		 if(prev_child > value)
		  {
		 	 for(var i=prev_child; i>value; i--)
		 	 {
		 	 if(value == 0)
		 		 {
		 			 $('#age_label-'+count).remove();
		
		 		}
		 		 $('#child-'+count+i).remove();
		 	 }
		 	
		
		  }
		
		 
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
			  $('#each_room_price_'+id).val(each_price);
			  $('#num_rooms_'+id).val(rooms);	
			  if(category=='hotel')
			  {
			  $("#total").html('<span class="fa fa-'+cur+'"></span> '+each_price.toFixed(2));	
			  }
			  else
			  {
			  $("#total").html('<span class="fa fa-'+cur+'"></span> '+each_price.toFixed(2));	
			  }
			  $("#total_amount").val(each_price);	
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
				  $('#each_room_price_'+id).val(each_price);
				  $('#num_rooms_'+id).val(rooms);
				  
				  var room_count = rooms;
				  var tot = Number(total) + Number(each_price);
				  var room_count=Number(tot_rooms) + Number(rooms);
				  $("#total_amount").val(tot);
				  
					  if(Number(room_count)>0)
					  {	
						  if(category=='hotel'){
						  $("#total").html('<span class="fa fa-'+cur+'"></span> '+tot.toFixed(2));
						  }
						  else
						  {
							 $("#total").html('<span class="fa fa-'+cur+'"></span> '+tot.toFixed(2)); 
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
					$('#each_room_price_'+id).val(each_price);
					$('#num_rooms_'+id).val(rooms);
					
					var tot = Number(amount) + Number(each_price);
					var room_count=Number(rooms_num) + Number(rooms);
					$("#total_amount").val(tot);	
					
						if(Number(room_count) > 0)
						{
							
							  if(category=='hotel'){
							  $("#total").html('<span class="fa fa-'+cur+'"></span> '+tot.toFixed(2));
							  }
							  else
							  {
								 $("#total").html('<span class="fa fa-'+cur+'"></span> '+tot.toFixed(2)); 
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
	
	
	
	function checkout_submit()
	{
		var room_basic_price = [];
		var each_price = [];
		var no_of_rooms = [];
		var room_id =[];
		var hotel_id = $('#hotel_id').val();
		var total_amount = $('#total_amount').val();
		var category = $('#category').val();
		var check_in = $('#check_in').val();
		var check_out = $('#check_out').val();
		
		var url_room_basic_price=[];
		var url_room_id=[];
		var url_no_of_rooms=[];
		
		
		$('input.room_basic_price').each(function() {
			room_basic_price.push($(this).val());
			url_room_basic_price.push($(this).val()+'|');
		});
		
		$('.no_of_rooms option:selected').each(function() {
			no_of_rooms.push($(this).val());
			url_no_of_rooms.push($(this).val()+'|');
		});
		
		$('input.room_id').each(function() {
			room_id.push($(this).val());
			url_room_id.push($(this).val()+'|');
		});
		
		
		
		$('#page').val('checkout');
		
		var url = 'checkout?category='+category+'&check_in='+check_in+'&check_out='+check_out+'&total_amount='+total_amount+'&room_id='+url_room_id+'&room_basic_price[]='+url_room_basic_price+'&no_of_rooms[]='+url_no_of_rooms+'&hotel_id='+hotel_id;
		
		//window.location = baseurl + url;
		
		 $.ajax({
			 type : "post",
			 url : baseurl+"checkout/ajax_chekout",	
			 data : {room_basic_price:room_basic_price,no_of_rooms:no_of_rooms,room_id :room_id,hotel_id:hotel_id,total_amount:total_amount,category:category,check_in:check_in,check_out:check_out},	
			 success:function(res) {
			 	if(res!='')
			 	{
					alert(res);
			 		//$('#checkout').html(res);			  			  				
			    }	    
		 	} 	
		 });
		 
    
   // ChangeUrl('Page1', baseurl+'checkout?category='+category+'&check_in='+check_in+'&check_out='+check_out+'&total_amount='+total_amount+'&room_id='+url_room_id+'&room_basic_price[]='+url_room_basic_price+'&no_of_rooms[]='+url_no_of_rooms+'&hotel_id='+hotel_id);
		
	}
	
	
	
	
function detail_search()
{
	dataString = $("#det_search").serialize();
	//alert($('select[name="adults[]"] option:selected').val());
	
	
	//alert(dataString);
	  /*  $.each(x, function(i, field){
            $("#results").append(field.name + ":" + field.value + " ");
        }); */
		
	var search_text= $('#hidden-detail-search').val();
	var check_in= $('#valid_from').val();
	var check_out= $('#valid_to').val();
	var check_out= $('#valid_to').val();
	var check_out= $('#valid_to').val();
	
	/* $('input[name^="pages_title"]').each(function() {
    alert($(this).val());
}); */

	//alert(check_out);
	$.ajax({
		type: "post",
		url: baseurl+"Detail_search/hotel",
		//data:{email : email,message:message },
		data : dataString,
		success:function(res)
		{
			//alert(res);
			if(res==0)
			{
				//window.location='';
			}	
			else
			{
				$('.rooms_list').html(res);
				
			}	
		}
	});
					
	
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

