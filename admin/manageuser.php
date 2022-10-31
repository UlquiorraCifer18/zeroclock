
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
                  
                </div>
                <div class="table-responsive ps">
                <div class="col-md-7">
                    <form action="" method="GET" >
                      <div class="input-group mb-3" >
                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; }?>" class="form-control" placeholder="Search" style="font-family: Nunito;">
                        <button type="submit" class="btn btn-primary" style="font-family: Nunito;">Search</button>
                      </div>
                    </form>
                    <div class="store-sort" style="font-family: Nunito;">
								<form action="user_sort.php" method="GET" class="form-inline">
									Sort By:&nbsp;
									<select class="form-control text-center" name="sort_option" style="width: 180px; background-color: black; color: white; font-family: Nunito;">
										<option value="">--Select Option--</option>
										<option value="az">A-Z</option>
										<option value="za">Z-A</option>
									</select>
									&nbsp;<button class="btn" type="submit"  id="filter" style="background-color: black; color: white;"> <i class="fa-solid fa-filter"></i>
                                    </button>
								
							</div></form>
                  </div>
                  <table class="table tablesorter table-hover" id="">
                    <thead class=" text-primary" style="font-family: Nunito;">
                      <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Birthday</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>City</th>
                        </tr>
                    </thead>
                    <tbody style="font-family: Nunito;">
                      <?php 
                      if (isset($_GET['search'])){
                        $filtervalues = $_GET['search'];
                        //i-add ang gender and birthday sa CONCAT, Pagka kompleto lahat ng details
                        $result=mysqli_query($con,"SELECT * FROM user_info WHERE CONCAT(first_name,last_name,email,mobile,address1,address2) LIKE '%$filtervalues%'")or die ("query 1 incorrect.....");
                        if(mysqli_num_rows($result) > 0){
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
                      }else{
                        ?>
                            <tr>
                              <td colspan="9">No Record Found</td>
                            </tr>
                          <?php
                        }
                        }else{
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