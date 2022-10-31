
    <?php
session_start();
include("../db.php");

$id=$_REQUEST['id'];

$result=mysqli_query($con,"select status from order_tracking where id='$id'")or die ("query 1 incorrect.......");

list($status)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{
$status=$_POST['status'];
mysqli_query($con,"update order_tracking set status='$status' where id='$id'")or die("Query 2 is inncorrect..........");

header("location: orders.php");
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
                <h5 class="title">Edit Status </h5>
              </div>
              <form action="orderstatus.php" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
              <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
              <label> Status: <?php echo $status;?></label><br />

              <div class="form-check form-check-inline">
                <input type="radio" name="status" id="In Process" value="In Process">
                <label class="form-check-label">
                    In Process
                </label>
                </div>
                <div class="form-check form-check-inline">
                <input type="radio" name="status" id="To Ship" value="To Ship">
                <label class="form-check-label">
                    To Ship
                </label><br><br>
                </div>
                <div class="form-check form-check-inline">
                <input type="radio" name="status" id="Completed" value="Completed">
                <label class="form-check-label">
                    Completed
                </label><br><br>
                </div>
                <div class="form-check form-check-inline">
                <input type="radio" name="status" id="Cancelled" value="Cancelled">
                <label class="form-check-label">
                    Cancelled
                </label><br><br>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-success" style="font-family: 'Nunito'; float:right;" >Update</button>
              </div>
               
            </div>
          </div>
         </form>   
          
        </div>
      </div>
      <?php
include "footer.php";
?>