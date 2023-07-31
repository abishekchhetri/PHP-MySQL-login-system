<?php
require 'navbar.php';
require 'dbconnect.php';
session_start();
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
        <h2>Login </h2>
        <div class="main_">
            <input name="Username" ; placeholder="Username" class="textfield1" type="text">
            <input name="Password" ; placeholder="Password" class="textfield2" type="password">
            <div class="writeme"></div>
            <button name="buttonMain" class="buttonLogin">Login</button>
        </div>
        <?php
        //get sign in post
        if (isset($_SESSION['user'])) {
            header('location: welcome.php');
        } else
            if (isset($_POST['buttonMain'])) {
                $user = $_POST['Username'];
                $pass = $_POST['Password'];
                $user = mysqli_real_escape_string($conn, $user);
                $user = htmlentities($user);
                $pass = mysqli_real_escape_string($conn, $pass);
                $pass = htmlentities($pass);
                //add the data
                if ($user == '' || $pass == '') {
                    echo "<script>
                        document.querySelector('.writeme').innerHTML='Name or password cannot be empty!';
                        </script>";
                } else {

                    $sql = "SELECT * FROM `userinfo` where `user`='$user'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $len = mysqli_num_rows($result);
                    if ($len > 0) {
                        $p = $row['pass'];
                        if ((password_verify($pass, $p))) {
                            header('location: welcome.php');
                            $_SESSION['user'] = $user;
                            $_SESSION['pass'] = $pass;
                        } else {
                            echo "<script>
                    document.querySelector('.writeme').innerHTML='(invalid credentials)!!';
                        </script>";
                        }
                    }
                    else
                    echo "<script>
                    document.querySelector('.writeme').innerHTML='(invalid credentials)!!';
                        </script>";


                }

            }
        ?>
    </form>

</html>