$('.user_status').change(function()
	{
		var status = $('input:radio[name=status]:checked').val();
		
			$.ajax({
				type: "post",
				url: baseurl+"users/user_status/"+status,
				data: {status : status},
				success:function(res)
				{
					
					var result = res.split("|");
					$('#users').html(result[0]);
					$('#page').html(result[1]);
					ChangeUrl('Page1', baseurl+'users/users_status/'+status); 
					
				}
				
			});
		
		
});

function ChangeUrl(title, url) {
		    if (typeof (history.pushState) != "undefined") {
		        var obj = { Title: title, Url: url };
		        history.pushState(obj, obj.Title, obj.Url);
		    } else {
		        alert("Browser does not support HTML5.");
		    }
		
		}



 $('#menusetting').on('click',function(){
		 
         if(this.checked){
            $('.checkbox_menu').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox_menu').each(function(){
                this.checked = false;
            });
        } 
    });
    
     $('.checkbox_menu').on('click',function(){
        if($('.checkbox_menu:checked').length == $('.checkbox_menu').length){
            $('#menusetting').prop('checked',true);
        }else{
            $('#menusetting').prop('checked',false);
        }
    }); 
	
	
	
	
function user_menu_list() {
		
		var users = $("#users").val();
		
		if(users!=='')
		{
			$.ajax({
				type: "post",
				url: baseurl+"settings/user_menu/"+users,
				data: {users : users},
				success:function(res)
				{
					$("#menu_list").html(res);
				}
				
			});
		}
		else
		{
				$("#menu_list").html('Select Staff');
		}
			
			
		/*  $.post("phpfiles/administrator/menu_list.php", {
			sub2 : s1
		}, function(data) {
			$("#menu_list").html(data);
		});  */
	}
	
	
	
		
	function select_logintype()
	{
		var log_type = $("input[name=login_type]:checked").val();
		
		if(log_type=="hotel")
		{			
			$('#user_type').css('display','block');
			$('#hotels_number').show();
			$('#hotel_number').val('');
			
		}
		else
		{
			$('#user_type').css('display','none');
			$('#hotels_number').hide();
			$('#hotel_number').val('00');
		}
		
		
	}
	
	