<?php
include("session.php");
//destroy the sessions saved before.
session_destroy();
//automatically go back to main page
header('Location: index.php');
?>
