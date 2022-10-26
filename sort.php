<?php
include "header.php";
include "db.php";

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

                <div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div id="get_category">
				        </div>
						<!-- /aside Widget -->



						<!-- aside Widget -->
						<div id="get_brand">
				        </div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Top selling</h3>
							<div id="get_product_home">
								<!-- product widget -->
								
								<!-- product widget -->
							</div>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->
                    <div id="store" class="col-md-9">
                    						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort ">
								<form action="sort.php" method="GET" class="form-inline">
								<label>
									Sort By:
									<select class="form-control" name="sort_option">
										<option value="">--Select Option--</option>
										<option value="low">Lowest Price</option>
										<option value="high">Highest Price</option>
                                        <option value="az">A-Z</option>
										<option value="za">Z-A</option>
									</select>
									&nbsp;<button class="btn" type="submit"  id="filter" style="background-color: black; color: white;"> <i class="fa-solid fa-filter"></i>
                                    </button>
								</label>
								

								<label></form>
							</div>

						</div>
						<!-- /store top filter -->
<?php
//Sorting Function
$sort_option = "";
if(isset($_GET ["sort_option"]))
{
	if($_GET["sort_option"] == "low"){
		$sort_option = "ASC";
        $query = "SELECT * FROM products ORDER BY product_price $sort_option";

	}elseif($_GET["sort_option"] == "high"){
		$sort_option = "DESC";
        $query = "SELECT * FROM products ORDER BY product_price $sort_option";
	}elseif($_GET["sort_option"] == "az"){
		$sort_option = "ASC";
        $query = "SELECT * FROM products ORDER BY product_title $sort_option";        
	}elseif($_GET["sort_option"] == "za"){
		$sort_option = "DESC";
        $query = "SELECT * FROM products ORDER BY product_title $sort_option";
	}
}

$query_run = mysqli_query($con, $query);

if(mysqli_num_rows($query_run) > 0){
	foreach ($query_run as $row){
        $pro_id    = $row['product_id'];
        $pro_cat   = $row['product_cat'];
        $pro_brand = $row['product_brand'];
        $pro_title = $row['product_title'];
        $pro_price = $row['product_price'];
        $pro_image = $row['product_image'];
        

    echo "
    

    <div class='col-md-4 col-xs-6'>
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
    </div>";
	}
}
?>

							</div>
							</div>
                            
							
                            <!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination" id="pageno">
								<li ><a class="active" href="#aside">1</a></li>
								
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
                            </div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
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
</div>

<?php
include "footer.php";
?>