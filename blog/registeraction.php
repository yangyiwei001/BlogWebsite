<?php
    $username=isset($_POST['username'])?$_POST['username']:"";
    $password=isset($_POST['password'])?$_POST['password']:"";
    $re_password=isset($_POST['re_password'])?$_POST['re_password']:"";
    $email=isset($_POST['email'])?$_POST['email']:"";
    
    if(!preg_match('/^[\w]{4,16}$/',$username)){
        header("Location:register.php?err=1");
    }
    else if(!preg_match('/^[\w]{6,16}$/',$password)){
        header("Location:register.php?err=2");
    }
    else if(!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',$email)){
        header("Location:register.php?err=3");
    }
    else{
        if($password==$re_password){
            $conn=mysqli_connect("localhost","root","","blogwebsite");//连接数据库
            mysqli_query($conn,"set names 'utf8'");
            $sql_select="select username,email from user";//SQL语句
            $query=mysqli_query($conn,$sql_select);//执行SQL语句
            $row=mysqli_fetch_array($query);//将数据以索引方式存储在数组中
            if($username==$row['username']){
                header("Location:register.php?err=4");
            }
            else if($email==$row['email']){
                header("Location:register.php?err=6");
            }
            else{
                $sql_insert="insert into user values(null,'$username','$password','$email')";
                mysqli_query($conn,$sql_insert);
                header("Location:register.php?err=7");
            }
            mysqli_close($conn);
        }
        else{
            header("Location:register.php?err=5");
        }
    }
?>