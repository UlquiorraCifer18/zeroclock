<?php
session_start();
include "db.php";
include "functions.php";

$user_data = check_login($con);

$first_name=$_POST['first_name'];
$mobile=$_POST['mobile'];
$gender=$_POST['gender'];
$dateofbirth=date('Y-m-d', strtotime($_POST['dateofbirth']));
$email=$_POST['email'];
$user_password=$_POST['password'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];

if(empty($first_name) || empty($mobile) || empty($gender) || empty($dateofbirth) || empty($email) || 
	empty($user_password) || empty($address1) || empty($address2)){
		
		echo "<script>
          window. alert('Fill out all fields!');
          window.location.href='myprofile.php';  
          </script>";
		exit();
    }else{
        if(strlen($user_password) < 9 ){
            echo "<script>
          alert('Password must contain atleast 9 characters or more!');
          window.location.href='myprofile.php'; 
          </script>";
            exit();
        }  
        if(!is_numeric($mobile)){
            echo "<script>
          alert('Phone number is invalid!');
          window.location.href='myprofile.php'; 
          </script>";
          exit();
        }
        if(strlen($mobile) != 11){
            echo "<script>
          alert('Phone number must be 11 digit!');
          window.location.href='myprofile.php'; 
          </script>";
          exit();
        }
          
        mysqli_query($con,"update user_info set first_name='$first_name', mobile='$mobile', gender='$gender', birthday='$dateofbirth', email='$email', password='$user_password', address1='$address1', address2='$address2' where user_id='$_SESSION[uid]'")or die("Query 2 is inncorrect..........");

        echo "<script>
                window. alert('Edit Successful');
                window.location.href='myprofile.php';  
                </script>";
        mysqli_close($con);
    }
?>