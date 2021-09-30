<?php
include('db_conn.php');
$update = false;
if(isset($_POST['edit']))
{
  $id = $_POST['edit'];
  $update = true;
     $query = "SELECT * FROM customer WHERE id = '$id'";
     $result = mysqli_query($mysqli, $query);
     $row = mysqli_fetch_array($result);
     echo json_encode($row);
}

if(isset($_POST['update']))
{

  $id = $_POST['user_id'];
  $firstname=$_POST['edit_fname'];
  $lastname =$_POST['edit_lname'];
  $address =$_POST['edit_address'];
  $email = $_POST['edit_email'];
  $access = $_POST['access'];



 $mysqli->query("UPDATE customer SET firstname = '$firstname', lastname = '$lastname', email = '$email', access = '$access' WHERE id = '$id'") or die($mysqli->error());

 echo "<script type='text/javascript'>alert('Updated');
window.location='menu_list.php';</script>";

}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM tb_customers WHERE customer_id='$id'") or die($mysqli->error());

    echo "<script type='text/javascript'>alert('A participant is deleted!');
   window.location='menu_list.php';</script>";

}


if(isset($_POST['mydetail_update']))
{

  $id = $_POST['mydetail_id'];
  $firstname=$_POST['mydetail_fname'];
  $lastname =$_POST['mydetail_lname'];
  $gender =$_POST['mydetail_gender'];
  $email = $_POST['mydetail_email'];
  $age = $_POST['mydetail_division'];



 $mysqli->query("UPDATE participant SET firstname = '$firstname', lastname = '$lastname', gender = '$gender', email = '$email', age_group = '$age' WHERE id = '$id'") or die($mysqli->error());

 echo "<script type='text/javascript'>alert('Updated');
window.location='menu_list.php';</script>";

}
 ?>
