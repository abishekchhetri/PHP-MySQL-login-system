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
    <form class="main" method="post">
        <h2>Sign Up </h2>
        <div class="main_">
            <input name="Username" ; placeholder="Username" class="textfield1" type="text">
            <input name="Password" ; placeholder="Password" class="textfield2" type="password">
            <div class="writeme"></div>
            <button name="buttonMain" class="buttonLogin2">Sign Up</button>
        </div>
        <?php
        //get sign up post
        if (isset($_POST['buttonMain'])) {
            $user = $_POST['Username'];
            $pass = $_POST['Password'];
            //add the data
            if($user==''||$pass=='')
            {
                echo "<script>
                        document.querySelector('.writeme').innerHTML='Name or password cannot be empty!';
                        </script>";
            }
            else
            {
                //encrypt the username and the password
                $user=mysqli_real_escape_string($conn,$user);
                $user=htmlentities($user);
                $pass=mysqli_real_escape_string($conn,$pass);
                $pass=htmlentities($pass);
                $pass=password_hash($pass,PASSWORD_BCRYPT);

                $sql = "SELECT * FROM `userinfo` where `user`='$user' ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($result);
                if ($row <= 0) {
                    $sql = "INSERT INTO `userinfo` (`sn`, `user`, `pass`) VALUES ('', '$user', '$pass');";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo "<script>
                        document.querySelector('.writeme').innerHTML='Account created sucessfully welcome ".$user."';
                        </script>";
                    }
                } else {
                    echo "<script>
                    document.querySelector('.writeme').innerHTML='username : ".$user." exists already!!';
                        </script>";
                }

            }

        }
        ?>
    </form>
    <script>
    </script>
</body>

</html>