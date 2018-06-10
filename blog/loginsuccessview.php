<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/main.css"/>
		<title>view</title>
	</head>
	<body>
		<?php
            //判断是否已登录
            session_start();
    		$username=isset($_SESSION['user'])?$_SESSION['user']:"";
    		if(!empty($username)){
    	?>
		<div id="header">
			<div id="nav">
				<div id="navL">
					<h1>Blog</h1>
				</div>
				<div id="navR">
					<ul>
						<li><a href="loginsuccess.php">首页</a></li>
						<li><a href="myblog.php">我的博客</a></li>
						<li><a href="logout.php">退出</a></li>
					</ul>
				</div>
			</div>
		</div>
		<?php
            $conn=mysqli_connect("localhost","root","","blogwebsite");
            mysqli_query($conn,"set names 'utf8'");
            if(!empty($_GET['id'])){
                $id=$_GET['id'];
            }
            $articleid=isset($_SESSION['articleid'])?$_SESSION['articleid']:"";
            if(!empty($articleid))
            {
                $id=$articleid;
            }
            unset($_SESSION['articleid']);
            $sql_select="select * from article where articleid='$id'";
            $query=mysqli_query($conn,$sql_select);
            $rs=mysqli_fetch_array($query);
            $sql_update="update article set viewnum=viewnum+1 where articleid='$id'";
            mysqli_query($conn,$sql_update);
        ?>
        <div id="view">
        	<h2><?php echo $rs['title'];?></h2>
        	<ul>
        		<li>作者：<?php echo $rs['username'];?></li>
        		<li>|</li>
        		<li>日期：<?php echo $rs['articledate'];?></li>
        		<li>|</li>
        		<li>分类：<?php echo $rs['sort'];?></li>
        		<li>|</li>
        		<li>评论：<?php echo $rs['commentnum'];?></li>
        		<li>|</li>
        		<li>浏览：<?php echo $rs['viewnum'];?></li>
        	</ul>
        	<div id="contents">
        		<p><?php echo $rs['content'];?></p>
        	</div>
        </div>
        <div id="commenttext">
        	<h3 align="left">评论</h3>
        	<form action="commentaction.php" method="post">
        		<input type="hidden" name="username" value=<?php echo $username;?>>
        		<input type="hidden" name="articleid" value=<?php echo $id;?>>
        		<textarea rows="5" cols="68" name="commentcontent"></textarea>
        		<input class="button" type="submit" name="sub" value="提交">
        	</form>
        </div>
        <?php
            $sql_s="select * from comment where articleid='$id'";
            $result=mysqli_query($conn,$sql_s);
            while($row=mysqli_fetch_array($result)){
        ?>
        <div id="comm">
        	<ul>
        		<li><?php echo $row['username'];?></li>
        		<li><?php echo $row['commentdate']?></li>
        	</ul>
        	<p><?php echo $row['comment'];?></p>
        </div>
        <?php 
            }
    		}
    		else{
    	?>
    		<h1>你无权访问！！！</h1>
    	<?php
    		}
    	?>
	</body>
</html>