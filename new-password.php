<?php 
include "db.php";

if(isset($_POST['forget'])){
	
	//$id = $_GET['user_id'];
	$email = $_GET['email'];

	$newPass = $_POST['newPass'];
	$rePass = $_POST['rePass'];
	//$oldPass = $_POST['oldPass'];

	$select = "SELECT * FROM user_info WHERE email = '$email'";
	$result = mysqli_query($con,$select);
	$count = mysqli_num_rows($result);
	$data = mysqli_fetch_array($result);

    
        if ($newPass == $rePass) {
            
            if ($count == 1) {
                if(strlen($newPass) < 9 || strlen($rePass) < 9){
                    $msg = '<div class="alert alert-danger">Password must contain atleast 9 characters or more!</div>';
                }else{
                if ($newPass !== $rePass) {
                    $msg = '<div class="alert alert-danger">password and retype password not match</div>';
                }else{
                    $update = "UPDATE user_info SET password = '$rePass' WHERE email = '$email'";
                    $query = mysqli_query($con,$update);
					if ($query) {
                        $msg = '<div class="alert alert-success">Password change successful. you can log in now</div>';
					}else{
                        $ErrorMsg = '<div class="alert alert-danger">Password change failed</div>';
					}
                }
				}
			}else{
                $ErrorMsg = '<div class="alert alert-danger">you have no email this username</div>';
			}
            
		}else{
            $ErrorMsg = '<div class="alert alert-danger">Your password does not match!</div>';
		
    }
    

}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
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
    <div class="container">
    <?php if (isset($msg)) { echo $msg; }  ?>
		<?php if (isset($ErrorMsg)) { echo $ErrorMsg; } ?>
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="" method="POST">
                    <h2 class="text-center">New Password</h2>
                    
                    <div class="form-group">
                        <input class="form-control" type="password" name="newPass" placeholder="Create new password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="rePass" placeholder="Confirm your password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="forget" value="Change">
                    </div>
                </form>
                <form action="../index.php" method="POST">
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login-now" value="Login Now">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>