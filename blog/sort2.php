<?php
    session_start();
    if(!empty($_POST['quanbu'])){
        unset($_SESSION['sort']);
    }
    else if(!empty($_POST['jishu'])){
        $_SESSION['sort']="技术";
    }
    else if(!empty($_POST['xinqing'])){
        $_SESSION['sort']="心情";
    }
    else if(!empty($_POST['youmo'])){
        $_SESSION['sort']="幽默";
    }
    else if(!empty($_POST['jilu'])){
        $_SESSION['sort']="记录";
    }
    else if(!empty($_POST['qita'])){
        $_SESSION['sort']="其他";
    }
    header("Location:loginsuccess.php");
?>