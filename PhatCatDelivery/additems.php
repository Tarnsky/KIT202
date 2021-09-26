<!-- This page should allow us to add food items -->
<?php
include ('db_conn.php');



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>additems</title>
    <link rel="stylesheet" href="style.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

      <script src="https://kit.fontawesome.com/6d293d14e1.js" crossorigin="anonymous"></script>
  </head>
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

  <body>
    <?php
    global $mysqli;
    $query = "SELECT item_name, ingredients, item_price, tb_restaurant FROM `tb_items`;"; 
    $result = $mysqli->query($query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
      while($row = mysqli_fetch_assoc($result)) {
        echo $row['item_name'] . "<br>" . $row['ingredients']. "<br>" . $row['item_price']. "<br>" . $row['tb_restaurant'];
      }
    }
    ?>

  <form action="processitem.php" method="POST"> 
    <input type="text" name="item" placeholder="Itemname">
    <br>
    <input type="text" name="price" placeholder="Itemprice">
    <br>
    <input type="text" name="description" placeholder="description">
    <br>
    <input type="text" name="restaurant" placeholder="restaurant">
    <br>
    <button type = "submit" name="submit">Add item</button>
  </form>
  </body>

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
</body>
</html>
