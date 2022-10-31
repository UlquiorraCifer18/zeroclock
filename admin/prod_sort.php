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
mysqli_query($con,"delete from products where product_id='$product_id'")or die("query is incorrect...");
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
<div class="content">
        <div class="container-fluid">
        
        
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title"> Products List</h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                <div class="col-md-7">
                    <form action="" method="GET">
                      <div class="input-group mb-3">
                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; }?>" class="form-control" placeholder="Search" style="font-family: Nunito;">
                        <button type="submit" class="btn btn-primary" style="font-family: Nunito;">Search</button>
                        
                      </div>
                    </form>
                    
                    <div class="store-sort" style="font-family: Nunito;">
								<form action="prod_sort.php" method="GET" class="form-inline">
									Sort By:&nbsp;
									<select class="form-control text-center" name="sort_option" style="width: 180px; background-color: black; color: white; font-family: Nunito;">
										<option value="">--Select Option--</option>
										<option value="low">Lowest Price</option>
										<option value="high">Highest Price</option>
										<option value="az">A-Z</option>
										<option value="za">Z-A</option>
									</select>
									&nbsp;<button class="btn" type="submit"  id="filter" style="background-color: black; color: white;"> <i class="fa-solid fa-filter"></i>
                                    </button>
								
							</div></form>
                  </div>
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary" style="font-family: Nunito;">
                      <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                      <tr>
                    </thead>
                    
                      <tbody style="font-family: Nunito;">
                      <?php
                      if (isset($_GET['search'])){
                        $filtervalues = $_GET['search'];
                        //i-add ang gender and birthday sa CONCAT, Pagka kompleto lahat ng details
                        $result=mysqli_query($con,"SELECT * FROM products WHERE CONCAT(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_image2,product_image3,product_image4,product_keywords) LIKE '%$filtervalues%'")or die ("query 1 incorrect.....");
                        if(mysqli_num_rows($result) > 0){
                          while(list($product_id,$product_cat,$product_brand,$product_name,$price,$product_desc,$image,$image2,$image3,$image4,$keywords)=mysqli_fetch_array($result))
                          {
                          echo "<tr><td><img src='../product_images/$image' style='width:50px; height:50px; border:groove #000'></td><td>$product_name</td>
                          <td>$price</td>
                          <td>
                          <div class='ripple-container'></div></a>
                            <a href='updateproduct.php?product_id=$product_id' type='button' rel='tooltip' title='' class='btn btn-secondary btn-link btn-sm' data-original-title='Edit Product'>
                                <i class='material-icons'>edit</i>
                                <div class='ripple-container'></div></a>
                            <a href='archive_product_process.php?product_id=$product_id' type='button' rel='tooltip' title='' class='btn btn-warning btn-link btn-sm' data-original-title='Archive'>
                                <i class='material-icons'>inventory_2</i>
                                <div class='ripple-container'></div></a>
  
                          </td></tr>";
                          }
                      }else{
                        ?>
                            <tr>
                              <td colspan="3">No Record Found</td>
                            </tr>
                          <?php
                        }}

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
while(list($product_id,$product_cat,$product_brand,$product_name,$price,$product_desc,$image,$image2,$image3,$image4)=mysqli_fetch_array($query_run)){
                                
                        
                            echo "<tr><td><img src='../product_images/$image' style='width:50px; height:50px; border:groove #000'></td><td>$product_name</td>
                            <td>$price</td>
                            <td>
                            <div class='ripple-container'></div></a>
                              <a href='updateproduct.php?product_id=$product_id' type='button' rel='tooltip' title='' class='btn btn-secondary btn-link btn-sm' data-original-title='Edit Product'>
                                  <i class='material-icons'>edit</i>
                                  <div class='ripple-container'></div></a>
                              <a href='archive_product_process.php?product_id=$product_id' type='button' rel='tooltip' title='' class='btn btn-warning btn-link btn-sm' data-original-title='Archive'>
                                  <i class='material-icons'>inventory_2</i>
                                  <div class='ripple-container'></div></a>
      
                            </td></tr>";
                          }
                        }?>
                                          </tbody>
                  </table>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>

                        <?php
include "footer.php";
?>