var i=1;

$(function() {

	$(".room_image_add").click(function(e)
	    {
	    	
	    	if(i<3)
	    	{
	    		i++;
		    	var html ='<div class="form-group row"><label class="col-lg-3">Image</label><input class="col-lg-5  form-control" type="file" name="room_image[]"><div class="col-lg-2 text-right"><button type="button" class="btn btn-success room_image_remove" onClick="remove_room_image(this)"  >Remove</button></div></div>';
		        $(".room_image_row").append(html);
	    	}

	    });
	
});
 
function remove_room_image(ele)
{
	$(ele).parent().parent().remove();
	i--;
}  

function get_Room(ele)
{
  	 $.ajax({
	  url: base_url+"roomcomp/get_rooms_hotels/"+ele,
	  type:"POST",
  	  success:function(result){
  	  	
	 $("#rooms_show").html(result);

  	}});
}  


$(function() {

	$(".tax_add").click(function(e)
	    {
	    	//var html ='<div class="form-group"><input class="col-lg-3 form-control" name="type[]" id="type[]"><input class="col-lg-3 form-control" name="percent[]" id="percent[]" onkeypress="return onlyNumbers(event)"><div class="col-lg-2 text-right"><button type="button" class="btn btn-xs btn-danger pull-left room_image_remove" onClick="remove_package_day(this)"  >Remove</button></div></div>';
	    	var html = '<div class="col-md-12 tax_add_new_block"><div class="form-group col-lg-3"><input class="col-lg-12 form-control" name="type[]" ></div><div class="form-group col-lg-3"><input class="col-lg-12 form-control" name="percent[]" onkeypress="return onlyNumbers(event)"></div><div class="col-lg-6 text-right"><button type="button" class="btn btn-xs btn-danger pull-left room_image_remove" onClick="remove_package_day(this)"  >Remove</button></div></div>';
	        $(".tax_block").append(html);
	    });
	
});

function remove_tax(id)
{
  	 $.ajax({
	  url:baseurl+"hotel/delete_tax/"+id,
	  type:"POST"
	  });
}


