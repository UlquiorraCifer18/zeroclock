<?php
session_start();
if(isset($_SESSION['name'])){
    $text = $_POST['text'];
    $questionID = $_POST['qID'];
    $chatlogloc = $_SESSION["uid"]."_log.html"; 

    echo $chatlogloc;

    $text_message = "<div class='container1'><img src='System Icons\Header\Screenshot_2022-07-04_121012-removebg-preview.png' alt='Avatar' style='width:100%;'>"."<p>".stripslashes(htmlspecialchars($text))."</p>"."<span class='time-right1'>".date("g:i A")." <b class='user-name'>".$_SESSION['name']."</b></span>  "."<br></div>";    
    file_put_contents($chatlogloc, $text_message, FILE_APPEND | LOCK_EX);    

    if(isset($_POST['qID']) && $questionID == 1){
        $text_message = "<div class='container1 darker1'><img src='System Icons\Z-Logo-removebg-preview.png' alt='Avatar' class='right' style='width:100%;'>"."<p>"."Hi ". $_SESSION['name']."! We are accepting COD, GCASH and Bank Transfer." ."</p>"."<span class='time-left1'>".date("g:i A")."<b class='user-name'> Zero O'clock Admin</b></span> "."<br></div>";    
        file_put_contents($chatlogloc, $text_message, FILE_APPEND | LOCK_EX);    
    }
    
    if(isset($_POST['qID']) && $questionID == 2){
        $text_message = "<div class='container1 darker1'><img src='System Icons\Z-Logo-removebg-preview.png' alt='Avatar' class='right' style='width:100%;'>"."<p>"."Hi ". $_SESSION['name']."! We have S(SMALL), M(Medium), L(Large) and XL(Extra Large)." ."</p>"."<span class='time-left1'>".date("g:i A")."<b class='user-name'> Zero O'clock Admin</b></span> "."<br></div>";    
        file_put_contents($chatlogloc, $text_message, FILE_APPEND | LOCK_EX);   
    }
    
    if(isset($_POST['qID']) && $questionID == 3 || $questionID == 4){
        $text_message = "<div class='container1 darker1'><img src='System Icons\Z-Logo-removebg-preview.png' alt='Avatar' class='right' style='width:100%;'>"."<p>"."Hi ". $_SESSION['name']."! We apologize but this feature is still in development." ."</p>"."<span class='time-left1'>".date("g:i A")."<b class='user-name'> Zero O'clock Admin</b></span> "."<br></div>";    
        file_put_contents($chatlogloc, $text_message, FILE_APPEND | LOCK_EX);   
    }
    //save chat log into database for registered users
    // (A) LOAD CONTENT LIBRARY
    require "2-lib-content.php";

    //get log content
    $contents = file_get_contents($chatlogloc);  

    // (B) INSERT HTML
    echo $_CONTENT->save($contents)
     ? "OK" : "ERROR" ;
    
}
?>