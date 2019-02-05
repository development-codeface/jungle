
function get_package(hotel_id,category)
	{
		
  	 $.ajax({
	  url: base_url+"ayurveda/get_package/"+hotel_id+"/"+category,
	  type:"POST",
  	  success:function(result){
  	  	
  	  
	 $("#package_show").html(result);

  	}});
	
	
	}