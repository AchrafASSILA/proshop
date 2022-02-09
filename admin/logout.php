<?php


// unset adin session 
session_start();
unset($_SESSION['admin_username']);
unset($_SESSION['admin_id']);


header("Location: ./login.php");
exit();
