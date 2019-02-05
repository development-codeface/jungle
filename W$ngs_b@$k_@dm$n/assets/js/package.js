var x = 1;
var max_fields_image      = 5;

$(function() {

	$(".package_image_add").click(function(e)
	    {
	    	if(x < max_fields_image){ 
            x++;
            
	    	var html ='<div class="form-group col-lg-12"><label class="col-lg-2">Image</label><input class="col-lg-6 form-control " type="file" name="package_image[]"><div class="col-lg-2 text-right"><button type="button" class="btn btn-xs btn-danger pull-left room_image_remove" onClick="remove_package_image(this)"  >Remove</button></div></div>';
	        $(".room_image_row").append(html);
	       }
	    });
	
});

 
function remove_package_image(ele)
{
	$(ele).parent().parent().remove();
	x--;
	
}  




$(function() {

	$(".package_vehicle_add").click(function(e)
	    {
	    	
	    	var html ='<div class="form-group col-lg-12 remove_p_tax_block_cus "><div class="col-md-3"><input class="col-lg-12 form-control" type="text" name="vehicle[]"></div><div class="col-md-3"><input class="col-lg-12 form-control " type="text" name="capacity[]" onkeypress="return onlyNumbers(event)"></div><div class="col-md-3"><input class="col-lg-12 form-control " type="text" name="vehicle_charge[]" onkeypress="return onlyNumbersDots(event)"></div><div class="col-lg-2 text-right"><button type="button" class="btn btn-xs btn-danger pull-left room_image_remove" onClick="remove_package_vehicle(this)"  >Remove</button></div></div>';
	        $(".package_vehicles").append(html);
	       
	    });
	
});

function remove_package_vehicle(ele)
{
	$(ele).parent().parent().remove();
	
}  




$(function() {

	$(".package_day_add").click(function(e)
	    {
	    	
	    	
	    	var html ='<div class="form-group col-lg-12 remove_p_tax_block_cus"><div class="col-md-3"><input class="col-lg-12 form-control " type="text" name="package_day[]"></div><div class="col-md-3"><input class="col-lg-12 form-control " type="text" name="day_title[]"></div><div class="col-md-3"><textarea  class="col-lg-12 form-control " rows="3" style="height: 35px;" name="day_description[]" id="day_description"></textarea></div><div class="col-lg-2 text-right"><button type="button" class="btn btn-xs btn-danger pull-left room_image_remove" onClick="remove_package_day(this)"  >Remove</button></div></div>';
	        $(".package_days").append(html);
	      
	    });
	
});

function remove_package_day(ele)
{
	$(ele).parent().parent().remove();
	
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


var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var from3 = $('#sandbox-container-frm3 input').datepicker({
	format: 'dd-mm-yyyy',autoclose: true , startDate : nowTemp,
    //beforeShowDay: function(date) {
    //    return date.valueOf() < now.valueOf() ? 'disabled' : '';
    //}
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > to3.viewDate.valueOf()){
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        to3.setDate(newDate);		
    }
    else {
        to3.setDate();
    }
    
    from3.hide();
    $('#sandbox-container-to3 input')[0].focus();
}).data('datepicker');


var to3 = $('#sandbox-container-to3 input').datepicker({
	format: 'dd-mm-yyyy',autoclose: true , startDate : nowTemp,
    beforeShowDay: function(date) {
        return date.valueOf() <= from3.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    to3.hide();
}).data('datepicker');


var from1 = $('#sandbox-container-frm1 input').datepicker({
	format: 'yyyy-mm-dd',autoclose: true ,
    //beforeShowDay: function(date) {
    //    return date.valueOf() < now.valueOf() ? 'disabled' : '';
    //}
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > to1.viewDate.valueOf()){
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        to1.setDate(newDate);		
    }
    else {
        to1.setDate();
    }
    
    from1.hide();
    $('#sandbox-container-to1 input')[0].focus();
}).data('datepicker');

var to1 = $('#sandbox-container-to1 input').datepicker({
	format: 'yyyy-mm-dd',autoclose: true ,
    beforeShowDay: function(date) {
        return date.valueOf() <= from1.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    to1.hide();
}).data('datepicker');


var from2 = $('#sandbox-container-frm input').datepicker({
	format: 'yyyy-mm-dd',autoclose: true ,
    //beforeShowDay: function(date) {
    //    return date.valueOf() < now.valueOf() ? 'disabled' : '';
    //}
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > to2.viewDate.valueOf()){
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        to2.setDate(newDate);		
    }
    else {
        to2.setDate();
    }
    
    from2.hide();
    $('#sandbox-container-to input')[0].focus();
}).data('datepicker');

var to2 = $('#sandbox-container-to input').datepicker({
	format: 'yyyy-mm-dd',autoclose: true ,
    beforeShowDay: function(date) {
        return date.valueOf() <= from2.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    to2.hide();
}).data('datepicker');






var y = $('#img_count').val();
var max_fields_image_edit      = 5;

$(function() {

	$(".package_image_edit").click(function(e)
	    {
	    	

	    	if(y < max_fields_image_edit){ 
            y++;
	    	var html ='<div class="form-group row"><label class="col-lg-2">Image</label><input class="col-lg-6 form-control " type="file" name="package_image[]"><div class="col-lg-2 text-right"><button type="button" class="btn btn-xs btn-danger pull-left room_image_remove" onClick="remove_package_image_edit(this)"  >Remove</button></div></div>';
	        $(".room_image_row").append(html);
	       }
	    });
	
});

 
function remove_package_image_edit(ele)
{
	$(ele).parent().parent().remove();
	y--;
	
}  

$('#sandbox-container3 input').datepicker({
	format: 'dd-mm-yyyy',
    autoclose: true
});


function openfileDialog() {
    $("#fileLoader").click();
}