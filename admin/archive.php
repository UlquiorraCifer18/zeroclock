<?php
session_start();
include("../db.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$product_id=$_GET['product_id'];
///////picture delete/////////
$result=mysqli_query($con,"select product_image from products where product_id='$product_id'")
or die("query is incorrect...");

list($picture)=mysqli_fetch_array($result);
$path="../product_images/$picture";

if(file_exists($path)==true)
{
  unlink($path);
}
else
{}
/*this is delet query*/
mysqli_query($con,"delete from products_archive where product_id='$product_id'")or die("query is incorrect...");
}

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
        
        
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title"> Products </h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary" style="font-family: Nunito;">
                      <tr><th>Image</th><th>Name</th><th>Price</th>
                      <tr></thead>
                    
                      <tbody style="font-family: Nunito;">
                      <?php 

                        $result=mysqli_query($con,"select * from products_archive")or die ("query 1 incorrect.....");

                        while(list($product_id,$product_cat,$product_brand,$product_title,$product_price,$product_desc,$product_image,$product_image2,$product_image3,$product_image4,$product_keywords)=mysqli_fetch_array($result))
                        {
                        echo "<tr><td><img src='../product_images/$product_image' style='width:50px; height:50px; border:groove #000'></td><td>$product_title</td>
                        <td>$product_price</td>
                        <td>
                        <a href='restore_product_process.php?product_id=$product_id' type='button' rel='tooltip' title='' class='btn btn-secondary btn-link btn-sm' data-original-title='Restore'>
                                <i class='material-icons'>restore</i>
                              <div class='ripple-container'></div></a>
                        

                          <a href='archive.php?product_id=$product_id&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete Permanently'>
                              <i class='material-icons'>close</i>
                              <div class='ripple-container'></div></a>

                        </td></tr>";
                        }

                        ?>
                    </tbody>
                  </table>



                    </div>
          </div>
          
    <?php
session_start();
include("../db.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$user_id=$_GET['user_id'];

/*this is delet quer*/
mysqli_query($con,"delete from user_archive where user_id='$user_id'")or die("query is incorrect...");
}

?>
      <!-- End Navbar -->

         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">User</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-hover" id="">
                    <thead class=" text-primary" style="font-family: Nunito;">
                      <tr><th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>City</th>
            <tr></thead>
                    </tr></thead>
                    <tbody style="font-family: Nunito;">
                      <?php 
                      $id = $user_id;

                      $result=mysqli_query($con,"select * from user_archive")or die ("query 1 incorrect.....");
                      
                      while(list($user_id,$first_name,$last_name,$gender,$birthday,$email,$password,$mobile,$address1,$address2)=mysqli_fetch_array($result))
                      {
                        echo "<tr><td>$user_id</td><td>$first_name</td><td>$last_name</td><td>$gender</td><td>$birthday</td><td>$email</td><td>$password</td><td>$address1</td><td>$address2</td>

                        <td>
                        <a href='restore_user_process.php?user_id=$user_id' type='button' rel='tooltip' title='' class='btn btn-secondary btn-link btn-sm' data-original-title='Restore'>
                        <i class='material-icons'>restore</i>
                        <div class='ripple-container'></div></a>

                        <a href='archive.php?user_id=$user_id&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete Permanently'>
                                <i class='material-icons'>close</i>
                              <div class='ripple-container'></div></a>
                        </td></tr>";
                      }
                      mysqli_close($con);
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>

      </div>
      </div>
      </div>
      </div>
      
      <?php
include "footer.php";
?>






