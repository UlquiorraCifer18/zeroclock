<?php
include "header.php";
?>


 
<section class="section">
<div class="container-fluid">	
    <div id="cart_checkout">
      
    </div>
</div>
<!-- Chat button--> 
<div class="section mainn mainn-raised b">
                <button type="button" class="btn btn-dark btn-floating clearfix" style="width: 100px; height: 40px; padding: 7px; font-weight:bold;width: 100px; font-family: 'Archivo Black';" id="btn" data-target="#chatb" data-toggle="modal">Chat&nbsp;<i class="far fa-comment-alt"></i>
                </button>
				</div>
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
</section>	

<div class="modal modal-lg" id="checkouts" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="height: 700vmax; width: 100vmax; margin-top: 5rem;"> 
          <div class="modal-dialog modal-dialog-centered" aria-hidden="false">
            <div class="modal-content">
              <div class="modal-header d-block">
              <button type="button" id="cl" class="close" data-dismiss="modal">×</button><br>
                 <br><h5 class="modal-title text-center" style="font-weight:bold;">Choose your Payment Method: </h5> <br><br>
                 <script src="https://www.paypal.com/sdk/js?client-id=AbrcebMeG6PmH2hQvjgRC_NqiX8qovHrbnmtpE43HdByjOOisFKZXWXZ4gxM-0sCVp2ulEUAtw8XqKNK"></script>
</head>
<body>
  
  <div id="paypal-button-container"></div>

  <script>
	paypal.Buttons({
      createOrder: function(data, actions){
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '370'
            }
          }]
        })
      },
      onAprove: function(data, actions){
        console.log('Data: ' + data);
        console.log('Action: ' + actions);
        return actions.order.capture().then(function(details){
          console.log(details);
        })
      }

    }).render('#paypal-button-container');
  </script>
  
</body>
</html>

          </div>
        </div>
</div>
</div>


<?php
include "footer.php";
?>