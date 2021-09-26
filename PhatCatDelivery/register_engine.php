<?php

include('db_conn.php'); //db connection

if (isset($_POST['register'])){
  $first_name=$_POST['fname'];
  $last_name =$_POST['lname'];
  $email = $_POST['email'];
  $address =$_POST['address'];
  $phone_number=$_POST['phone_number'];
  $password = $_POST['password'];



  $register = "INSERT INTO tb_customers (`first_name`, `last_name`, `email`,  `address`,`phone_number`, `password`) VALUES ('$first_name','$last_name','$email','$address','$phone_number','$password')";


  $mysqli->query($register);

   echo "<script type='text/javascript'>alert('You are successfully registered!');
  window.location='index.php';</script>";

}

 ?>
