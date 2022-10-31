
    <?php
session_start();
include("../db.php");

include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
         <div class="panel-body">
		<a>
      <!-- Chart -->
      <div class="graphBox ">
        <div class="box  navbar-dark bg-info">
        <div id="piechart"></div>
        </div>
        <div class="box  navbar-dark bg-info  " ></div>
      </div>
      <script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['product_id', 'qty'],
          <?php
          $sql = "select * from order_products";
          $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)){
            echo"['".$result['product_id']."',".$result['qty']."],";
          }
          ?>
        ]);

        var options = {
          title: '  Item Sales'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
            <?php  //success message
            if(isset($_POST['success'])) {
            $success = $_POST["success"];
            echo "<h1 style='color:#0C0'>Your Product was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";
            }
            ?></a>
                </div>
                <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title"> Users List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary" style="font-family: Nunito;">
                    <tr><th>ID</th><th>FirstName</th><th>LastName</th><th>Gender</th><th>Birthday</th><th>Email</th><th>Contact Number</th><th>Address</th><th>City</th>
                    </tr></thead>
                    <tbody style="font-family: Nunito;">
                      <?php 
                        $result=mysqli_query($con,"select * from user_info")or die ("query 1 incorrect.....");

                        while(list($user_id,$first_name,$last_name,$gender,$birthday,$email,$password,$mobile,$address1,$address2)=mysqli_fetch_array($result))
                        {	
                        echo "<tr><td>$user_id</td><td>$first_name</td><td>$last_name</td><td>$gender</td><td>$birthday</td><td>$email</td><td>$mobile</td><td>$address1</td><td>$address2</td>

                        </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
           <div class="row">
            <div class="col-md-6">
            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title"> Categories List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary" style="font-family: Nunito;">
                        <tr><th>ID</th><th>Categories</th><th>Count</th>
                    </tr></thead>
                    <tbody style="font-family: Nunito;">
                      <?php 
                        $result=mysqli_query($con,"select * from categories")or die ("query 1 incorrect.....");
                        $i=1;
                        while(list($cat_id,$cat_title)=mysqli_fetch_array($result))
                        {	
                            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i";
                            $query = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($query);
                            $count=$row["count_items"];
                            $i++;
                        echo "<tr><td>$cat_id</td><td>$cat_title</td><td>$count</td>

                        </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">Brands List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary" style="font-family: Nunito;">
                        <tr><th>ID</th><th>Brands</th><th>Count</th>
                    </tr></thead>
                    <tbody style="font-family: Nunito;">
                      <?php 
                        $result=mysqli_query($con,"select * from brands")or die ("query 1 incorrect.....");
                        $i=1;
                        while(list($brand_id,$brand_title)=mysqli_fetch_array($result))
                        {	
                            
                            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i";
                            $query = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($query);
                            $count=$row["count_items"];
                            $i++;
                        echo "<tr><td>$brand_id</td><td>$brand_title</td><td>$count</td>

                        </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
           </div><br>
          <div class="navbar navbar-transparent border-0">
           <form class="form-inline" method="post" action="generate_user_list.php">
            <button type="submit" id="pdf" name="generate_pdf" class="btn btn-success" style="font-family: Nunito;"><i class="fa fa-pdf" aria-hidden="true"></i>
            Generate PDF For User <i class='material-icons'>person</i></button>
          </form>
           
          <form class="form-inline" method="post" action="generate_product_list.php">
            <button type="submit" id="pdf" name="generate_pdf" class="btn btn-success" style="font-family: Nunito;"><i class="fa fa-pdf" aria-hidden="true"></i>
            Generate PDF For Product <i class='material-icons'>inventory_2</i> </button>
          </form>
            
          <form class="form-inline pull-right" method="post" action="generate_sales_report.php">
            <button type="submit" id="pdf" name="generate_pdf" class="btn btn-success" style="font-family: Nunito;"><i class="fa fa-pdf" aria-hidden="true"></i>
            Generate PDF For Sales <i class='material-icons'>pie_chart</i></button>
          </form>
                      </div>
        </div>
      </div>
      <?php
include "footer.php";
?>