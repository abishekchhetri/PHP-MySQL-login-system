<?php
require 'dbconnect.php';
session_start();
if(!isset($_SESSION['user']))
{
    header('location: loginpage.php');
}
else
{
    session_unset();
    session_destroy();
    header('location: loginpage.php');
}
   
?>