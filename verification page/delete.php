<?php
require 'dbconnect.php';
$delkey=$_GET['deletedata'];
$sql="DELETE FROM `userinfo` WHERE `sn` = $delkey";
$res=mysqli_query($conn,$sql);
if($res)
{
    header('location: admin.php');
}
?>