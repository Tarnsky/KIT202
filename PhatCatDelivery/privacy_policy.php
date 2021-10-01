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
  </header>
  <body>
  <div class="card-deck">
    <div class="card">
      <div class="card-body text-center">
        <h5 class="card-title">Privacy policy </h5>
        <p class="card-text">Phatcat Delivery sells all your information for phat profits. If you wish for us to not sell or post your information, please text STOP to 0412345678.... But that probably won’t work. Only one way to find out!</p>
      </div>
    </div>
  </div>
  </body>

<!-- Footer -->

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