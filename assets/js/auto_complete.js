/* $( window ).load(function() {
    if (window.location.href.indexOf('#')==-1) {
    	var a = window.location.pathname.split( '/' );
		
    	if((a[3] == 'search_list') && (a[2] == 'holiday')) 
		{
			
		}
		else	
		{
			if((a[3] == 'search_list') && ((a[2] == 'hotels') || (a[2] == 'resorts') || (a[2] == 'apartments') || (a[2] == 'homestays') )) 
			{
				window.location.replace(window.location.href+'?#'); 
			}
		 }
    }
}); */
	/* function date_check(){
			var startDate 	= new Date($('#valid_from').val());
			var endDate 	= new Date($('#valid_to').val());
			if (startDate > endDate){

				$('#valid_from').val('');
				$('#valid_to').val('');
				$(".date_alert").css("display", "block");
			}

	}
 */
 
 
  function destination_change()
 {
	var des=$('#destination').val();
	if(des!='')
	{
		$('#destination').val('');
	}
 }
 
 
 	function price(val)
	{
	var res_sub_catid = $('#res_sub_catid').val();
	var sub_catid = $('#sub_catid').val();
	var subcat = $('#subcat').val();
	
	if(subcat == 'hotel_packages') {
	var pack_destination = $('#destination').val();
	var packag = '';
	} else {
	var packag = $('#destination').val();
	var pack_destination = '';
	}
	
	if(subcat != 'hotel-packages' || subcat != 'ayurveda') {
		var destination = $('#destination').val();
		var packag = '';
		var pack_destination = '';
	}
	
	var adults = $('#num_adult').val();
	var adult_count = $("select[name='adults[]']").map(function(){return $(this).val();}).get();

	var mem_type = $('#selected_room').val();
	var cate = $('#category').val();
	var hid = $('#hidden_search').val();
	var c_in = $('#valid_from').val();
	var c_out = $('#valid_to').val();
	var pack = $('.pack_dest').val();
	
	var price = $('#price_sort').val();

//////////////Star Rating Array//////////////////////////////////////////////
		var check=document.getElementsByName('star');
		var loc = location.href;
		var allVals=[];
		for(var c=0; c<check.length; c++){
			if(check[c].checked){
				allVals.push(check[c].value);
			}
			
		}
//////////////Price Range Array/////////////////////////////////////////////
		var check_price_range=document.getElementsByName('price_range');
		var allVals_price=[];
		for(var c=0; c<check_price_range.length; c++){
			if(check_price_range[c].checked){
				allVals_price.push(check_price_range[c].value);
			}
		}

//////////////Hotel Locations Array/////////////////////////////////////////
		var check_loc=document.getElementsByName('location');
		var allVals_loc=[];
		for(var c=0; c<check_loc.length; c++){
			if(check_loc[c].checked){
				allVals_loc.push(check_loc[c].value);
			}
		}

//////////////Hotel Facilities Array/////////////////////////////////////////
		var check_facilities=document.getElementsByName('facilities');
		var allVals_fac=[];
		for(var c=0; c<check_facilities.length; c++){
			if(check_facilities[c].checked){
				allVals_fac.push(check_facilities[c].value);
			}
		}

//////////////Hotel Facilities Array/////////////////////////////////////////
		    var hotelname_srch = $("#inputIcon").val();
			var allVals_hot_name=[];
			allVals_hot_name.push(hotelname_srch);
		
		
$("#select_loader").fadeIn();
////////Trigger AJAX with all refineries/////////////////////////////////////

		$.ajax({
			type: "GET",
			url: baseurl+subcat+ '/search_det',
			data:{
			res_sub_catid:res_sub_catid,
			adults:adults,
			adult_count:adult_count,
			mem_type:mem_type,
			sub_catid:sub_catid,
			pack_destination:pack_destination,
			packag:packag,
			destination:destination,
			category:cate,
			check_out:c_out,
			check_in:c_in,
			hidden_search:hid,
			checkedArray:allVals,
			checkedArray_price:allVals_price,
			checkedArray_loc:allVals_loc,
			checkedArray_fac:allVals_fac,
			checkedArray_hotelName:allVals_hot_name,
			price:price
			},
			success: function(result)
			{
			$("#select_loader").fadeOut();
			 //$.getScript('../assets/js/package.js');
				$('#refine').html(result);
				if(price == 'low') {
				$(".p-text").text("Price : Low - High");
				$(".p-icon").removeClass("fa-arrow-up");
				$(".p-icon").addClass("fa-arrow-down");
				$('#price_sort').val('high');
				} else {
				$(".p-text").text("Price : High - Low");
				$(".p-icon").removeClass("fa-arrow-down");
				$(".p-icon").addClass("fa-arrow-up");
				$('#price_sort').val('low');
				}
				$('#sort_price').val(price);
			}
		});
}
 
 
 
	function catchStar(val)
	{
	var adults = $('#num_adult').val();
	var adult_count = $("select[name='adults[]']").map(function(){return $(this).val();}).get();
	//var subcat = $('#subcat').val();
	var destination = $('#destination').val();

	//if(subcat == 'hotel_packages') {
	//var pack_destination = $('#destination').val();
	//var packag = '';
	//} else {
	//var packag = $('#destination').val();
	//var pack_destination = '';
	//}
	//alert(subcat); return;
	
	var mem_type = $('#selected_room').val();
	var res_sub_catid = $('#res_sub_catid').val();
	var sub_catid = $('#sub_catid').val();
	var subcat = $('#subcat').val();
	var hid = $('#hidden_search').val();
	var c_in = $('#valid_from').val();
	var c_out = $('#valid_to').val();
	var mem = $('#selected_room').val();
	var cate = $('#category').val();
//////////////Star Rating Array//////////////////////////////////////////////
		var check=document.getElementsByName('star');
		var loc = location.href;
		var allVals=[];
		for(var c=0; c<check.length; c++){
			if(check[c].checked){
				allVals.push(check[c].value);
			}
			
		}
//////////////Price Range Array/////////////////////////////////////////////
		var check_price_range=document.getElementsByName('price_range');
		var allVals_price=[];
		for(var c=0; c<check_price_range.length; c++){
			if(check_price_range[c].checked){
				allVals_price.push(check_price_range[c].value);
			}
		}

//////////////Hotel Locations Array/////////////////////////////////////////
		var check_loc=document.getElementsByName('location');
		var allVals_loc=[];
		for(var c=0; c<check_loc.length; c++){
			if(check_loc[c].checked){
				allVals_loc.push(check_loc[c].value);
			}
		}

//////////////Hotel Facilities Array/////////////////////////////////////////
		var check_facilities=document.getElementsByName('facilities');
		var allVals_fac=[];
		for(var c=0; c<check_facilities.length; c++){
			if(check_facilities[c].checked){
				allVals_fac.push(check_facilities[c].value);
			}
		}

//////////////Hotel Facilities Array/////////////////////////////////////////
		    var hotelname_srch = $("#inputIcon").val();
			var allVals_hot_name=[];
			allVals_hot_name.push(hotelname_srch);
		
var price = $('#sort_price').val();
	
$("#select_loader").fadeIn();
////////Trigger AJAX with all refineries/////////////////////////////////////




		$.ajax({
			type: "GET",
			url: baseurl+subcat+ '/search_det',
			data:{
			hidden_search:hid,
			destination:destination,
			//packag:packag,
			category:cate,
			mem_type:mem_type,
			adults:adults,
			adult_count:adult_count,
			res_sub_catid:res_sub_catid,
			sub_catid:sub_catid,
			price:price,
			check_out:c_out,
			check_in:c_in,
			hidden_search:hid,
			checkedArray:allVals,
			checkedArray_price:allVals_price,
			checkedArray_loc:allVals_loc,
			checkedArray_fac:allVals_fac,
			checkedArray_hotelName:allVals_hot_name
			},
			success: function(result)
			{
			$("#select_loader").fadeOut();
			$('#refine').html(result);
			}
		});
}



	function ayur_catchStar(val)
	{
	
	var adults = $('#num_adult').val();
	var adult_count = $("select[name='adults[]']").map(function(){return $(this).val();}).get();
	var mem_type = $('#selected_room').val();
	var res_sub_catid = $('#res_sub_catid').val();
	var sub_catid = $('#sub_catid').val();
	var url = $(location).attr('href');
	var s = url.search("ayurveda");
	if(s == -1) {
	var cat = 'hotel-packages';
	var pack_destination = $('#destination').val();
	var packag = '';
	} else {
	var cat = 'ayurveda';
	var packag = $('#destination').val();
	var pack_destination = '';
	}
	
	
	
	var cate = $('#category').val();
	var hid = $('#hidden_search').val();
	var c_in = $('#valid_from').val();
	var c_out = $('#valid_to').val();
	var pack = $('.pack_dest').val();
	
//////////////Star Rating Array//////////////////////////////////////////////
		var check=document.getElementsByName('star');
		var allVals=[];
		for(var c=0; c<check.length; c++){
			if(check[c].checked){
				allVals.push(check[c].value);
			}
			
		}
//////////////Price Range Array/////////////////////////////////////////////
		var check_price_range=document.getElementsByName('price_range');
		var allVals_price=[];
		for(var c=0; c<check_price_range.length; c++){
			if(check_price_range[c].checked){
				allVals_price.push(check_price_range[c].value);
			}
		}

//////////////Hotel Locations Array/////////////////////////////////////////
		var check_loc=document.getElementsByName('location');
		var allVals_loc=[];
		for(var c=0; c<check_loc.length; c++){
			if(check_loc[c].checked){
				allVals_loc.push(check_loc[c].value);
			}
		}

//////////////Hotel Facilities Array/////////////////////////////////////////
		var check_facilities=document.getElementsByName('facilities');
		var allVals_fac=[];
		for(var c=0; c<check_facilities.length; c++){
			if(check_facilities[c].checked){
				allVals_fac.push(check_facilities[c].value);
			}
		}

//////////////Hotel Facilities Array/////////////////////////////////////////
		    var hotelname_srch = $("#inputIcon").val();
			var allVals_hot_name=[];
			allVals_hot_name.push(hotelname_srch);
		
$("#select_loader").fadeIn();
////////Trigger AJAX with all refineries/////////////////////////////////////		
var price = $('#sort_price').val();


		$.ajax({
			type: "GET",
			url: baseurl+cat+'/search_det',
			data:{
			res_sub_catid:res_sub_catid,
			adults:adults,
			adult_count:adult_count,
			mem_type:mem_type,
			sub_catid:sub_catid,
			price:price,
			pack_destination:pack_destination,
			packag:packag,
			category:cate,
			check_out:c_out,
			check_in:c_in,
			hidden_search:hid,
			checkedArray:allVals,
			checkedArray_price:allVals_price,
			pack:pack,
			checkedArray_loc:allVals_loc,
			checkedArray_fac:allVals_fac,
			checkedArray_hotelName:allVals_hot_name
			},
			success: function(result)
			{
				$("#select_loader").fadeOut();
				$('#refine').html(result);
			}
		});
}

/*
* Price Sort Mobile Start
*/

 	function priceMob(val)
	{
	var res_sub_catid = $('#res_sub_catid').val();
	var sub_catid = $('#sub_catid').val();
	var subcat = $('#subcat').val();
	
	if(subcat == 'hotel_packages') {
	var pack_destination = $('#destination').val();
	var packag = '';
	} else {
	var packag = $('#destination').val();
	var pack_destination = '';
	}
	
	if(subcat != 'hotel-packages' || subcat != 'ayurveda') {
		var destination = $('#destination').val();
		var packag = '';
		var pack_destination = '';
	}
	
	var cate = $('#category').val();
	var hid = $('#hidden_search').val();
	var c_in = $('#valid_from').val();
	var c_out = $('#valid_to').val();
	var pack = $('.pack_dest').val();
	
	var mem_type = $('#selected_room').val();
	var adults = $('#num_adult').val();
	var adult_count = $("select[name='adults[]']").map(function(){return $(this).val();}).get();
	var price = $('#price_sort').val();

//////////////Star Rating Array//////////////////////////////////////////////
		var check=document.getElementsByName('star_mob');
		var loc = location.href;
		var allVals=[];
		for(var c=0; c<check.length; c++){
			if(check[c].checked){
				allVals.push(check[c].value);
			}
			
		}
//////////////Price Range Array/////////////////////////////////////////////
		var check_price_range=document.getElementsByName('price_range');
		var allVals_price=[];
		for(var c=0; c<check_price_range.length; c++){
			if(check_price_range[c].checked){
				allVals_price.push(check_price_range[c].value);
			}
		}

//////////////Hotel Locations Array/////////////////////////////////////////
		var check_loc=document.getElementsByName('location_mob');
		var allVals_loc=[];
		for(var c=0; c<check_loc.length; c++){
			if(check_loc[c].checked){
				allVals_loc.push(check_loc[c].value);
			}
		}

//////////////Hotel Facilities Array/////////////////////////////////////////
		var check_facilities=document.getElementsByName('facilities_mob');
		var allVals_fac=[];
		for(var c=0; c<check_facilities.length; c++){
			if(check_facilities[c].checked){
				allVals_fac.push(check_facilities[c].value);
			}
		}

//////////////Hotel Facilities Array/////////////////////////////////////////
		    var hotelname_srch = $("#inputIcon_mob").val();
			var allVals_hot_name=[];
			allVals_hot_name.push(hotelname_srch);
		
		
$("#select_loader").fadeIn();
////////Trigger AJAX with all refineries/////////////////////////////////////

		$.ajax({
			type: "GET",
			url: baseurl+subcat+ '/search_det',
			data:{ 
			adults:adults,
			adult_count:adult_count,
			mem_type:mem_type,
			res_sub_catid:res_sub_catid,
			sub_catid:sub_catid,
			pack_destination:pack_destination,
			packag:packag,
			destination:destination,
			category:cate,
			check_out:c_out,
			check_in:c_in,
			hidden_search:hid,
			checkedArray:allVals,
			checkedArray_price:allVals_price,
			checkedArray_loc:allVals_loc,
			checkedArray_fac:allVals_fac,
			checkedArray_hotelName:allVals_hot_name,
			price:price
			},
			success: function(result)
			{
			$("#select_loader").fadeOut();
			 //$.getScript('../assets/js/package.js');
				$('#refine').html(result);
				if(price == 'low') {
				$(".p-text").text("Price : Low - High");
				$(".p-icon").removeClass("fa-arrow-up");
				$(".p-icon").addClass("fa-arrow-down");
				$('#price_sort').val('high');
				} else {
				$(".p-text").text("Price : High - Low");
				$(".p-icon").removeClass("fa-arrow-down");
				$(".p-icon").addClass("fa-arrow-up");
				$('#price_sort').val('low');
				}
				$('#sort_price').val(price);
			}
		});
}

/*
* Price Sort Mobile End
*
* Hotels Refine Mobile Start
*/

	function catchStarMob(val)
	{
	var subcat = $('#subcat').val();
	if(subcat == 'hotel_packages') {
	var pack_destination = $('#destination').val();
	var packag = '';
	} else {
	var packag = $('#destination').val();
	var pack_destination = '';
	}
	
	var adults = $('#num_adult').val();
	var adult_count = $("select[name='adults[]']").map(function(){return $(this).val();}).get();
	var res_sub_catid = $('#res_sub_catid').val();
	var sub_catid = $('#sub_catid').val();
	var subcat = $('#subcat').val();
	var hid = $('#hidden_search').val();
	var c_in = $('#valid_from').val();
	var c_out = $('#valid_to').val();
	var mem_type = $('#selected_room').val();
	var cate = $('#category').val();
	
//////////////Star Rating Array//////////////////////////////////////////////
		var check=document.getElementsByName('star_mob');
		var loc = location.href;
		var allVals=[];
		for(var c=0; c<check.length; c++){
			if(check[c].checked){
				allVals.push(check[c].value);
			}
			
		}
//////////////Price Range Array/////////////////////////////////////////////
		var check_price_range=document.getElementsByName('price_range');
		var allVals_price=[];
		for(var c=0; c<check_price_range.length; c++){
			if(check_price_range[c].checked){
				allVals_price.push(check_price_range[c].value);
			}
		}

//////////////Hotel Locations Array/////////////////////////////////////////
		var check_loc=document.getElementsByName('location_mob');
		var allVals_loc=[];
		for(var c=0; c<check_loc.length; c++){
			if(check_loc[c].checked){
				allVals_loc.push(check_loc[c].value);
			}
		}

//////////////Hotel Facilities Array/////////////////////////////////////////
		var check_facilities=document.getElementsByName('facilities_mob');
		var allVals_fac=[];
		for(var c=0; c<check_facilities.length; c++){
			if(check_facilities[c].checked){
				allVals_fac.push(check_facilities[c].value);
			}
		}

//////////////Hotel Facilities Array/////////////////////////////////////////
		    var hotelname_srch = $("#inputIcon_mob").val();
			var allVals_hot_name=[];
			allVals_hot_name.push(hotelname_srch);
		
		
$("#select_loader").fadeIn();
////////Trigger AJAX with all refineries/////////////////////////////////////
var price = $('#sort_price').val();
		$.ajax({
			type: "GET",
			url: baseurl+subcat+ '/search_det',
			data:{
			pack_destination:pack_destination,
			packag:packag,
			category:cate,
			mem_type:mem_type,
			adults:adults,
			adult_count:adult_count,
			res_sub_catid:res_sub_catid,
			price:price,
			sub_catid:sub_catid,
			check_out:c_out,
			check_in:c_in,
			hidden_search:hid,
			checkedArray:allVals,
			checkedArray_price:allVals_price,
			checkedArray_loc:allVals_loc,
			checkedArray_fac:allVals_fac,
			checkedArray_hotelName:allVals_hot_name
			},
			success: function(result)
			{
			$("#select_loader").fadeOut();
			$('#refine').html(result);
			}
		});
}

/*
* Hotels Refine Mobile End
*
* Ayurveda Refine Mobile Start
*/

	function ayur_catchStarMob(val)
	{
	var mem_type = $('#selected_room').val();	
	var adults = $('#num_adult').val();
	var adult_count = $("select[name='adults[]']").map(function(){return $(this).val();}).get();
	var res_sub_catid = $('#res_sub_catid').val();
	var sub_catid = $('#sub_catid').val();
	var url = $(location).attr('href');
	var s = url.search("ayurveda");
	if(s == -1) {
	var cat = 'hotel-packages';
	var pack_destination = $('#destination').val();
	var packag = '';
	} else {
	var cat = 'ayurveda';
	var packag = $('#destination').val();
	var pack_destination = '';
	}
	
	
	
	var cate = $('#category').val();
	var hid = $('#hidden_search').val();
	var c_in = $('#valid_from').val();
	var c_out = $('#valid_to').val();
	var pack = $('.pack_dest').val();
	
//////////////Star Rating Array//////////////////////////////////////////////
		var check=document.getElementsByName('star_mob');
		var allVals=[];
		for(var c=0; c<check.length; c++){
			if(check[c].checked){
				allVals.push(check[c].value);
			}
			
		}
//////////////Price Range Array/////////////////////////////////////////////
		var check_price_range=document.getElementsByName('price_range');
		var allVals_price=[];
		for(var c=0; c<check_price_range.length; c++){
			if(check_price_range[c].checked){
				allVals_price.push(check_price_range[c].value);
			}
		}

//////////////Hotel Locations Array/////////////////////////////////////////
		var check_loc=document.getElementsByName('location_mob');
		var allVals_loc=[];
		for(var c=0; c<check_loc.length; c++){
			if(check_loc[c].checked){
				allVals_loc.push(check_loc[c].value);
			}
		}

//////////////Hotel Facilities Array/////////////////////////////////////////
		var check_facilities=document.getElementsByName('facilities_mob');
		var allVals_fac=[];
		for(var c=0; c<check_facilities.length; c++){
			if(check_facilities[c].checked){
				allVals_fac.push(check_facilities[c].value);
			}
		}

//////////////Hotel Facilities Array/////////////////////////////////////////
		    var hotelname_srch = $("#inputIcon_mob").val();
			var allVals_hot_name=[];
			allVals_hot_name.push(hotelname_srch);
		
$("#select_loader").fadeIn();
////////Trigger AJAX with all refineries/////////////////////////////////////		

var price = $('#sort_price').val();


		$.ajax({
			type: "GET",
			url: baseurl+cat+'/search_det',
			data:{
			res_sub_catid:res_sub_catid,
			adults:adults,
			adult_count:adult_count,
			mem_type:mem_type,
			sub_catid:sub_catid,
			price:price,
			pack_destination:pack_destination,
			packag:packag,
			category:cate,
			check_out:c_out,
			check_in:c_in,
			hidden_search:hid,
			checkedArray:allVals,
			checkedArray_price:allVals_price,
			pack:pack,
			checkedArray_loc:allVals_loc,
			checkedArray_fac:allVals_fac,
			checkedArray_hotelName:allVals_hot_name
			},
			success: function(result)
			{
				$("#select_loader").fadeOut();
				$('#refine').html(result);
			}
		});
}

/*
* Ayurveda Refine Mobile End
*/

$(document).ready(function(){
	$('#search_hotels').prop('disabled',true);
	$("#display-search").hide();
	$(".date_alert").css("display", "none");


	//main index search button
		$("#search_hotels").click(function(){ //when the search link is clicked...
			var StartDate= document.getElementById('valid_from').value;
			 var EndDate= document.getElementById('valid_to').value;
			
		if(StartDate!='' || EndDate!='')
		{
			if ($.datepicker.parseDate('dd-mm-yy', EndDate) <= $.datepicker.parseDate('dd-mm-yy', StartDate)) {

				 $(".date_alert").show(); 
				 return false; 
			}
			else
			{
					 $(".date_alert").hide(); 
					return true; 
			}
		}
		
	});
	
	
	
	//search list page modify search button
	$("#hotels_modify").submit(function(){ //when the search link is clicked...
	
		 var search_text=document.getElementById('hidden_search').value;
		 var StartDate= document.getElementById('valid_from').value;
		 var EndDate= document.getElementById('valid_to').value;
			
			if(search_text=='')
			{
				 $(".search_alert").show(); 
					return false; 
			}
			else
			{
				 $(".search_alert").hide(); 
				 if(StartDate!='' || EndDate!='')
				{
					if ($.datepicker.parseDate('dd-mm-yy', EndDate) <= $.datepicker.parseDate('dd-mm-yy', StartDate)) {
						
						 $(".date_alert").show(); 
						 return false; 
					}
					else
					{
							 $(".date_alert").hide(); 
							return true; 
					}
				}
			}
		
	});
	
	
	//detial view page search button
$('#hidden-detail-search').on('keypress keyup',function()
{
	var text_seacrh = $('#hidden-detail-search').val().trim();
	
	if(text_seacrh=='')
	{
			$('#detail_search_button').prop('disabled',true);
	}
	else
	{
		$('#detail_search_button').prop('disabled',false);
	}
});


$("#detail_search_button").click(function(){ //when the search link is clicked...
		var StartDate= document.getElementById('valid_from').value;
		 var EndDate= document.getElementById('valid_to').value;
				if(StartDate!='' || EndDate!='')
				{
					if ($.datepicker.parseDate('dd-mm-yy', EndDate) <= $.datepicker.parseDate('dd-mm-yy', StartDate)) {
						
						 $(".date_alert").show(); 
						 return false; 
					}
					else
					{
							 $(".date_alert").hide(); 
							return true; 
					}
				}
				else
				{
					 $(".date_alert").show(); 
					 return false; 
				}
		
	});
	
	
	
	

	
			$("#ayur_detail_search_button").click(function(){ 

		
	//when the search link is clicked...
			var StartDate= document.getElementById('valid_from').value;
			 var EndDate= document.getElementById('valid_to').value;
					if(StartDate!='' || EndDate!='')
					{
										if ($.datepicker.parseDate('dd-mm-yy', EndDate) <= $.datepicker.parseDate('dd-mm-yy', StartDate)) {
						
						 $(".date_alert").show(); 
						 return false; 
					}
					else
					{
							 $(".date_alert").hide(); 
							return true; 
					}
						var pack =document.getElementById('detail_package').value;
						
							if(pack!='')
							{
								$(".pacakge_alert").hide(); 
								return true; 
								
							}
							else
							{
								 $(".package_alert").show(); 
								  return false; 
							}
								 
						
					}
					else
					{
						 $(".date_alert").show(); 
						 return false; 
					} 
					
			
		});
		
		
		
		
		
		
		
 //when the browser has rendered the page...
	
	//save selectors we'll be using more than once into variables for better performance
	var $hiddenSearch = $("#hidden-search"),
		$displaySearch = $("#display-search"),
		$searchOverlay = $("#search-overlay"),
		$artistsList = $("#artists");

	$("#search").click(function(){ //when the search link is clicked...
		$searchOverlay.show(); //show the search overlay
		$hiddenSearch.focus(); //give the hidden input box focus
	});
			
	//when the user pushes a key whilst the input box has focus...
	$hiddenSearch.on('keypress keyup',function(e){
		
		
		var text_seacrh = $hiddenSearch.val().trim();
		if(text_seacrh!='')
		{
			$('#search_hotels').prop('disabled',false);
		}
		else
		{
			$('#search_hotels').prop('disabled',true);
			
		}	
		
		//currentQuery = $displaySearch.val(); //get the current value of the search input
		if(e.keyCode == 8){ //if the user hits backspace...
		
			latestQuery = currentQuery.substring(0, currentQuery.length - 1); //...remove the last character
			$displaySearch.val(latestQuery); //...update the search input box
			updateResults(latestQuery); //...update the results
		
		}else if(e.keyCode == 32 || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 48 && e.keyCode <= 57)){ //if the user hits spacebar (32), characters a - z (65 - 90) or numeric keys(0 - 9)...
			latestQuery = currentQuery + String.fromCharCode(e.keyCode); //...add the newly entered key onto the current query
			$displaySearch.val(latestQuery); //...update the search input value with the latest query
			updateResults(latestQuery); //...update the results
		}
	});
	
	function updateResults(latestQuery){
		if(latestQuery.length > 0){ //if there is a query to process...
			$.post("Hotels/auto_complete", {latestQuery: latestQuery}, function(data){ 
				console.log(data)
			//..send that query to the php script "auto-suggest.php" via ajax
				
			    if(data.length > 0){ //if the php script returns a result...
			    	data = $.parseJSON(data); //turn the string from the PHP script into a JavaScript object
					$("#artists li").remove(":contains('No results')"); //remove the "No results" text if it's being displayed
					$("#results").show(); //show the results container
					
					previousTerms = new Array(); //set up an array that will hold the terms currently being displayed
					$("#artists li").each(function(){ //for each result currently being displayed...
						previousTerms.push($(this).text()); //add it to the previousTerms array
					});
										
					keepTerms = new Array();
										
					for(term in data){
					 //for each matched term in the returned data...
						url = data[term]; //get the url for the matched term;
						if($.inArray(term, previousTerms) === -1){ //if this term isn't in the previous list of terms (and isn't already being displayed)...
							$artistsList.prepend('<li>'+url+'</li>');
						$('li').click(function(e) 
						   { 
						    $("#hidden-search:text").val($(this).text());
						    $artistsList.empty();
						   });
						}else{ //if it is in the previous list...
							keepTerms.push(data[term]); //add the term we want to keep to an array
						}				
					}
															
					if(data == "" || (keepTerms.length == 0 && (previousTerms.length != 0 || $displaySearch.val() == ""))){
						$artistsList.html("<li>No results</li>");
					}else{						
						for(term in previousTerms){ //for each term in the displayed list...
							if($.inArray(previousTerms[term], keepTerms) === -1){
								$("#artists li").filter(function(){
									return $(this).text() == previousTerms[term]
								}).remove();
							}
						}
					}
			    }
			});
		}else{
			$artistsList.html("<li>No results</li>");
		}
	}
	
	
	//get sistrict list
	$(".states").change(function() {
	  getdistrict();
	});
	
	  function getdistrict()
	  {
		$.ajax( {
			  type: "POST",
			  url: baseurl+"about/select_district/"+$('.states').val(),
			  data: {cat: $('.states').val()  }
			})
		  .done(function(data) {
			
			$(".district").html(data);
		  })
		  .fail(function() {
			//alert( "error" );
		  });  
	  }
  
	
	
});