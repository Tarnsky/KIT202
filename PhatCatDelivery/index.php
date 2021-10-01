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
            <?php if ($session_id == ""){ ?>
          <li class="nav-item">
            <a class="nav-link"  href="#" data-toggle="modal" data-target="#regiModal">Registration</a>
          </li>
            <?php }?>
            <?php if ($session_id == ""){ ?>
   <?php } else {?>
     <div class="collapse navbar-collapse">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       <li class="nav-item">
          <a type = "button" class="nav-link float-right" href="account.php">Account</a>
        </li>
     </ul>
     </div>
  <?php  }?>
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
          <a type = "button" class="nav-link float-right" href="cart.php">Viewcart</a>
        </li>
        <li class="nav-item">
          <a type = "button" class="nav-link float-right"data-toggle="modal" data-target="#loginModal">Login</a>
        </li>
      </ul>
      </div>
   <?php } else {?>
     <div class="collapse navbar-collapse">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       <li class="nav-item">
          <a type = "button" class="nav-link float-right" href="cart.php">Viewcart</a>
        </li>
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
            <?php if ($session_id == ""){ ?>
            <a class="btn btn-outline-light btn-lg" href="#" data-toggle="modal" data-target="#regiModal" role="button">SIGN UP</a>
            <a class="btn btn-outline-light btn-lg" href="#" data-toggle="modal" data-target="#loginModal" role="button">SIGN IN</a>
            <?php } else {?>
            <a class="btn btn-outline-light btn-lg" href="logout.php" role="button">LOGOUT</a>
            <?php  }?>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Restaurants -->

  <div class ="order">
    <div class="panel">
      <div class="pricing-plan">
        <img src="img\Catdriving.jpg" alt="" class="food-img">
        <h2 class="food-header">Order now</h2>
        <a class="nav-link" aria-current="page" href="menu.php">Select Restaurant</a>
      </div>
    </div>
  </div>

<!-- About -->

  <div class="card-deck">
    <div class="card">
      <div class="card-body text-center">
        <h5 class="card-title">What do we do? </h5>
        <p class="card-text">Phatcat Delivery is an online food delivery app to help you order food from your favourite local restaurants and have it delivered to your door ASAP</p>
      </div>
    </div>
    <div class="card">
      <div class="card-body text-center">
        <img class = "img-responsive" src="img/phatcat2.png" alt="">
      </div>
    </div>
    <div class="card">
      <div class="card-body text-center">
        <img class = "img-responsive" src="img/phatcat3.jpg" alt="">
      </div>
    </div>
  </div>

  <!-- Registration Modal Form -->

  <div class="modal fade" id="regiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Phatcat registration</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role = "form" class="regiForm" action = "register_engine.php" method = "post">
            <table class = "responsive">
              <tr class="form-group">
                <td style = "width: 40%"><label for="fname">First Name</label></td>
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
                <td><input class = "form-control" type="text" id="address" name ="address" required></td>
              </tr>
                <tr>
                    <td>phone number</td>
                    <td><input class = "form-control" type="number" id="phone_number" name="phone_number" required></td>
                </tr>
              <tr class="form-group">
                <td>Password</td>
                <td><input class = "form-control"  type="password" id="password" name = "password" required pattern = "(?=.*\d)(?=.*[A-Za-z]).{6,8}" title = "Must contain at least one number, one letters and between 6 and 8 characters"></td>
              </tr>
              <tr class="form-group">
                <td>Confirm Password</td>
                <td><input class = "form-control"  type="password" id="confirm_password" name = "confirm_password" required ></td>
              </tr>
              <tr class="form-group">
          </td>
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

  <!-- Partner registration Modal Form -->

  <div class="modal fade" id="PartnerregiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Phatcat registration</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role = "form" class="regiForm">
            <table class = "responsive">
              <tr>
                <td>First Name</td>
                <td><input type="text" id="fname" required></td>
              </tr>
              <tr>
                <td>Last Name</td>
                <td><input type="text" id="lname" required></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><input type="email" id="email" required></td>
              </tr>
              <tr>
                <td>Restaurant name</td>
                <td><input type="text" id="Rname" required></td>
              </tr>
              <tr>
                  <td>Restaurant Verification code</td>
                  <td><input type="text" id="Vcode" required></td>
                </tr>
              <tr>
                <td>Password</td>
                <td><input type="password" id="password" required pattern = "(?=.*\d)(?=.*[A-Za-z]).{6,8}" title = "Must contain at least one number, one letters and between 6 and 8 characters"></td>
              </tr>
              <tr>
                <td>Confirm Password</td>
                <td><input type="password" id="confirm_password" required></td>
              </tr>
              <td>Access</td>
            <td><select  class = "form-control"  name="access" id="access" >
              <option value = "" hidden disabled selected = "selected">Select your position</option>
              <option class = "form-control" value="1">Manager</option>
              <option  class = "form-control" value="2">Staff</option>
            </select>
            </table>
            <button class = "btn btn-danger float-right" type = "submit">Register</button>
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
                <li class="list-inline-item"><a href="masterpage.php">Masterpage</a></li>
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
