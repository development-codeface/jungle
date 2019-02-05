var i=1;
var max_room_image      = 3;


$(function() {
	
	$(".room_image_add").click(function(e)
	    {
	    	
	    	if(i < max_room_image)
	    	{
	    		i++;
	    		
		    	var html ='<div class="form-group col-lg-12"><input class="col-lg-11 " type="file" name="room_image[]"><div class="pull-left" style="margin-top: 5px;"><button type="button" class="btn btn-xs btn-danger pull-left room_image_remove" onClick="remove_room_image(this)"  >Remove</button></div></div>';
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
	  url:"get_rooms_hotels/"+ele,
	  type:"POST",
  	  success:function(result){
	 $("#rooms_show").html(result);

  	}});
}  



var y = $('#img_count').val();
var max_fields_image_edit      = 3;

$(function() {

	$(".room_image_edit").click(function(e)
	    {
	    	
	    	if(y < max_fields_image_edit){ 
            y++;
	    	var html ='<div class="form-group col-lg-12"><input class="col-lg-11 " type="file" name="room_image[]"><div class="pull-left" style="margin-top: 5px;"><button type="button" class="btn btn-xs btn-danger pull-left room_image_remove" onClick="remove_room_image_edit(this)"  >Remove</button></div></div>';
		        $(".room_image_row").append(html);
	       }
	    });
	
});

function remove_tax(id)
{
  	 $.ajax({
	  url:baseurl+"profile/delete_tax/"+id,
	  type:"POST"
	  });
}
 
function remove_room_image_edit(ele)
{
	$(ele).parent().parent().remove();
	y--;
}  

$(function() {

	$(".tax_add").click(function(e)
	    {
	    	//var html ='<div class="form-group"><input class="col-lg-3 form-control" name="type[]" id="type[]"><input class="col-lg-3 form-control" name="percent[]" id="percent[]" onkeypress="return onlyNumbers(event)"><div class="col-lg-2 text-right"><button type="button" class="btn btn-xs btn-danger pull-left room_image_remove" onClick="remove_package_day(this)"  >Remove</button></div></div>';
	    	var html = '<div class="form-group col-lg-12  "><div class="col-lg-3">   <input class=" form-control" name="type[]" ></div><div class="col-lg-3"> <input class="col-lg-8 form-control" name="percent[]" onkeypress="return onlyNumbers(event)"></div><div class="col-lg-2 text-right"><button type="button" class="btn btn-xs btn-danger pull-left room_image_remove" onClick="remove_package_day(this)"  >Remove</button></div></div>';
	        $(".tax_block").append(html);
	    });
	
});


function max_allowed()
{
	var max = Number($('#allowed_adult').val()) + Number($('#allowed_kid').val());
	$('#allowed_persons').val(max);
}





//room Number section

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
    
    
    $('#num_rooms').keyup(function()
    {
    	
    	$('.room_number_add').attr('disabled',false);
    	
    });
    
    $(".room_number_add").click(function(e)
	    {
	    	
	    	
    	var pre_room_num = $('#hid_num_rooms').val();
    	var room_number = $('#num_rooms').val();
    	
    	if(pre_room_num!='')
    	{
    			$('.rooms_remove').remove();	
    	}
    	
    
	    	
	    	var r;
	    	var room_number = $('#num_rooms').val();
	    	
	    	for(r=1;r<= room_number;r++)
	    	{
	    		
	    		var html= '<div class="rooms_remove"><div class="col-md-1 col-xs-3 col-sd-2 room-list-block"><input class=" form-control" name="room_num[]" ></div></div>';
	    		$(".room_number").append(html);
	    		
	    	
	    	}
	    	
	    	$('#hid_num_rooms').val(room_number);
	    	$('.room_number_add').attr('disabled',true);
	    	
	    });
	    
	    
function get_Room_number(ele)
{
if(ele) {
	 $.ajax({
	  url: baseurl+"roomnumber/get_rooms_number/"+ele,
	  type:"POST",
  	  success:function(result){
	 $("#rooms_number_show").html(result);
	 
	

  	}});
} else {
$("#rooms_number_show").html('');
}	
}


function room_block(id,status)
{
	
	
	$.ajax({
	  url: baseurl+"roomnumber/room_unblock/"+id+"/"+status,
	  type:"POST",
  	  success:function(result){
  	 
  	  if(result==1)
  	 {
  	 	location.reload();
  	 	// if(status==0)
  	 	// {
  	 	 // $("#room_block_"+id).html('<a style="cursor: pointer;" id="" onclick="room_block('+ id +',1);">Unblock</a>');
  	 	// }
  	 	// else
  	 	// {
  	 		// var link2 = "<a style='cursor: pointer;' href='"+base_url+"roomnumber/room_block/"+id+"/0' onclick='javascript&#58;window.open(this.href, this.target, 'width=400,height=400,screenX=400,screenY=100,resizable,scrollbars');return false;'>Block</a>";
  	 		// $("#room_block_"+id).html(link2);
  	 	// }
  	  }
  	
	 

  	}});
	
}

    
    