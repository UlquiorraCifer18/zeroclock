<?php
$success = "";
$error_message = "";
$conn = mysqli_connect("localhost","root","","ecommerce");
if(!empty($_POST["submit_email"])) {
	$result = mysqli_query($conn,"SELECT * FROM user_info_backup WHERE email='" . $_POST["email"] . "'");
	$count  = mysqli_num_rows($result);
	if($count>0) {
		// generate OTP
		$otp = rand(100000,999999);
		// Send OTP
		require_once("mail_function.php");
		$mail_status = sendOTP($_POST["email"],$otp);
		
		if($mail_status == 1) {
			$result = mysqli_query($conn,"INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
			$current_id = mysqli_insert_id($conn);
			if(!empty($current_id)) {
				$success=1;
			}
		}
	} else {
		$error_message = "Email not exists!";
	}
}
if(!empty($_POST["submit_otp"])) {
	$result = mysqli_query($conn,"SELECT * FROM otp_expiry WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
	$count  = mysqli_num_rows($result);
	if(!empty($count)) {
		$result = mysqli_query($conn,"UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
		$success = 2;	
	} else {
		$success =1;
		$error_message = "Invalid OTP!";
	}	
}
?>


<div class="wait overlay">
        <div class="loader"></div>
    </div>
    <style>
    .input-borders{
        border-radius:30px;
    }
    </style>




<?php 
			if(!empty($success == 1)) { 
		?>
		<div class="tableheader">Enter OTP</div>
		<p style="color:#31ab00;">Check your email for the OTP</p>
			
		<div class="tablerow">
			<input type="text" name="otp" placeholder="One Time Password" class="login-input" required>
		</div>
		<!-- next btn+ -->
		<div class="tableheader"><input type="submit" name="submit_otp" value="Submit" class="btnSubmit"></div>
		<?php 
			} else if ($success == 2) {
        ?>
		<p style="color:#31ab00;">Welcome, You have successfully logged in!</p>
		<?php
			}
			else {
		?>
				
                <div class="container-fluid">
					
						
						
						<!-- /Billing Details -->
						
								<form id="signup_form" onsubmit="return false" class="login100-form" method="post" action="">
									<div class="billing-details jumbotron" style="font-size: 10px; margin-top: -10px; height: 85vh;">
                                    <div class="section-title">
                                        <h2 class="login100-form-title p-b-25" style="font-family: 'Archivo Black'; margin-top: -50px; font-size: 20px;">Register Here</h2>
                                    </div>
                                    <div class="form-group " style="font-size: 10px; margin-top: -20px;">
                                    
                                        <input class="input form-control input-borders" type="text" name="f_name" id="f_name" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                    
                                        <input class="input form-control input-borders" type="text" name="l_name" id="l_name" placeholder="Last Name">
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="email" name="email"  placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="password" name="password" id="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="password" name="repassword" id="repassword" placeholder="Confirm password">
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="text" name="mobile" id="mobile" placeholder="Contact Number">
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="text" name="address1" id="address1" placeholder="Address">
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="text" name="address2" id="address2" placeholder="City">
                                    </div>
                                    
                                    
                                    <div class="form-group text-center">
                                       <input class="primary-btn btn-block"  value="Sign Up" type="submit" name="submit_email" style="width: 150px;"><br><br>
                                       <a href="" data-toggle="modal" data-target="#Modal_login" style="color: red;">Already have an Account? Then login</a>
                                    </div>
                                    <div class="form-group text-pad text-center">
                                    
                                       
                                    </div>
        <?php 
			}
		?>
                                
								</form>
                                <div class="login-marg">
						<!-- Billing Details -->
						<div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8" id="signup_msg">
                                    

                                </div>
                                <!--Alert from signup form-->
                            </div>
                            <div class="col-md-2"></div>
                        </div>

						
					</div>
                    </div> 

					
				
				<!-- /row -->

			