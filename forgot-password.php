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

<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
html,body{
    background: #0e0f0f;
    font-family: 'Poppins', sans-serif;
}
.container{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.container .form{
    background: #fff;
    padding: 30px 35px;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.container .form form .button{
    background: #474c54;
    color: #fff;
    font-size: 17px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.container .form form .button:hover{
    background: #30343b;
    text-decoration: none;
}
</style>
</head>
<body>

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
                <form action="" method="POST">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
                    
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="forget" value="Continue">
                    </div>
                    <div class="form-group"><a href="index.php" class="form-control button">
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