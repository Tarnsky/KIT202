<?php
include ('db_conn.php');
include('cartFunctions.php');
include ('session.php');

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
          <a type = "button" class="nav-link float-right"data-toggle="modal" data-target="index.php">Login</a>
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
          <th>Close time</th>
          <th><?php echo $row['close_time'];?></th>
        </tr>
        <?php 
        $restaurant = $row['restaurant_name'];   
        display_items($restaurant)?>
      </table>

    </div>
  <?php }} ?>

  </div>
  <li class="nav-item">
            <a class="nav-link"  data-toggle="modal" data-target="#restaurantModal">Add restaurant</a>
          </li>

  <!-- Restaurant Modal Form -->

  <div class="modal fade" id="restaurantModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Phatcat restaurant registration</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role = "form" class="regiForm" action = "restaurant_engine.php" method = "post">
            <table class = "responsive">
              <tr class="form-group">
                <td style = "width: 40%"><label for="fname">Name</label></td>
                <td><input class = "form-control" type="text" id="fname" name ="fname" required></td>
              </tr>
              <tr>
                <td>Address</td>
                <td><input class = "form-control" type="text" id="address" name ="address" required></td>
              </tr>
              <tr>
                <td>Business code</td>
                <td><input class = "form-control" type="number" id="code" name ="code" required></td>
              </tr>
              <tr>
                <td>Open Time</td>
                <td><input class = "form-control" type="time" id="open" name ="open" required></td>
              </tr>
              <tr>
                <td>Close Time</td>
                <td><input class = "form-control" type="time" id="close" name ="close" required></td>
              </tr>
              <tr class="form-group">
          </td>
        </tr>
            </table>
            <p><span id = "msg"></span></p>

            <button class = "btn btn-danger float-right" type = "submit" id = "restaurantregister" name = "restaurantregister">Register restaurant</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </form>
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
                <li class="list-inline-item"><a href="masterpage.html">Masterpage</a></li>
            <?php } elseif($session_access == "2") {?>
                <li class="list-inline-item"><a href="mangerpage.php">ManagerPage</a></li>
            <?php } else {?>

            <?php  }?>
            <li class="list-inline-item"><a href="#" class="nav-link"  data-toggle="modal" data-target="index.php">ManagerLogin</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="privacy_policy.php">Privacy Policy</a></li>
        </ul>
    </footer>
  </div>

  <?php include ('login.php'); ?>

<script type="text/javascript" src = "script.js"></script>
</body>
</html>