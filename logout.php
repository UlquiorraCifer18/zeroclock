<?php

session_start();

unset($_SESSION["uid"]);

unset($_SESSION["name"]);

echo "<script>
    window.location.href='index.php'; 
    </script>";
    die;
   

?>