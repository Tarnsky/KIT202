<!-- This page will allow us to add a new restuarnt -->

<?php
include ('db_conn.php');
include ('session.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Assigment 2</title>
  <link rel="stylesheet" href="style.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- icons library-->
  <script src="https://kit.fontawesome.com/6d293d14e1.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>

  <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
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
            <a class="nav-link" href="account.html">Account</a>
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

  <!-- Background image -->

  <div class="p-5 text-center bg-image header-background" >
    <div class="mask">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Phatcat Delivery</h1>
          <a class="btn btn-outline-light btn-lg" href="#" data-toggle="modal" data-target="#regiModal" role="button">SIGN UP</a>
          <a class="btn btn-outline-light btn-lg" href="#" data-toggle="modal" data-target="#LoginModal" role="button">SIGN IN</a>
        </div>
      </div>
    </div>
  </div>
</header>

  <!-- Registration Modal Form -->

  <div class="modal fade" id="restaurantModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Phatcat nre restaurant registration</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role = "form" class="regiForm">
            <table class = "responsive">
              <tr class="form-group">
                <td style = "width: 40%"><label for="fname">Name</label></td>
                <td><input class = "form-control" type="text" id="fname" name ="fname" required></td>
              </tr>
              <tr class="form-group">
                <td>Last Name</td>
                <td><input  class = "form-control" type="text" id="lname" name = "lname" required></td>
              </tr>
              <tr class="form-group">
                <td>Email</td>
                <td><input  class = "form-control" type="email" id="email" name ="email" required></td>
              </tr>
              <tr>
                <td>Address</td>
                <td><input type="address" id="address" required></td>
              </tr>
              <tr class="form-group">
                <td>Password</td>
                <td><input class = "form-control"  type="password" id="password" name = "password" required pattern = "(?=.*\d)(?=.*[A-Za-z]).{6,8}" title = "Must contain at least one number, one letters and between 6 and 8 characters"></td>
              </tr>
              <tr class="form-group">
                <td>Confirm Password</td>
                <td><input class = "form-control"  type="password" id="confirm_password" name = "confirm_password" required ></td>
              </tr>
            </table>
            <p><span id = "msg"></span></p>

            <button class = "btn btn-danger float-right" type = "submit" id = "register" name = "register">Register</button>
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
        <li class="list-inline-item"><a href="masterpage.html">Masterpage(temp link)</a></li>
        <li class="list-inline-item"><a href="#" class="nav-link"  data-toggle="modal" data-target="#LoginModal">Manager Login</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
      </ul>
    </footer>
  </div>

  <?php include ('login.php'); ?>

<script type="text/javascript" src = "script.js"></script>
</body>
</html>
