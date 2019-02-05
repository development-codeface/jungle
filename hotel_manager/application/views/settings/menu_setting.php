
 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Menu Setting
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Menu Setting
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                
                
     

				
				
				
				
				<div class="row">
					
                    <div class="col-lg-12 col-sm-offset-0">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>  Menu Setting</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                   
                                   	<div class="panel">
                                   		
                                   		 <?php 
                                   		 if($this->session->flashdata('success'))
										 {?>
										 	  
										 		<?php
										 	echo '<div class="alert alert-success ">'.$this->session->flashdata('success').'</div>';
											?>
											
											<?php
										 }
										 if($this->session->flashdata('error'))
										 {?>
										 	  
										 		<?php
										 	echo '<div class="alert alert-danger ">'.$this->session->flashdata('error').'</div>';
											?>
											
											<?php
										 }
										  
										 
		                  				 ?>
					
                          <form method="post" action="" name="change_pass" id="menu_check">
												
												
											<div class="form-group  col-lg-12">
				                               <label class="col-lg-2">User Name</label>
											   <div class="form-group  col-lg-4">
				                               <select name="users" id="users" class="form-control col-lg-6" onchange="user_menu_list();">
											   <option value="">select</option>
											   <?php
											   foreach($users as $staff):
											   ?>
											   <option value="<?php echo $staff->id;?>"><?php echo $staff->name;?></option>
											   <?php
											   endforeach;
											   ?>
											   </select>
											   </div>
				                                  <label class="err"><?php echo form_error('username');?></label>
				                            </div>
				                          
										 
										  
										  	
												<span class=" radio-inline col-md-3">
												<input name="selectall" id="menusetting" type="checkbox" onclick="checkall()">
                         
                          <label class="css-label" for="chk00"> Select all </label></span>
						  
						   <div id="menu_list">
						  <div class="form-group fieldgroup col-lg-12">
				                                <div class="col-lg-12 no_padding_l no_padding_r">
												
												<span class=" radio-inline col-md-3">
                          <input type="checkbox"  id="chk82" class="css-checkbox checkbox_menu" value="1" name="menu[]" >
                          <label class="css-label" for="chk82"> Profile </label></span>
						  
						  <span class=" radio-inline col-md-3">
                          <input id="chk120" class="css-checkbox checkbox_menu" type="checkbox"  value="2"name="menu[]" >
                          <label class="css-label" for="chk120">  Registered Users List</label></span>		

						<span class=" radio-inline col-md-3">
                          <input id="chk121" class="css-checkbox checkbox_menu" type="checkbox"  value="3"name="menu[]" >
                          <label class="css-label" for="chk121">food Plan</label></span>		

						<span class=" radio-inline col-md-3">
                          <input id="chk122" class="css-checkbox checkbox_menu" type="checkbox"  value="4"name="menu[]" >
                          <label class="css-label" for="chk122">  Generate single Coupon</label></span>	
						  
						  	<span class=" radio-inline col-md-3">
                          <input id="chk196" class="css-checkbox checkbox_menu" type="checkbox"  value="51"name="menu[]" >
                          <label class="css-label" for="chk196">  Generate all Coupon</label></span>	
						  
                          <span class=" radio-inline col-md-3">
                          <input type="checkbox"  id="chk83" class="css-checkbox checkbox_menu" value="5" name="menu[]" >
                          <label class="css-label" for="chk83"> Add Room </label></span>
                          
                          <span class="radio-inline col-md-3">
                          <input  type="checkbox" id="chk84" class="css-checkbox checkbox_menu" value="6" name="menu[]">
                           <label class="css-label" for="chk84">Manage Room </label></span>
                           
                          <span class=" radio-inline col-md-3"> 
                          <input id="chk85"  type="checkbox" class="css-checkbox checkbox_menu" value="7" name="menu[]" >
                          <label class="css-label" for="chk85">Edit Room </label></span>
                          
						  <span class=" radio-inline col-md-3"> 
                          <input id="chk86" type="checkbox" class="css-checkbox checkbox_menu"  value="8" name="menu[]">
                          <label class="css-label" for="chk86">Delete Room </label></span>
                         
						  <span  class=" radio-inline col-md-3"> 
                          <input id="chk87" class="css-checkbox checkbox_menu"  type="checkbox"  value="9" name="menu[]">
                          <label class="css-label" for="chk87">Add Room Rate </label></span>
						  
                          <span  class=" radio-inline col-md-3" name="room_ac">
                          <input type="checkbox" id="chk88" class="css-checkbox checkbox_menu"  value="10" name="menu[]">
                          <label class="css-label" for="chk88">manage Room Rate </label></span>
						  
                          <span  class=" radio-inline col-md-3" name="room_iron">
                          <input  id="chk89" class="css-checkbox checkbox_menu" type="checkbox"  value="11" name="menu[]">
                          <label class="css-label" for="chk89"> Edit Room Rate</label></span>
						  
                          <span  class=" radio-inline col-md-3"> 
                          <input id="chk90" class="css-checkbox checkbox_menu" type="checkbox"  value="12" name="menu[]" >
                          <label class="css-label" for="chk90">Delete Room Rate </label></span>
						  
                         <span class=" radio-inline col-md-3"> 
                          <input type="checkbox" id="chk91" class="css-checkbox checkbox_menu"  value="13" name="menu[]" >
                          <label class="css-label" for="chk91">Add Room number</label></span>
						  
                          <span class=" radio-inline col-md-3">
                          <input id="chk92" class="css-checkbox checkbox_menu"  type="checkbox"  value="14" name="menu[]">
                          <label class="css-label" for="chk92">Manage Room Number</label></span>
						  
						    	<span class=" radio-inline col-md-3">
                          <input id="chk197" class="css-checkbox checkbox_menu" type="checkbox"  value="52"name="menu[]" >
                          <label class="css-label" for="chk197">  Edit Room Number</label></span>	
						  
						  
						   <span class=" radio-inline col-md-3">
                          <input id="chk195" class="css-checkbox checkbox_menu" type="checkbox"  value="54" name="menu[]" >
                         <label class="css-label" for="chk195"> Delete Room Number </label></span>
						 
						 
                           <span class=" radio-inline col-md-3">
                          <input id="chk93" class="css-checkbox checkbox_menu" type="checkbox"  value="15" name="menu[]" >
                         <label class="css-label" for="chk93"> Block Room Number</label></span>
						 
						   <span class=" radio-inline col-md-3">
                          <input id="chk199" class="css-checkbox checkbox_menu" type="checkbox"  value="53" name="menu[]" >
                         <label class="css-label" for="chk199"> Block Room Number List</label></span>
						 
						 
						 
						 
						  <span class=" radio-inline col-md-3">
                          <input id="chk131" class="css-checkbox checkbox_menu" type="checkbox"  value="16" name="menu[]" >
                         <label class="css-label" for="chk131">Change Password</label></span>
						 
						 
                        
                          
                          <span class=" radio-inline col-md-3">
                          <input  id="chk96" class="css-checkbox checkbox_menu" type="checkbox"  value="17" name="menu[]">
                          <label class="css-label" for="chk96">Add Package </label></span>
						  
                         <span class=" radio-inline col-md-3">
                          <input id="chk97" class="css-checkbox checkbox_menu" type="checkbox"  value="18" name="menu[]">
                           <label class="css-label" for="chk97"> Manage Package  </label></span>
						   
                          <span class=" radio-inline col-md-3">
                          <input id="chk98" class="css-checkbox checkbox_menu" type="checkbox"  value="19" name="menu[]">
                           <label class="css-label" for="chk98">Edit Package </label></span>
						   
                          <span class=" radio-inline col-md-3">
                          <input id="chk99" class="css-checkbox checkbox_menu" type="checkbox"  value="20" name="menu[]">
                          <label class="css-label" for="chk99">  Delete Package </label></span>
						  
                          <span class=" radio-inline col-md-3">
                          <input id="chk100" class="css-checkbox checkbox_menu" type="checkbox"  value="21" name="menu[]">
                           <label class="css-label" for="chk100"> Add Package Rate  </label></span>
						   
                          <span class=" radio-inline col-md-3">
                          <input id="chk101" class="css-checkbox checkbox_menu" type="checkbox"  value="22" name="menu[]">
                           <label class="css-label" for="chk101"> Manage Package Rate </label></span>
						   
                          <span class=" radio-inline col-md-3">
                          <input id="chk102" class="css-checkbox checkbox_menu" type="checkbox"  value="23" name="menu[]">
                           <label class="css-label" for="chk102"> Edit Package Rate  </label></span>
						   
                          <span class=" radio-inline col-md-3">
                          <input id="chk103" class="css-checkbox checkbox_menu" type="checkbox"  value="24" name="menu[]">
                           <label class="css-label" for="chk103"> Delete Package Rate </label></span>
						   
                         
						   
                          <span class=" radio-inline col-md-3">
                          <input id="chk108" class="css-checkbox checkbox_menu" type="checkbox"  value="25" name="menu[]">
                          <label class="css-label" for="chk108">  Add Agency </label></span>
						  
                          <span class=" radio-inline col-md-3">
                          <input id="chk109" class="css-checkbox checkbox_menu" type="checkbox"  value="26"name="menu[]" >
                          <label class="css-label" for="chk109">  Manage Agency </label></span>
						  
						   <span class=" radio-inline col-md-3">
                          <input id="chk110" class="css-checkbox checkbox_menu" type="checkbox"  value="27"name="menu[]" >
                          <label class="css-label" for="chk110">  Edit Agency </label></span>
						  
						   <span class=" radio-inline col-md-3">
                          <input id="chk111" class="css-checkbox checkbox_menu" type="checkbox"  value="28"name="menu[]" >
                          <label class="css-label" for="chk111">  Delete Agency </label></span>
                     
					 

						<span class=" radio-inline col-md-3">
                          <input id="chk123" class="css-checkbox checkbox_menu" type="checkbox"  value="29"name="menu[]" >
                          <label class="css-label" for="chk123"> Add Hot Deals</label></span>	

						<span class=" radio-inline col-md-3">
                          <input id="chk124" class="css-checkbox checkbox_menu" type="checkbox"  value="30"name="menu[]" >
                          <label class="css-label" for="chk124">Manage Hot Deals</label></span>	

					<span class=" radio-inline col-md-3">
                          <input id="chk125" class="css-checkbox checkbox_menu" type="checkbox"  value="31"name="menu[]" >
                          <label class="css-label" for="chk125"> Edit Hot Deals</label></span>	

						<span class=" radio-inline col-md-3">
                          <input id="chk126" class="css-checkbox checkbox_menu" type="checkbox"  value="32"name="menu[]" >
                          <label class="css-label" for="chk126"> delete Hot Deals</label></span>		

					<span class=" radio-inline col-md-3">
                          <input id="chk127" class="css-checkbox checkbox_menu" type="checkbox"  value="33"name="menu[]" >
                          <label class="css-label" for="chk127"> Add Staff</label></span>		

					<span class=" radio-inline col-md-3">
                          <input id="chk128" class="css-checkbox checkbox_menu" type="checkbox"  value="34"name="menu[]" >
                          <label class="css-label" for="chk128"> Manage Staff</label></span>		

					<span class=" radio-inline col-md-3">
                          <input id="chk129" class="css-checkbox checkbox_menu" type="checkbox"  value="35"name="menu[]" >
                          <label class="css-label" for="chk129"> Edit Staff</label></span>	
						  
					<span class=" radio-inline col-md-3">
                          <input id="chk130" class="css-checkbox checkbox_menu" type="checkbox"  value="36"name="menu[]" >
                          <label class="css-label" for="chk130"> Block Staff</label></span>		




						<span class=" radio-inline col-md-3">
                          <input id="chk104" class="css-checkbox checkbox_menu" type="checkbox"  value="37" name="menu[]">
                           <label class="css-label" for="chk104"> Booking List  </label></span>
						   
                          <span class=" radio-inline col-md-3">
                          <input id="chk105" class="css-checkbox checkbox_menu" type="checkbox"  value="38" name="menu[]v">
                           <label class="css-label" for="chk105"> Checkin List </label></span>
						   
                          <span class=" radio-inline col-md-3">
                          <input id="chk106" class="css-checkbox checkbox_menu" type="checkbox"  value="39" name="menu[]">
                           <label class="css-label" for="chk106"> Arrival List </label></span>
						   
                         <span class=" radio-inline col-md-3">
                          <input id="chk107" class="css-checkbox checkbox_menu" type="checkbox"  value="40" name="menu[]">
                           <label class="css-label" for="chk107"> Checkout List </label></span>			

						   
						      <span class=" radio-inline col-md-3">
                          <input id="chk194" class="css-checkbox checkbox_menu" type="checkbox"  value="55" name="menu[]" >
                         <label class="css-label" for="chk194"> Romm Interchange </label></span>
						 
						 
						     <span class=" radio-inline col-md-3">
                          <input id="chk193" class="css-checkbox checkbox_menu" type="checkbox"  value="56" name="menu[]" >
                         <label class="css-label" for="chk193"> Booking cancel </label></span>
						 
						 
<span class=" radio-inline col-md-3">
                          <input id="chk112" class="css-checkbox checkbox_menu" type="checkbox"  value="41"name="menu[]" >
                          <label class="css-label" for="chk112">  Expected Arrival Report</label></span>
						  
						   <span class=" radio-inline col-md-3">
                          <input id="chk113" class="css-checkbox checkbox_menu" type="checkbox"  value="42"name="menu[]" >
                          <label class="css-label" for="chk113">  Monthly Booking Report</label></span>
                     
					   <span class=" radio-inline col-md-3">
                          <input id="chk114" class="css-checkbox checkbox_menu" type="checkbox"  value="43"name="menu[]" >
                          <label class="css-label" for="chk114">  Booking Report</label></span>
						  
						  <span class=" radio-inline col-md-3">
                          <input id="chk115" class="css-checkbox checkbox_menu" type="checkbox"  value="44"name="menu[]" >
                          <label class="css-label" for="chk115">  Checkin/Checkout Report </label></span>
						  
						  <span class=" radio-inline col-md-3">
                          <input id="chk116" class="css-checkbox checkbox_menu" type="checkbox"  value="45"name="menu[]" >
                          <label class="css-label" for="chk116"> No Show List</label></span>


						<span class=" radio-inline col-md-3">
                          <input id="chk117" class="css-checkbox checkbox_menu" type="checkbox"  value="46"name="menu[]" >
                          <label class="css-label" for="chk117">  Amendment List</label></span>

						<span class=" radio-inline col-md-3">
                          <input id="chk118" class="css-checkbox checkbox_menu" type="checkbox"  value="47"name="menu[]" >
                          <label class="css-label" for="chk118">  Cancellation List</label></span>	

						<span class=" radio-inline col-md-3">
                          <input id="chk119" class="css-checkbox checkbox_menu" type="checkbox"  value="48"name="menu[]" >
                          <label class="css-label" for="chk119">   Booking Edit</label></span>		


						<span class=" radio-inline col-md-3">
                          <input id="chk94" class="css-checkbox checkbox_menu" type="checkbox"  value="49" name="menu[]">
                          <label class="css-label" for="chk94"> Room Chart </label></span>
						  
                           <span class=" radio-inline col-md-3">
                          <input id="chk95" type="checkbox"  value="50"  class="css-checkbox checkbox_menu" name="menu[]">
                          <label class="css-label" for="chk95"> Offline booking  </label></span>		

							<span class=" radio-inline col-md-3">
                          <input id="chk192" class="css-checkbox checkbox_menu" type="checkbox"  value="57" name="menu[]" >
                         <label class="css-label" for="chk192"> Promotion </label></span>						  
					  
					  </div>
					  
                      </div>
				                            </div>
				                            
				                            
 														
											<div class="form-group col-lg-12">
											<div class="form-group col-lg-4">
											</div>
												<button type="submit" class="btn btn-success" name="submit" id="submit-button">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
											
				
				                        </form>
				                       
                                   	</div>
                                    
                                </div>
                                <div class="text-right">
                                    <!-- <a href="administrator.php?option=manage_model">Back <i class="fa fa-arrow-circle-left"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                  
                    
                </div>
                <!-- /.row -->
				


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
	


