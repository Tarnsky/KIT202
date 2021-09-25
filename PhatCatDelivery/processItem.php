<?php
include ('db_conn.php');
    $item = $_POST['item'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $restaurant = $_POST['restaurant'];

    $query = "INSERT INTO tb_items (item_name, item_price, description, tb_restaurant) 
    VALUES ('$item', '$price', '$description', '$restaurant');";
   
   $result = $mysqli->query($query);
    
   $mysql_free_result($result);
   
   header("Location: ../additems.php")
  ?>