
    <?php
session_start();
include("../db.php");

error_reporting(0);
// if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
// {
// $id=$_GET['id'];

// /*this is delet query*/

// mysqli_query($con,"delete from order_tracking where id='$id'")or die("delete query is incorrect...");
// } 

///pagination
$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
}

include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-14">
          <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title"> Manage Orders</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary" style="font-family: Nunito;">
                    <tr><th>ID</th><th>Tracking ID</th><th>Order ID</th><th>Product ID</th><th>User ID</th><th>Name</th><th>Email</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Date Ordered</th><th>Estimated time of Delivery</th><th>Product Name</th><th>Quantity</th><th>Price</th><th>Image</th><th>Status</th>
                    </tr></thead>
                    <tbody style="font-family: Nunito;">
                      <?php 
                        $result=mysqli_query($con,"select * from order_tracking")or die ("query 1 incorrect.....");

                        while(list($id,$tracking_id,$order_id,$product_id,$user_id,$cus_name,$email,$address,$city,$state,$zip,$date_ordered,$estimated_time,$product_title,$quantity,$price,$image,$status)=mysqli_fetch_array($result))
                        {	
                        echo "<tr><td>$id</td><td>$tracking_id</td><td>$order_id</td><td>$product_id</td><td>$user_id</td><td>$cus_name</td><td>$email</td><td>$address</td><td>$city</td><td>$state</td><td>$zip</td><td>$date_ordered</td><td>$estimated_time</td><td>$product_title</td><td>$quantity</td><td>$price</td><td>$image</td><td>$status</td>

                        <td>
                        <a class=' btn btn-info' href='orderstatus.php?id=$id'>Status</a>
                        </td>
                        </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <?php
include "footer.php";
?>