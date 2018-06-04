<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/main.css"/>
		<title>view</title>
	</head>
	<?php
        $conn=mysqli_connect("localhost","root","","blogwebsite");
        mysqli_query($conn,"set names 'utf8'");
        if(!empty($_GET['id'])){
            $id=$_GET['id'];
            $sql_select="select * from article where articleid='$id'";
            $query=mysqli_query($conn,$sql_select);
            $rs=mysqli_fetch_array($query);
            $sql_update="update article set viewnum=viewnum+1 where articleid='$id'";
            mysqli_query($conn,$sql_update);
        }
        else{
            echo "<script>alert('无内容！');location.href='index.php'</script>";
        }
    ?>
    <body>
    	<div id="header">
    		<div id="nav">
    			<div id="navL">
    				<h1>Blog</h1>
    			</div>
    			<div id="navR">
    				<ul>
    					<li><a href="index.php" class="selected">首页</a></li>
    					<li><a href="login.php">登录</a></li>
    					<li><a href="register.php">注册</a></li>
    				</ul>
    			</div>
    		</div>
    	</div>
    	<div id="view">
    		<h2><?php echo $rs['title'];?></h2>
    		<ul>
    			<li>作者：<?php echo $rs['username']?></li>
    			<li>|</li>
    			<li>日期：<?php echo $rs['articledate']?></li>
    			<li>|</li>
    			<li>分类：<?php echo $rs['sort']?></li>
    			<li>|</li>
    			<li>评论：<?php echo $rs['commentnum']?></li>
    			<li>|</li>
    			<li>浏览：<?php echo $rs['viewnum']?></li>
    		</ul>
    		<p><?php echo $rs['content'];?></p>
    	</div>
    </body>
</html>