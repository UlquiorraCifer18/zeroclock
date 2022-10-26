<?php
include "header.php";
include "db.php";
include "functions.php";

$user_data = check_login($con);
$id = $_SESSION['uid'];

$first_name=$_POST['first_name'];
$mobile=$_POST['mobile'];
$gender=$_POST['gender'];
$dateofbirth=date('Y-m-d', strtotime($_POST['dateofbirth']));
$email=$_POST['email'];
$user_password=$_POST['password'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];

mysqli_query($con,"update user_info set first_name='$first_name', mobile='$mobile', gender='$gender', birthday='$dateofbirth', email='$email', password='$user_password', address1='$address1', address2='$address2' where user_id='$id'")or die("Query 2 is inncorrect..........");

echo "<script>
          window.location.href='myprofile.php';  
          </script>";
mysqli_close($con);
?>