<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" sizes="192x192" href="img/Nice-highres.png">
    <link rel="apple-touch-icon" href="img/Nice-highres.png">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.0/litera/bootstrap.min.css" integrity="sha384-Gr51humlTz50RfCwdBYgT+XvbSZqkm8Loa5nWlNrvUqCinoe6C6WUZKHS2WIRx5o" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>
      <?php 
      if(isset($_COOKIE['userid'])) echo($_COOKIE['username']);
      if(isset($_COOKIE['manageid'])) echo($_COOKIE['managename']);
       ?> dashboard</title>
<?php require('db.php'); ?>
  </head>
  <body id="body">
  <!-- headder navi -->  
     <header></header>
<?php if(isset($_COOKIE['userid'])){ ?>
      <nav class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="home.php"><?php echo($_COOKIE['username']); ?></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
       <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="index.php">Sign out</a>
          </li>
        </ul>
      </nav>
<?php }elseif(isset($_COOKIE['manageid'])){ ?>
      <nav class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="manage.php"><?php echo($_COOKIE['managename']); ?></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation" style="color: #fff;">
          <span class="navbar-toggler-icon" style="color: #fff;"></span>
        </button>

       <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="managelogin.php">Sign out</a>
          </li>
        </ul>
      </nav>
<?php } ?>



      <div class="container-fluid ">
      <div class="row"> 