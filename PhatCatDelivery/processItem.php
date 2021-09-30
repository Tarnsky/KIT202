<?php
include ('db_conn.php');
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $ingredients = $_POST['ingredients'];
    $restaurant = $_POST['restaurant_name'];

    $query = "INSERT INTO tb_items (item_name, item_price, ingredients, restaurant_name) 
    VALUES ('$item', '$price', '$ingredients', '$restaurant');";
   
   $result = $mysqli->query($query);
    
   $mysql_free_result($result);
   
   header("Location: ../items.php")
  ?>