<?php
include ('db_conn.php');
include ('session.php');

if(isset($_POST)){
$user_email = trim($_POST['login_email']);
$user_password = trim($_POST['login_password']);
    
    $salt = "marathon";
    $encrypted_password = crypt($user_password, $salt);


$sql ="SELECT * FROM customers WHERE email='$user_email'";
$result = $mysqli->query($sql);
//convert the result to array (the key of the array will be the column names of the table)
$row=$result->fetch_array(MYSQLI_ASSOC);

 if($row['email'] != $user_email ){
   echo "We cannot find your account in our system.";
 } else {
   if($row['password']==$user_password) {

     $_SESSION['session_id'] = $row['customer_id'];
     $_SESSION['session_user']=$row['first_name'];
     $_SESSION['session_email']=$row['email'];
     #$_SESSION['session_access']=$row['access'];

     echo "ok";
   } else {
     echo "Invalid password! Please try again.";
   }
 }
}

?>
