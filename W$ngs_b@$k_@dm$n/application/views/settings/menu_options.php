										  <?php
									$users_menu = 	json_decode($user_menu);
								
									 ?>	

<div class="container-fluid hotel_fac">

                      <h4>Hotels</h4>
                      <div class="col-lg-12">
					  
                          <span class="radio-inline  col-md-2">
                          <input value="1" id="hotel_view" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('1', $users_menu)=='1') echo 'checked'; ?>>
                         <label> View</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="2" id="hotel_add" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('2', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Add</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="3" id="hotel_edit" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('3', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Edit</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="4" id="hotel_delete" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('4', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Delete</label></span>
					  
                          <span class="radio-inline  col-md-3">
                          <input value="5" id="hotel_login" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('5', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Direct Login</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="6" id="hotel_block" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('6', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Block</label></span>
					  
                          <span class="radio-inline  col-md-3">
                          <input value="7" id="hotel_set_access" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('7', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Set Access Options</label></span>
					  
                          <span class="radio-inline  col-md-3">
                          <input value="8" id="hotel_view_access" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('8', $users_menu)=='1') echo 'checked'; ?>>
                         <label> View Access Options</label></span>
                      </div>
                    </div>  
                 
                    	<div class="container-fluid hotel_fac">

                      <h4>Packages</h4>
                      <div class="col-lg-12">
					  
                          <span class="radio-inline  col-md-2">
                          <input value="9" id="package_view" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('9', $users_menu)=='1') echo 'checked'; ?>>
                         <label> View</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="10" id="package_add" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('10', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Add</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="11" id="package_edit" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('11', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Edit</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="12" id="package_delete" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('12', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Delete</label></span>
					  
                          <span class="radio-inline  col-md-3">
                          <input value="13" id="package_view_booking" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('13', $users_menu)=='1') echo 'checked'; ?>>
                         <label> View bookings</label></span>
                      </div>
                    </div>  
                 
                    	<div class="container-fluid hotel_fac">

                      <h4>Travels</h4>
                      <div class="col-lg-12">
					  
                          <span class="radio-inline  col-md-2">
                          <input value="14" id="travels_view" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('14', $users_menu)=='1') echo 'checked'; ?>>
                         <label> View</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="15" id="travels_add" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('15', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Add</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="16" id="travels_edit" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('16', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Edit</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="17" id="travels_delete" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('17', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Delete</label></span>
                      </div>
                    </div> 
                 
                    	<div class="container-fluid hotel_fac">

                      <h4>Users</h4>
                      <div class="col-lg-12">
					  
                          <span class="radio-inline  col-md-2">
                          <input value="18" id="user_reg" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('18', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Registered</label></span>
					  
                          <span class="radio-inline  col-md-3">
                          <input value="19" id="user_contact" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('19', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Contact Form</label></span>
					  
                          <span class="radio-inline  col-md-4">
                          <input value="20" id="user_news" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('20', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Newsletter Subscribers</label></span>
                      </div>
                    </div> 
                 
                    	<div class="container-fluid hotel_fac">

                      <h4>Reports</h4>
                      <div class="col-lg-12">
					  
                          <span class="radio-inline  col-md-2">
                          <input value="21" id="hotel_report" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('21', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Hotels</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="22" id="log_report" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('22', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Hotel Logs</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="23" id="bookings_report" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('23', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Bookings</label></span>
					  
                          <span class="radio-inline  col-md-3">
                          <input value="24" id="reservations_report" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('24', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Reservations</label></span>
						 
                          <span class="radio-inline  col-md-3">
                          <input value="25" id="amend_report" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('25', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Amendments</label></span>
						 
                          <span class="radio-inline  col-md-3">
                          <input value="42" id="cancel_report" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('42', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Cancellations</label></span>
                      </div>
                    </div> 
                 
                    	<div class="container-fluid hotel_fac">

                      <h4>Transactions</h4>
                      <div class="col-lg-12">
					  
                          <span class="radio-inline  col-md-3">
                          <input value="26" id="set_comm" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('26', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Set commission</label></span>
					  
                          <span class="radio-inline  col-md-3">
                          <input value="27" id="comm_view" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('27', $users_menu)=='1') echo 'checked'; ?>>
                         <label> View commission</label></span>
					  
                          <span class="radio-inline  col-md-3">
                          <input value="28" id="comm_report" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('28', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Commission report</label></span>
					  
                          <span class="radio-inline  col-md-3">
                          <input value="29" id="coupon_view" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('29', $users_menu)=='1') echo 'checked'; ?>>
                         <label> View Coupons</label></span>
						 
                          <span class="radio-inline  col-md-3">
                          <input value="30" id="coupon_add" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('30', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Generate Coupon</label></span>
					  
                          <span class="radio-inline  col-md-3">
                          <input value="31" id="coupon_edit" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('31', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Edit Coupons</label></span>
					  
                          <span class="radio-inline  col-md-3">
                          <input value="32" id="coupon_delete" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('32', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Delete Coupons</label></span>
                      </div>
                    </div> 
                 
                    	<div class="container-fluid hotel_fac">

                      <h4>Groups</h4>
                      <div class="col-lg-12">
					  
                          <span class="radio-inline  col-md-2">
                          <input value="33" id="group_view" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('33', $users_menu)=='1') echo 'checked'; ?>>
                         <label> View</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="34" id="group_add" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('34', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Add</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="35" id="group_edit" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('35', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Edit</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="36" id="group_block" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('36', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Block</label></span>
                      </div>
                    </div>
                 
                    	<div class="container-fluid hotel_fac">

                      <h4>Settings</h4>
                      <div class="col-lg-12">
					  
                          <span class="radio-inline  col-md-2">
                          <input value="37" id="view_staff" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('37', $users_menu)=='1') echo 'checked'; ?>>
                         <label> View Staff</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="38" id="add_staff" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('38', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Add Staff</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="39" id="edit_staff" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('39', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Edit Staff</label></span>
					  
                          <span class="radio-inline  col-md-2">
                          <input value="40" id="delete_staff" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('40', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Delete Staff</label></span>
						 
                          <!--<span class="radio-inline  col-md-3">
                          <input value="41" id="set_perm" name="menu[]" type="checkbox" <?php if(!empty($users_menu) && in_array('41', $users_menu)=='1') echo 'checked'; ?>>
                         <label> Set Permissions</label></span>-->
                      </div>
                    </div> 