
    <?php
session_start();
include("../db.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$user_id=$_GET['user_id'];

/*this is delet quer*/
mysqli_query($con,"delete from user_info where user_id='$user_id'")or die("query is incorrect...");
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
                <h4 class="card-title">Manage User</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-7">
                    <form action="" method="GET">
                      <div class="input-group mb-3">
                        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; }?>" class="form-control" placeholder="Search">
                        <button type="submit" class="btn btn-primary">Search</button>
                      </div>
                    </form>
                  </div>

                  <div class="col-md-12">
                    <div class="card mt-4">
                      <div class="card-body">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>FIRST NAME</th>
                              <th>LAST NAME</th>
                              <th>GENDER</th>
                              <th>BIRTHDAY</th>
                              <th>EMAIL</th>
                              <th>CONTACT NUMBER</th>
                              <th>ADDRESS</th>
                              <th>CITY</th>
                            </tr>
                          </thead>
                            <tbody>
                              <?php
                              if (isset($_GET['search'])){
                                $filtervalues = $_GET['search'];
                                $query = "SELECT * FROM user_info WHERE CONCAT(first_name,last_name,gender,birthday,email,mobile,address1,address2) LIKE '%$filtervalues%'";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0){
                                  foreach($query_run as $items){
                                    ?>
                                      <tr>
                                        <td><?= $items['user_id']; ?></td>
                                        <td><?= $items['first_name'];?></td>
                                        <td><?= $items['last_name'];?></td>
                                        <td><?= $items['gender'];?></td>
                                        <td><?= $items['birthday'];?></td>
                                        <td><?= $items['email'];?></td>
                                        <td><?= $items['mobile'];?></td>
                                        <td><?= $items['address1'];?></td>
                                        <td><?= $items['address2'];?></td>
                                        <td> 
                                        <a href='edituser.php?user_id=$user_id' type='button' rel='tooltip' title='' class='btn btn-secondary btn-link btn-sm' data-original-title='Edit User'>
                                                <i class='material-icons'>edit</i>
                                              <div class='ripple-container'></div></a>
                                        <a href='archive_user_process.php?user_id=$user_id' type='button' rel='tooltip' title='' class='btn btn-warning btn-link btn-sm' data-original-title='Archive'>
                                                <i class='material-icons'>inventory_2</i>
                                              <div class='ripple-container'></div></a>
                                        </td>
                                      </tr>
                                    <?php
                                  }
                                }else{
                                  ?>
                                    <tr>
                                      <td colspan="9">No Record Found</td>
                                    </tr>
                                  <?php
                                }
                              }
                              
                              ?>
                              

                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
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


                    </tr></thead>
                    <tbody style="font-family: Nunito;">
                      <?php 
                        $result=mysqli_query($con,"select * from user_info")or die ("query 1 incorrect.....");

                        while(list($user_id,$first_name,$last_name,$gender,$birthday,$email,$password,$mobile,$address1,$address2)=mysqli_fetch_array($result))
                        {
                        echo "<tr><td>$user_id</td><td>$first_name</td><td>$last_name</td><td>$gender</td><td>$birthday</td><td>$email</td><td>$mobile</td><td>$address1</td><td>$address2</td>

                        <td> 
                        <a href='edituser.php?user_id=$user_id' type='button' rel='tooltip' title='' class='btn btn-secondary btn-link btn-sm' data-original-title='Edit User'>
                                <i class='material-icons'>edit</i>
                              <div class='ripple-container'></div></a>
                        <a href='archive_user_process.php?user_id=$user_id' type='button' rel='tooltip' title='' class='btn btn-warning btn-link btn-sm' data-original-title='Archive'>
                                <i class='material-icons'>inventory_2</i>
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
          <div class="float-end">
          <th><a href="adduser.php" class="btn btn-success pull-right">Add New</a></th>
                      </div>
        </div>
      </div>
      <?php
include "footer.php";
?>