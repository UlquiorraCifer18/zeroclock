<?php
session_start();
include("../db.php");

$id=$_REQUEST['id'];

$result=mysqli_query($con,"select status from order_tracking where id='$id'")or die ("query 1 incorrect.......");

list($status)=mysqli_fetch_array($result);

$status=$_POST['status'];

mysqli_query($con,"update order_tracking set status='$status' where id='$id'")or die("Query 2 is inncorrect..........");

header("location: orders.php");
mysqli_close($con);
?>