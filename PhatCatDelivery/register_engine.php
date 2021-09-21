<?php

include('db_conn.php'); //db connection

if (isset($_POST['register'])){
  $firstname=$_POST['fname'];
  $lastname =$_POST['lname'];
  $gender =$_POST['gender'];
  $race = $_POST['race'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $age = $_POST['division'];


  $register = "INSERT INTO participant (`firstname`, `lastname`, `gender`,  `race`,`email`, `password`, `age_group`) VALUES ('$firstname','$lastname','$gender','$race','$email','$password','$age')";


  $mysqli->query($register);

   echo "<script type='text/javascript'>alert('You are successfully registered!');
  window.location='index.php';</script>";

}

 ?>
