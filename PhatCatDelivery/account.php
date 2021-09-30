<?php
include ('db_conn.php');
include ('session.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Account Details</title>
    <link rel="stylesheet" href="account.css">
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

<!-- Tabs created for account -->
  </nav>
    <div class="tabs">
      <div class="tab-header">
        <div class="active"> 
          Account Details
        </div>
        <div>
          Transaction History
        </div>
        <div>
          Balance
        </div>
      </div>
<!-- Tab content for defualt active page  which is the account details -->
      <div class="tab-content">
        <div class="active">
          <table>
            <tr>
              <td>Name: </td>
              <td>Your Name</td>
            </tr>
            <tr>
              <td>Age: </td>
              <td>Your Age</td>
            </tr>
            <tr>
              <td>Mobile Number: </td>
              <td>Mobile number</td>
            </tr>
            <tr>
              <td>Password: </td>
              <td>Your Password</td>
            </tr>
            <tr>
              <td>Address: </td>
              <td>Your Address</td>
            </tr>
            <tr>
              <td>Card #: </td>
              <td>Your Card #</td>
            </tr>
            <tr><td><button>Edit</button></td></tr>
          </table>
        </div>
<!-- tab content for balance history -->
        <div>
          <table>
            <tr>
              <th>Date</th>
              <th>Description</th>
              <th>Amount</th>
              <th>Balance</th>
            </tr>
            <tr>
              <td>11/11/21 </td>
              <td>KFC</td>
              <td>-$13.99</td>
              <td>$1164.34</td>
            </tr>
            <tr>
              <td>10/11/21: </td>
              <td>Pizza House</td>
              <td>-$10.00</td>
              <td>$1154.34</td>
            </tr>
            <tr>
              <td>7/11/21</td>
              <td>Deposit +$100</td>
              <td>+$100</td>
              <td>$1254.34</td>
            </tr>
          </table>
        </div>
<!-- Tab contents for account balance -->
        <div>
          <table>
            <tr>
              <td>
                Current Balance:
              </td>
              <td>
                $1254.34
              </td>
            </tr>
          </table>
          <tr><td><button>Deposit</button></td></tr>
        </div>
      </div>
    </div>
    <script>
//script for tab headers and tab contents, query the selector through class 
// and assignt it to tabHeaders and tabcontents variables
      let tabHeaders = document.querySelectorAll(".tabs .tab-header >div");
      let tabContents = document.querySelectorAll(".tabs .tab-content > div");
      
      //Loop through tab headers, once the tab header is click it will change
      // the class to active and show the active tab content
      for (let i = 0; i < tabHeaders.length; i++) {
        tabHeaders[i].addEventListener("click",function() {
          document.querySelector(".tabs .tab-header > .active").classList.remove("active");
          tabHeaders[i].classList.add("active");
          document.querySelector(".tabs .tab-content > .active").classList.remove("active");
          tabContents[i].classList.add("active");
        })
      }
    </script>

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