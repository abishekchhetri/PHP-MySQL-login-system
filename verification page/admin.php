<?php
require 'navbar.php';
require 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/stylepage.css">
</head>
<body>
    <h2>Admin Account Management Console</h2>
    <table >
       <tr class='adf'>
        <td >SN</td>
        <td>Username</td>
        <td>Action</td>
       </tr>
    <?php
    $sql="SELECT * FROM `userinfo`";
    $result=mysqli_query($conn,$sql);
    $count=1;
    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>
        <td>".$count++."</td>
        <td>".$row['user']."</td>
        <td><button><a class='no' href='delete.php?deletedata=".$row['sn']."'>Delete</a></button></td>
       </tr>";
    }
    ?>
    </table>
</body>
</html>