<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
		
		
         
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
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
#cart{
  margin-left: 15vmax;
  width: 75vmax;
}


        

       
        
        </style>

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<nav class="navbar navbar-default navbar-fixed-top">
			<div id="top-header">
				<div class="container">
				<a href="index.php" class="logo">
								<img src="System Icons\Z-Logo-removebg-preview.png" alt="" width="70" height="50">
									
								</a>
					
					<ul class="header-links pull-right">
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

					</ul>
					
				</div>
			</div>
						</nav>
			<!-- /TOP HEADER -->
			
			

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								


								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
		<nav id='navigation'>
			<!-- container -->
            <div class="container" id="get_category_home">
				
                
            </div>
				<!-- responsive-nav -->
				
			<!-- /container -->
		</nav>
            

		<!-- NAVIGATION -->
		
		<div class="modal fade" id="Modal_login" role="dialog" aria-hidden="true" data-background="false" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered" style="height: 100vh;">
													
                          <!-- Modal content-->
                          <div class="modal-content" style="height: 100vh; margin-top: -30px;">
                            <div class="modal-header" >
							<img src="System Icons\Z-Logo-removebg-preview.png" alt="" width="60" height="40">
                              <button type="button" id="cl" class="close" data-dismiss="modal">&times;</button>
                              
                            </div>
                            <div class="modal-body" style="height: 100vh">
                            <?php
                                include "login_form.php";
    
                            ?>
          
                            </div>
                            
                          </div>
													
                        </div>
                      </div>
                <div class="modal fade" id="Modal_register" role="dialog" aria-hidden="true" data-background="false" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered" style="height: 100vh;">

                          <!-- Modal content-->
                          <div class="modal-content" style="height: 100vh; margin-top: -30px;">
                            <div class="modal-header">
                              <img src="System Icons\Z-Logo-removebg-preview.png" alt="" width="60" height="40">
                              <button type="button" id="cl" class="close" data-dismiss="modal" data-background="false" tabindex="-1">&times;</button>
                              
                            </div>
                            <div class="modal-body">
                            <?php
                                include "register_form.php";
    
                            ?>
          
                            </div>
                            
                          </div>

                        </div>
                      </div>
                      <div></div><div></div><!-- Small modal -->
<div tabindex="-1" class="modal bs-example-modal-sm" id="logout"role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header d-block">
        <span style="display: block;"><h4 class="text-center">Logout</h4></span>
      
                          
                        </div>
      <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-out?</div>
      <div class="modal-footer" style="margin-right: 1.2em;"><a class="btn btn-dark" id="b" href="logout.php">Logout</a>
      <a class="btn btn-danger" data-dismiss="modal" id="b2">Cancel</a></div>
    </div>
  </div>
</div>
                      
		