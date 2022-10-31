<?php 
	require('PHPMailer/PHPMailerAutoload.php'); 
	require('credential.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
		<link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<link type="text/css" rel="stylesheet" href="css/accountbtn.css"/>
        <link type="text/css" rel="stylesheet" href="css/custom.css"/>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			
<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
html,body{
    background: #0e0f0f;
    /* #E8E8E8 */
    font-family: 'Poppins', sans-serif;
    overflow-y: hidden; 
    overflow-x: hidden;
}
.container{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: .9;

}
.container .form{
    background: #fff;
    padding: 30px 35px;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.container .form form .button{
    background: #000;
    color: #fff;
    font-size: 17px;
    font-weight: 200;
    transition: all 0.3s ease;
    border-radius: 7px;
    
}
.container .form form .button:hover{
    background: #30343b;
    text-decoration: none;

}
.btn-danger{
    color: white;
    background: #FF4858;
    font-size: 17px;
    font-weight: 200;
    border-radius: 7px;
    
}
.logo{
    position: relative;
    top: 50%;
    left: 80%;
    transform: translate(-61%, 5%);
    opacity: .4;

}
</style>
</head>
<body>
<div class="logo">
<img src="System Icons\Z-logo white.png" alt="" width="1100" height="800">
</div>				

<?php 
include "db.php";

if(isset($_POST['forget'])){
	
	$email = $_POST['email'];

		$select = "SELECT * FROM user_info WHERE email = '$email'";
		$result = mysqli_query($con,$select);
		$data = mysqli_fetch_array($result);

		$url = 'http://'.$_SERVER['SERVER_NAME'].'/zeroclock-main/forget-password/new-password.php?id='.$data['user_id'].'&email='.$email;                                // Set email format to HTML
		
		$output = '<div>Thanks, Please click this link to change your password <br>'.$url.'</div>';

		if ($result == true) {

			$mail = new PHPMailer();
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  					// Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 		// SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'Localhost');
			$mail->addAddress($email, $data['first_name']);     // Add a recipient
			
			
			
			$mail->isHTML(true);

			$mail->Subject = 'Reset Password';
			$mail->Body    = $output;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				$msg = '<div class="alert alert-success">Congratulation, Your forget password send to your mail. please change your password.</div>';
			}
		}
}

?>
    <div class="container">
        <?php if (isset($msg)) { echo $msg; } ?>
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
             <br><form action="" method="POST">
                
					<h4 class="text-center"> Forgot Password</h4>
                    <br><p>Enter your email address:</p>
                    
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email" required>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="forget" value="Continue">
                    </div>
                    <div class="form-group"><a href="index.php" class="form-control btn-danger">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Cancel
                    </a></div>
                </form>
            </div>
        </div>
    </div>

    
</body>
</html>