<?php
include ('db_conn.php');
include ('session.php');
include('cartFunctions.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>items</title>
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

<?php 
//Displays all items from the resturant selected in the menu.php
$restaurant_id = $_GET['restaurant_id'];
global $mysqli;
$query = "SELECT `item_code`, `item_price`, `ingredients`, `item_name`, `restaurant_id` FROM `tb_items` WHERE `restaurant_id` LIKE '$restaurant_id'"; 
$result = $mysqli->query($query);
$printKey = false;
if( $row_cnt = mysqli_num_rows($result) >= 1 ) {
    echo "<form method='post'>";
    echo "<table border='1'>";
    while( $arr = $result->fetch_array(MYSQLI_ASSOC)) {
        if( !$printKey ) {
            print( "<tr>\r\n" );
            foreach( $arr as $key=>$value) {
                printf( "<td>%s</td>\r\n",$key);
            }
            print( "<td></td>");
            print( "</tr>\r\n" );
            $printKey = true;
        }
        print( "<tr>\r\n" );
        foreach( $arr as $key=>$value) {
            printf( "<td>%s</td>\r\n",$arr[ $key ]);
        }
        print( "<td><a href='items.php?
        tb_restaurant=$tb_restaurant&added=".$arr['item_code']."'>add</a></td>");
        print( "</tr>\r\n" ); 
    }
    echo "</table>";
    }else{
    echo "Sorry, no items available";
    }
?>
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
