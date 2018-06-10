<?php
    header("content-type:text/html;charset=utf-8");
    $username=isset($_POST['username'])?$_POST['username']:"";
    $articleid=isset($_POST['articleid'])?$_POST['articleid']:"";
    $comment=isset($_POST['commentcontent'])?$_POST['commentcontent']:"";
    if(!empty($comment)){
        $conn=mysqli_connect("localhost","root","","blogwebsite");
        mysqli_query($conn,"set names 'utf8'");
        $sql_insert="insert into comment values(null,'$comment',now(),'$username','$articleid')";
        mysqli_query($conn,$sql_insert);
        $sql_update="update article set commentnum=commentnum+1 where articleid='$articleid'";
        mysqli_query($conn,$sql_update);
        session_start();
        $_SESSION['articleid']=$articleid;
        header("Location:loginsuccessview.php");
    }
    else{
        echo "<script>alert('评论内容不能为空!');location.href='loginsuccessview.php'</script>";
    }
?>
