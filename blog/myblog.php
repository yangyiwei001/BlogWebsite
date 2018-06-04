<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/main.css"/>
		<title>myblog</title>
	</head>
	<body>
		<?php
            //判断是否已登录
            session_start();
            $username=isset($_SESSION['user'])?$_SESSION['user']:"";
            if(!empty($username)){
                $w="username='$username'";
                include("paging.php");
                $sql_select="select * from article where username='$username' order by articleid desc limit $offset,$pagesize";
                $query=mysqli_query($conn,$sql_select);
        ?>
        <div id="header">
        	<div id="nav">
        		<div id="navL">
        			<h1><?php echo $username?>'s&nbsp;Blog</h1>
        		</div>
        		<div id="navR">
        			<ul>
        				<li><a href="loginsuccess.php" class="selected">首页</a></li>
        				<li><a href="write.php">写博文</a></li>
        				<li><a href="logout.php">退出</a></li>
        			</ul>
        		</div>
        	</div>
        </div>
        <div>
        	<?php
        	   while($rs=mysqli_fetch_array($query)){
            ?>
            <div id="myarticle">
            	<div id="myarticleup">
            		<h2><a href="loginsuccessview.php?id=<?php echo $rs['articleid'];?>"><?php echo $rs['title'];?></a></h2>
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
            		<p><?php echo mb_substr($rs['content'],0,110,'utf-8');?>...</p>
            	</div>
            	<div id="control">
            		<ul>
            			<li><a href="edit.php?id=<?php echo $rs['articleid'];?>">编辑</a></li>
            			<li><a href="delete.php?id=<?php echo $rs['articleid'];?>">删除</a></li>
            		</ul>
            	</div>
            </div>
            <?php
        	   }
        	   if($rows!=0){
            ?> 
            <div id="paging">
				当前:<?php echo $page;?>/<?php echo $pagecount;?>&nbsp;<a href="?page=<?php echo 1;?>">首页</a>&nbsp;<a href="?page=<?php echo $pageprev;?>">上一页</a>&nbsp;<a href="?page=<?php echo $pagenext?>">下一页</a>&nbsp;<a href="?page=<?php echo $pagecount;?>">末页</a>
			</div>
			<?php
        	   }
            ?>
		</div>
		<?php
            }
            else{
        ?>
        	<h1>你无权访问！！！</h1>
        <?php
            }
        ?>
	</body>
</html>