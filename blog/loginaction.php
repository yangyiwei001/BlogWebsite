<?php
    $username=isset($_POST['username'])?$_POST['username']:"";
    $password=isset($_POST['password'])?$_POST['password']:"";
    $remember=isset($_POST['remember'])?$_POST['remember']:"";
    
    if(!empty($username)&&!empty($password)){
        $conn=mysqli_connect("localhost","root","","blogwebsite");
        $sql_select="select username,password from user where username='$username' and password='$password'";
        $result=mysqli_query($conn,$sql_select);
        $row=mysqli_fetch_array($result);
        if($username==$row['username']&&$password==$row['password']){
            if($remember=="on"){
                setcookie("userName",$username,time()+7*24*3600);
                setcookie("passWord",$password,time()+7*24*3600);
            }
            session_start();
            $_SESSION['user']=$username;
            header("Location:loginsuccess.php");
            mysqli_close($conn);
        }
        else{
            header("Location:login.php?err=1");
        }
    }
    else{
        header("Location:login.php?err=2");
    }
?>