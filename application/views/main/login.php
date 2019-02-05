


<!-- Login Modal >> -->
<div class="modal in" id="login_model" role="dialog">
	<div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header login_header">
          <button type="button" class="close login_close" data-dismiss="modal">&times;</button>
          	Sign In
        </div>
        <div class="modal-body login_form">
          
          	
          	<h3>Sign In Using Your Registered Emailid</h3>
          	
          	
           <form method="post" action="<?php echo base_url();?>user" name="login_form" id="login_form">
        	<div class="row">
        		<div class="col-md-8 col-md-offset-2">
        			
        			<div class="form-group form_login">
						<input type="text" class="form-control" id="login_email" name="login_email" placeholder="Email Id">
					</div>
					
					<div class="form-group form_login">
						<input type="password" class="form-control" id="login_password" name="login_password" placeholder="Password">
						<div id="login_error"></div>
					</div>
					
					<input type="hidden" name="page" id="page" class="page"/>
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="login" id="login"> SIGN IN </button> 
						
						<p><a data-dismiss="modal" href="" data-toggle="modal" data-target="#password_model" >Forgot Password ?</a></p>
					</div>
					
					<br>
					
				</div>
				
		  	</div>
		  	</form>
		  	
		  	
		  	<div class="or">
		  		<span>
		  			OR
		  		</span>
		  	</div>
			
			
			<br>
			
			<div class="row">
				
        		<div class="col-md-6">
          			<a class="btn btn-block btn-social btn-facebook" href="<?php if(!empty($login_fb)) echo $login_fb; ?>">
						<i class="fa fa-facebook"></i> Sign in with Facebook
					</a>
          		</div>
          		
          		<div class="col-md-6">
          			<a class="btn btn-block btn-social btn-google" href="<?php if(!empty($login_google)) echo $login_google; ?>">
						<i class="fa fa-google-plus"></i> Sign in with Google
					</a>
          		</div>
          		
          	</div>
          	
          	<br>

          
        </div>
        <div class="modal-footer login_bottom">
          
          <p>Do not have an account? <a data-dismiss="modal" href="" data-toggle="modal" data-target="#register_model" >Register</a></p>
          
        </div>
      </div>
      
    </div>
</div>
<!-- Login Modal << -->





<!-- Register Modal >> -->
<div class="modal in" id="register_model" role="dialog">
	<div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header login_header">
          <button type="button" class="close login_close" data-dismiss="modal">&times;</button>
          	Sign Up
        </div>
        <div class="modal-body login_form">
          
          	
          	<h3>Create New Account</h3>
          	
          <form method="post" action="" name="register_form" id="register_form">
        	<div class="row">
        		<div class="col-md-8 col-md-offset-2">
        			<div id="sign_in_error"></div>
        			<div class="form-group">
						<input type="text" class="form-control" id="register_email" name="register_email" placeholder="Email Id" onkeyup="email_exists();">
						<div id="email_exist"></div>
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control" id="register_password" name="register_password" placeholder="Password">
					</div>
					<input type="hidden" name="page" id="page" class="page"/>
					
					<div class="form-group">
						<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="register" id="register"> SIGN UP </button>  
					</div>
					
				</div>

		  	</div>
		  	</form>
		  	
		  	<div class="or">
		  		<span>
		  			OR
		  		</span>
		  	</div>
			
			
			<br>
			
			<div class="row">
				
        		<div class="col-md-6">
          			<a class="btn btn-block btn-social btn-facebook" href="<?php if(!empty($login_fb)) echo $login_fb; ?>">
						<i class="fa fa-facebook"></i> Sign in with Facebook
					</a>
          		</div>
          		
          		<div class="col-md-6">
          			<a class="btn btn-block btn-social btn-google" href="<?php if(!empty($login_google)) echo $login_google; ?>">
						<i class="fa fa-google-plus"></i> Sign in with Google
					</a>
          		</div>
          		
          	</div>
          	
          	<br>

          
        </div>
        <div class="modal-footer login_bottom">
          
          <p>Already have an account? <span class="sign_in"><a data-dismiss="modal" href="" data-toggle="modal" data-target="#login_model" >Sign In</a></span></p>
          
        </div>
      </div>
      
    </div>
</div>
<!-- Register Modal << -->



<!-- Forget Passwod Modal >> -->
<div class="modal in" id="password_model" role="dialog">
	<div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header login_header">
          <button type="button" class="close login_close" data-dismiss="modal">&times;</button>
          	Forgot Password
        </div>
        <div class="modal-body login_form">
        	
        	<br>
        	<form method="post" action="<?php echo base_url();?>user" name="forgot_form" id="forgot_form">
        	<div class="row">
        		<div class="col-md-8 col-md-offset-2">
        			<div id="email_sent"></div>
					<div class="form-group">
						<input type="text" class="form-control" id="forgot_email" name="forgot_email" placeholder="Enter email Id">
						<div id="email_err"></div>
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="forgot" id="forgot"> RESET PASSWORD </button>  
					</div>
					
				</div>

		  	</div>
          	</form>
          	

          
        </div>
        <div class="modal-footer login_bottom">
          
          <p>Already have an account? <a data-dismiss="modal" href="" data-toggle="modal" data-target="#login_model" >Sign In</a></p>
          
        </div>
      </div>
      
    </div>
</div>
<!-- Forget Passwod Modal << -->




