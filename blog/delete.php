<?php
    header("content-type:text/html;charset=utf-8");
    $conn=mysqli_connect("localhost","root","","blogwebsite");
    mysqli_query($conn,"set names 'utf8'");
    if(!empty($_GET['id'])){
        $del=$_GET['id'];
        $sql_delete="delete from article where articleid='$del'";       
        mysqli_query($conn,$sql_delete);       
        echo "<script>alert('delete success!');location.href='myblog.php'</script>";//提示删除成功，并转到myblog.php
    }
?>
