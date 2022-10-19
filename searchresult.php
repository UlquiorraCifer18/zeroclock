<?php
include "header.php";

?>
		<!-- /BREADCRUMB -->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
		<script>
    
    (function (global) {
	if(typeof (global) === "undefined")
	{
		throw new Error("window is undefined");
	}
    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";
		// making sure we have the fruit available for juice....
		// 50 milliseconds for just once do not cost much (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };	
	// Earlier we had setInerval here....
    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };
    global.onload = function () {        
		noBackPlease();
		// disables backspace on page except on input fields and textarea..
		document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // stopping event bubbling up the DOM tree..
            e.stopPropagation();
        };		
    };
})(window);
</script>

		<!-- SECTION -->
		<div class="section main main-raised">
			
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				<?php 
								include 'db.php';
								$product_title = htmlspecialchars($_GET['search']);
								
								// $sql = " SELECT * FROM products ";
								$whereClause = '';
								$whereClause = ' product_title LIKE "%' .$product_title. '%"';
								$sql =  'SELECT * FROM products WHERE' .$whereClause;
								if (!$con) {
									die("Connection failed: " . mysqli_connect_error());
								}
								$result = mysqli_query($con, $sql);
								if (mysqli_num_rows($result) != 0) 
								{
									while($row = mysqli_fetch_assoc($result)) 
									{
										$pro_id    = $row['product_id'];
										$pro_cat   = $row['product_cat'];
										$pro_brand = $row['product_brand'];
										$pro_title = $row['product_title'];
										$pro_price = $row['product_price'];
										$pro_image = $row['product_image'];
										
				
									echo "
		                        
									<div class='col-md-3 col-xs-6'>
									<a href='product.php?p=$pro_id'><div class='product'>
										<div class='product-img'>
											<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
											<div class='product-label'>
											</div>
										</div></a>
										<div class='product-body'>
											<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
											<h4 class='product-price header-cart-item-info'>₱ $pro_price</h4>
											<div class='product-btns'>

											</div>
										</div>
										<div class='add-to-cart'>
											<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
										</div>
									</div>
									</div>
						";
									}
									;
								}
                                    
									?>
									</div>
							</div>
							</div>
							</div>

<?php
include "footer.php";
?>

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
                  <textarea class="form-control" id="textinput" rows="1" placeholder="Send chat to Zero O'clock Prints..." style="width: 76.5%; margin-left: 45px;"></textarea>
                  <div class="input-group"><span>
                    <button class="btn btn-sm" type="button"  id="lightbtn" style="height:40px; font-family: 'Archivo Black'; float: right;">Send <i class="fa-solid fa-paper-plane"></i></button></label></span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>