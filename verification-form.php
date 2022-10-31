<!-- Connection -->
<?php
include "db.php";

function check_login($con){
	//CHECKS IF THE USER HAS ALREADY LOGIN
		if(isset($_SESSION['uid'])){
	
			$id = $_SESSION['uid'];
			$query = "select * from user_info_backup where user_id = '$id' limit 1";
	
			$result = mysqli_query($con,$query);
	
			if($result && mysqli_num_rows($result)>0){
	
				$user_data = mysqli_fetch_assoc($result);
				return $user_data;
			}
		}
		die;
	}

?>

<!-- Code for sending OTP-->
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
		$error_message = "Email does not exists!";
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


<html>
<head>
<title>User Login</title>
<!-- Linking -->
<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/Material+Icons.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Zero O'Clock Prints</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Nunito&family=Orbitron&display=swap" rel="stylesheet">
		<link href="http://fonts.cdnfonts.com/css/digital-7-mono" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
		
		
		
		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<link type="text/css" rel="stylesheet" href="css/accountbtn.css"/>
    <link type="text/css" rel="stylesheet" href="css/custom.css"/>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style>


.message {
	width: 100%;
    max-width: 300px;
    padding: 10px 30px;
    border-radius: 4px;
    margin-bottom: 5px;    
}
.login-input {
	border: #CCC 1px solid;
    padding: 10px 20px;
	border-radius:4px;
}

input{
	width: 300px;
}

#navigation {
          background: #FF4E50;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #000, #000);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #000, #000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            
          
        }
        #header {
  
            background: transparent;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, transparent, transparent);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, transparent, transparent); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background-color: black;
  
        }
        #top-header {
              
  
            background: transparent;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, transparent, transparent);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, transparent, transparent); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        }
        #footer {
            background: #E4E7ED;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #E4E7ED, #E4E7ED);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #E4E7ED, #E4E7ED); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


          color: #1E1F29;
        }
        #bottom-footer {
            background: #a9aaac;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #a9aaac, #a9aaac);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #a9aaac, #a9aaac); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
          

        }
        .footer-links li a {
          color: #1E1F29;
        }
        .mainn-raised {
            
            margin: -7px 0px 0px;
            border-radius: 6px;
            box-shadow: 0 8px 12px 2px rgba(0, 0, 0, 0.14), 0 6px 7px 5px rgba(0, 0, 0, 0.12), 0 4px 5px -5px rgba(0, 0, 0, 0.2);

        }
       
        .glyphicon{
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    }
    .glyphicon-chevron-left:before{
        content:"\f053"
    }
    .glyphicon-chevron-right:before{
        content:"\f054"
    }
	#logbutt{
		color: white;
		background-color: black; 
	}
	#mtitle{
		color: white;
		height: 20px;
		text-align:center;
	}
  #lightbtn{
    color: black;
    background-color: white;
    padding: .85em;
  }

	*{
 margin: 0;
 padding: 0;
 box-sizing: border-box;
}
html{
  scroll-behavior: smooth;
}
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: black; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: black; 
}
#btn{
    position: fixed;
    bottom: 0px;
    right: 15px;
    display: inline-block;
    border-radius: 5%;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    cursor: pointer;
    color: white;
		background-color: black;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
.floating-chat{
    position:absolute;
    text-align:center;
}
.modal{
      position: fixed;
      left: 0;
      right: 0;
      margin: auto;
      overflow: auto;
      display: none;
}
.modal-body {
    word-break: break-all;
}
.personalized a{
  -webkit-user-select: text;
  user-select: text;
  color: black;
}
.personalized a:focus{
  background-color: rgb(0, 0, 0);
}
.personalized a:link{
  text-decoration: none;
  color: rgb(0, 0, 0);
  background-color: transparent;
}
.personalized a:hover{
  color: white;
}
.personalized p:hover{
  background-color: black;
}
.b .btn{
  display: inline-block;
    border-radius: 8px;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    width: 110px;
    font-family: 'Archivo Black';
    margin-left:12px;
    margin-bottom: 2px;
    color: white;
    background-color: black;
}
#b{
  display: inline-block;
    border-radius: 8px;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    width: 110px;
    font-family: 'Archivo Black';
    margin-left:12px;
    margin-bottom: 10px;
    color: white;
    background-color: black;
}
#b2{
  display: inline-block;
    border-radius: 8px;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    width: 110px;
    font-family: 'Archivo Black';
    margin-left:12px;
    margin-bottom: 10px;
}
li{
  font-family: Nunito;
}
.chats{
  position: fixed;
  left: 70em;
  right: 1em;
  margin-top: 18.8em;
  width: 48vmax;
  bottom: 0vmax;
  
}
.chat{
  background-color: black;
  color: white;
  width: 32.6vmax;
  height: auto;
  bottom: 0vmax;
  position: relative;

  
}
.chat input{
	border: 0;
    clip: rect(1px, 1px, 1px, 1px);
    height: 1vh; 
    margin: .1em;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1vh;
}
.chat label {
	display: block;
	width: 45px;
	margin: 0;
	background-color: rgb(255, 255, 255);
	border-radius: 2px;
	font-size: 1em;
	line-height: 2.5em;
	text-align: center;
  color: black;
}
.questions{
  padding: 0;
}

.questions p{
margin: 1.2em;
padding-left: .1em;
padding-right: .1em;
padding-top: .2em;
padding-bottom: .2em;
}
.questions p.solid {
  outline-style: solid;
  border-radius: 3px;
  outline-width: thin;

}
.questions p:hover{
  background-color: #ffffff;
}
.questions a:hover{
  color: #000000;
}
.foot{
  margin: 0;
  padding: 0;
  width: 100%;
  position: absolute;
}
#search{
  border-radius: 20px;
  padding: 7px;
  font-family: Nunito;
}
#search_btn{
  background: none;
  border-style: none;
}
#cl{
  color: white;
  background-color: #e65540;
  border-radius: 90%;
  width: 20px;
  margin-top: 14px;
  margin-right: 8px;
}

#logout{
  margin-top: 15vmax;
  margin-bottom: 15vmax;
}
#checkouts{
  margin-top: 15vmax;
  margin-bottom: 15vmax;
}
.container2{
  margin: 5rem;
}
#navm{
  background-color: black;
  padding: 1em;
  padding-left: 5em;
  padding-right: 5em;
  border-radius: 10px;
  width: 70vw;
  margin-left: 9vw;
}

.nav3>li+li {
  margin-left: 15vw;
}

.nav3>li>a:hover, .nav3>li>a:focus, .nav3>li.active>a {
  color: #edf2f3;  /* fallback for old browsers */


  background-color: transparent;
}

.nav3>li>a:after {
  content: "";
  display: block;
  width: 0%;
  height: 2px;
  background: #eff5f7; 
  background: -webkit-linear-gradient(to right, #e8f3f7, #00B4DB); 
  background: linear-gradient(to right, #ebf9fd, #00B4DB);
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}

.nav3>li>a:hover:after, .nav3>li>a:focus:after, .nav3>li.active>a:after {
  width: 100%;
}
.nav4>li+li {
  margin-left: 15vw;
}

.tablerow { padding:20px; }
.error_message {
	color: #b12d2d;
    background: #ffb5b5;
    border: #c76969 1px solid;
	  padding: 50px;
    margin-left:35%;
    text-align: center;
}
.message {
	width: 100%;
    max-width: 300px;
    padding: 10px 30px;
    border-radius: 4px;
    margin-bottom: 5px;    
}
.login-input {
	border: #CCC 1px solid;
    padding: 10px 20px;
	border-radius:4px;
}

.input-borders{
        border-radius:30px;
    }
    .buttonIn{

    width: 100%;
    position: relative;
    }

    .inside{
    position: absolute;
    top: 0;
    right: 0px;
    z-index: 1;
    border: none;
    top: 0;
    cursor: pointer;
    transform: translateX(2px);
    }

    .inside2{
    position: absolute;
    top: 0;
    right: 0px;
    z-index: 1;
    border: none;
    top: 0;
    cursor: pointer;
    transform: translateX(2px);
    }



    h1 {
      text-align: center;  
    }

    label {
      font-weight: 400px;
      margin-left:10px;
      margin-top:20px;
    }



    /* Mark input boxes that gets an error on validation: */
    input.invalid {
      background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
      display: none;
    }

button {
  border: solid 1px white;
  padding: 10px 20px;
  font-size: 17px;
  cursor: pointer;

  
}

.primary-btn1 {
  padding: 15px;
  background-color: #000000;
  border: none;
  color: #FFF;
  text-transform: uppercase;
  width: 120px;
  font-weight: 600;
  text-align: center;
  border-radius: 20px;
  
}
.primary-btn2 {
  padding: 15px;
  background-color: #000000;
  border: none;
  color: #FFF;
  text-transform: uppercase;
  width: 55px;
  font-weight: 600;
  text-align: center;
  border-radius: 10px;
  
}

.primary-btn1:hover, .primary-btn1:focus {
  opacity: 0.9;
  background-color: white;
  color: #212121;
    border: solid 1px black;
}



#prevBtn {
  background-color: #bbbbbb;
  display: inline-block;
  padding: 7px 20px;
  border: 1px solid black;
  text-transform: uppercase;
  font-weight: 600;
  background-color: #000000;
  text-align: center;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
  border-radius: 10px;
  margin-right: 10px;
}

#prevBtn:hover{
  opacity: 0.9;
  background-color: white;
  color: #212121;
    border: solid 1px black;
}

/* Make circles that indicate the steps of the form: */
.step{
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
  margin-bottom: 30px;
}
.step1{
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #212121;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
  margin-bottom: 30px;
}

.step.active {
  background-color: #212121;
}

/* Mark the steps that are finished and valid: */
.step.finish{
  background-color: #212121;
}



</style>

</head>



<body>
	<!-- Hard Coded HEADER -->
<header>
			<nav class="navbar navbar-default navbar-fixed-top">
			<div id="top-header">
				<div class="container">
				<a href="index.php" class="logo">
								<img src="System Icons\Z-Logo-removebg-preview.png" alt="" width="70" height="50">
									
								</a>
					
					<!-- <ul class="header-links pull-right">
						<li>
            <form class="search" action="searchresult.php" method="get">
              <input type="text" id="search" placeholder="Search.." name="search">
                <button type="submit" id="search_btn"><img src="System Icons\Header\Screenshot_2022-07-04_120919-removebg-preview.png" alt="" width="30" height="24"></button>
            </form>
            
                  </li>

						<li>
            <div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <img src="System Icons\Header\Screenshot_2022-07-04_120952-removebg-preview.png" alt="" width="30" height="24">
										<div class="badge qty" style="background-color :#D10024;">0</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list" id="cart_product" style="color:white;">
										
											
										</div>
										
										<div class="cart-btns">
												<a href="cart.php" style="width:100%;"><i class="fa fa-edit" style="color: black;"></i>Edit your cart</a>
											
										</div>
									</div>
										
									</div>
						</li> 

						<li><?php
                             include "db.php";
                            if(isset($_SESSION["uid"])){
                                $sql = "SELECT first_name FROM user_info WHERE user_id='$_SESSION[uid]'";
                                $query = mysqli_query($con,$sql);
                                $row=mysqli_fetch_array($query);
                                
                                echo '
                               <div class="dropdownn">
                                  <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" style="color: black;"><img src="System Icons\Header\Screenshot_2022-07-04_121012-removebg-preview.png" alt="" width="30" height="24"> Hi '.$row["first_name"].'</a>
                                  <div class="dropdownn-content">
                                    <a href="myprofile.php"><i class="fa fa-user-circle" aria-hidden="true" ></i>My Profile</a>
                                    <a href="myorder.php"><i class="fa fa-shopping-cart" aria-hidden="true" ></i>My Orders</a>
                                    <a href="" data-toggle="modal" data-target="#logout"><i class="fa fa-sign-in" aria-hidden="true"></i>Log out</a>
                                    
                                  </div>
                                </div>';

                            }else{ 
                                echo '
                                <div class="dropdownn">
                                  <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><img src="System Icons\Header\Screenshot_2022-07-04_121012-removebg-preview.png" alt="" width="30" height="24"></a>
                                  <div class="dropdownn-content">
                                    
                                    <a href="" data-toggle="modal" data-target="#Modal_register"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a>
                                    <a href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-user" aria-hidden="true"></i>Login</a>
                                    
                                  </div>
                                </div>';
                                
                            }
                                             ?>
                               
                                </li>	
								</li>			

					</ul> -->
					
				</div>
			</div>
						</nav>
			<div id="header">
				<div class="container">
					<div class="row">
						<div class="col-md-3 clearfix">
							<div class="header-ctn">	
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>e
		</header>



		<section class="section section mainn mainn-raised b"><br><br><br>
		<div class="container-fluid" style="margin-left:400px; margin-right:400px;">
<br><br><br>
    <?php
		if(!empty($error_message)) {
	?>
	<div class="message error_message"><?php echo $error_message; ?></div>
	<?php
		}
	?>



<form name="frmUser" method="post" action="">
		<?php 
			if(!empty($success == 1)) { 

		?>
				<form id="OTP" onsubmit="return false" class="login100-form"><br><br><br>
					<h1 class="" style="font-family: 'Archivo Black'; margin-bottom: 40px; font-size: 20px;">Verification</h1>
                    <h6 class="nav-item">&nbsp;&nbsp; Enter again your Email:  	<br>			
						<div class ="buttonIn">
                        <div class="form-group text-center">
						<input class="input form-control input-borders" type="email" name="email"  placeholder="Check the OTP that was send to your Email.." style="100px;" disabled> 
						<input class="primary-btn btn-block btnSubmit inside2"  value="Send Code" type="submit" name="submit_email" style="width: 150px;" disabled><br><br>
            </div></div></h6>	
					  <input class="input form-control input-borders" type="text" name="otp" placeholder="Enter OTP" class="login-input">
            <br><br><br>
            <p>&nbsp;Generate another OTP available in <span id="counter">60</span>s<br>
            <button class="primary-btn2 pull-left" onClick="resend()" name="resend" id="resend"><i class='material-icons'>send</i></button>  
					  <input type="submit" name="submit_otp" value="Submit" class="btnSubmit primary-btn1 pull-right btnVerify"></div> <br><br><br><br><br><br><br>
				</form>
		<?php 
			} else if ($success == 2) {
        ?>
		<script> location.href='index.php'; </script>
		<?php
			}
			else {

		?>

	
          <form id="signup_form" onsubmit="return false" class="login100-form"><br><br><br>
					<h1 class="" style="font-family: 'Archivo Black'; margin-bottom: 40px; font-size: 20px;">Verification</h1>
                    <h6 class="nav-item">&nbsp;&nbsp; Enter again your Email:  	<br>			
						<div class ="buttonIn">
                        <div class="form-group text-center">
						<input class="input form-control input-borders" type="email" name="email"  placeholder="Email" style="100px;"> 
						<input class="primary-btn btn-block btnSubmit inside2"  value="Send Code" type="submit" name="submit_email" style="width: 150px;"><br><br>
						</div></div></h6>	
					  <input class="input form-control input-borders" type="text" name="otp" placeholder="Enter OTP" class="login-input" disabled>
            <br>
					  <br><br><br><br><br><br><br>

		<?php 
			}
		?>
	</div>
		</div>
		</div>
		</div>
</form>
</div>
</section>


</body>

<script>
function resend(){
  location.reload(true);

    // location.document.getElementById('OTP')
    // document.querySelector('#test').scrollIntoView();
} 

window.onload = function(){
  var i = document.getElementById('counter'),
    sId;

    function countdown() {
        var count = parseInt(i.textContent, 10);
        if (count < 1) {
            clearInterval(id);
        }
        i.textContent = count - 1;
    }
    sId = setInterval(countdown, 1000);


    document.getElementsByName("resend")[0].disabled = true;
    setTimeout(function(){  
        var element = document.getElementsByName("resend")[0] ;
        element.disabled = false;
    }, 60000);




}

</script>
<script>






</script>


</html>

<?php


include "footer.php";

?>