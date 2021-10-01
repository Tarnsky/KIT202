<?php

include('db_conn.php'); //db connection

if (isset($_POST['registerItem'])){
  $name=$_POST['name'];
  $ingredients =$_POST['ingredients'];
  $restaurant = $_POST['restaurant'];
  $price=$_POST['item_price'];



  $registerItem = "INSERT INTO tb_items (`item_price`, `ingredients`, `item_name`,  `restaurant_name`) VALUES ('$price','$ingredients','$name','$restaurant')";


  $mysqli->query($registerItem);

   echo "<script type='text/javascript'>alert('Item added!');
  window.location='index.php';</script>";

}

 ?>
