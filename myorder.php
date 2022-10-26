<?php
include "header.php";
include "db.php";
include "functions.php";

$order_track = order_track($con);
?>



<section class="section mainn mainn-raised b">
<div class="container-fluid">	
<div class="container2">
<h4 style="margin-left: 9.3vmax;"><img src="System Icons\Header\Profile Pop up Modal\Screenshot_2022-07-04_121156-removebg-preview.png" alt="" width="28" height="22" style="margin-top: -0.6rem;">My Purchases</h4><br>
<div id='responsive-nav'>
<nav class="nav" id="navm">
<ul class="nav3 navbar-nav">
    <li><a class="nav-link active" href="#" style="color: white;" id="hideOne">In Process</a>
    </li>
    <li><a class="nav-link" href="#" style="color: white;" id="hideTwo">To ship</a>
    </li>
    <li><a class="nav-link" href="#" style="color: white;" id="hideThree">Completed</a></li>
    <li><a class="nav-link" href="#" style="color: white;" id="hideFour">Cancelled</a></li>
</ul>
</nav>
<div class="jumbotron" style="margin-left: 9vmax; width: 70vmax;">
   <div id="one" class="hideMeBox" style="margin-left: 10vmax; margin-top: -2vmax; padding: -30vmax">
  <ul class="nav4 navbar-nav">
    <li class="nav-item"><h6>Name and Description </h6><?php echo $order_track ['product_title'];?></li>
    <li class="nav-item" style="margin-left: 2vmax;"><h6 class="justify-content">Mode of Payment</h6></li>
    <li class="nav-item" style="margin-left: 2vmax;"><h6 class="justify-content">Order <br>Date & Time</h6><?php echo $order_track ['date_ordered'];?></li>
    <li class="nav-item" style="margin-left: 2vmax;"><h6 class="justify-content">Quantity</h6></li>
    <li class="nav-item" style="margin-left: 2vmax;"><h6 class="justify-content">Price</h6><?php echo $order_track ['product_price'];?></li>
</ul>
  </div>
  <div id="two" class="hideMeBox2" style="margin-left: -10vmax; margin-top: -2vmax;">
  <ul class="nav4 navbar-nav" >
    <li style="margin-left: 21vmax;" class="nav-item"><h6>Name and Description</h6></li>
    <li class="nav-item" ><h6 class="text-center">Order <br>Date & Time</h6></li>
    <li class="nav-item"><h6>Estimated Date of Arrival</h6></li>
</ul>
  </div>
  <div id="three" class="hideMeBox3" style="margin-left: 10vmax; margin-top: -2vmax; padding: -30vmax">
  <ul class="nav4 navbar-nav">
    <li class="nav-item"><h6>Name and Description</h6></li>
    <li class="nav-item" style="margin-left: 7vmax;"><h6 class="justify-content">Order <br>Date & Time</h6></li>
    <li class="nav-item" style="margin-left: 7vmax;"><h6 class="justify-content">Arrival Date</h6></li>
    <li class="nav-item" style="margin-left: 7vmax;"><h6 class="justify-content">Quantity</h6></li>
    <li class="nav-item" style="margin-left: 7vmax;"><h6 class="justify-content">Total Price</h6></li>
</ul>
  </div>
  <div id="four" class="hideMeBox4" style="margin-left: 10vmax; margin-top: -2vmax; padding: -30vmax">
  <ul class="nav4 navbar-nav">
    <li class="nav-item"><h6>Name and Description</h6></li>
    <li class="nav-item" style="margin-left: 7vmax;"><h6 class="justify-content">Order Placed</h6></li>
    <li class="nav-item" style="margin-left: 7vmax;"><h6 class="justify-content">Order Cancelled</h6></li>
    <li class="nav-item" style="margin-left: 7vmax;"><h6 class="justify-content">Quantity</h6></li>
    <li class="nav-item" style="margin-left: 7vmax;"><h6 class="justify-content">Price</h6></li>
</ul>
  </div>
</div>
</div>
</div>
</div>
</section>
<!-- Chat button--> 
<div class="section mainn mainn-raised b">
                <button type="button" class="btn btn-dark btn-floating clearfix" style="width: 100px; height: 40px; padding: 7px; font-weight:bold;width: 100px; font-family: 'Archivo Black';" id="btn" data-target="#chatb" data-toggle="modal">Chat&nbsp;<i class="far fa-comment-alt"></i>
                </button>
				</div>
                <!-- !Chat Button-->

				<div class="modal fade modal-dialog float-right chats " id="chatb" tabindex="-1" aria-labelledby="chatlabel" aria-hidden="true" role="dialog">
              <div class="modal-dialog float-lg-right" style="position: fixed; bottom: 0; left: 68vmax;">
                <div class="modal-content chat" >
                  <div class="modal-header d-block">
                    <button type="button" class="btn-close-white" data-dismiss="modal" aria-label="Close" style="margin-top: 15px; width: 15px; float: right;"></button>
                    <p class="modal-title text-center" id="chatlabel" style="font-weight:bold;"><img src="System Icons\white.png" alt="" width="30" height="20">Zero O'clock Prints</p>
                  </div>
                  <div style="background-color: white; border-width: thin;">
                  <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                  </div>
                  <div class="questions modal-body justify-content">
				  <h5 class="text-center" id="chatlabel" style="padding-top: .4em; font-weight:bold; color: white;">Question</h5>
                  <p class="solid"><a id="btnQ1" style="text-decoration: none; color: #ffffff; font-weight: bold; padding:.4em .3em; display:block;" href="#">Payment Option<i class="fa-solid fa-paper-plane" style="float: right;"></i></a></p>
                  <p class="solid"><a id="btnQ2" style="text-decoration: none; color: #ffffff; font-weight: bold; padding:.4em .3em; display:block;" href="#">Size Chart<i class="fa-solid fa-paper-plane" style="float: right;"></i></a></p>
                  <p class="solid"><a id="btnQ3" style="text-decoration: none; color: #ffffff; font-weight: bold; padding:.4em .3em; display:block;" href="#">Track my Order<i class="fa-solid fa-paper-plane" style="float: right;"></i></a></p>
                  <p class="solid"><a id="btnQ4" style="text-decoration: none; color: #ffffff; font-weight: bold; padding:.4em .3em; display:block;" href="#">Estimated Date of Delivery<i class="fa-solid fa-paper-plane" style="float: right;"></i></a></p>
                  </div>
				  <div class="foot input-group ">
                    <div class="input-group">
                      <div class="custom-file">
                  <span style="position: absolute;"><input class="custom-file-input" type="file" id="files" style="float: left"><label class="custom-file-label" for="files"><i class="fa-solid fa-paperclip"></i></label></span>
                  </div></div>
                  <textarea class="form-control" id="textinput" rows="1" placeholder="Send chat to Zero O'clock Prints..." style="width: 24.5vw; margin-left: 45px;"></textarea>
                  <div class="input-group"><span>
                    <button class="btn btn-sm" type="button"  id="lightbtn" style="height: 4.4vh; weight: 4.4vh;font-family: 'Archivo Black';">Send <i class="fa-solid fa-paper-plane"></i></button></label></span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
<?php
include "footer.php";
?>