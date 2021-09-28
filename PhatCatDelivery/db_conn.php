<?php
//database connection
$mysqli=new mysqli("localhost", "root", "", "assignment_2");

if (mysqli_connect_errno()) {
    printf("failed to connect to datebase: %s\n", mysqli_connect_error());
    exit();
}
?>
