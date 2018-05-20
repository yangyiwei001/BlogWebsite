<?php
    $username = isset($_POST['username'])?$_POST['username']:"";
    $password = isset($_POST['password'])?$_POST['password']:"";
    $re_password = isset($_POST['re_password'])?$_POST['re_password']:"";
    $email = isset($_POST['email'])?$_POST['email']:"";

    if($password == $re_password) {
        $conn = mysqli_connect('localhost','root','','php');
        $sql_select="SELECT username FROM User WHERE username = '$username'";
        $ret = mysqli_query($conn,$sql_select);
        $row = mysqli_fetch_array($ret);
        if($username == $row['username']) {
            header("Location:register.php?err=1");
        } else {
            $sql_insert = "INSERT INTO User(username,password,sex,qq,email,phone,address) VALUES('$username','$password','$email')";
            mysqli_query($conn,$sql_insert);
            header("Location:register.php?err=3");
        }
        mysqli_close($conn);
    } else {
        header("Location:register.php?err=2");
    }
?>