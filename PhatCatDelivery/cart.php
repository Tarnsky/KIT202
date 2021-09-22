<?php
include ('db_conn.php');
include ('session.php');
include ('cartFunctions.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cart</title>
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
<?php 
    $cart_id=checkCart($username);
    display_cart($cart_id);

    if(isset($_POST['item_id'])){
        $cart_id=checkCart($username);
        $item_id=$_POST['item_id'];
        $amount="amount".$item_id;
        editstock($item_id,$_POST[$amount],$cart_id);
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
