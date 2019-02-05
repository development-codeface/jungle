


$('#hotel_category').change(function()
	{
		var category= $('#hotel_category').val();
		var status = $('input:radio[name=status]:checked').val();
		
		if(category!='')
		{
			$.ajax({
				type: "post",
				url: baseurl+"report/hotelreport/"+category+"/"+status,
				data: {category : category, status : status,},
				success:function(res)
				{
					var result = res.split("|");
					$('#search_result').html(result[0]);
					$('#page').html(result[1]);
					ChangeUrl('Page1', baseurl+'report/hotelreport/'+category+'/'+status); 
					
				}
				
			});
		}
		
});




$('.hotel_category').click(function()
	{
		var category= $('#hotel_category').val();
		var status = $('input:radio[name=status]:checked').val();
		
		if(category!='')
		{
			$.ajax({
				type: "post",
				url: baseurl+"report/hotelreport/"+category+"/"+status,
				data: {category : category, status : status,},
				success:function(res)
				{
					var result = res.split("|");
					$('#search_result').html(result[0]);
					$('#page').html(result[1]);
					ChangeUrl('Page1', baseurl+'report/hotelreport/'+category+'/'+status); 
				}
				
			});
		}
	
});


function ChangeUrl(title, url) {
		    if (typeof (history.pushState) != "undefined") {
		        var obj = { Title: title, Url: url };
		        history.pushState(obj, obj.Title, obj.Url);
		    } else {
		        alert("Browser does not support HTML5.");
		    }
		
		}

		
/* function get_booking_online()
{
	var from_date = $('#from').val();
	var to_date = $('#to').val();
	var hotel = $('#hotel').val();
	var b_num = $('#b_num').val();
	if(!b_num) {
		b_num = 'undefined';
	}
	
	if(from_date!='' && to_date!='' )
	{
	$.ajax({
		type: 'post',
		url : baseurl+"report/booking_online/"+from_date+"/"+to_date+"/"+hotel+"/"+b_num,
		success:function(res)
		{
			$('.online_report').html(res);
			if(b_num!='undefined') {
	$('#b_num').focus();
	$('#b_num').val(b_num);
			}
			else
			{
				$('#b_num').focus();
			}
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var from = $('#sandbox-container-frm input').datepicker({
	format: 'yyyy-mm-dd',autoclose: true ,
    //beforeShowDay: function(date) {
    //    return date.valueOf() < now.valueOf() ? 'disabled' : '';
    //}
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > to.viewDate.valueOf()){
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        to.setDate(newDate);		
    }
    else {
        to.setDate();
    }
    
    from.hide();
    $('#sandbox-container-to input')[0].focus();
}).data('datepicker');

var to = $('#sandbox-container-to input').datepicker({
	format: 'yyyy-mm-dd',autoclose: true ,
    beforeShowDay: function(date) {
        return date.valueOf() <= from.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    to.hide();
}).data('datepicker');
		}
		
	});
	ChangeUrl('Page1', baseurl+'report/booking_online/'+from_date+'/'+to_date+'/'+hotel+'/'+b_num);
	}
	
	
	
} */

/* function get_booking_cancel_online()
{
	var from_date = $('#from').val();
	var to_date = $('#to').val();
	var hotel = $('#hotel').val();
	var b_num = $('#b_num').val();
	if(!b_num) {
		b_num = 'undefined';
	}
	
	if(from_date!='' && to_date!='' && hotel!='')
	{
	$.ajax({
		type: 'post',
		url : baseurl+"report/cancel_online/"+from_date+"/"+to_date+"/"+hotel+"/"+b_num,
		success:function(res)
		{
			$('.online_report').html(res);
			if(b_num!='undefined') {
	$('#b_num').focus();
	$('#b_num').val(b_num);
			}
			else
			{
				$('#b_num').focus();
			}
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var from = $('#sandbox-container-frm input').datepicker({
	format: 'yyyy-mm-dd',autoclose: true ,
    //beforeShowDay: function(date) {
    //    return date.valueOf() < now.valueOf() ? 'disabled' : '';
    //}
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > to.viewDate.valueOf()){
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        to.setDate(newDate);		
    }
    else {
        to.setDate();
    }
    
    from.hide();
    $('#sandbox-container-to input')[0].focus();
}).data('datepicker');

var to = $('#sandbox-container-to input').datepicker({
	format: 'yyyy-mm-dd',autoclose: true ,
    beforeShowDay: function(date) {
        return date.valueOf() <= from.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    to.hide();
}).data('datepicker');
		}
		
	});
	ChangeUrl('Page1', baseurl+'report/cancel_online/'+from_date+'/'+to_date+'/'+hotel+"/"+b_num); 
	}
	
	
	
} */


/* function get_booking_amend_online()
{
	var from_date = $('#from').val();
	var to_date = $('#to').val();
	var hotel = $('#hotel').val();
	var b_num = $('#b_num').val();
	if(!b_num) {
		b_num = 'undefined';
	}
	
	if(from_date!='' && to_date!='' && hotel!='')
	{
	$.ajax({
		type: 'post',
		url : baseurl+"report/amend_online/"+from_date+"/"+to_date+"/"+hotel+"/"+b_num,
		success:function(res)
		{
			$('.online_report').html(res);
			if(b_num!='undefined') {
	$('#b_num').focus();
	$('#b_num').val(b_num);
			}
			else
			{
				$('#b_num').focus();
			}
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var from = $('#sandbox-container-frm input').datepicker({
	format: 'yyyy-mm-dd',autoclose: true ,
    //beforeShowDay: function(date) {
    //    return date.valueOf() < now.valueOf() ? 'disabled' : '';
    //}
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > to.viewDate.valueOf()){
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        to.setDate(newDate);		
    }
    else {
        to.setDate();
    }
    
    from.hide();
    $('#sandbox-container-to input')[0].focus();
}).data('datepicker');

var to = $('#sandbox-container-to input').datepicker({
	format: 'yyyy-mm-dd',autoclose: true ,
    beforeShowDay: function(date) {
        return date.valueOf() <= from.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    to.hide();
}).data('datepicker');
		}
		
	});
	ChangeUrl('Page1', baseurl+'report/amend_online/'+from_date+'/'+to_date+'/'+hotel+"/"+b_num); 
	}
	
		
} */


/* 
function get_reservation_online()
{
	var from_date = $('#from').val();
	var to_date = $('#to').val();
	var hotel = $('#hotel').val();
	var b_num = $('#b_num').val();
	if(!b_num) {
		b_num = 'undefined';
	}
	
	if(from_date!='' && to_date!='')
	{
		
	}
	
	
	
} */