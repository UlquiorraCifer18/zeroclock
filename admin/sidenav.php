<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<!doctype html>
<html lang="en">

<head>
  <title>Admin</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="assets/css/Material+Icons.css" />
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link href="assets/css/black-dashboard.css" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Nunito&family=Orbitron&display=swap" rel="stylesheet">
		<link href="http://fonts.cdnfonts.com/css/digital-7-mono" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript"></script>

    <link type="text/css" rel="stylesheet" href="assets/css/style.css"/>
    <link type="text/css" rel="stylesheet" href="assets/css/margin.css"/>
</head>


<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="azure"  data-image="./assets/img/Z-Logo-removebg-preview.png"  alt="" width="70" height="50">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="" class="simple-text logo-normal" style=" font-family: 'Archivo Black';">
          ADMIN
        </a>
      </div>
      <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="3a8db1f4-24d8-4dbf-85c9-4f5215c1b29a" style="font-family: Nunito;">
        <ul class="nav">
          <li class="nav-item  <?= ($activePage == 'index') ? 'active':''; ?>"">
            <a class="nav-link" href="index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?= ($activePage == 'productlist' || $activePage == 'prod_sort') ? 'active':''; ?>"">
            <a class="nav-link" href="productlist.php">
              <i class="material-icons">list</i>
              <p>Product List</p>
            </a>
            
          </li>
          
          <li class="nav-item <?= ($activePage == 'orders') ? 'active':''; ?>"">
            <a class="nav-link" href="orders.php">
              <i class="material-icons">library_books</i>
              <p>Orders</p>
            </a>
          </li>
          <li class="nav-item <?= ($activePage == 'addproduct') ? 'active':''; ?>"">
            <a class="nav-link" href="addproduct.php">
              <i class="material-icons">add</i>
              <p>Add Products</p>
            </a>
          </li>
          <li class="nav-item <?= ($activePage == 'manageuser' || $activePage == 'user_sort') ? 'active':''; ?>"">
            <a class="nav-link" href="manageuser.php" >
              <i class="material-icons">account_box</i>
              <p>Manage User</p>
            </a>
          </li>
          <li class="nav-item <?= ($activePage == 'archive') ? 'active':''; ?>"">
            <a class="nav-link" href="archive.php" >
              <i class="material-icons">inventory</i>
              <p>Archive</p>
            </a>
          </li>
          <li class="nav-item <?= ($activePage == '') ? 'active':''; ?>"">
            <a class="nav-link" href="#!" >
              <i class="far fa-comment-alt"></i>
              <p>Messages</p>
            </a>
          </li>
          

          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>
    
    