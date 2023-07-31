<?php
require 'dbconnect.php';
session_start();
?>
<?php
if(isset($_SESSION['user']))
{
 echo "welcome to this website ".$_SESSION['user'];
 
}
else
{
    header('location: loginpage.php');
}
?>