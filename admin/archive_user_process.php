<?php

require_once("../db.php");
$user_id=$_GET['user_id'];

$id = $user_id;

$result=mysqli_query($con,"select * from user_info where user_id='$id'")or die ("query 1 incorrect.....");

while(list($user_id,$first_name,$last_name,$gender,$birthday,$email,$password,$mobile,$address1,$address2)=mysqli_fetch_array($result))
{
mysqli_query($con,"INSERT INTO `user_archive`(`user_id`, `first_name`, `last_name`, `gender`, `birthday`, `email`, `password`, `mobile`, `address1`, `address2`) 
VALUES ('$id','$first_name','$last_name','$gender','$birthday','$email','$password','$mobile','$address1','$address2')")
or die ("query incorrect");
}

mysqli_query($con,"delete from user_info where user_id='$id'")or die("query is incorrect...");
header("location: archive.php");
?>