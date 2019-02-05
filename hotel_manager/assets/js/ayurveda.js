
function get_package(hotel_id,category)
	{
		
  	 $.ajax({
	  url: base_url+"ayurveda/get_package/"+hotel_id+"/"+category,
	  type:"POST",
  	  success:function(result){
  	  	
  	  
	 $("#package_show").html(result);

  	}});
	
	
	}
	



$(function() {

	$(".package_day_add").click(function(e)
	    {
	    	
	    	
	    	var html ='<div class="form-group col-lg-12"><div class="form-group col-lg-3"><input class=" form-control " type="text" name="package_day[]"></div><div class="form-group col-lg-3"><input class=" form-control " type="text" name="day_title[]"></div> <div class="form-group col-lg-3"><textarea  class=" form-control " rows="3" style="height: 35px;" name="day_description[]" id="day_description"></textarea></div><div class="col-lg-2 text-right"><button type="button" class="btn btn-xs btn-danger pull-left room_image_remove" onClick="remove_package_day(this)"  >Remove</button></div></div>';
	        $(".package_days").append(html);
	      
	    });
	
});

function remove_package_day(ele)
{
	$(ele).parent().parent().remove();
	
}  

