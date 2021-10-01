<!-- This page will allow the system manager to see staff list and change them 
 (only system manger will have access to this page) Not sure if we need this page or can just 
use the editstaff page -->



<?php
include ('db_conn.php');
include ('session.php');
include('cartFunctions.php');
if($session_id == ""){
     echo "<script type='text/javascript'>alert('You need to login!!');
    window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Restaurant List</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  </head>
  <body>
    <header>
      <!-- Navbar -->

      <nav class="navbar navbar-expand-lg navbar-light bg-white top">
      <div class="container-fluid">
        <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarExample01"
        aria-controls="navbarExample01"
        aria-expanded="false"
        aria-label="Toggle navigation"
        >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="#" data-toggle="modal" data-target="#regiModal">Registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="account.php">Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="#" data-toggle="modal" data-target="#PartnerregiModal">Become a Partner Restaurant</a>
          </li>
        </ul>

  <!-- Search Bar -->

      </div>
        <nav class="navbar navbar-light bg-white justify-content-between">
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="restaurant" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
        </nav>
    </div>
    <?php if ($session_id == ""){ ?>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a type = "button" class="nav-link float-right"data-toggle="modal" data-target="#loginModal">Login</a>
        </li>
  
      </ul>
      </div>
   <?php } else {?>
     <div class="collapse navbar-collapse">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       <li class="nav-item">
         <a type = "button" class="nav-link float-right" href = "logout.php">Logout</a>
       </li>
     </ul>
     </div>
  <?php  }?>
  </nav>
   </header>
  <div class="content">
    <?php
    if ($session_id == "3"){
    $query = "SELECT * FROM tb_restaurant";
    $result=$mysqli->query($query);
    while($row = mysqli_fetch_array($result)){
     ?>
    <div class="table-responsive p-4">
      <h3>Restaurant</h3>
      <table class="table table-bordered table-striped">
        <tr>
          <th>Name</th>
          <th><?php echo $row['restaurant_name'];?></th>
        </tr>
        <tr>
        <tr>
          <th>Address</th>
          <th><?php echo $row['address'];?></th>
        </tr>
        <tr>
          <th>Business code</th>
          <th><?php echo $row['business_code'];?></th>
        </tr>
        <tr>
          <th>Open time</th>
          <th><?php echo $row['open_time'];?></th>
        </tr>
        <tr>
          <th>close time</th>
          <th><?php echo $row['close_time'];?></th>
        </tr>
        <?php 
        $restaurant = $row['restaurant_name'];   
        display_items($restaurant)?>
      </table>

    </div>
  <?php }} ?>

  </div>
 <?php
 include ('edit.php');
 ?>

  <!-- Registration Modal Form -->
  <div class="modal fade" id="regiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Restaurant Registration</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role = "form" class="regiForm" action = "register_engine.php" method = "post">
            <table class = "responsive">
              <tr class="form-group">
                <td style = "width: 40%"><label for="fname">First Name</label></td>
                <td><input class = "form-control" type="text" id="fname" name ="fname" ></td>
              </tr>

              <tr class="form-group">
                <td>Last Name</td>
                <td><input  class = "form-control" type="text" id="lname" name = "lname" ></td>
              </tr>

            <tr class="form-group">
              <td>Email</td>
              <td><input  class = "form-control" type="email" id="email" name ="email" ></td>
            </tr>

            <tr class="form-group">
              <td>Password</td>
              <td><input class = "form-control"  type="password" id="password" name = "password" pattern = "(?=.*\d)(?=.*[A-Za-z]).{6,8}" title = "Must contain at least one number, one letters and between 6 and 8 characters"  ></td>
            </tr>

            <tr class="form-group">
              <td>Confirm Password</td>
              <td><input class = "form-control"  type="password" id="confirm_password" name = "confirm_password"></td>
            </tr>

        </table>
        <p><span id = "msg"></span></p>

        <button class = "btn btn-danger float-right" type = "submit" id = "register" name = "register">Register</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>


    </div>
    <div class="modal-footer">
    </div>
  </div>
  </div>
  </div>

<!-- Footer -->

<div class="footer">
    <footer>
      <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
        <ul class="list-inline">
            <?php if ($session_access == "3"){ ?>
                <li class="list-inline-item"><a href="masterpage.html">Masterpage(temp link)</a></li>
            <?php } elseif($session_access == "2") {?>
                <li class="list-inline-item"><a href="mangerpage.php">ManagerPage</a></li>
            <?php } else {?>

            <?php  }?>
            <li class="list-inline-item"><a href="#" class="nav-link"  data-toggle="modal" data-target="#LoginModal">ManagerLogin</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="privacy_policy.php">Privacy Policy</a></li>
        </ul>
    </footer>
  </div>

  <?php include ('login.php'); ?>

<script type="text/javascript" src = "script.js"></script>
</body>
</html>