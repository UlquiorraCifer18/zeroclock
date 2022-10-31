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
      <!-- End Navbar -->
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
                          }
                          }else{
                        $result=mysqli_query($con,"select product_id,product_image, product_title,product_price from products  where  product_cat=1 or product_cat=2 or product_cat=3 Limit $page1,12")or die ("query 1 incorrect.....");

                        while(list($product_id,$image,$product_name,$price)=mysqli_fetch_array($result))
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
                        }}



                        
                        ?>
                    </tbody>
                  </table>

                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
            <nav aria-label="Page navigation example">
            <a class="btn btn-success pull-right" href="addproduct.php" style="font-family: Nunito;">Add New</a>
              <ul class="pagination" style="font-family: Nunito;">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                 <?php 
//counting paging

                $paging=mysqli_query($con,"select product_id,product_image, product_title,product_price from products");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="productlist.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
?>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
                
              </ul>

            </nav>



           
          </div>
          
          
        </div>
      </div>
      <?php
include "footer.php";
?>