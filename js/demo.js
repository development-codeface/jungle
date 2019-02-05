

$(document).ready(function($){
	
	
 
	//for rooms
    $('select[name=mem_type]').change(function () {

			
        
    $("select[name=mem_type] option:selected").each(function () {
        var value = $(this).val();
        var prev_room =  $('#selected_room').val();
   	 	 $('#selected_room').val(value);
       var select_room =  $( "select[name=mem_type] option:selected" ).text();
	   
	 
		if(select_room=='More')
		{
			 $('#group_room').modal('show'); 
			 var text1=1;
			 $('#reg_mem_type').val('1');
			 $("#reg_mem_type option[text=" + text1 + "]").attr('selected', 'selected');
			 $('#selected_room').val('1');
			 
			
			 
		}
		
       
        if(prev_room < value)
        {
        	
        	if(prev_room == 1)
        	{
        		
        	var mode ='new';     	
        	 $.ajax({
			 type : "post",
			 url : baseurl+"home/rooms/"+value+"/"+mode+"/"+prev_room,	
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
			 url : baseurl+"home/rooms/"+value+"/"+mode+"/"+prev_room,	
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

//for modify search
    $("select[class='mem_qty']").change(function () {
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
			 url : baseurl+"hotels/rooms/"+value+"/"+mode+"/"+prev_room,	
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
   	 	 //alert(prev_room);
		 	var mode ='prev';
        	 $.ajax({
			 type : "post",
			 url : baseurl+"hotels/rooms/"+value+"/"+mode+"/"+prev_room,
			 data : {value : value, mode: mode, prev_room : prev_room},	
			 success:function(res) {
			 	if(res!='')
			 	{
				  $('#new_rooms').append(res);
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
			 url : baseurl+"home/age/"+value+"/"+mode+"/"+count+"/"+prev_child,	
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
			 url : baseurl+"home/age/"+value+"/"+mode+"/"+count+"/"+prev_child,	
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
	


	function childs_modify(count)
	{
		
		
		var value = $('#childrens-'+count).val();
		var prev_child=$('#prev-childs-'+count).val();
		//alert(value);
		
		 $('#prev-childs-'+count).val(value);
		
		if(prev_child < value)
		{
				
				if(prev_child == 0)
		{
				var mode = 'new';
		
		 $.ajax({
			 type : "post",
			 url : baseurl+"hotels/age/"+value+"/"+mode+"/"+count+"/"+prev_child,	
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
			 url : baseurl+"hotels/age/"+value+"/"+mode+"/"+count+"/"+prev_child,	
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