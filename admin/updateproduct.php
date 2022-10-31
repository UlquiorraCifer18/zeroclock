
    <?php
session_start();
include("../db.php");
$product_id=$_REQUEST['product_id'];

$result=mysqli_query($con,"select product_id,product_title,product_price, product_desc, product_keywords from products where product_id='$product_id'")or die ("query 1 incorrect.......");

list($products,$product_title,$product_price,$product_desc,$product_keywords)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{

$product_title=$_POST['product_title'];
$product_price=$_POST['product_price'];
$product_desc=$_POST['product_desc'];
$product_keywords=$_POST['product_keywords'];

mysqli_query($con,"update products set product_title='$product_title', product_price='$product_price', product_desc='$product_desc', product_keywords='$product_keywords' where product_id='$product_id'")or die("Query 2 is inncorrect..........");

header("location: productlist.php");
mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
              <div class="card-header card-header-info">
                <h5 class="title">Edit Product</h5>
              </div>
              <form action="updateproduct.php" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
                
                  <input type="hidden" name="product_id" id="product_id" value="<?php echo $product_id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Product name</label>
                        <input type="text" id="product_title" name="product_title"  class="form-control" value="<?php echo $product_title; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="text" id="product_price" name="product_price" class="form-control" value="<?php echo $product_price; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Description</label>
                        <input type="text"  id="product_desc" name="product_desc" class="form-control" value="<?php echo $product_desc; ?>">
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label >Keywords</label>
                        <input type="text" name="product_keywords" id="product_keywords" class="form-control" value="<?php echo $product_keywords; ?>">
                      </div>
                    </div>
                  
                  
                  
                
              </div>
              <div class="card-footer">
                <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-success" style="font-family: 'Nunito'; float:right;" >Update</button>
              </div>
              </form>    
            </div>
          </div>
         
          
        </div>
      </div>
      <?php
include "footer.php";
?>