
     

				
				
                       
										  <?php
									$users_menu = 	json_decode($user_menu);
								
									 ?>										  	
										
						 	
						  
						  <div class="form-group fieldgroup col-lg-12">
				                                <div class="col-lg-12 no_padding_l no_padding_r">
												
												<span class=" radio-inline col-md-3">
                          <input type="checkbox"  id="chk82" class="css-checkbox checkbox_menu" <?php if(!empty($users_menu)){ if(in_array('1', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="1" name="menu[]" >
                          <label class="css-label" for="chk82"> Profile </label></span>
						  
						  <span class=" radio-inline col-md-3">
                          <input id="chk120" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('2', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="2"name="menu[]" >
                          <label class="css-label" for="chk120">  Registered Users List</label></span>		

						<span class=" radio-inline col-md-3">
                          <input id="chk121" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('3', $users_menu)=='1'){ ?> checked="checked" <?php } } ?>  value="3"name="menu[]" >
                          <label class="css-label" for="chk121">food Plan</label></span>		

						<span class=" radio-inline col-md-3">
                          <input id="chk122" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('4', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="4"name="menu[]" >
                          <label class="css-label" for="chk122">  Generate single Coupon</label></span>	
						  
						    	<span class=" radio-inline col-md-3">
                          <input id="chk196" class="css-checkbox checkbox_menu" type="checkbox"  <?php if(!empty($users_menu)){ if(in_array('51', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="51"name="menu[]" >
                          <label class="css-label" for="chk196">  Generate all Coupon</label></span>	
						  
                          <span class=" radio-inline col-md-3">
                          <input type="checkbox"  id="chk83" class="css-checkbox checkbox_menu" <?php if(!empty($users_menu)){ if(in_array('5', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="5" name="menu[]" >
                          <label class="css-label" for="chk83"> Add Room </label></span>
                          
                          <span class="radio-inline col-md-3">
                          <input  type="checkbox" id="chk84" class="css-checkbox checkbox_menu" <?php if(!empty($users_menu)){ if(in_array('6', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="6" name="menu[]">
                           <label class="css-label" for="chk84">Manage Room </label></span>
                           
                          <span class=" radio-inline col-md-3"> 
                          <input id="chk85"  type="checkbox" class="css-checkbox checkbox_menu" <?php if(!empty($users_menu)){ if(in_array('7', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="7" name="menu[]" >
                          <label class="css-label" for="chk85">Edit Room </label></span>
                          
						  <span class=" radio-inline col-md-3"> 
                          <input id="chk86" type="checkbox" class="css-checkbox checkbox_menu" <?php if(!empty($users_menu)){ if(in_array('8', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="8" name="menu[]">
                          <label class="css-label" for="chk86">Delete Room </label></span>
                         
						  <span  class=" radio-inline col-md-3"> 
                          <input id="chk87" class="css-checkbox checkbox_menu"  type="checkbox" <?php if(!empty($users_menu)){ if(in_array('9', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="9" name="menu[]">
                          <label class="css-label" for="chk87">Add Room Rate </label></span>
						  
                          <span  class=" radio-inline col-md-3" name="room_ac">
                          <input type="checkbox" id="chk88" class="css-checkbox checkbox_menu" <?php if(!empty($users_menu)){ if(in_array('10', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="10" name="menu[]">
                          <label class="css-label" for="chk88">manage Room Rate </label></span>
						  
                          <span  class=" radio-inline col-md-3" name="room_iron">
                          <input  id="chk89" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('11', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="11" name="menu[]">
                          <label class="css-label" for="chk89"> Edit Room Rate</label></span>
						  
                          <span  class=" radio-inline col-md-3"> 
                          <input id="chk90" class="css-checkbox checkbox_menu" type="checkbox"  <?php if(!empty($users_menu)){ if(in_array('12', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="12" name="menu[]" >
                          <label class="css-label" for="chk90">Delete Room Rate </label></span>
						  
                         <span class=" radio-inline col-md-3"> 
                          <input type="checkbox" id="chk91" class="css-checkbox checkbox_menu" <?php if(!empty($users_menu)){ if(in_array('13', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="13" name="menu[]" >
                          <label class="css-label" for="chk91">Add Room number</label></span>
						  
                          <span class=" radio-inline col-md-3">
                          <input id="chk92" class="css-checkbox checkbox_menu"  type="checkbox" <?php if(!empty($users_menu)){ if(in_array('14', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="14" name="menu[]">
                          <label class="css-label" for="chk92">Manage Room Number</label></span>
						  
						    	<span class=" radio-inline col-md-3">
                          <input id="chk197" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('52', $users_menu)=='1'){ ?> checked="checked" <?php } } ?>   value="52"name="menu[]" >
                          <label class="css-label" for="chk197">  Edit Room Number</label></span>	
						  
						     <span class=" radio-inline col-md-3">
                          <input id="chk195" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('54', $users_menu)=='1'){ ?> checked="checked" <?php } } ?>  value="54" name="menu[]" >
                         <label class="css-label" for="chk195"> Delete Room Number </label></span>
						 
                           <span class=" radio-inline col-md-3">
                          <input id="chk93" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('15', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="15" name="menu[]" >
                         <label class="css-label" for="chk93"> Block Room Number</label></span>
						 
						   <span class=" radio-inline col-md-3">
                          <input id="chk199" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('53', $users_menu)=='1'){ ?> checked="checked" <?php } } ?>  value="53" name="menu[]" >
                         <label class="css-label" for="chk199"> Block Room Number List</label></span>
						 
						 
						  <span class=" radio-inline col-md-3">
                          <input id="chk131" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('16', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="16" name="menu[]" >
                         <label class="css-label" for="chk131">Change Password</label></span>
						 
						 
                        
                          
                          <span class=" radio-inline col-md-3">
                          <input  id="chk96" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('17', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="17" name="menu[]">
                          <label class="css-label" for="chk96">Add Package </label></span>
						  
                         <span class=" radio-inline col-md-3">
                          <input id="chk97" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('18', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="18" name="menu[]">
                           <label class="css-label" for="chk97"> Manage Package  </label></span>
						   
                          <span class=" radio-inline col-md-3">
                          <input id="chk98" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('19', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="19" name="menu[]">
                           <label class="css-label" for="chk98">Edit Package </label></span>
						   
                          <span class=" radio-inline col-md-3">
                          <input id="chk99" class="css-checkbox checkbox_menu" type="checkbox"  <?php if(!empty($users_menu)){ if(in_array('20', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="20" name="menu[]">
                          <label class="css-label" for="chk99">  Delete Package </label></span>
						  
                          <span class=" radio-inline col-md-3">
                          <input id="chk100" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('21', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="21" name="menu[]">
                           <label class="css-label" for="chk100"> Add Package Rate  </label></span>
						   
                          <span class=" radio-inline col-md-3">
                          <input id="chk101" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('22', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="22" name="menu[]">
                           <label class="css-label" for="chk101"> Manage Package Rate </label></span>
						   
                          <span class=" radio-inline col-md-3">
                          <input id="chk102" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('23', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="23" name="menu[]">
                           <label class="css-label" for="chk102"> Edit Package Rate  </label></span>
						   
                          <span class=" radio-inline col-md-3">
                          <input id="chk103" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('24', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="24" name="menu[]">
                           <label class="css-label" for="chk103"> Delete Package Rate </label></span>
						   
                         
						   
                          <span class=" radio-inline col-md-3">
                          <input id="chk108" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('25', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="25" name="menu[]">
                          <label class="css-label" for="chk108">  Add Agency </label></span>
						  
                          <span class=" radio-inline col-md-3">
                          <input id="chk109" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('26', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="26"name="menu[]" >
                          <label class="css-label" for="chk109">  Manage Agency </label></span>
						  
						   <span class=" radio-inline col-md-3">
                          <input id="chk110" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('27', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="27"name="menu[]" >
                          <label class="css-label" for="chk110">  Edit Agency </label></span>
						  
						   <span class=" radio-inline col-md-3">
                          <input id="chk111" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('28', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="28"name="menu[]" >
                          <label class="css-label" for="chk111">  Delete Agency </label></span>
                     
					 

						<span class=" radio-inline col-md-3">
                          <input id="chk123" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('29', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="29"name="menu[]" >
                          <label class="css-label" for="chk123"> Add Hot Deals</label></span>	

						<span class=" radio-inline col-md-3">
                          <input id="chk124" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('30', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="30"name="menu[]" >
                          <label class="css-label" for="chk124">Manage Hot Deals</label></span>	

					<span class=" radio-inline col-md-3">
                          <input id="chk125" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('31', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="31"name="menu[]" >
                          <label class="css-label" for="chk125"> Edit Hot Deals</label></span>	

						<span class=" radio-inline col-md-3">
                          <input id="chk126" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('32', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="32"name="menu[]" >
                          <label class="css-label" for="chk126"> delete Hot Deals</label></span>		

					<span class=" radio-inline col-md-3">
                          <input id="chk127" class="css-checkbox checkbox_menu" type="checkbox"  <?php if(!empty($users_menu)){ if(in_array('33', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="33"name="menu[]" >
                          <label class="css-label" for="chk127"> Add Staff</label></span>		

					<span class=" radio-inline col-md-3">
                          <input id="chk128" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('34', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="34"name="menu[]" >
                          <label class="css-label" for="chk128"> Manage Staff</label></span>		

					<span class=" radio-inline col-md-3">
                          <input id="chk129" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('35', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="35"name="menu[]" >
                          <label class="css-label" for="chk129"> Edit Staff</label></span>	
						  
					<span class=" radio-inline col-md-3">
                          <input id="chk130" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('36', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="36"name="menu[]" >
                          <label class="css-label" for="chk130"> Block Staff</label></span>		




						<span class=" radio-inline col-md-3">
                          <input id="chk104" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('37', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="37" name="menu[]">
                           <label class="css-label" for="chk104"> Booking List  </label></span>
						   
                          <span class=" radio-inline col-md-3">
                          <input id="chk105" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('38', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="38" name="menu[]v">
                           <label class="css-label" for="chk105"> Checkin List </label></span>
						   
                          <span class=" radio-inline col-md-3">
                          <input id="chk106" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('39', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="39" name="menu[]">
                           <label class="css-label" for="chk106"> Arrival List </label></span>
						   
                         <span class=" radio-inline col-md-3">
                          <input id="chk107" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('40', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="40" name="menu[]">
                           <label class="css-label" for="chk107"> Checkout List </label></span>			

						      
						      <span class=" radio-inline col-md-3">
                          <input id="chk194" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('55', $users_menu)=='1'){ ?> checked="checked" <?php } } ?>  value="55" name="menu[]" >
                         <label class="css-label" for="chk194"> Romm Interchange </label></span>
						 
						  
						     <span class=" radio-inline col-md-3">
                          <input id="chk193" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('56', $users_menu)=='1'){ ?> checked="checked" <?php } } ?>  value="56" name="menu[]" >
                         <label class="css-label" for="chk193"> Booking cancel </label></span>
						 
					<span class=" radio-inline col-md-3">
                          <input id="chk112" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('41', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="41"name="menu[]" >
                          <label class="css-label" for="chk112">  Expected Arrival Report</label></span>
						  
						   <span class=" radio-inline col-md-3">
                          <input id="chk113" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('42', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="42"name="menu[]" >
                          <label class="css-label" for="chk113">  Monthly Booking Report</label></span>
                     
					   <span class=" radio-inline col-md-3">
                          <input id="chk114" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('43', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="43"name="menu[]" >
                          <label class="css-label" for="chk114"> Booking Report</label></span>
						  
						  <span class=" radio-inline col-md-3">
                          <input id="chk115" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('44', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="44"name="menu[]" >
                          <label class="css-label" for="chk115">  Checkin/Checkout Report</label></span>
						  
						  <span class=" radio-inline col-md-3">
                          <input id="chk116" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('45', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="45"name="menu[]" >
                          <label class="css-label" for="chk116">  No show Report</label></span>


						<span class=" radio-inline col-md-3">
                          <input id="chk117" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('46', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="46"name="menu[]" >
                          <label class="css-label" for="chk117"> Amendment List</label></span>

						<span class=" radio-inline col-md-3">
                          <input id="chk118" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('47', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="47"name="menu[]" >
                          <label class="css-label" for="chk118">  Cancellation List</label></span>	

						<span class=" radio-inline col-md-3">
                          <input id="chk119" class="css-checkbox checkbox_menu" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('48', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="48"name="menu[]" >
                          <label class="css-label" for="chk119">   Booking Edit</label></span>	


						<span class=" radio-inline col-md-3">
                          <input id="chk94" class="css-checkbox checkbox_menu" type="checkbox"  <?php if(!empty($users_menu)){ if(in_array('49', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="49" name="menu[]">
                          <label class="css-label" for="chk94"> Room Chart </label></span>
						  
                           <span class=" radio-inline col-md-3">
                          <input id="chk95" type="checkbox" <?php if(!empty($users_menu)){ if(in_array('50', $users_menu)=='1'){ ?> checked="checked" <?php } } ?> value="50"  class="css-checkbox checkbox_menu" name="menu[]">
                          <label class="css-label" for="chk95"> Offline booking  </label></span>						  
					
						<span class=" radio-inline col-md-3">
                          <input id="chk192" class="css-checkbox checkbox_menu" <?php if(!empty($users_menu)){ if(in_array('57', $users_menu)=='1'){ ?> checked="checked" <?php } } ?>  type="checkbox"  value="57" name="menu[]" >
                         <label class="css-label" for="chk192"> Promotion </label></span>		
				                            
 														
								
                    
                  
         