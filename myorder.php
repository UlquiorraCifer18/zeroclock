<?php
include "header.php";
?>



<section class="section mainn mainn-raised b">
<div class="container-fluid">	
<div class="container2">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body" >
            <h6>&nbsp;&nbsp;&nbsp;&nbsp;Order ID: OD45345345435</h6>
            <article class="card">
                <div class="card-body row" style="margin-left: 5vh;">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i> +1598675986 </div>
                    <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                    <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                </div>
            </article>
            <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
            </div>
            <hr>
            <ul class="row">
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="https://i.imgur.com/iDwDQ4o.png" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">Dell Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$950 </span>
                        </figcaption>
                    </figure>
                </li>
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="https://i.imgur.com/tVBy5Q0.png" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">HP Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$850 </span>
                        </figcaption>
                    </figure>
                </li>
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="https://i.imgur.com/Bd56jKH.png" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">ACER Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$650 </span>
                        </figcaption>
                    </figure>
                </li>
            </ul>
            <hr>
            <a href="cart.php" class="btn" data-abc="true" style="width: 30vh;"> <i class="fa fa-chevron-left"></i> Back to orders</a> <br><br>
        </div>
    </article>
</div>
</div>
</section>
 <!-- Chat button--> 
 <div class="section mainn mainn-raised b">
                <button type="button" class="btn btn-dark btn-floating clearfix"  id="btn" style="width: 100px; height: 40px; padding: 7px; font-weight:bold;width: 100px; font-family: 'Archivo Black'; position" id="btn" data-target="#chatb" data-toggle="modal">Chat&nbsp;<i class="far fa-comment-alt"></i>
                </button>
				</div>
                <!-- !Chat Button-->

				<div class="modal fade modal-dialog float-right chats " id="chatb" tabindex="-1" aria-labelledby="chatlabel" aria-hidden="true" role="dialog">
              <div class="modal-dialog float-lg-right">
                <div class="modal-content chat">
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
				  <h5 class="text-center" id="chatlabel" style="padding-top: 10px; font-weight:bold; color: white;">Question</h5>
                  <p class="solid">Payment Option<i class="fa-solid fa-paper-plane" style="float: right;"></i></p>
                  <p class="solid">Size Chart<i class="fa-solid fa-paper-plane" style="float: right;"></i></p>
                  <p class="solid">Track my Order<i class="fa-solid fa-paper-plane" style="float: right;"></i></p>
                  <p class="solid">Estimated Date of Delivery<i class="fa-solid fa-paper-plane" style="float: right;"></i></p>
                  </div>
				  <div class="foot input-group ">
                    <div class="input-group">
                      <div class="custom-file">
                  <span style="position: absolute;"><input class="custom-file-input" type="file" id="files" style="float: left"><label class="custom-file-label" for="files"><i class="fa-solid fa-paperclip"></i></label></span>
                  </div></div>
                  <textarea class="form-control" id="textinput" rows="1" placeholder="Send chat to Zero O'clock Prints..." style="width: 71%; margin-left: 45px;"></textarea>
                  <div class="input-group"><span>
                    <button class="btn btn-sm" type="button"  id="lightbtn" style="height:40px; font-family: 'Archivo Black'; float: right;">Send <i class="fa-solid fa-paper-plane"></i></button></label></span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<?php
include "footer.php";
?>