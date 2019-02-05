//date picker
var date = new Date();
$('#agency_voucher').css("display", "none");
$('#agency_commision').css("display", "none");

//date picker
var date = new Date();
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var checkin1 = $('#sandbox-container-cin input').datepicker({
	format: 'dd-mm-yyyy', orientation: "top auto", autoclose: true ,
    beforeShowDay: function(date) {
        //return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > checkout1.viewDate.valueOf()){
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout1.setDate(newDate);		
    }
    else {
        checkout1.setDate();
    }
    
    checkin1.hide();
    $('#sandbox-container-cout input')[0].focus();
}).data('datepicker');

var checkout1 = $('#sandbox-container-cout input').datepicker({
	format: 'dd-mm-yyyy', orientation: "top auto", autoclose: true ,
    beforeShowDay: function(date) {
        return date.valueOf() <= checkin1.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    checkout1.hide();
}).data('datepicker');




function getRoomsBed(id)
{
	
	var days = $('#total_days').val();
	if(days==0)
	 { days =1;}
	var tot = $('#total').val();
	var total_room_amount=$('#total_hid').val();
	var extra_amount=$('#extra_amount'+id).val();
	 var cat = $('#type').val();	
	  var tax=$('#hotel_tax').val();
	 var commision=$('#commision').val();
	 var food_plan =$('#total_food').val();
	 
	
	
	if(tot)
	{
		
	var bed = $('#extra_bed'+id).val();
	var rate = $('#extra_bed_rate'+id).val();
	var bed_count = $('#bed_count_'+id).text();
	var room_count = $('.room_count_'+id).text();
	
	if(Number(bed)>Number(bed_count))
	{
		var bed = bed_count;
		$('#extra_bed'+id).val(bed);
		
		alert('You have to select maximum '+ bed +' extra bed(s)');
	}
	
	var total_bed_rate= days * bed * rate;
	var old_amount= tot - extra_amount;
	var rate_tot =Number(old_amount) + Number(days * bed * rate);
	
	
		if(cat==0)
		{
			if(food_plan)
			{
				var final_room_amount = Number(rate_tot) + Number(food_plan);
			}
			else
			{
				var final_room_amount = rate_tot;
			}
			
			var tax_amount = ((final_room_amount)*tax)/100;
			var total_tax_price=tax_amount+(final_room_amount);
			var discount = $('#discount').val();
			if(discount)
			{
				var total_tax =total_tax_price - discount;
			}
			else
			{
				var total_tax =total_tax_price;
			}
		
			
		}
		else
		{
			var lastChar = commision.substr(commision.length - 1);
			if(lastChar=='%')
			{
				var result = commision.slice(0, -1);
				var commision_amount = ((rate_tot)*result)/100;
				
			}
			else
			{
				var commision_amount = commision;
			}
			var total_commision=(rate_tot) - commision_amount;
			var tax_amount = ((total_commision)*tax)/100;
			var total_tax=tax_amount+(total_commision);
			
		}
		
		
	$('#total').val(Math.round(rate_tot));
	$('#extra_amount'+id).val(total_bed_rate);
	$('#tax').val(tax_amount);
	$('#agency').val(commision_amount);
	$('#net_amount').val(Math.round(total_tax));
	

	
	
	}
}


function getChilds(id)
{
	
	var days = $('#total_days').val();
	if(days==0)
	 { days =1;}
	var tot = $('#total').val();
	var total_room_amount=$('#total_hid').val();
	var extra_child_amount=$('#extra_child_amount'+id).val();
	var cat = $('#type').val();	
	 var tax=$('#hotel_tax').val();
	 var commision=$('#commision').val();
	 var food_plan =$('#total_food').val();
	
	if(tot)
	{
		
	var childs = $('#childs'+id).val();
	var rate = $('#extra_child_rate'+id).val();
	var child_count = $('#child_count_'+id).text();
	var room_count = $('.room_count_'+id).text();
	
	
	
	if(Number(childs)>Number(child_count))
	{
		var childs = child_count;
		$('#childs'+id).val(childs);
		
		alert('You have to allowed maximum '+ childs +' children(s)');
	}
	
	var total_child_rate= days * childs * rate;
	
	
	
	var old_amount= tot - extra_child_amount;
	var rate_tot =Number(old_amount) + Number(days * childs * rate);
	
	
	if(cat==0)
		{
			
			if(food_plan)
			{
				var final_room_amount = Number(rate_tot) + Number(food_plan);
			}
			else
			{
				var final_room_amount = rate_tot;
			}
			var tax_amount = ((final_room_amount)*tax)/100;
			var total_tax_price=tax_amount+(final_room_amount);
			var discount = $('#discount').val();
			if(discount)
			{
				var total_tax =total_tax_price - discount;
			}
			else
			{
				var total_tax =total_tax_price;
			}
		
			
		}
		else
		{
			var lastChar = commision.substr(commision.length - 1);
			if(lastChar=='%')
			{
				var result = commision.slice(0, -1);
				var commision_amount = ((rate_tot)*result)/100;
				
			}
			else
			{
				var commision_amount = commision;
			}
			var total_commision=(rate_tot) - commision_amount;
			var tax_amount = ((total_commision)*tax)/100;
			var total_tax=tax_amount+(total_commision);
			
		}
		
	
	$('#total').val(Math.round(rate_tot));
	$('#extra_child_amount'+id).val(total_child_rate);
	$('#tax').val(tax_amount);
	$('#agency').val(commision_amount);
	$('#net_amount').val(Math.round(total_tax));
	}
}
function getRooms(id,room_id,roomno_id)
{
	 var days = $('#total_days').val();
	 if(days==0)
	 { days =1;}
	 
	 var hid = $('#total_hid').val();
	 var total =$('#total').val();
	 var no_of_bed = $('#no_of_bed_'+id).val();
	 var no_of_child = $('#no_of_child_'+id).val();
	 var extra_amount=$('#extra_amount'+id).val();
	 
	 var bed_count = $('#bed_count_'+id).text();
	 var child_count = $('#child_count_'+id).text();
	 var room_count = $('.room_count_'+id).text();
	 var tax=$('#hotel_tax').val();
	 var commision=$('#commision').val();
	 var food_plan =$('#total_food').val();
	 var cat = $('#type').val();	
	
	var checkedValues=[];
	var sp,tot = 0,rate = 0,bed = 0,rate_tot = 0;
/* 	
	$('input:checkbox:checked').each(function() {
		checkedValues.push($(this).val());
	}).get(); */
	
	
	$('input:checkbox.numberrooms:checked').each(function () {
     checkedValues.push($(this).val());
  });
  
	
	
	for(var i=0;i<checkedValues.length;i++)
	{
		sp = checkedValues[i].split("|");
		tot+=Number(sp[3]*days);
		
	}
	
	var selected_room_count =$('input.room_check'+id+':checked').length;
	var max_bed = selected_room_count * no_of_bed;
	var max_child=selected_room_count * no_of_child;
	
	$('#bed_count_'+id).text(max_bed);
	$('#child_count_'+id).text(max_child);
	$('.room_count_'+id).text(selected_room_count);
	
	
	if(hid)
	{
		
		if($('.room_check'+id).is(":checked"))
		{
			
			if($('.check_room_'+id+'_'+roomno_id).is(":checked"))
			{
				
				$('.check_room_number_'+room_id+'_'+roomno_id).prop('disabled',true);
				$('.check_room_'+id+'_'+roomno_id).prop('disabled',false);
				
				var new_amount = total - hid;
		    	var final_amount = tot + new_amount;
			
			}
			else
			{
				$('.check_room_number_'+room_id+'_'+roomno_id).prop('disabled',false);
				$('.check_room_'+id+'_'+roomno_id).prop('disabled',false);
				
				var bed = $('#extra_bed'+id).val();
				var rate = $('#extra_bed_rate'+id).val();
		    	
				
				if(Number(bed) > Number(max_bed))
				{
					$('#extra_bed'+id).val(max_bed);
					var bed_rate = days * max_bed * rate;
					var total_bed_rate= days * max_bed * rate;
					
					var new_amount = (total - hid) -(extra_amount -total_bed_rate);
					var final_amount = tot + new_amount;
					
					$('#extra_amount'+id).val(total_bed_rate);
					
			    	alert('You have to select maximum '+ bed +' extra bed(s)');
				}
				else
				{
					var new_amount = total - hid;
					var final_amount = tot + new_amount;
				}
				
				 
			}
			
			$('#extra_bed'+id).prop('disabled',false);
			$('#childs'+id).prop('disabled',false);
			$('#discount').prop('disabled',false);
			
			
			
			
		}
		else
		{ 
			//last
			
			$('#bed_count_'+id).text(no_of_bed);
			$('#child_count_'+id).text(no_of_child);
			$('.room_count_'+id).text('1');
	
			$('.check_room_number_'+room_id+'_'+roomno_id).prop('disabled',false);
			$('.check_room_'+id+'_'+roomno_id).prop('disabled',false);
				
			var bed = $('#extra_bed'+id).val();
			var rate = $('#extra_bed_rate'+id).val();
			var bed_rate = days * bed * rate;
			
			//update in 24/03/2016
			var child = $('#childs'+id).val();
			var childrate = $('#extra_child_amount'+id).val();
			if(childrate && child) {
			var child_total_rate = days * child * childrate;
			} else {
			var child_total_rate = 0;
			}
			
			var new_amount = total - hid - bed_rate - child_total_rate;

	    	var final_amount = tot + new_amount;
	    	
	    	$('#extra_bed'+id).prop('disabled',true);
			$('#childs'+id).prop('disabled',true);
			$('#extra_bed'+id).val('');
			$('#childs'+id).val('');
			$('#extra_amount'+id).val('');
			$('#extra_child_amount'+id).val('');
			
		}
		if(cat==0)
		{
			if(food_plan)
			{
				var final_room_amount = Number(final_amount) + Number(food_plan);
			}
			else
			{
				var final_room_amount = final_amount;
			}
			var tax_amount = ((final_room_amount)*tax)/100;
			var total_tax_price=tax_amount+(final_room_amount);
			var discount = $('#discount').val();
			if(discount)
			{
				var total_tax =total_tax_price - discount;
			}
			else
			{
				var total_tax =total_tax_price;
			}
		
			
		}
		else
		{
			var lastChar = commision.substr(commision.length - 1);
			if(lastChar=='%')
			{
				var result = commision.slice(0, -1);
				var commision_amount = ((final_amount)*result)/100;
				
			}
			else
			{
				var commision_amount = commision;
			}
			var total_commision=(final_amount) - commision_amount;
			var tax_amount = ((total_commision)*tax)/100;
			var total_tax=tax_amount+(total_commision);
			
		}
		
		$('#total').val(Math.round(final_amount));
		$('#total_hid').val((tot));
		$('#tax').val(tax_amount);
		$('#agency').val(commision_amount);
		$('#net_amount').val(Math.round(total_tax));
	}
	else
	{
		
		
		if($('.room_check'+id).is(":checked"))
		{
			
			if($('.check_room_'+id+'_'+roomno_id).is(":checked"))
			{
				
				$('.check_room_number_'+room_id+'_'+roomno_id).prop('disabled',true);
				$('.check_room_'+id+'_'+roomno_id).prop('disabled',false);
			}
			else
			{
				
				$('.check_room_number_'+room_id+'_'+roomno_id).prop('disabled',false);
				$('.check_room_'+id+'_'+roomno_id).prop('disabled',false);
			}
			
			$('#extra_bed'+id).prop('disabled',false);
			$('#childs'+id).prop('disabled',false);
			$('#discount').prop('disabled',false);
			
			var new_amount = total - hid;
	    	var final_amount = tot + new_amount;
		}
		else
		{
			var bed = $('#extra_bed'+id).val();
			var rate = $('#extra_bed_rate'+id).val();
			var bed_rate = days * bed * rate;
			
			//update in 24/03/2016
			var child = $('#childs'+id).val();
			var childrate = $('#extra_child_amount'+id).val();
			if(childrate && child) {
			var child_total_rate = days * child * childrate;
			} else {
			var child_total_rate = 0;
			}
			
			var new_amount = total - hid - bed_rate - child_total_rate;
	    	var final_amount = tot + new_amount;
			
			$('#extra_bed'+id).prop('disabled',true);
			$('#childs'+id).prop('disabled',true);
			$('#extra_bed'+id).val('');
			$('#childs'+id).val('');
			$('#extra_amount'+id).val('');
			$('#extra_child_amount'+id).val('');
						
		}
		
		if(cat==0)
		{
			if(food_plan)
			{
				var final_room_amount = Number(final_amount) + Number(food_plan);
			}
			else
			{
				var final_room_amount = final_amount;
			}
			var tax_amount = ((final_room_amount)*tax)/100;
			var total_tax_price=tax_amount+(final_room_amount);
			
			var discount = $('#discount').val();
			if(discount)
			{
				var total_tax=total_tax_price - discount;
			}
			else
			{
				var total_tax=total_tax_price;
			}
		}
		else
		{
			
			if(food_plan)
			{
				var final_room_amount = Number(final_amount) + Number(food_plan);
			}
			else
			{
				var final_room_amount = final_amount;
			}
			
			var lastChar = commision.substr(commision.length - 1);
			if(lastChar=='%')
			{
				var result = commision.slice(0, -1);
				var commision_amount = ((final_room_amount)*result)/100;
			}
			else
			{
				var commision_amount = commision;
			}
			var total_commision=(final_room_amount) - commision_amount;
			var tax_amount = ((total_commision)*tax)/100;
			var total_tax=tax_amount+(total_commision);
			
		}
		$('#total').val(Math.round(tot));
		$('#total_hid').val((tot));
		$('#tax').val(tax_amount.toFixed(2));
		$('#agency').val(commision_amount);
		$('#net_amount').val(Math.round(total_tax));
	
		
	}
	
	if(checkedValues.length=='0')
	{
		$('#discount').val('');
		$('#total').val('');
		$('#tax').val('');
		
		$('#discount').prop('disabled',true);
		$('#hid_discount').val('');
	}
}

// function getRooms(id,room_id,roomno_id)
// {
	
	 // var days = $('#total_days').val();
	 // if(days==0)
	 // { days =1;}
	 
	 // var hid = $('#total_hid').val();
	 // var total =$('#total').val();
	 // var no_of_bed = $('#no_of_bed_'+id).val();
	 // var no_of_child = $('#no_of_child_'+id).val();
	 // var extra_amount=$('#extra_amount'+id).val();
	 
	 // var bed_count = $('#bed_count_'+id).text();
	 // var child_count = $('#child_count_'+id).text();
	 // var room_count = $('.room_count_'+id).text();
	 // var tax=$('#hotel_tax').val();
	 // var commision=$('#commision').val();
	 // var food_plan =$('#total_food').val();
	 // var cat = $('#type').val();	
	
	// var checkedValues=[];
	// var sp,tot = 0,rate = 0,bed = 0,rate_tot = 0;
// /* 	
	// $('input:checkbox:checked').each(function() {
		// checkedValues.push($(this).val());
	// }).get(); */
	
	
	// $('input:checkbox.numberrooms:checked').each(function () {
     // checkedValues.push($(this).val());
  // });
  
	
	
	// for(var i=0;i<checkedValues.length;i++)
	// {
		// sp = checkedValues[i].split("|");
		// tot+=Number(sp[3]*days);
		
	// }
	
	// var selected_room_count =$('input.room_check'+id+':checked').length;
	// var max_bed = selected_room_count * no_of_bed;
	// var max_child=selected_room_count * no_of_child;
	
	// $('#bed_count_'+id).text(max_bed);
	// $('#child_count_'+id).text(max_child);
	// $('.room_count_'+id).text(selected_room_count);
	
	
	// if(hid!='')
	// {
		
		// if($('.room_check'+id).is(":checked"))
		// {
			
			// if($('.check_room_'+id+'_'+roomno_id).is(":checked"))
			// {
				
				// $('.check_room_number_'+room_id+'_'+roomno_id).prop('disabled',true);
				// $('.check_room_'+id+'_'+roomno_id).prop('disabled',false);
				
				// var new_amount = total - hid;
		    	// var final_amount = tot + new_amount;
			
			// }
			// else
			// {
				// $('.check_room_number_'+room_id+'_'+roomno_id).prop('disabled',false);
				// $('.check_room_'+id+'_'+roomno_id).prop('disabled',false);
				
				// var bed = $('#extra_bed'+id).val();
				// var rate = $('#extra_bed_rate'+id).val();
		    	
				
				// if(Number(bed) > Number(max_bed))
				// {
					// $('#extra_bed'+id).val(max_bed);
					// var bed_rate = days * max_bed * rate;
					// var total_bed_rate= days * max_bed * rate;
					
					// var new_amount = (total - hid) -(extra_amount -total_bed_rate);
					// var final_amount = tot + new_amount;
					
					// $('#extra_amount'+id).val(total_bed_rate);
					
			    	// alert('You have to select maximum '+ bed +' extra bed(s)');
				// }
				// else
				// {
					// var new_amount = total - hid;
					// var final_amount = tot + new_amount;
				// }
				
				 
			// }
			
			// $('#extra_bed'+id).prop('disabled',false);
			// $('#childs'+id).prop('disabled',false);
			// $('#discount').prop('disabled',false);
			
			
			
			
		// }
		// else
		// { 
			//last
			
			// $('#bed_count_'+id).text(no_of_bed);
			// $('#child_count_'+id).text(no_of_child);
			// $('.room_count_'+id).text('1');
	
			// $('.check_room_number_'+room_id+'_'+roomno_id).prop('disabled',false);
			// $('.check_room_'+id+'_'+roomno_id).prop('disabled',false);
				
			// var bed = $('#extra_bed'+id).val();
			// var rate = $('#extra_bed_rate'+id).val();
			// var bed_rate = days * bed * rate;
			
		//	update in 24/03/2016
			// var child = $('#childs'+id).val();
			// var childrate = $('#extra_child_amount'+id).val();
			// var child_total_rate = days * child * childrate;
			
			// var new_amount = total - hid - bed_rate -child_total_rate;
		//	update in 24/03/2016
			
			// /* var new_amount = total - hid - bed_rate ; */
	    	// var final_amount = tot + new_amount;
	    	
	    	// $('#extra_bed'+id).prop('disabled',true);
			// $('#childs'+id).prop('disabled',true);
			// $('#extra_bed'+id).val('');
			// $('#childs'+id).val('');
			// $('#extra_amount'+id).val('');
			// $('#extra_child_amount'+id).val('');
			
		// }
		// if(cat==0)
		// {
			// if(food_plan!='')
			// {
				// var final_room_amount = Number(final_amount) + Number(food_plan);
			// }
			// else
			// {
				// var final_room_amount = final_amount;
			// }
			// var tax_amount = ((final_room_amount)*tax)/100;
			// var total_tax_price=tax_amount+(final_room_amount);
			// var discount = $('#discount').val();
			// if(discount!='')
			// {
				// var total_tax =total_tax_price - discount;
			// }
			// else
			// {
				// var total_tax =total_tax_price;
			// }
		
			
		// }
		// else
		// {
			
			// var lastChar = commision.substr(commision.length - 1);
			// if(lastChar=='%')
			// {
				// var result = commision.slice(0, -1);
				// var commision_amount = ((final_amount)*result)/100;
				
			// }
			// else
			// {
				// var commision_amount = commision;
			// }
			
			// var total_commision=(final_amount) - commision_amount;
			// var tax_amount = ((total_commision)*tax)/100;
			// var total_tax=tax_amount+(total_commision);
			
		// }
		//alert(commision_amount);
		// $('#total').val((final_amount));
		// $('#total_hid').val((tot));
		// $('#tax').val(tax_amount);
		// $('#agency').val(commision_amount);
		// $('#net_amount').val(Math.round(total_tax));
		
	
	// }
	// else
	// {
		
		
		// if($('.room_check'+id).is(":checked"))
		// {
			
			// if($('.check_room_'+id+'_'+roomno_id).is(":checked"))
			// {
				
				// $('.check_room_number_'+room_id+'_'+roomno_id).prop('disabled',true);
				// $('.check_room_'+id+'_'+roomno_id).prop('disabled',false);
			// }
			// else
			// {
				
				// $('.check_room_number_'+room_id+'_'+roomno_id).prop('disabled',false);
				// $('.check_room_'+id+'_'+roomno_id).prop('disabled',false);
			// }
			
			// $('#extra_bed'+id).prop('disabled',false);
			// $('#childs'+id).prop('disabled',false);
			// $('#discount').prop('disabled',false);
			
			// var new_amount = total - hid;
	    	// var final_amount = tot + new_amount;
		// }
		// else
		// {
			
			// var bed = $('#extra_bed'+id).val();
			// var rate = $('#extra_bed_rate'+id).val();
			// var bed_rate = days * bed * rate;
			
			//update in 24/03/2016
			// var child = $('#childs'+id).val();
			// var childrate = $('#extra_child_amount'+id).val();
			// var child_total_rate = days * child * childrate;
			
			// var new_amount = total - hid - bed_rate -child_total_rate;
			//update in 24/03/2016
			
			// /* var new_amount = total - hid - bed_rate; */
	    	// var final_amount = tot + new_amount;
			
			// $('#extra_bed'+id).prop('disabled',true);
			// $('#childs'+id).prop('disabled',true);
			// $('#extra_bed'+id).val('');
			// $('#childs'+id).val('');
			// $('#extra_amount'+id).val('');
			// $('#extra_child_amount'+id).val('');
						
		// }
		
		//if(cat==0)
		//{
			// if(food_plan!='')
			// {
				// var final_room_amount = Number(final_amount) + Number(food_plan);
			// }
			// else
			// {
				// var final_room_amount = final_amount;
			// }
			
			// var lastChar = commision.substr(commision.length - 1);
			// if(lastChar=='%')
			// {
				// var result = commision.slice(0, -1);
				// var commision_amount = ((final_amount)*result)/100;
			// }
			// else
			// {
				// var commision_amount = commision;
			// }
			// var total_commision=(final_amount) - commision_amount;
			// var tax_amount = ((total_commision)*tax)/100;
			// var total_tax_price=tax_amount+(total_commision);
			// /* var tax_amount = ((final_room_amount)*tax)/100;
			// var total_tax_price=tax_amount+(final_room_amount);
			 // */
			// var discount = $('#discount').val();
			// if(discount)
			// {
				// var total_tax=total_tax_price - discount;
			// }
			// else
			// {
				// var total_tax=total_tax_price;
			// } 
		// /* }
		// else
		// {
			// if(food_plan!='')
			// {
				// var final_room_amount = Number(final_amount) + Number(food_plan);
			// }
			// else
			// {
				// var final_room_amount = final_amount;
			// }
			// var lastChar = commision.substr(commision.length - 1);
			// if(lastChar=='%')
			// {
				// var result = commision.slice(0, -1);
				// var commision_amount = ((final_amount)*result)/100;
			// }
			// else
			// {
				// var commision_amount = commision;
			// }
			// var total_commision=(final_amount) - commision_amount;
			// var tax_amount = ((total_commision)*tax)/100;
			// var total_tax=tax_amount+(total_commision);
			
		// } */
		//alert(commision_amount);
		// $('#total').val((tot));
		// $('#total_hid').val((tot));
		// $('#tax').val(tax_amount);
		// $('#agency').val(commision_amount);
		// $('#net_amount').val(Math.round(total_tax));
	
		
	// }
	
	// if(checkedValues.length=='0')
	// {
		// $('#discount').val('');
		// $('#total').val('');
		// $('#tax').val('');
		// $('#discount').prop('disabled',true);
		// $('#hid_discount').val('');
	// }
// }



function discount_amount()
{
	 var hid = $('#hid_net_amount').val();
	
	var old_disc=$('#hid_discount').val();
	var disc = $('#discount').val();
	var tot = $('#total').val();
	var net_amount = $('#net_amount').val();
	
	if(Number(disc) > Number(net_amount))
	{
		if(old_disc)
		{
			var new_val=Number(net_amount)+Number(old_disc);
			$('#net_amount').val(new_val);
		}
		else
		{
			$('#net_amount').val(net_amount);
		}
		
		var old_disc=$('#hid_discount').val('');
		var disc = $('#discount').val('');
	}
	else
	{
		
		if(net_amount)
		{
			if(disc=='')
			{
				if(old_disc)
				{
					var new_val=Number(net_amount)+Number(old_disc);
					$('#net_amount').val(new_val);
					$('#hid_discount').val(disc);
				}
				
			}
			else
			{
				if(old_disc)
				{
					var new_val=(Number(net_amount)+Number(old_disc)) - Number(disc);
					$('#net_amount').val(new_val);
					$('#hid_discount').val(disc);
				}
				else
				{
					var new_val=(Number(net_amount) - Number(disc));
					$('#net_amount').val(new_val);
					$('#hid_discount').val(disc);
				}
				
			}
		
		}
	
	}
	
	

}


function room_available()
{
	
	var check_in = $('#check_in').val();
	var check_out = $('#check_out').val();
	var status =  $('.status:checked').val();
	var from_date = $('#sandbox-container-cin input').datepicker('getDate');
	var to_date =$('#sandbox-container-cout input').datepicker('getDate');
	//if(((check_in) && (check_out)) && (check_out >= check_in) && (status))
	if(((check_in) && (check_out)) && (status))
	{
		if(to_date > from_date)
		{
		$('#date_error').css("display", "none");
	  	 $.ajax({
		  url: baseurl + "offline/get_rooms/"+check_in+"/"+check_out+"/"+status,
		  type:"POST",
	  	  success:function(result){
	  	  	
	  	  	//alert(result);
		 $("#room_status").html(result);
	
	  	}});
	  	}
	  	else {
	  	$('#date_error').css("display", "block");
	  	$('#room_available').html(''); 
	  	}
		
	}
	
}


function offline_room_check()
{
	var check_in = $('#check_in').val();
	var check_out = $('#check_out').val();
	var from_date = $('#sandbox-container input').datepicker('getDate');
	var to_date =$('#sandbox-container4 input').datepicker('getDate');
	var cat = $('#type').val();	
	var category = $('input[name="category"]:checked').val();
	if(category=='package')
	{
		category_set();
		package_room_check();
	}
	else
	{
		//	if(((check_in) && (check_out)) && check_out >= check_in)
		if(((check_in) && (check_out)))
		{
		if(to_date > from_date)
		{
		$('#date_error').css("display", "none");
			 $.ajax({
			  url: baseurl + "offline/room_available/"+check_in+"/"+check_out+"/"+cat,
			  type:"POST",
			  success:function(result){
				
				//alert(result);
			 $("#room_available").html(result);
			
			//if(cat!=0)
			//{
			//	$('#food_paln').css("display", "block");
			//}
		
			}});
		} else {
			$('#date_error').css("display", "block");
			$('#room_available').html('');
			}
			
		} 
		else { $("#room_available").html(''); }
	}
	
	$('.extra_amount').val('');
	$('#total').val('');
	$('#hid_discount').val('');
	$('#discount').val('');
	$('#total_hid').val('');
	$('#tax').val('');
	$('#agency').val('');
	$('#net_amount').val('');
}


function set_category()
{
	var cat = $('#type').val();	
	var category = $('input[name="category"]:checked').val();
	

	if(cat != '0')
	{
		//var cat_set = '<label class="col-lg-12">Category</label><ul class="delrom_cus"><li><input type="radio" value="hotel" onchange="category_set();" name="category" checked/> Hotel</li><li><input type="radio" value="package" onchange="category_set();" name="category" /> Package</li></ul>';
			//$('#off_type').html(cat_set);
			
			$('#hid_discount').val('');
			$('#discount').val('');
			$('#tax').val('');
			$('#net_amount').val('');
		
		$('#offline_discount').css("display", "block");
		$('#agency_voucher').css("display", "block");
		$('#agency_commision').css("display", "block");
		//$('#food_paln').css("display", "block");
		
		if(category == 'package')
		{
			category_set();
			
		}
		else
		{
			offline_room_check();
		}
		
			
	}
	else
	{
		//var cat_set = '<input type="hidden" value="hotel"  name="category" /> ';
		$('#offline_discount').css("display", "block");
		$('#agency_voucher').css("display", "none");
		$('#agency_commision').css("display", "none");
		//$('#off_type').html(cat_set);
		$('#tax').val('');
		$('#package').html('');	
		$('#net_amount').val('');
		
		if(category == 'package')
		{
			category_set();
			
		}
		else
		{
			offline_room_check();
		}
		
	}
}

function onlyNumbers(event) {
        var charCode = (event.which) ? event.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
        return true;
    }
    
function category_set()
{
	var check_in = $('#check_in').val();
	var check_out = $('#check_out').val();
	var cat = $('input[name="category"]:checked').val();
	var from_date = $('#sandbox-container input').datepicker('getDate');
	var to_date =$('#sandbox-container4 input').datepicker('getDate');
	
	//	if(((check_in) && (check_out)) && check_out >= check_in)
	if(((check_in) && (check_out)))
	{
	if(to_date > from_date)
	{
	$('#date_error').css("display", "none");
	if(cat == 'package')
	{
		$.ajax({
			url: baseurl+'offline/getPackages/'+check_in+'/'+check_out+'/'+cat,
			type:"POST",
			success:function(result){
				//alert(result);
		 $("#package").html(result);
	  	}
	  	});
		
		$('#room_available').html('');
		$('#hid_discount').val('');
		$('#discount').val('');
		$('#total').val('');
		$('#total_hid').val('');
		$('#offline_tax').css("display", "none");
		$("#net_amount").val(''); 
		$("#agency").val(''); 
		
	}
	else 
	{ 
	
	
	$("#package").html("<input type='hidden' name='package' value='' />"); 
	$("#agency").val(''); 
	$("#offline_tax").val(''); 
	$('#offline_tax').css("display", "block");
	$("#net_amount").val(''); 
	offline_room_check();
	}
	
	} else {
		$('#date_error').css("display", "block");
		$('#room_available').html('');
		} }
}



function package_room_check() {
	var check_in = $('#check_in').val();
	var check_out = $('#check_out').val();
	var pack= $('#pack').val();
	var cat = $('#type').val();	
	var from_date = $('#sandbox-container input').datepicker('getDate');
	var to_date =$('#sandbox-container4 input').datepicker('getDate');
	
	
	//if(((check_in) && (check_out)) && check_out >= check_in)
	if(((check_in) && (check_out)))
	{
		if(to_date > from_date)
		{
		$('#date_error').css("display", "none");
	  	 $.ajax({
		  url: baseurl + "offline/package_room_available/"+check_in+"/"+check_out+"/"+pack+"/"+cat,
		  type:"POST",
	  	  success:function(result){
	  	  	
	  	  	//alert(result);
		 $("#room_available").html(result);
		 
		 $('#hid_discount').val('');
		$('#discount').val('');
		$('#total').val('');
		$('#total_hid').val('');
		$('#agency').val('');
		$('#net_amount').val('');
		
		//if(cat!=0)
		//	{
		//		$('#food_paln').css("display", "block");
		//	}
	
	  	}});
		
	} else {
		$('#date_error').css("display", "block");
		$('#room_available').html('');
		} }
	else { $("#room_available").html(''); }
}




function food_plan()
{
	
	var days = $('#no_of_days').val();	
	var person =$('#no_of_persons').val();	
	var total = $('#total').val();	
	var net_price =$('#net_amount').val();	
	var tax=$('#hotel_tax').val();
	var discount = $('#discount').val();
	 var agency = $('#agency').val();
	var prices,food_amount =0;
	var plans = []; // take an array to store values
	$('input[type="checkbox"][class="food"]:checked').each(function(){
	  plans.push($(this).val());
	});
	
	for(var i=0;i<plans.length;i++)
	{
		prices = plans[i].split(",");
		food_amount+=Number(prices);
		
	}
	
	var total_food_price = days * person * food_amount;
	//alert(total_food_price);
	
		
	var total_amount = Number(total)+Number(total_food_price);
	
	if(agency)
	{
	var food_tax =((total_amount-agency)*tax)/100;
	}
	else{
	var food_tax =(total_amount*tax)/100;	
	}

	 if(agency)
	{
		var total_tax = (Number(total_amount)+Number(food_tax)) - Number(agency);
	} 
	else{
		var total_tax = Number(total_amount)+Number(food_tax);
	
	}
	
	if(discount)
	{
		var total_tax = total_tax - discount;
	}

	$('#total_food').val(total_food_price);
	$('#net_amount').val(Math.round(total_tax));
	$('#tax').val(food_tax);
	
	
	
}

//validation for offline form

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#offline").validate({
            	
            rules: {
                check_in: {
                	required: true
				},
                check_out: {
                	required: true
				},
                f_name: {
                	required: true
				},
                l_name: {
                	required: true
				},
                address: {
                	required: true
				},
                pin: {
                	required: true
				},
                gender: {
                	required: true
				},
				email: {
					required: true,
					email: true
				},
                phone: {
                	required: true
				},
                city: {
                	required: true
				},
                state: {
                	required: true
				},
                country: {
                	required: true
				},
				payment: {
				required: function(element) {
					return $("#voucher").val() == '';
				}
    }
             },
             messages: {
             	check_in: "Please choose a check-in date",
             	check_out: "Please choose a check-out date",
             	f_name: "Please enter first name",
             	l_name: "Please enter last name",
             	address: "Please enter address",
             	pin: "Please enter pincode",
             	gender: "Please choose gender",
				email: {
					required: "Please enter an email id",
					email: "Please enter a valid email id"
				},
             	phone: "Please enter phone number",
             	city: "Please enter city",
             	state: "Please enter state",
             	country: "Please enter country",
             	payment: "Payment required if no voucher"
             },
                submitHandler: function(form) {
                  form.submit();
                }
               
               
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);



//validation for hot deals

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#add_offer").validate({
            	
            rules: {
                offer_type: {
                	required: true
				},
                offer: {
                	required: true
				},
                valid_from: {
                	required: true
				},
                valid_to: {
                	required: true
				},
             },
             messages: {
             	offer_type: "Please enter offer name",
             	offer: "Please enter offer percent",
             	valid_from: "Please select offer begin date",
             	valid_to: "Please select offer end date"
             },
                submitHandler: function(form) {
                  form.submit();
                }
               
               
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);



//validation for add/edit ayurveda/yoga package

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#add_pack").validate({
            	
            rules: {
                title: {
                	required: true
				},
                days: {
                	required: true
				},
                image: {
                	required: true
				},
                description: {
                	required: true
				}
             },
             messages: {
             	title: "Please select package name",
             	days: "Please enter no. of Nights",
             	image: "Please choose an image",
             	description: "Please enter package description"
             },
                submitHandler: function(form) {
                  form.submit();
                }
               
               
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);












(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#edit_pack").validate({
            	
            rules: {
                title: {
                	required: true
				},
                days: {
                	required: true
				},
               
                description: {
                	required: true
				}
             },
             messages: {
             	title: "Please select package name",
             	days: "Please enter no. of Nights",
             	description: "Please enter package description"
             },
                submitHandler: function(form) {
                  form.submit();
                }
               
               
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);







//validation for add roomnumber

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#add_room").validate({
            	
            rules: {
                room_id: {
                	required: true
				},
                num_rooms: {
                	required: true
				}
             },
             messages: {
             	room_id: "Please choose room type",
             	num_rooms: "Please enter no. of rooms"
             },
                submitHandler: function(form) {
                  form.submit();
                }
               
               
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);





(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#edit_room").validate({
            	
            rules: {
                room_id: {
                	required: true
				},
                num_rooms: {
                	required: true
				}
             },
             messages: {
             	room_id: "Please choose room type",
             	num_rooms: "Please enter room number"
             },
                submitHandler: function(form) {
                  form.submit();
                }
               
               
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);