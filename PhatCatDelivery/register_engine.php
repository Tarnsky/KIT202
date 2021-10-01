<?php

include('db_conn.php'); //db connection

if (isset($_POST['register'])){
  $name=$_POST['fname'];
  $address =$_POST['address'];
  $code=$_POST['code'];
  $open = $_POST['open'];
  $close = $_POST['close'];




  $restaurantregister = "INSERT INTO tb_restaurant (`restaurant_name`, `address`, `business_code`,  `open_time`,`close_time`) VALUES ('$name','$address','$code','$open','$close')";


  $mysqli->query($restaurantregister);

   echo "<script type='text/javascript'>alert('You are successfully registered!');
  window.location='edit.php';</script>";

}

 ?>
